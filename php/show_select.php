<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<?php
/*
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

//////// GET parameter as array
//$arr = array_values($_GET);
//echo $arr[0].' '.$arr[1];
 */
include("table_search.php");
while($row = mysqli_fetch_array($result)) {
    echo '<form method="GET" action="../show.html">';
    echo '<button class="blueBtn" type="submit" name=playlist value='.$row[0].'>'.$row[0].'</button>';
    echo '</form>';
    //echo $row[0];
    
    //echo $row[0];
}

mysqli_close($conn);

?>
</html>
