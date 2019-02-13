<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php require_once "head.php";?>
    
    <title>Document</title>
</head>
<body>
    <div id="page">
    <?php require_once "header.php";?>
        <section class="main-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 ">
                        <div class="box-outline">
                            <h1>Your cart</h1>
                            <hr/>
                            <?php foreach($_SESSION["cart"] as $reg):?>
                            <div class="row coach-info">
                                <div class ="col-sm-4 basketInfo" id="image" >
                                    <img src="<?= $reg['coachIMG'] ?>" class="img-fluid" alt="Image Coach" />
                                </div>
                                <div class ="col-sm-8 basketInfo" style="text-align:left;" >
                                    <p> Registration Number: <?= $reg['regNumber'] ?></p> 
                                    <p>Hourly rate: &#8356;<?= $reg['rate'] ?></p>
                                </div>
                            </div>
                            <hr/>
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
        </section>
    </div>
<?php require_once "../scripts/call_last.php";?>
<script>
var text = '<?= $_SESSION['cart'][0]['regNumber'] ?>';
    if(text== 'empty' ){
        $('div#image').replaceWith();
        $('div.basketInfo').replaceWith('<div class="col-sm-12"><h3 style="text-align:center">Your cart is empty</h3></div>');
    }
</script>
</body>
</html>