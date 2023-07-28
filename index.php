<!DOCTYPE html>
<html>

<head>
    <link href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="Practice00.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400&display=swap" rel="stylesheet"> 
    <title>Website</title>
</head>

<body>
    <h2>smartphoneCentral</h2>

    <ul class="customNav">
        <li><a href="Practice02.html" class="active">Home</a></li>
        <li><a href="Favourites.html">Favourites</a></li>
        <li><a href="https://www.apple.com">Apple</a></li>
        <li><a href="https://www.samsung.com">Samsung</a></li>
        <li><a href="https://www.xiaomi.com">Xiaomi</a></li>
        <li style="float:right"><a href="./login/login.php">Login</a></li>
    </ul>

    <br>
    <p>Starting a new website development. Now watching how far it can go. This website shows the latest smartphones of
        the companies.</p>

    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Practice02.html">Flagship</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="LatestRelease.html">Latest Release</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Budget.html">Budget</a>
        </li>
    </ul>

    <h3>Showing results of the latest smartphones:</h3>

    <!--Products starts from here-->

    <!-- <div class = 'flex-container'> -->
    <div class='row product-card '>
        <div class='col-3 product-image'>
            <img src="https://rukminim1.flixcart.com/image/312/312/ktketu80/mobile/c/g/4/iphone-13-pro-max-mlll3hn-a-apple-original-imag6vpg3r7dyvhm.jpeg?q=70"
                alt='D:/Wallpapers/wp3890506-iron-man-face-wallpapers.jpg'>
        </div>
        <div class='col-6 product-definition'>
            <div class='product-name'>
                <h3>Apple Iphone 13 Pro Max</h3>
            </div>

            <div class='product-details'>
                <div class="row">
                    <ul>
                        <li>512 gb Rom</li>
                        <li>6.71 inch Super Retina Display</li>
                        <li>Triple Rear + One Front Camera</li>
                        <li>Apple A15 Bionic Chip</li>
                    </ul>
                </div class="row">
                <div>
                    <div class='product-price'>&#8377 1,59,900</div>
                </div>
            </div>
        </div>
        <div class="col-2 favourites">
            <i class="fa-regular fa-heart heart"></i>
            <p>11,220</p>
        </div>
    </div>
    <!-- </div> -->

    <!-- <div class = "productHolder"> -->
            
    </div>
    <!--<script src ="cp.js"></script>-->
    <?php
    include "products.php";
    ?>
    

</body>


</html>