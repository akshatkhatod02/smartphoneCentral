<h2>smartphoneCentral</h2>

    <ul class="customNav">
        <li><a href="Practice02.html" class="active">Home</a></li>
        <li><a href="Favourites.html">Favourites</a></li>
        <li><a href="https://www.apple.com">Apple</a></li>
        <li><a href="https://www.samsung.com">Samsung</a></li>
        <li><a href="https://www.xiaomi.com">Xiaomi</a></li>
        <li style="float:right">
        <?php if(!isset($_SESSION["user_id"])){ ?>
            <a href="./login/login.php">Login</a></li>
        <?php } else { ?>
            <a href="./login/logout.php">Logout</a></li>
        <?php } ?>
    </ul>
