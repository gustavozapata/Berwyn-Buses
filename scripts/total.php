<script>
var price = $('span#rate').html();
//console.log(price);                     // Vehicles hourly rate

var basket = $('span#total').text();
//console.log(basket);                    // Baskets total value

if(price != '0'){
    var total = 0;
    $('span#rate').each(function (){
        total += parseInt($(this).html());
        console.log(total+"dddd");
        }
    )
    $('span#total').replaceWith(total);
}

</script>