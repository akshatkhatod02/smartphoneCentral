<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once "./connection.php";

// if(isset($_GET['id'])){
    
    if(!isset($_SESSION['user_id'])){
        echo json_encode(array("success" => false, "is_logged_in" => false));
        return;
    }

    $product_id = $_GET['id'];
    $userid = $_SESSION['user_id'];

    $query1 = "SELECT * FROM users_favourites_devices WHERE user_id = $userid AND product_id = $product_id";
    $result1 = mysqli_query($conn, $query1);
    if(!$result1){
        echo json_encode(array("success" => false, "message" => "Something went wrong"));
        return;
    }

    
    // $interested_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(mysqli_num_rows($result1) >= 1){
        $query2 = "DELETE FROM users_favourites_devices WHERE user_id = $userid AND product_id = $product_id";
        $result2 = mysqli_query($conn, $query2);
        if(!$result2){
            echo json_encode(array("success" => false, "message" => "Something went wrong"));
            return;
        }
        else{
            echo json_encode(array("success" => true,  "favourite" => false, "data_id" => $product_id));
            return;
        }
        
    }
    else{
        $query3 = "INSERT INTO users_favourites_devices (user_id, product_id) VALUES ($userid, $product_id)";
        $result3 = mysqli_query($conn, $query3);
        if(!$result3){
            echo json_encode(array("success" => false, "message" => "Something went wrong"));
            return;
        }
        else{
            echo json_encode(array("success" => true,  "favourite" => true, "data_id" => $product_id));
            return;
        }
    }

// }