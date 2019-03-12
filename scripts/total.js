var price = $('span#rate').html();
//console.log(price);                     // Vehicles hourly rate

var basket = $('span#total').text();
//console.log(basket);                    // Baskets total value

console.log(price);

if(price != '0'){
    var total = 0;
    $('span#rate').each(function (){
        total += parseInt($(this).html());
        }
    )
    $('span#total').replaceWith(total);
}



$('.coach-div').each(function(index){
    var $cartInfo = $(this).children('#coachObj').val();
    $(this).find('.btn-add-basket').on('click', function(){ 
        $.post( "../controller/cart.php", {cart: $cartInfo});
    });
    
});

$(".btn-remove-item").click(function() {
   // $(this).find(".row coach-info").hide();
    //$(this).remove(".row coach-info");
  });

  

