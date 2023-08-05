

<!DOCTYPE html>
<head><title>Login Page</title></head>
<body>
    <h1>This is the login page</h1>

    <form method="post">
        <div style="font-size:20px; margin:10px;">Login</div>
        <input type="text" name="full_name" placeholder="User name" required/><br><br>
        <input type="password" name="password" placeholder="Password" required/><br><br>

        <input type="submit" value="Login"><br><br>

        <a href="signup.php">Click to Signup</a><br><br>
    </form>

</body>
</html>


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

        //read from database
    $query = "SELECT * FROM users WHERE full_name = '$full_name' limit 1";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $response = array("success" => false, "message" => "Something went wrong!");
        echo json_encode($response);
        return;
    }
    
    $row_count = mysqli_num_rows($result);
    if ($row_count == 0) {
        $response = array("success" => false, "message" => "Login failed! Invalid email or password.");
        echo json_encode($response);
        return;
    }
    
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['full_name'] = $row['full_name'];
    $_SESSION['email'] = $row['email'];
    
    $response = array("success" => true, "message" => "Login successful!");
    if($response["success"] && $row['full_name'] == "akshata"){
        header("Location: ../SmartphoneBackend.php");
    }
    else {
        header("Location: ../index.php");
    }
    echo json_encode($response);
    mysqli_close($conn);
    
}
?>
