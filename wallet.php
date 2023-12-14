<?php
include('config.php');
session_start();

if (!isset( $_SESSION['name'] ) ) {
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
        <?php include('header.php'); ?>
        <section class="flex justify-between gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-[500px] p-2 pl-4 pr-4 ">
            <div class="earnings w-full h-fit p-4 bg-gradient-to-tr from-green-500 to-blue-400 flex justify-center items-start">
                <div class="p-4">
                <h2 class="p-2 my-2 bg-white w-fit rounded-full">Withdraw money</h2>
                <?php
                $sql = "SELECT * FROM users WHERE username = '$name'";
                $run = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($run);
                ?>
                   <form action="" method="post" class="max-w-[400px] sm:w-[400px] bg-gray-100 p-4 bg-blend-overlay">
                    <div class="p-2 bg-blue-200">
                      <h3 class="text-center">Your withdrawable balance</h3>
                      <button class="text-sm p-2 px-5 bg-cyan-600 text-white mt-2 spacing-2 block mx-auto" disabled><i class="fa-solid fa-money-check-dollar mr-1"></i> <?php echo $row['balance'];?> BDT</button>
                    </div>
                    <?php 
                    $money = $row['balance'];
                    if(isset($_POST['submit'])){
                        $uname = $name;
                        $amount = $_POST['amount'];
                        $method = $_POST['method'];
                        $address = $_POST['address'];
                        $date = date('H:i , d M, Y');

                        if($amount > $money){
                            echo "<p class='text-red-500 py-2 text-center'>Insufficient balance</p>";
                        }elseif($amount <= 99){
                            echo "<p class='text-red-500 py-2 text-center'>Min withdrawal 100 BDT</p>";
                        }else{

                        if($method == 'none'){
                            echo "<p class='text-red-500 py-2 text-center'>please select payment method</p>";
                        }else{

                        $sql2 = "INSERT INTO withdrawals (name, amount, method, address, draw_date)
                        VALUES('$uname', $amount, '$method', $address , '$date');";
                        $sql2 .= "UPDATE users SET balance = balance - $amount WHERE username = '$uname'";
                        $run2 = mysqli_multi_query($db, $sql2);
                        header('location:draw-history.php');
                        }
                        
                        }
                        
                    }
                    ?>
                   <p class="py-1 text-gray-700">enter amount </p>
                   <input type="number" name="amount" placeholder="MIN 100 BDT" class="p-1 outline-blue-400 border-2 border-gray-400 w-full rounded-sm" required>
                   <p class="py-1 text-gray-700">Select payment method</p>
                   <select name="method" class="shadow-md w-full outline-blue-400 p-1">
                     <option selected value="none">select</option>
                     <option value="bkash">bkash</option>
                     <option value="nagad">nagad</option>
                     <option value="binance">binance</option>
                   </select>
                   <p class="py-1 text-gray-700" required>payment address</p>
                   <input type="number" name="address" placeholder="017XXXXXXX" class="p-1 outline-blue-400 border-2 border-gray-400 w-full rounded-sm">
                    <button name="submit" class="text-sm w-full p-2 px-5 bg-purple-600 text-white mt-3 ">Withdraw</button> 
                   </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>