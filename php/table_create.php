<?php

$conn = mysqli_connect("localhost", "taeugi323", "123123", "IPA_proj");
if(!$conn) {
    echo "DB access fail!\n";
}

$name = $_GET['name'];

$create_query = "create table ".$name." (id varchar(12), start_time time, end_time time)";

$result = mysqli_query($conn, $create_query);
if(!$result) {
    echo "DB table creation fail!\n";
    exit;
}

header("Location: ../search.html");
exit;

?>
