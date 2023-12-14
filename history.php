<?php

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

        <section class="flex  h-fit justify-between gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-[500px] p-2 pl-4 pr-4 ">
            <div class="earnings w-full p-4 bg-gradient-to-tr from-green-500 to-blue-400 flex justify-center items-start">
                <div class="p-4">        
                    <h2 class="p-2 my-2 bg-white w-fit ">Reffaral records</h2>
                     <ul class="p-2 gap-2">
                         <?php
include('config.php');

    $sql = "SELECT * FROM users WHERE username = '$name'";
            $run = mysqli_query($db, $sql);

 if ($row = mysqli_fetch_assoc($run)) {

    $id = $row['id'];
    
}

$sql1 = "SELECT * FROM users WHERE reffered_by = $id";
$run1 = mysqli_query( $db, $sql1 );

if ( mysqli_num_rows( $run1 ) > 0 ) {
    while ( $row1 = mysqli_fetch_assoc( $run1 ) ) {
        echo "<li class='my-2 text-white p-2  bg-purple-400'> {$row1['username']} joined on {$row1['reg_date']} </li>";
    }
}else{
    echo "<h2 class='text-center text-xl text-gray-200 mt-4'>No records found </h2>";
}
?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</body>
</html>