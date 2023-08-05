<?php
    require_once "./connection.php";

    $userid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

    $query = "SELECT * FROM $type";
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

    $query = "SELECT * 
                FROM users_favourites_devices ufd
                INNER JOIN $type f ON ufd.product_id = f.id";

    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Something went wrong!";
        return;
    }
    $users_favourites_devices = mysqli_fetch_all($result, MYSQLI_ASSOC);
    

    foreach ($details as $detail){
        ?>
        <div class='product-card product-id-<?= $detail['id'] ?> row'>
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
                <?php
                    $is_interested = false;
                    $favourites_count = 0;
                    foreach ($users_favourites_devices as $interested_user) {
                        if($interested_user['product_id'] == $detail['id']){
                            $favourites_count++;
                        
                            if ($interested_user['user_id'] == $userid) {
                                $is_interested = true;
                            }
                        }
                    }
                    if($is_interested){
                ?>
                        <i class='favourites-image fa-solid fa-heart' data_id="<?= $detail['id'] ?>"></i>
                <?php
                    }else{
                ?>
                        <i class='favourites-image fa-regular fa-heart' data_id="<?= $detail['id'] ?>"></i>
                <?php
                    }
                ?>
                <p class="favourites_count"><?= $favourites_count ?></p>
                <p class='fav_text'>Favourite</p>
            </div>
        </div>
    <?php
    }
?>
