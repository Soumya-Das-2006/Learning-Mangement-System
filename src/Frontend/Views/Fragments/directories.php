<<<<<<< HEAD
		<!-- Modal -->
<div id="directories" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-body">
										<?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'Directories' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>

</div>
</div>
=======
<!-- Modal -->
<div id="directories" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <?php
        // ✅ Check if connection is valid
        if (!$conn) {
            die("<p style='color:red;'>Database connection failed: " . mysqli_connect_error() . "</p>");
        }

        // ✅ Run query
        $mission_query = mysqli_query($conn, "SELECT * FROM content WHERE title = 'Directories'");

        if (!$mission_query) {
            // ✅ Handle query error
            echo "<p style='color:red;'>Query failed: " . mysqli_error($conn) . "</p>";
        } else {
            $mission_row = mysqli_fetch_array($mission_query, MYSQLI_ASSOC);

            if ($mission_row) {
                // ✅ Output content safely
                echo $mission_row['content'];
            } else {
                // ✅ Show fallback message if no content found
                echo "<p>No content found for 'Directories'.</p>";
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
>>>>>>> 41343db (Added LMS project files)
