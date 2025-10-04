import asyncio
import io
import platform
from io import BytesIO
from telegram import Update
from telegram.ext import ApplicationBuilder, MessageHandler, ContextTypes, filters
import pyautogui
import requests
from PIL import Image
import pyperclip
import os
import signal
import sys

# Try importing Windows-specific modules
try:
    if platform.system() == 'Windows':
        import win32clipboard
    else:
        win32clipboard = None
except ImportError:
    win32clipboard = None

# Get token from environment variable for security
TOKEN = os.getenv('TELEGRAM_BOT_TOKEN', '')

class RemoteControlBot:
    def __init__(self):
        self.application = None
        self.is_running = False
        
    async def receive_text(self, update: Update, context: ContextTypes.DEFAULT_TYPE):
        """Handles incoming text messages."""
        try:
            text = update.message.text
            await update.message.reply_text("Processing text...")
            
            # Add a small delay to ensure focus is on the right window
            await asyncio.sleep(1)
            
            # Type the text
            for line in text.split('\n'):
                pyautogui.write(line)
                pyautogui.press('enter')
                
            await update.message.reply_text("Text executed successfully")
        except Exception as e:
            await update.message.reply_text(f"Error: {str(e)}")

    async def receive_photo(self, update: Update, context: ContextTypes.DEFAULT_TYPE):
        """Handles incoming photo messages."""
        try:
            await update.message.reply_text("Photo received, processing...")
            
            photo = update.message.photo[-1]
            file = await context.bot.get_file(photo.file_id)
            file_bytes = requests.get(file.file_path).content
            image = Image.open(io.BytesIO(file_bytes))
            
            if self.copy_image_to_clipboard(image):
                await update.message.reply_text("Photo copied to clipboard successfully")
            else:
                await update.message.reply_text("Failed to copy photo to clipboard")
                
        except Exception as e:
            await update.message.reply_text(f"Error processing photo: {str(e)}")

    def copy_image_to_clipboard(self, image):
        """Copies a PIL image to clipboard on Windows."""
        try:
            if platform.system() == 'Windows' and win32clipboard:
                output = BytesIO()
                image.convert('RGB').save(output, 'BMP')
                data = output.getvalue()[14:]  # Skip BMP header
                output.close()
                win32clipboard.OpenClipboard()
                win32clipboard.EmptyClipboard()
                win32clipboard.SetClipboardData(win32clipboard.CF_DIB, data)
                win32clipboard.CloseClipboard()
                return True
            else:
                # For non-Windows systems, save to a temporary file
                image.save('/tmp/clipboard_image.png', 'PNG')
                return False
        except Exception:
            return False

    async def start_bot(self):
        """Starts the Telegram bot."""
        if self.is_running:
            print("Bot is already running")
            return
            
        try:
            self.application = ApplicationBuilder().token(TOKEN).build()
            
            # Add handlers
            self.application.add_handler(MessageHandler(filters.TEXT & (~filters.COMMAND), self.receive_text))
            self.application.add_handler(MessageHandler(filters.PHOTO, self.receive_photo))
            
            print("Bot starting...")
            self.is_running = True
            
            # Start polling
            await self.application.initialize()
            await self.application.start()
            await self.application.updater.start_polling()
            
            print("Bot is now running. Press Ctrl+C to stop.")
            
            # Wait until stopped
            while self.is_running:
                await asyncio.sleep(1)
                
        except Exception as e:
            print(f"Error starting bot: {e}")
            self.is_running = False

    async def stop_bot(self):
        """Stops the Telegram bot gracefully."""
        if not self.is_running:
            print("Bot is not running")
            return
            
        try:
            print("Stopping bot...")
            self.is_running = False
            
            if self.application:
                await self.application.updater.stop()
                await self.application.stop()
                await self.application.shutdown()
                
            print("Bot stopped successfully")
        except Exception as e:
            print(f"Error stopping bot: {e}")

# Global bot instance
bot = RemoteControlBot()

def signal_handler(sig, frame):
    """Handle interrupt signals."""
    print('Interrupt received, shutting down...')
    asyncio.run(bot.stop_bot())
    sys.exit(0)

def main():
    """Main function to run the bot."""
    # Register signal handlers
    signal.signal(signal.SIGINT, signal_handler)
    signal.signal(signal.SIGTERM, signal_handler)
    
    try:
        # Run the bot
        asyncio.run(bot.start_bot())
    except KeyboardInterrupt:
        print("Bot stopped by user")
    except Exception as e:
        print(f"Error: {e}")
    finally:
        if bot.is_running:
            asyncio.run(bot.stop_bot())

if __name__ == '__main__':
    main()