<!DOCTYPE html>
<html>

<?php
include '../config.php';
session_start();
?>

<head>
    <title>Provider Register</title>
    <link rel="stylesheet" type="text/css" href="../Assets/Register.css" />
</head>

<body>
    <form action="ProviderRegister.php" method='POST'>
        <div class="header_inc">
            <h2>Registration Form</h2>
        </div>
        <div class="personal_div">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <div class="location">
                <label>Location : </label>
                <textarea id="location" placeholder="Location" name="location" rows="1" cols="50" required> </textarea>
            </div>
            <label for="psw"><b>Password</b></label>
            <input type="password:" placeholder="Enter Password" name="password" id="password" required>
            <br>
            <label for="confirmpassword"><b>Repeat Password</b></label>
            <input type="password" placeholder="confirmpassword" name="confirmpassword" id="confirmpassword" required>
            <hr>
            <input type="submit" class="registerbtn" name="submit_provider" value="Submit">
            <hr>
            <a href="../Login_Info.php" class="back_login_Submit">Back To Login Info Page</a>
            <?php
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $cpassword = $_POST['confirmpassword'];
                if ($password != $cpassword) {
                    $msg = "passwords doesn't match";
                }
            }
            ?>
        </div>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit_provider'])) {

    $providerName = $_POST['name'];
    $providerEmail = $_POST['email'];
    $providerPassword = $_POST['password'];
    $Location = $_POST['location'];

    $connection = mysqli_connect('127.0.0.1', 'root', '', 'cs431');
    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO provider_table(NAME,EMAIL,Location,Password) VALUES ('" . $providerName . "','" . $providerEmail . "', '" . $Location . "','" . $providerPassword . "')";
    if ($connection->query($sql) === TRUE) {
        echo "Registration Completed!";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connection->error;
    }
}
?>