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
                <a href="users.php" class="text-sm w-full p-2 px-4 outline outline-1 outline-sky-500 bg-sky-400 text-white rounded-sm"><i class="fa-solid fa-user mr-2"></i>manage users</a>
                <a href="earn.php" class="text-sm w-full p-2 px-4 outline outline-1 outline-sky-500 text-blue-700 bg-white  hover:bg-sky-400 hover:text-white rounded-sm"><i class="fa-solid fa-money-bill mr-2"></i>earnings records</a>
                <a href="withdrawals.php" class="text-sm w-full p-2 px-4 outline outline-1 outline-sky-500 bg-white rounded-sm"><i class="fa-solid fa-money-bill mr-2"></i>withdrawal record</a>
            </div>
            </div>

            <div class="earnings w-[900px] p-4 bg-gradient-to-tr from-gray-800 to-blue-300 ">
                <div class="p-4">
                     <p class="text-[20px] py-2 text-center pl-4 text-blue-200">manage users</p>
                    <div class="flex flex-col items-center gap-2 pt-4">

<div class="relative overflow-x-auto rounded-sm">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-3">
                    id
                </th>
                <th scope="col" class="px-3 py-3">
                    name
                </th>
                <th scope="col" class="px-3 py-3">
                    email
                </th>
                <th scope="col" class="px-3 py-3">
                    registration time
                </th>
                <th scope="col" class="px-3 py-3">
                    balance
                </th>
                <th scope="col" class="px-3 py-3">
                    team size
                </th>
                <th scope="col" class="px-3 py-3">
                    actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $run = mysqli_query($db, $sql);
            if(mysqli_num_rows($run) > 0){
               while($row = mysqli_fetch_assoc($run)){
            ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $row['id']; ?>
                </th>
                <td class="px-3 py-4">
                    <?php 
                    $namee = $row['username'];
                    echo substr("$namee",0,8).".." ?>
                </td>
                <td class="px-3 py-4">
                    <?php echo $row['email']; ?>
                </td>
                <td class="px-3 py-4">
                    <?php echo $row['reg_date']; ?>
                </td>
                 <td class="px-3 py-4">
                    <?php echo $row['balance']; ?>
                </td>
                <td class="px-3 py-4">
                <?php echo $row['reffers']; ?>
                </td>
                <td class="px-3 py-4">
                    <a href="ban.php" class="text-sm rounded-md text-white p-2 px-3 bg-red-400 dark:text-blue-500 hover:bg-sky-700">block</a>
                </td>
            </tr>
            <?php   }
            } ?>
        </tbody>
    </table>
</div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
</html>