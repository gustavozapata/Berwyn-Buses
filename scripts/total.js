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


var regNums = []; //variable to store all reg numbers

if (localStorage.getItem("regNums") !== null){
    regNums = JSON.parse(localStorage.getItem("regNums"));
    $(document).ready(function(){
        $('.coach-div').each(function(index){
            var $regNum = $(this).children('#regNum').html();
            regNums.forEach(element => {
                if(element == $regNum){
                    updateBasket($(this).find('.btn-add-basket'), "remove");
                };
            });
        });
    });
}

$('.coach-div').each(function(index){
    var $cartInfo = $(this).children('#coachObj').val();
    var $regNum = $(this).children('#regNum').html(); //gets the text of reg number
   
    $(this).find('.btn-add-basket').on('click', function(){
        regNums.push($regNum);
        localStorage.setItem("regNums", JSON.stringify(regNums)); //adds the array to the local storage in the form of json
        $.post( "../controller/cart.php", {cart: $cartInfo});

    });

    $(this).find('.btn-remove-basket').on('click', function(){
        var pos = regNums.indexOf($regNum);//get the index of the reg number you want to remove
        regNums.splice(pos,1);//remove the reg number
        localStorage.setItem("regNums", JSON.stringify(regNums)); //update the current variable
        $.post( "../controller/cart.php", {remove: $cartInfo});
    });

        
});



    
       






$(".btn-remove-item").click(function() {
   // $(this).find(".row coach-info").hide();
    //$(this).remove(".row coach-info");
  });

  

