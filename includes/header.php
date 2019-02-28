<header>
        <div class="logo">
          <h1><a href="../view/index.php">Berwyn Buses Hire</a></h1>
          <span id="movilBasket"></span>
          <div id="line1"></div>
          <div id="line2"></div>
        </div>
        <nav>
          <ul>
            <li><a href="../view/index.php">Home</a></li>
            <?php if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]): ?>
            <li><a href="../view/customer_view.php">My Account</a></li>
            <li><a href="../controller/logout.php">Logout</a></li>
            <?php else : ?>
            <!-- <li><a href="../view/about.php">About Us</a></li> -->
            <li><a href="../view/customer_view.php">Login</a></li>
            <?php endif; ?>
            <li id="liBasket">
              <a href="../view/checkout.php"
                ><img id="basketImg" src="../content/images/basket.png" /><span
                  id="basketItems"
                  ></span
                ></a
              >
            </li>
          </ul>
        </nav>
      </header>