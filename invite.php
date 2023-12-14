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

        <section class="flex h-fit justify-between gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-[500px] p-2 pl-4 pr-4">
            <div class="earnings w-full p-4 bg-gradient-to-tr from-gray-500 to-blue-400 flex justify-center items-center">
                <div class="p-2 w-full">
                    <p class="text-[20px] text-gray-100 py-2">reffer more and earn more money</p>
                    <h1 class="text-white italic" >Share reffer link with your friends and win big prizes</h1>
                    <h2 class="p-2 my-2  bg-white ">http://localhost:8080/1project/refferal%20system/register.php?ref_id=<?php $sql = "SELECT * FROM users WHERE username = '$name'";
                    $run = mysqli_query($db, $sql);
                    $row = mysqli_fetch_assoc($run);
                    echo $row['id']; ?></h2>
                    <div class="p-4 w-fit bg-blue-500 text-white">
                       get upto 20tk for every valid refferal
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>