<!DOCTYPE html>
<?php
include('config.php');

session_start();

if(isset($_SESSION['name'])){
    header('location: dashboard.php');
}

if ( isset( $_POST['submit'] ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $run = mysqli_query( $db, $sql );
    if ( mysqli_num_rows( $run ) > 0 ) {
        $_SESSION['name'] = $username;
        header( 'location: dashboard.php' );
    } else {
        echo "<p class='error-box'>invalid username or password</p>";
    }
}


?>
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
        <header class="flex justify-between items-center p-2 pl-4 pr-4 bg-blue-400">
            <div class="logo">
                <a href="index.php" class="text-md text-white p-2"><i class="fa-solid fa-chart-simple mr-2 text-gray-200"></i>Reffer<span class="text-green-400 font-bold">AI</span></a>
            </div>
            <div class="flex gap-2 items-center md-flex-row transition">
                <a href="index.php" class="text-white p-2 text-md  bg-transparent rounded-sm hover:bg-purple-600">Home</a>
                <a href="about.php" class="text-white p-2  text-md bg-transparent rounded-sm hover:bg-purple-600">About</a>
                <a href="goal.php" class="text-white p-2 text-md bg-transparent rounded-sm hover:bg-purple-600">Our goal</a>
                <div class="bg-orange-500 p-2 flex gap-2">
                    <a href="login.php" class="text-white text-md hover:text-gray-100">Login</a>
                    <p class="text-green-500 text-md"> or </p>
                    <a href="register.php" class="text-white text-md hover:text-gray-100">create an account</a>
                </div>
            </div>
        </header>

        <section class="flex justify-between lg:flex-row sm:flex-col-reverse sm:justify-center gap-8 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-full p-2 pl-4 pr-4 ">
            <div class="flex flex-col items-center justify-center">
              <h2 class="text-2xl"> <a href="" class="text-md text-gray-600 p-2">Reffer<span class="text-green-700 font-bold">AI</span></a> for earning money</h2>
              <p class="text-md pb-2 ml-2">get upto 20$ for every valid refferals</p>
              <a href="login.php" class="text-md m-3 p-2 px-4 bg-green-600 text-white rounded-sm hover:bg-blue-500 ">Get Started</a>
            </div>
           
            <div class="flex flex-col items-center justify-center">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" class="p-5 bg-yellow-200 rounded-sm" method="post">
                    <h2 class="p-2 text-gray-800 text-xl text-center border-b-2 border-indigo-600">Login</h2>
                    <p>Demo user: user@mail.com</p>
                    <p>Demo pass: 123456</p>
                    <p class="text-sm py-2 text-gray-600">username</p>
                    <input type="text" name="username" placeholder="user name" class="outline-blue-500 text-md w-full pl-2 p-1" required>
                    <p class="text-sm py-2 text-gray-600">password</p>
                    <input type="password" name="password" placeholder="enter password" class="outline-blue-500 text-md w-full pl-2 p-1">
                    <button type="submit" name="submit" class="p-2 bg-purple-500 w-full text-sm mt-4 text-white hover:bg-purple-600">submit</button>
                    <p class="mt-2 text-center">Don't have an account? <a href="register.php" class="text-blue-600">Register</a></p>
                </form>
            </div>
        </section>
    </div>
</body>
</html>