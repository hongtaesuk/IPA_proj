<html>
<body>

<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  /* ---------------------------------------------------*/
  /* ----------------GET INPUT FROM html----------------*/
  /* ---------------------------------------------------*/

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startTime = test_input($_POST["startTime"]);
    $endTime = test_input($_POST["endTime"]);
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<?php

  /* ------------------------------------------------*/
  /* ----------------connect to MySql----------------*/
  /* ------------------------------------------------*/
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  //echo ("MySQL - PHP Connect Test </br>");
  $hostname = "localhost";
  $username = "taeugi323";
  $password = "123123";
  $dbname = "IPA_proj";

  $connect = mysqli_connect($hostname, $username, $password) 
    or die("DB Connection Failed");
  $result = mysqli_select_db($connect,$dbname);
 
  if($result) {
    echo("MySQL Server Connect Success! </br>");
  }
  else {
    echo("MySQL Server Connect Failed! </br>");
  }


  /* -------------------------------------------------*/
  /* ----------------SEARCH FROM TABLE----------------*/
  /* -------------------------------------------------*/

  //// concatenating search string in $sql ////
  $sql = "SELECT * FROM OrderLists WHERE TRUE";
  // Order_Date Part
  if ( $startdate != null || $enddate != null || $starttime != null || $endtime != null ){
    if ( $startdate == null )
      $startdate = date('Y-m-d');
    if ( $enddate == null )
      $enddate = '9999-12-31';
    if ( $starttime == null ) 
      $starttime = '00:00:00';
    if ( $endtime == null ) 
      $endtime = '24:00:00';
    
    $sql .= " && Order_Date >= " . 
         "'$startdate $starttime'" . " && Order_Date <= " ."'$enddate $endtime' ";
  } 
  
  // studentID & Name & email & Phone# & CallFisrt && Payment Part
  if ( $idnumber != null )
    $sql .= "&& ID_Number = '$idnumber' ";
  if ( $name != null )
    $sql .= "&& Name = '$name' ";
  if ( $email != null )
    $sql .= "&& Email = '$email' ";
  if ( $phone != null )
    $sql .= "&& Phone_Num = '$phone' ";
  if ( $callfirst != 'false' ) 
    $sql .= "&& Call_First = '$callfirst' ";
  if ( $paymethod != 'false' )
    $sql .= "&& Payment = '$paymethod' ";
  
  // topping
  $top_concat = "";
  if ( isset($_POST['topping']) ){
    foreach($_POST['topping'] as $check){
      $top_concat .= $check . ";"; 
    }
    $sql .= "&& Topping = '$top_concat' ";
  }

  $sql .= ";";
  $result = mysqli_query($connect, $sql);


  /* -------------------------------------------*/
  /* ----------------PRINT TABLE----------------*/
  /* -------------------------------------------*/
  echo "<table border=\"1\">";
    echo "<tr>";
      echo "<th>Order Number</th>";
      echo "<th>ID_Number</th>";
      echo "<th>Name</th>";
      echo "<th>Email</th>";
      echo "<th>Phone_Num </th>";
      echo "<th>Topping</th>";
      echo "<th>Payment</th>";
      echo "<th>Call_First</th>";
      echo "<th>Order_Date</th>";
    echo "</tr>";
  if ( $result->num_rows > 0 ){
    while( $row = $result->fetch_assoc() ){
      echo "<tr>";
        echo "<td>" . $row['Order_Num'] . "</td>";
        echo "<td>" . $row['ID_Number'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Phone_Num'] . "</td>";
        echo "<td>" . $row['Topping'] . "</td>";
        echo "<td>" . $row['Payment'] . "</td>";
        echo "<td>" . $row['Call_First'] . "</td>";
        echo "<td>" . $row['Order_Date'] . "</td>";
      echo "</tr>";
    }
  } 
  echo "</table>";
?>  

</body>
</html>
