<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style-for-login.css">
</head>

<body>
    <?php include ('dbconnect.php'); ?>
    <div class="main">
        <?php

        $displayLoginForm = true;
        if (isset($_POST['signup'])) {
            // Handle signup form submission
            $displayLoginForm = false;
            // include 'signup.php';
        } elseif (isset($_POST['login'])) {
            // Handle login form submission
            $displayLoginForm = true;
            // include 'login.php';
        }

        $checkboxState = $displayLoginForm ? 'checked="true"' : '';
        ?>

        <input type="checkbox" id="chk" aria-hidden="true" <?php echo $checkboxState; ?>>

        <div class="signup">
            <form action="" method="post" onsubmit="return validateSignupForm()">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="email" id="signup-email" name="email" placeholder="Email" required="">
                <span id="signup-email-error" class="error">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['signup'])) {
                            $user = $_POST['email'];
                            $password = $_POST['pswd'];
                            $encpassword = md5($password);

                            $check_query = "SELECT * FROM user WHERE email = '$user'";
                            $check_result = mysqli_query($conn, $check_query);

                            if (mysqli_num_rows($check_result) > 0) {
                                echo "Email already exists. Please choose a different Email.";
                            } else {
                                // Insert new user if username doesn't exist
                                $insert_query = "INSERT INTO user (email, password) VALUES ('$user', '$encpassword')";
                                $insert_result = mysqli_query($conn, $insert_query);

                                if ($insert_result) {
                                    echo "<script>";
                                    echo "sessionStorage.setItem('email', '$user');";
                                    echo "sessionStorage.setItem('bool', 'true');";
                                    echo "window.location.href = 'flightchoose.php';";
                                    echo "</script>";
                                    exit;
                                } else {
                                    echo "The record was not inserted successfully because of this error: " . mysqli_error($conn);
                                }
                            }
                        }
                    }
                    ?>
                </span>
                <input type="password" id="signup-password" name="pswd" placeholder="Enter Password" required="">
                <span id="signup-password-error" class="error"></span>
                <input type="password" id="signup-confirm-password" name="confirm-pswd"
                    placeholder="Enter Confirm Password" required="">
                <span id="signup-confirm-password-error" class="error"></span>
                <button type="submit" name="signup">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form action="" method="post" onsubmit="return validateLoginForm()">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" id="login-email" name="email" placeholder="Email" required="">
                <span id="login-email-error" class="error">
                </span>
                <input type="password" id="login-password" name="pswd" placeholder="Password" required="">
                <span id="login-password-error" class="error">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['login'])) {
                            $user = $_POST['email'];
                            $password = $_POST['pswd'];
                            $encpassword = md5($password);

                            $sql = "SELECT * FROM user WHERE email='$user' and password='$encpassword';";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            if ($num > 0) {
                                echo "<script>";
                                echo "sessionStorage.setItem('email', '$user');";
                                echo "sessionStorage.setItem('bool', 'true');";
                                echo "window.location.href = 'flightchoose.php';";
                                echo "</script>";
                                exit;
                            } else {
                                echo "<b>Login UnSuccessful</b>";
                            }
                        }
                    }
                    ?>
                </span>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

    <script>
        function validateEmail(email) {
            // Regular expression for basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validateSignupForm() {
            const email = document.getElementById('signup-email').value;
            const password = document.getElementById('signup-password').value;
            const confirmPassword = document.getElementById('signup-confirm-password').value;

            let isValid = true;

            // Clear previous errors
            document.getElementById('signup-email-error').textContent = '';
            document.getElementById('signup-password-error').textContent = '';
            document.getElementById('signup-confirm-password-error').textContent = '';

            // Validate email
            if (!validateEmail(email)) {
                document.getElementById('signup-email-error').textContent = 'Invalid email format';
                isValid = false;
            }

            // Validate password length
            if (password.length < 8) {
                document.getElementById('signup-password-error').textContent = 'Password must be at least 8 characters long';
                isValid = false;
            }

            // Validate password match
            if (password !== confirmPassword) {
                document.getElementById('signup-confirm-password-error').textContent = 'Passwords do not match';
                isValid = false;
            }

            return isValid;
        }

        function validateLoginForm() {
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;

            let isValid = true;

            // Clear previous errors
            document.getElementById('login-email-error').textContent = '';

            // Validate email
            if (!validateEmail(email)) {
                document.getElementById('login-email-error').textContent = 'Invalid email format';
                isValid = false;
            }

            return isValid;
        }
    </script>

</body>

</html>