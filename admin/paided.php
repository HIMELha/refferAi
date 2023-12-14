<?php
$id = $_REQUEST['id'];
include('config.php');
$sql = "UPDATE withdrawals SET pay_condition = 'Paid' WHERE id = $id";
$run = mysqli_query($db, $sql);
header('location: paid.php');
?>