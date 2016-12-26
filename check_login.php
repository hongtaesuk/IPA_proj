<?php
$id = $_GET['user_id'];
$pw = $_GET['user_pw'];

if ( !strcmp($id, "jhnang") && !strcmp($pw, "1234") ) {
    header("Location: select.html");
    exit;
}
else {
    echo "<p>안 돼. 들어줄 수 없어. 돌아가</p>";
}
?>
