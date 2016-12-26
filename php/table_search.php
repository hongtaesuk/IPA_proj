<?php

$conn = mysqli_connect("localhost", "taeugi323", "123123", "IPA_proj");
if(!$conn) {
    echo "DB access fail!\n";
}

/// from here
$table_query = "show tables from IPA_proj";
$result = mysqli_query($conn, $table_query);
if(!$result) {
    echo "DB table access fail!\n";
    exit;
}

/////// The searched result will be saved at $result.
/////// Other php files that need to search table will use this code.

?>
