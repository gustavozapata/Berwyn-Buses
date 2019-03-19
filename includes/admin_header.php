<header>
    <div class="logo">
        <h1><a href="../view/admin_view.php">Berwyn Buses Hire</a></h1>
        <div id="line1"></div>
        <div id="line2"></div>
    </div>
    <?php if($_SESSION["adminLogged"]): ?>
    <nav>
        <ul>
            <li><a href="../view/admin_view.php"><?= $_SESSION["adminname"]?></a></li>
            <li><a href="../controller/logout.php">Logout</a></li>
        </ul>
    </nav>
    <?php endif; ?>
</header>