<?php

$conn = mysqli_connect("localhost", "taeugi323", "123123", "IPA_proj");
if(!$conn) {
    echo "DB access fail!\n";
}

$id = $_GET['video_id'];
$start = $_GET['start'];
$end = $_GET['end'];
$playlist = $_GET['playlist'];

/*  This code will be used at showing videos
$start_min = explode(":",$start)[0];
$start_sec = explode(":",$start)[1];

$end_min = explode(":",$end)[0];
$end_sec = explode(":",$end)[1];

$start_time = intval($start_min)*60 + intval($start_sec);
$end_time = intval($end_min)*60 + intval($end_sec);
 */

//echo $start_time."  ".$end_time;
/*echo $id;
echo $start;
echo $end;
 */

$insert_query = 'insert into '.$playlist.' (id, start_time, end_time) value ("'.$id.'","'.$start.'","'.$end.'")';

//echo $insert_query;

if(!mysqli_query($conn, $insert_query)) {
    echo "Input error!\n";
    echo $insert_query;
}
else {
    echo '<body><script>alert("Insert Success!"); </script></body>';
}

mysqli_close($conn);

header("Location: ../search.html");
exit;

?>
