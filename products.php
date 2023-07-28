<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "smartphone_website";
    try{$conn = mysqli_connect($servername, $username, $password, $database);}
    catch(Exception){
        echo "Failed to connect to MySQL! Please contact the admin.";
        return;
    }
    if(!$conn){
        die("Connection failed.". mysqli_connect_error());
    }
    echo "Connection successful";

    $query = "SELECT * FROM smartphone_info";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        echo "Something went wrong!";
        return;
    }

    $details = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if(!$details){
        echo "No smartphones";
        return;
    }

    foreach ($details as $detail){
        ?>
            <div class='row product-card '>
            <div class='col-3 product-image'>
                <img src='<?= $detail['image'] ?>'
                    alt='D:/Wallpapers/wp3890506-iron-man-face-wallpapers.jpg'>
            </div>
            <div class='col-6 product-definition'>
                <div class='col product-name'>
                    <h3><?= $detail['name'] ?></h3>
                </div>

                <div class='col product-details'>
                    <div class='row'>
                            <div class='col'>
                                <i class='fa-solid fa-microchip'></i>
                                <p><?= $detail['processor'] ?></p>
                            </div>
                            <div class='col'>
                                <img src = 'Images/display.png'></i>
                                <p><?= $detail['display'] ?></p>
                            </div>
                            <div class='col'>
                                <img src = 'Images/camera.png'></i>
                                <p><?= $detail['camera'] ?></p>
                            </div>
                            <div class='col'>
                                <i class='fa-solid fa-memory'></i>
                                <p><?= $detail['rom'] ?></p>
                            </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <i class='fa-solid fa-battery-full'></i>
                            <p>5000 mAh</p>
                        </div>
                        <div class='col'>
                            <i class='fa-solid fa-battery-full'></i>
                            <p>5000 mAh</p>
                        </div>
                        <div class='col'>
                            <i class='fa-solid fa-battery-full'></i>
                            <p>5000 mAh</p>
                        </div>
                        <div class='col'>
                            <i class='fa-solid fa-battery-full'></i>
                            <p>5000 mAh</p>
                        </div>
                </div>
                    <div class='product-price'>
                        <p><?= $detail['price'] ?></p>
                    </div>
                </div>
            </div>
            <div class='col-3 favourites'>
                <i class='fa-regular fa-heart'></i>
                <p>11,220</p>
                <p class='fav_text'>Favourite</p>
            </div>
        </div>
    <?php
    }
?>

