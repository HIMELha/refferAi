<?php
session_start();

if (isset( $_SESSION['name'])){
    header( 'location: dashboard.php' );
}


include 'config.php';

if (isset( $_REQUEST['ref_id'])){
    $id = $_REQUEST['ref_id'];
   $ref = "SELECT * FROM users WHERE id = $id";
   $ruf = mysqli_query( $db, $ref );
    if(mysqli_num_rows( $ruf ) > 0 ) {
        $row = mysqli_fetch_assoc($ruf);
        $ref_name = $row['username'];
    }else{
        echo "<p class='error-box'>invalid refferal code</p>";
    }
} else {
    $id = 1;
    $ref = "SELECT * FROM users WHERE id = $id";
    $ruf = mysqli_query($db, $ref);
    if (mysqli_num_rows($ruf) > 0) {
        $row = mysqli_fetch_assoc($ruf);
        $ref_name = $row['username'];
    }
}

if (isset( $_POST['submit']) ) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $rid       = $id;
    $date      = date( 'd M Y , h:i:s  ' );
    $balance   = 10000;

    if ( $password !== $cpassword ) {
        echo "<p class='error-box'>password doesn't match</p>";
    } else {

        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email' ";
        $run = mysqli_query( $db, $sql );
        if ( mysqli_num_rows( $run ) > 0 ) {
            echo "<P class='error-box'>username or email already exist</p>";
        } else {

    $sql2 = "INSERT INTO users ( username, email, password , reg_date, balance , reffered_by)
    VALUES ('$username', '$email','$password','$date',$balance, $rid );";
          
    $sql2 .= "UPDATE users SET balance = balance +  10 , reffers =  reffers + 1 
    WHERE id = $id";
            mysqli_multi_query( $db, $sql2);
            echo "<p class='success-box'>registration success , please login </p>";
        }
    }
}?>
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
    <div class="container m-auto bg-white">
        <section class="flex justify-center gap-4 bg-gradient-to-tr from-red-100 to-cyan-200 w-full h-screen p-2 pl-4 pr-4 ">
            <div class="flex flex-col items-center justify-center">
                 <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="p-5 bg-yellow-200 rounded-sm">
                    <h2 class="p-2 text-gray-800 text-center text-xl border-b-2 border-indigo-600">Regsiter and win</h2>

                    <p class="text-sm py-2 text-gray-600">username</p>
                    <input type="text" name="username" placeholder="your name" class="outline-blue-500 text-md w-full pl-2 p-1" required>
                    <p class="text-sm py-2 text-gray-600">email</p>
                    <input type="email" name="email" placeholder="your email" class="outline-blue-500 text-md w-full pl-2 p-1" required>
                    <p class="text-sm py-2 text-gray-600">password</p>
                    <input type="password" name="password" placeholder="enter password" class="outline-blue-500 text-md w-full pl-2 p-1" required>
                    <p class="text-sm py-2 text-gray-600">confirm password</p>
                    <input type="password" name="cpassword" placeholder="enter password" class="outline-blue-500 text-md w-full pl-2 p-1" required>
                    <p class="text-sm py-2 text-gray-600">reffer id</p>
                    <input type="text" name="ref_id" value="<?php echo $id; ?>" placeholder="none" class="outline-blue-500 text-md w-full pl-2 p-1" disabled>
                    <button type="submit" name="submit" class="p-2 bg-purple-500 w-full text-sm mt-4 text-white hover:bg-purple-600">submit</button>
                    <p class="mt-2 text-center">Already have an account? <a href="login.php" class="text-blue-600">login</a></p>
                 </form>
            </div>
        </section>
    </div>
</body>
</html>