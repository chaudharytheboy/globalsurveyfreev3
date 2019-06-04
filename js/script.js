
$(document).ready(function(){

        $("#swap_values").click(function() {
            var selectOne = $("#val_1").val();
            var selectTwo = $("#val_2").val();
            //alert($("#val_1").val()); return false;
    
            $("#val_1").val(selectTwo);
            $("#val_2").val(selectOne);
            // stops the link going anywhere
            return false;
        });


/*$("#submitData").submit(function(){
    
    var price = $("#price").val();
    var reg_price = $("#reg_price").val();
    var shipping_price = $("#shipping_price").val();

    if (price !== "" && !$.isNumeric(price)) {
  //Check if price is numeric
  $("#price_error").show(); //Show error
  $("#price").focus(); //Focus on field
  $("#price").css("border", "1px solid red");
  return false;

} else if (reg_price !== "" && !$.isNumeric(reg_price)) {
    $("#regprice_error").show(); //Show error
  $("#reg_price").focus(); //Focus on field
  $("#reg_price").css("border", "1px solid red");
  return false;

} else if (shipping_price !== "" && !$.isNumeric(shipping_price)) {
    $("#shipping_error").show(); //Show error
  $("#shipping_price").focus(); //Focus on field
  $("#shipping_price").css("border", "1px solid red");
  return false;
}

else{
    return true;
}

});*/
    //////////////////////////
});


