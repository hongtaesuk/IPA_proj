<?php

$conn = mysqli_connect("localhost", "taeugi323", "123123", "IPA_proj");
if(!$conn) {
    echo "DB access fail!\n";
}

$id = $_POST['id'];
$start = $_POST['start'];
$end = $_POST['end'];

/// from here
$table_query = "show tables from IPA_proj";
$result = mysqli_query($conn, $table_query);
if(!$result) {
    echo "DB table access fail!\n";
    exit;
}

while($row = mysqli_fetch_array($result)) {
    echo $row[0];
}

/*
$insert_query = "insert into December(date, time, value) value (".$date.",".$time.",".$value.")";

if(!mysqli_query($conn, $insert_query)) {
    echo "Input error!";
    echo $insert_query;
}
else{
    echo "Successfully inserted!";
}
*/

mysqli_close($conn);

?>
