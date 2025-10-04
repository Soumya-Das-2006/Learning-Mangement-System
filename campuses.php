<!-- Modal -->
<div id="campuses" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <?php
        // ✅ Check if connection is valid
        if (!$conn) {
            die("<p style='color:red;'>Database connection failed: " . mysqli_connect_error() . "</p>");
        }

        // ✅ Run query
        $mission_query = mysqli_query($conn, "SELECT * FROM content WHERE title = 'Campuses'");

        if (!$mission_query) {
            // ✅ Show query error (for debugging)
            echo "<p style='color:red;'>Query failed: " . mysqli_error($conn) . "</p>";
        } else {
            $mission_row = mysqli_fetch_array($mission_query, MYSQLI_ASSOC);

            if ($mission_row) {
                // ✅ Output safely
                echo $mission_row['content'];
            } else {
                // ✅ Fallback message if no content found
                echo "<p>No content found for 'Campuses'.</p>";
            }
        }
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">
            <i class="icon-remove"></i> Close
        </button>
    </div>
</div>
