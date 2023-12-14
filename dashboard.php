<?php
include 'config.php';
session_start();

if(!isset( $_SESSION['name'])){
    header( 'location: login.php');
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


        <section class="flex justify-between gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-fit p-2 pl-4 pr-4 ">
            <div class="profile p-4 w-[400px] flex items-center flex-col">
            <div class="image">
              <img src="images/profile.jpeg" alt="" class="w-48 h-48 rounded-full">
              <h2 class="text-center text-lg font-bold p-2 text-gray-800"><?php 
              echo 
              $name ; ?></h2>
            </div>
            <?php
            $sql = "SELECT * FROM users WHERE username = '$name'";
            $run = mysqli_query($db, $sql);

            if($row = mysqli_fetch_assoc($run)){
             
            ?>
            <div class="content">
                <p class="text-center mt-4 border-b border-black">user info</p>
              <h3 class="mt-2 text-gray-600"><i class="fa-solid fa-envelope mr-2"></i><?php echo $row['email']; ?></h3>
              <h3 class="mt-2 text-gray-600"><i class="fa-solid fa-location-dot mr-2"></i>joined <?php echo $row['reg_date']; ?></h3>
              <h3 class="mt-2 text-gray-600"><i class="fa-solid fa-globe mr-2"></i><a href="">refferAI.com</a></h3>
            </div>

            <div class="content">
                <p class="text-center mt-4 border-b border-black">Earnings</p>
              <h3 class="mt-2 text-gray-600"><i class="fa-solid fa-user mr-2"></i>total refferals <?php echo $row['reffers']; ?></h3>
            <button class="text-sm p-2 px-4 bg-cyan-600 text-white mt-2 w-full spacing-2 " disabled>Balance: <?php echo $row['balance'] ?> BDT</button>
            </div>
            
            <div class="mt-5 flex justify-between gap-2">
                <a href="" class="text-sm p-2 px-4 bg-blue-500 text-white rounded-sm"><i class="fa-solid fa-star mr-2"></i></i>buy premium</a>
                <a href="wallet.php" class="text-sm p-2 px-4 bg-gray-500 text-white rounded-sm"">withdraw</a>
            </div>
            <a href="logout.php" class="mt-6 text-md underline hover:text-blue-500">Logout</a>
            </div>

            <div class="earnings w-[900px] p-4 bg-gradient-to-tr from-gray-600 to-blue-400 ">
               
                <div class=" p-4">
                     <p class="text-[20px] py-2 text-center pl-4 text-blue-200">refferal statics</p>
                    <h2 class="p-2  my-2 bg-white w-fit">You're reffarls and team size is <?php echo $row['reffers']; ?></h2>
                    <p class="text-md text-gray-200">latest records</p>
                    <ul class="p-2 gap-2">
        <?php
            $id = $row['id'];
            $sql1 = "SELECT * FROM users WHERE reffered_by = $id";
            $run1 = mysqli_query($db, $sql1);
        
        if(mysqli_num_rows($run1) > 0){
            while($row1 = mysqli_fetch_assoc($run1)){
                echo "<li class='my-2 text-white p-2  bg-purple-400'> <i class='fa-solid fa-user mr-2'></i>{$row1['username']} joined on {$row1['reg_date']} </li>";
            }
        }else{
    echo "<h2 class='text-center text-xl text-gray-200 mt-4'>No records found </h2>";
}
        ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php } ?>
    </div>
</body>
</html>