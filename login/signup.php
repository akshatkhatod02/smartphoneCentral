<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $full_name = $_POST['full_name'];
        $password = $_POST['password'];
        $password = sha1($password);
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        if(!empty($full_name) && !empty($password) && !is_numeric($full_name))
        {
            $queryCHECK = "SELECT * FROM users WHERE full_name = 'akshata'";
            $sql = mysqli_query($conn, $queryCHECK);
            if(!$sql){
                $message = "Something went wrong.";
                echo "<script>alert('$message');</script>";
                return;
            }
            else if(mysqli_num_rows($sql) >= 1){
                $message = "Username already taken, try another one.";
                echo "<script>alert('$message');</script>";
                return;
            }
            //save to database
            $query = "insert into users (full_name,email,password,gender,phone) values ('$full_name','$email','$password','$gender','$phone')";
            mysqli_query($conn, $query);

            header("Location: login.php");
            die;
        }
        else{
            $message = "Please enter valid info";
            echo "<script>alert('$message');</script>";
        }
    }
?>

<!DOCTYPE html>
<head><title>Signup</title></head>
<body>
    <h1>This is the signup page</h1>

    <form method="post">
        <div style="font-size:20px; margin:10px;">Signup</div>

        <input type="text" name="full_name" placeholder="User name" required/><br><br>
        <input type="text" name="email" placeholder="Email" required/><br><br>
        <input type="password" name="password" placeholder="Password" required/><br><br>
        <p>Gender</p>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">female</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">other</label><br><br>
        <input type="text" name="phone" placeholder="Phone" required/><br><br>

        <input id="button" type="submit" value="Signup"><br><br>

        <a href="login.php">Click to Login</a><br><br>
    </form>

</body>
</html>