<?php
include '../config.php';

session_start();

if ( isset( $_SESSION['admin'] ) ) {
    header( 'location: index.php' );
} else {
}
if (isset($_POST['submit'] ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE name = '$username' AND password = '$password'";
    $run = mysqli_query( $db, $sql );
    if ( mysqli_num_rows( $run ) > 0 ) {
        $_SESSION['admin'] = $username;
        header( 'location: index.php' );
    } else {
        echo "<p class='error-box'>invalid username or password</p>";
    }
}

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
    <div class="container m-auto bg-white">
        <section class="flex justify-center  gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-screen p-2 px-4">
            <div class="flex flex-col items-center justify-center">
                 <form action="<?php $_SERVER['PHP_SELF']?>" class="p-5 bg-sky-300  rounded-sm" method="post">
                    <h2 class="p-2 text-gray-800 text-xl text-center border-b-2 border-indigo-600">ADMIN Login</h2>
                    <p class="text-sm py-2 text-gray-600">username</p>
                    <input type="text" name="username" placeholder="user name" class="outline-blue-500 text-md w-full pl-2 p-1" required>
                    <p class="text-sm py-2 text-gray-600">password</p>
                    <input type="password" name="password" placeholder="enter password" class="outline-blue-500 text-md w-full pl-2 p-1">
                    <button type="submit" name="submit" class="p-2 bg-purple-500 w-full text-sm mt-4 text-white hover:bg-purple-600">submit</button>
                 </form>
            </div>
        </section>
    </div>
</body>
</html>