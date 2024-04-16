<?php

 include 'dbconnect.php'; 
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        echo "<script>";
        echo "sessionStorage.setItem('bool', 'true');";
        echo "window.location.href = 'dash.php';";
        echo "</script>";
    } else {
        $message[] = 'incorrect email or password!';
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</html>
<link rel="stylesheet" href="css/adminlogin.css" type="text/css" media="all" />
<title>samarth</title>
</head>

<body>

    <div class="container">
        <div class="drop">
            <div class="content">
                <h2>Sign in</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="inputBox">
                        <input type="email" name="email" placeholder="email" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <div class="btns">Welcome admin</div>
        <div class="btns signup">Login here</div>
    </div>
</body>

</html>