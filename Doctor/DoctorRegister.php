<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Register</title>
    <link rel="stylesheet" type="text/css" href="../Assets/Register.css" />
</head>

<body>
    <div class="header_inc">
        <h1> Welcome To Register Portal </h1>
    </div>
    <form action="./DoctorRegister.php" method="POST" enctype="multipart/form-data">
        <div class="personal_div">
            <h2>Personal Info:</h2>
            <div class="doctor_name">
                <label>Name: </label>
                <input type="text" name="docname" required>
            </div>
            <div class="doctor_address">
                <label>Address: </label>
                <input type="text" name="docaddress" required>
            </div>
            <br>
            <div class="doctor_gender">
                <label>Gender: </label>
                <br>
                <input type="radio" id="Male" name="gender" value="Male">
                <label for="Male">Male</label><br>
                <input type="radio" id="Female" name="gender" value="Female">
                <label for="Female">Female</label><br>
                <input type="radio" id="Other" name="gender" value="Other">
                <label for="Other">Other</label>
            </div>
            <br>
            <div class="doctor_mobile">
                <label>Mobile No: </label>
                <input type="number" name="docnumber" required>
            </div>
        </div>
        <hr>
        <div class="aunthentication_div">
            <h2>Authentication Info:</h2>
            <div class="doctor_email">
                <label>Email: </label>
                <input type="email" name="docemail" required>
            </div>

            <div class="doctor_password">
                <label>Password: </label>
                <input type="password" name="docpassword" id="password" required>
            </div>

            <div class="doctor_confpassword">
                <label> Confirm Password: </label>
                <input type="password" name="docconfirmpassword" id="confirm_password" onkeyup="ajax()">
                <span style="color:red;" id='message'></span>
                <script>
                    function ajax() {
                        var pass = document.getElementById('password');
                        var confpass = document.getElementById('confirm_password');
                        var message = document.getElementById('message');
                        console.log('Password Value: ' + pass.value);
                        console.log('Confirm Password Value: ' + confpass.value);
                        message.innerHTML = '';
                        if (pass.value != confpass.value) {
                            message.innerHTML = 'Password is not matched.';
                            console.log('call');
                        }
                    }
                </script>
            </div>
            <div class="doctor_department">
                <label>Department: </label>
                <select id="department" name="department">
                    <option value="Surgery">Surgery</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Cardiologist">Cardiologists</option>
                    <option value="Nephrologist">Nephrologists</option>
                    <option value="Orthopedic">Orthopedic</option>
                    <option value="Gynecologist">Gynecologist</option>
                </select>
            </div>
            <br>
            <div class="doctor_location1">
                <label>Location: </label>
                <textarea id="location1" name="location1" placeholder="Location" rows="1" cols="50"> </textarea>
            </div>
        </div>
        <hr>
        <div class="additional_div">
            <h2>Additional Info:</h2>
            <div class="container">
                <div class="row">
                    <input type="file" name="uploadfile" value="" />
                </div>

            </div>
        </div>
        <input type="submit" name="submit" class="registerbtn" value="Register" />
        <br>
        <br>
        <a href="./DoctorFacade.php" class="back_login_Portal">Back To Doctor Login Portal</a>

    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'cs431');
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "doctor/" . $filename;
    echo $folder;
    move_uploaded_file($tempname, $folder);
    $docName =  $_POST['docname'];
    $docAddress = $_POST['docaddress'];
    if ($_POST['gender'] == 'Male') {
        $docGender = 'Male';
    } else if ($_POST['gender'] == 'Female') {
        $docGender = 'Male';
    } else {
        $docGender = 'Other';
    }
    $docMobile = $_POST['docnumber'];
    $docEmail = $_POST['docemail'];
    $docPassword = $_POST['docpassword'];
    $docPasswordConfirm = $_POST['docconfirmpassword'];
    if ($docPassword != $docPasswordConfirm) {
        //Logic of not same password
        echo "Password Not Matched";
    }
    $docdepartment = $_POST['department'];
    $doclocation1 = $_POST['location1'];


    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
    }

    $sql = "INSERT INTO doctorrequest_table(Name, Address, Gender, MobileNo, Email, Password, Department, Location, FileName ) VALUES ('$docName','$docAddress','$docGender','$docMobile','$docEmail', '$docPassword','$docdepartment','$doclocation1','$folder')";
    if ($connection->query($sql)) {
        echo "Registration Completed!";
    } else {
        echo "Please Try Again";
    }
}

?>