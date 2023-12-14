<?php
include 'config.php';
session_start();
if ( !isset( $_SESSION['admin'] ) ) {
    header( 'location: login.php' );
}
$name = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>refferAI affliliate program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container m-auto bg-white h-screen">
        <?php include 'header.php';?>
        <section class="flex justify-between gap-4 bg-gradient-to-tr from-red-100 to-cyan-200  w-full max-h-fit min-h-full p-2 pl-4 pr-4 ">
            <div class="profile p-4 w-[300px] flex items-center flex-col">
            <div class="mt-5 flex flex-col justify-between gap-2">
                <a href="index.php" class="text-sm w-full p-2 px-4 bg-white outline outline-1 outline-sky-500 text-blue-700  hover:bg-sky-400 hover:text-white rounded-sm"><i class="fa-solid fa-star mr-2"></i></i>premium users</a>
                <a href="users.php" class="text-sm w-full p-2 px-4 outline outline-1 outline-sky-500 text-blue-700 bg-white  hover:bg-sky-400 hover:text-white rounded-sm"><i class="fa-solid fa-user mr-2"></i>manage users</a>
                <a href="earn.php" class="text-sm w-full p-2 px-4 outline outline-1 outline-sky-500 text-blue-700 bg-white  hover:bg-sky-400 hover:text-white rounded-sm"><i class="fa-solid fa-money-bill mr-2"></i>earnings records</a>
                <a href="withdrawals.php" class="text-sm w-full p-2 px-4 outline outline-1 outline-sky-500 bg-sky-400 hover:text-white rounded-sm"><i class="fa-solid fa-money-bill mr-2"></i>withdrawal record</a>
            </div>
            </div>

            <div class="earnings w-[900px] p-4 bg-gradient-to-tr from-gray-600 to-blue-400 ">
                <div class=" p-4">
                     <p class="text-[20px] py-2 text-center pl-4 text-white bg-pink-400">withdrawals requests</p>
                    <div class="flex flex-col items-center">
                        <?php
$sql = "SELECT * FROM withdrawals WHERE pay_condition = 'Processing'";
$run = mysqli_query( $db, $sql );
$row = mysqli_num_rows( $run );
?>
                         <div class="tab flex w-full justify-center bg-white border-1 border-blue-500 p-2 ">
                            <div class="all pt-2">
                                <a href="withdrawals.php" class="tabs border-2 border-blue-400 p-2 px-5 hover:bg-sky-500 text-gray-600 hover:text-white">ALL</a>
                            </div>
                            <div class="pending pt-2">
                                <a href="process.php" class="tabs border-2 border-blue-400 p-2 px-5 hover:bg-sky-500 text-gray-600 hover:text-white">Processing<span class="text-white ml-1 text-center p-1 px-2 bg-red-600 rounded-full"> <?php echo $row?></span></a>
                            </div>
                            <div  class="paid pt-2">
                                 <a href="paid.php" class="tabs border-2 border-green-600 p-2 px-5 hover:bg-green-600 text-gray-700 hover:text-white">paid</a>
                            </div>
                            <div class="rejected pt-2">
                                 <a href="reject.php" class="tabs border-2 border-red-600 p-2 px-5 bg-red-600 text-gray-700 hover:text-white">rejected</a>
                            </div>
                         </div>

                <div class="tab-contents records w-full p-2 bg-white">
                    <?php
$sql1 = "SELECT * FROM withdrawals WHERE pay_condition = 'Reject' ORDER BY draw_date DESC ";
$run1 = mysqli_query( $db, $sql1 );
if ( mysqli_num_rows( $run1 ) > 0 ) {
    while ( $row1 = mysqli_fetch_assoc( $run1 ) ) {
        ?>
                    <div class="flex justify-between items-center w-full mt-2 p-2 px-3 bg-violet-500 text-sm">
                        <div class="flex gap-2 items-center">
                            <h3 class="text-gray-100"><i class="fa-solid fa-money-check-dollar mr-1 text-green-400"></i><?php echo $row1['amount'];?></h3>
                            <h2 class="text-gray-200"><?php echo $row1['name']; ?></h2>
                            <div class="flex gap-2 bg-white p-1 text-gray-800">
                            <h2 class="text-orange-600"><?php echo $row1['method']; ?></h2>
                            <h3 class=""><?php echo $row1['address']; ?></h3>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <h2 class="text-green-200"><i class="fa-solid fa-clock mx-1 "></i><?php echo $row1['draw_date']; ?></h2>

                           <?php if ( $row1['pay_condition'] == 'Processing' ) {
            $process = $row1["pay_condition"];
            echo '<button class="text-orange-500 process bg-gray-100 px-2 ml-2 p-1"><i class="fa-solid fa-spinner mx-1 text-blue-400 tra"></i>' . $process . '</button>';
        } else {
            echo '';
        }
        ?>
                        </div>
                        <?php
if ( $row1['pay_condition'] == 'Processing' ) {
            echo '<div class="flex">
                            <a href="" class="text-green-700 process bg-gray-100 px-2 ml-2 p-1">Pay success</a>
                            <a href="" class="text-red-500 process bg-gray-100 px-2 ml-2 p-1">Reject</a>
                        </div>';
        } elseif ( $row1['pay_condition'] == 'Paid' ) {
            echo '<div class="flex">
                            <button class="text-green-700 process bg-gray-100 px-2 ml-2 p-1"><i class="fa-solid fa-circle-check mr-2 text-blue-500"></i>Paid</button>
                        </div>';
        } elseif ( $row1['pay_condition'] == 'Reject' ) {
            echo '<div class="flex">
                            <button class="text-red-600 process bg-gray-100 px-2 ml-2 p-1"><i class="fa-solid fa-circle-exclamation mr-2"></i>Rejected</button>
                        </div>';
        }
        ?>
                    </div>
                    <?php }}?>

                </div>
                    </div>
                </div>
            </div>
        </section>
        <?php ?>
    </div>
    <script src="script.js"></script>
</body>
</html>