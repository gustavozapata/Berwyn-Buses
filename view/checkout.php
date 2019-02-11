<?php require_once "../controller/cart.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php require_once "head.php";?>
    
    <title>Document</title>
</head>
<?php require_once"header.php";?>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8 ">
            <div class="box-outline">
                <h1>Your basket</h1>
                <?php foreach($_SESSION["cart"] as $reg):?>
                <h2><?= $reg; ?></h2>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-sm-4 ">
            <div class="box-outline">
            <h2>Please sign in to complete booking</h2>
            </div>
        </div>
    </div>
</div>




<?php require_once"../scripts/call_last.php";?>
</body>
</html>