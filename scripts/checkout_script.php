<script>
var text = '<?= $_SESSION['cart'][0] ?>';
console.log('text: '+text);
    if(text == '' ){
        $('div#image').replaceWith();
        $('div.basketInfo').replaceWith('<div class="col-sm-12"><h3 style="text-align:center">Your cart is empty</h3></div>');
    }
</script>