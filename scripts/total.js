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



$('.coach-div').each(function(index){
    var $cartInfo = $(this).children('#coachObj').val();
    console.log($cartInfo);
    var $regNumber = $(this).children('#regNum').text();
    var $vehicleType = this.type;
    var $coachIMG = "coachIMG"+this.coachIMG;
    var $rate = "rate="+this.price;
    $(this).children('.coach-status').on('click', function(){ 
        $.post( "../controller/cart.php", {cart: $cartInfo});
    });
});

