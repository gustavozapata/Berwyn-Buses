var price = $('span#rate').html();
//console.log(price);                     // Vehicles hourly rate

var basket = $('span#total').text();
//console.log(basket);                    // Baskets total value


if(price != '0'){
    var total = 0;
    $('span#rate').each(function (){
        total += parseInt($(this).html());
        }
    )
    $('span#total').replaceWith(total);
}



var regNums = [];

$('.coach-div').each(function(index){
    var $cartInfo = $(this).children('#coachObj').val();
    var $regNum = $(this).children('#regNum').html();
    $(this).find('.btn-add-basket').on('click', function(){
        regNums.push($regNum);
        localStorage.setItem("regNums", JSON.stringify(regNums));
        console.log(localStorage.getItem("regNums"));
        $.post( "../controller/cart.php", {cart: $cartInfo});

    });
    
});

$(".btn-remove-item").click(function() {
   // $(this).find(".row coach-info").hide();
    //$(this).remove(".row coach-info");
  });

  

