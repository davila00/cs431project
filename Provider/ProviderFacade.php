<?php
require_once('../db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/Facade.css" media="screen" />
    <title>Provider Facade</title>
    <script>
        function validate() {
            var inputs = document.getElementsByTagName('input');
            var mail = inputs['uemail'];
            var password = inputs['upassword'];
            if (name === "" && password === "") {
                alert('Please Enter Your Name And Password');
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="login-box">
        <div class="container">
            <form action="?" method="POST" onsubmit="validate()">
                <h2 style="color:#85929E">HELLO PROVIDER</h2>
                <div class="user-box1">
                    <input type="email" name="uemail" placeholder="Type Email" style="font-size:16pt;">
                    <br>
                    <br>
                    <input type="password" name="upassword" placeholder="Type Password" style="font-size:16pt;">
                </div>
                <div class="container_2">
                    <input type="submit" name="submit" value="LOGIN">
                    <hr>
                    <a href="../Login_Info.php" class="back_login_Submit">Back</a>
                    <a href="./ProviderRegister.php" class="patient_register">Register as Provider</a>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                    $ad_email = $_POST['uemail'];
                    $ad_password = $_POST['upassword'];


                    $con = dbConnection();
                    $sql = "select * from provider_table where Email='{$ad_email}' and Password='{$ad_password}'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $_SESSION['Name'] = $row['Name'];
                        $_SESSION['Email'] = $row['Email'];
                        $_SESSION['Password'] = $row['Password'];
                        header('Location: ./ProviderHomepage.php');
                    } else {
                        echo "Please Enter Correct Password and Email.";
                    }
                }
                ?>
                <!-- Need To implement forget password section  -->


            </form>
        </div>
    </div>
</body>

</html>