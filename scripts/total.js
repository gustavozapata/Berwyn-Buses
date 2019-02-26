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

//Ajax code

$('.coach-div').each(function(index){
    var $regNumber = $(this).children('#regNum').text();
    var $vehicleType = this.type;
    var $coachIMG = "coachIMG"+this.coachIMG;
    var $rate = "rate="+this.price;
    $(this).children('.coach-status').on('click', function(){ //need to narrow this down to just the button!!!
        console.log('Index: '+index);
        console.log($regNumber);
    });
});

