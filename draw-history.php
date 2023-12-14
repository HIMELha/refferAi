<?php
include 'config.php';
session_start();

if ( !isset( $_SESSION['name'] ) ) {
    header( 'location: login.php' );
}
$name = $_SESSION['name'];

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container m-auto bg-white h-screen">
<?php include 'header.php';?>
        <section class="flex justify-between gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full  p-2 pl-4 pr-4 ">
            <div class="earnings w-full p-4 bg-gradient-to-tr from-green-500 to-blue-400 flex justify-center items-start">
                <div class="p-4">
                <h2 class="p-2 my-2 bg-white w-fit rounded-full">Withdrawal records</h2>
                 <div class=" h-fit bg-gray-100 p-4 bg-blend-overlay">
                <?php

                $sql = "SELECT * FROM withdrawals WHERE name = '$name'
                ORDER BY id DESC";
                $run = mysqli_query($db, $sql);
                if(mysqli_num_rows($run) > 0){
                   while($row = mysqli_fetch_assoc($run)){
                ?>
                 <div class="flex justify-between items-center w-full mt-2 p-2 px-3 bg-violet-500">
                        <div class="flex gap-4">
                            <h3 class="text-gray-100"><i class="fa-solid fa-money-check-dollar mr-1 text-green-400"></i><?php echo $row['amount'] ?> BDT </h3>
                            <h2 class="text-gray-200"><?php echo $row['method']?></h2>
                        </div>
                        <h2 class="text-green-200"><i class="fa-solid fa-clock mx-1"></i><?php echo $row['draw_date']?></h2>
                       
                          <?php
                        if($row['pay_condition'] == 'Processing'){
                            echo '<button class="text-orange-500 process bg-gray-100 px-2 ml-2 p-1"><i class="fa-solid fa-spinner mx-1 text-blue-400 "></i>Processing</button>'; 
                        }elseif($row['pay_condition'] == 'Paid'){
                            echo '<div class="flex">
                            <button class="text-green-700 process bg-gray-100 px-2 ml-2 p-1"><i class="fa-solid fa-circle-check mr-2 text-blue-500"></i>Paid</button>
                        </div>';
                        }elseif($row['pay_condition'] == 'Reject'){
                            echo '<div class="flex">
                            <button class="text-red-600 process bg-gray-100 px-2 ml-2 p-1"><i class="fa-solid fa-circle-exclamation mr-2"></i>Rejected</button>
                        </div>';
                        }
                        ?>
                      
                    </div>
                 <?php }
                 }else{
                    echo "<p class='text-center py-2 text-gray-600'>No records found</p>";
                 }
                 ?>

                 </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

















<!-- 
            <div class="flex justify-between w-full mt-2 p-2 px-3 bg-violet-500">
                        <div class="flex gap-4">
                            <h3 class="text-gray-100">200 BDT</h3>
                            <h2 class="text-pink-400">b<span class="text-gray-100">kash</span></h2>
                        </div>
                       <button class="text-green-400 process">Paid</button>
                 </div>

                   <div class="flex justify-between w-full mt-2 p-2 px-3 bg-violet-500">
                        <div class="flex gap-4">
                            <h3 class="text-gray-100">200 BDT</h3>
                            <h2 class="text-pink-400">b<span class="text-gray-100">kash</span></h2>
                        </div>
                       <button class="text-orange-400 process">Failed</button>
                 </div> -->