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
    <?php
    include "includes/header.php";
    ?>

    <br>

    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Flagship</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="LatestReleaseProducts.php">Latest Release</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="BudgetProducts.php">Budget</a>
        </li>
    </ul>

    <h3>Showing results of the budget smartphones:</h3>

    <!--Products starts from here-->

    <!-- <div class = "productHolder"> -->
            
    </div>
    <!--<script src ="cp.js"></script>-->
    <?php
    $type="budget";
    include "./flagship_products.php";
    ?>
    

</body>


</html>