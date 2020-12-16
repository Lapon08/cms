<?php 
// Mengonfirmasi Query
function confirm($result){
    global $connection;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

}
?>