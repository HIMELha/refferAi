<?php
$id = $_REQUEST['id'];
include 'config.php';
$sql = "SELECT * FROM withdrawals  
LEFT JOIN users ON withdrawals.name = users.username
WHERE id = $id";
$run = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($run);

$amount = $row['amount'];
$uname = $row['username'];

$sql1 = "UPDATE withdrawals SET pay_condition = 'Reject' WHERE id = $id;";
$sql1 .= "UPDATE users SET balance = balance + $amount  WHERE username = '$uname'";
mysqli_multi_query($db, $sql1);
header( 'location: reject.php' );
?>