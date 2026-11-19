<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Screen + Audio Recorder</title>
</head>
<body>
  <h2>Screen + Audio Recording with Upload</h2>

  <button id="startBtn">Start Recording</button>
  <button id="stopBtn" disabled>Stop Recording</button>
  
  <video id="playback" controls></video>
  <br>
  <a id="download-link" href="#" download="class-recording.webm" style="display:none;" class="btn btn-success">Download Recording</a>

  <script>
    let recorder, recordedChunks = [];

    document.getElementById("startBtn").addEventListener("click", async () => {
      try {
        const screenStream = await navigator.mediaDevices.getDisplayMedia({ video: true });
        const audioStream = await navigator.mediaDevices.getUserMedia({ audio: true });

        const combinedStream = new MediaStream([
          ...screenStream.getTracks(),
          ...audioStream.getTracks()
        ]);

        recorder = new MediaRecorder(combinedStream);
        recordedChunks = [];

        recorder.ondataavailable = e => {
          if (e.data.size > 0) recordedChunks.push(e.data);
        };

        recorder.onstop = () => {
          const blob = new Blob(recordedChunks, { type: "video/webm" });
          const url = URL.createObjectURL(blob);
          document.getElementById("playback").src = url;

          // download link
          const downloadLink = document.getElementById("download-link");
          downloadLink.href = url;
          downloadLink.style.display = "block";

          // upload to server
          const formData = new FormData();
          formData.append("video", blob, "recording.webm");

          fetch("upload.php", { method: "POST", body: formData })
            .then(res => res.text())
            .then(msg => console.log("Server says:", msg))
            .catch(err => console.error("Upload failed:", err));
        };

        recorder.start();
        document.getElementById("startBtn").disabled = true;
        document.getElementById("stopBtn").disabled = false;

      } catch (err) {
        console.error("Error:", err);
      }
    });

    document.getElementById("stopBtn").addEventListener("click", () => {
      recorder.stop();
      document.getElementById("startBtn").disabled = false;
      document.getElementById("stopBtn").disabled = true;
    });
  </script>
</body>
</html>
