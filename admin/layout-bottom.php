
<footer style="background-color:#cd1e25;padding:2px;text-align:center;color:#fff;letter-spacing:1px">
        <h5>
          Copyright &copy; <?php echo date('Y')?> All Rights Reserved.
        </h5>
</footer>
<!-- Javascripts --> 
<script type="text/javascript" src="../js/jquery.min.js"></script> 
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!-- Javascripts -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript">
$(document).on('click', '.swap', function() {
    var swapDirection = $(this).attr('title');
    var postDat = {};
    switch (swapDirection) {
        case "UP":
            var swapIdFrom = $(this).parent().parent('tr').attr('id');
            var swapIdTo = $('.table tr#' + (parseInt(swapIdFrom) - 1)).attr('id');

            var swapOrderFrom = $(this).parent().siblings('td.sort_order').children('input').val();
            var swapOrderTo = $('.table tr#' + (parseInt(swapIdFrom) - 1)).find('td.sort_order').children('input').val();
            var swapOrderFrom = $.trim(swapOrderFrom);
            var swapOrderTo = $.trim(swapOrderTo);


            var swapPIdFrom = $(this).parent().parent('tr').attr('class');
            var swapPIdTo = $('.table tr#' + (parseInt(swapIdFrom) - 1)).attr('class');
            $('.table tr#' + (parseInt(swapIdFrom) - 1)).find('td.sort_order').children('input').val(swapOrderFrom);
            $(this).parent().parent('tr').find('td.sort_order').children('input').val(swapOrderTo);

            for (var key in products) {
               
                if ("cls_" + products[key].id == swapPIdFrom) {
                    postDat['idfrom'] = swapPIdFrom;
                
                    postDat['orderfrom'] = swapOrderTo;
                    products[key].sort_order = swapOrderTo;
                }

                if ("cls_" + products[key].id == swapPIdTo) {
                    postDat['idTo'] = swapPIdTo;

                    postDat['orderTo'] = swapOrderFrom;
                    products[key].sort_order = swapOrderFrom;
                }
            }
            break;
        case "DOWN":
            var swapIdFrom = $(this).parent().parent('tr').attr('id');
            var swapIdTo = $('.table tr#' + (parseInt(swapIdFrom) + 1)).attr('id');
            
            var swapOrderFrom = $(this).parent().siblings('td.sort_order').children('input').val();
            var swapOrderTo = $('.table tr#' + (parseInt(swapIdFrom) + 1)).find('td.sort_order').children('input').val();
            var swapOrderFrom = $.trim(swapOrderFrom);
            var swapOrderTo = $.trim(swapOrderTo);
   

            var swapPIdFrom = $(this).parent().parent('tr').attr('class');
            var swapPIdTo = $('.table tr#' + (parseInt(swapIdFrom) + 1)).attr('class');
            $('.table tr#' + (parseInt(swapIdFrom) + 1)).find('td.sort_order').children('input').val(swapOrderFrom);
            $(this).parent().parent('tr').find('td.sort_order').children('input').val(swapOrderTo);
        
		     for (var key in products) {
                if ("cls_" + products[key].id == swapPIdFrom) {
                    postDat['idfrom'] = swapPIdFrom;
                
                    postDat['orderfrom'] = swapOrderTo;
                    products[key].sort_order = swapOrderTo;
                }

                if ("cls_" + products[key].id == swapPIdTo) {
                    postDat['idTo'] = swapPIdTo;

                    postDat['orderTo'] = swapOrderFrom;
                    products[key].sort_order = swapOrderFrom;
                }
            }
            break;
    }
    var baseURL = window.location.protocol + "//" + window.location.hostname ;
    $.ajax({
        url: baseURL + "/globalsurveyfreev3/admin/update_url.php",
        type: "post",
        data: postDat,
        dataType: "json",
        success: function(jsonResponse) {
            if (jsonResponse.status == true) {
                location.reload()
                }
        },
        error: function(jsonResponse) {
            if (jsonResponse.status == true) {
              
            } else {
                console.log("Internal Server Error! Try After some time.");
            }
        }
    });
});
</script>

<script type="text/javascript">
 var baseURL = window.location.protocol + "//" + window.location.hostname ;
$(document).on('click','.removePic',function(){
    var productid = $(this).parent().parent('tr').attr('class');
    var Obj = $(this);
    $.ajax({
        url: baseURL + "/globalsurveyfreev3/admin/update_url.php",
        type: "post",
        data: {'productID':productid},
        dataType: "json",
        success: function(jsonResponse) {
            if (jsonResponse.status == true) {   
                $(Obj).parent().parent('tr').find('.images').find('img').attr('src', 'https://globalsurveyz.com/globalsurveyfreev3/images/products_image/default-product-img.jpg');                 
                $(Obj).parent().find('a').remove();
            }
        },
        error: function(jsonResponse) {
            if (jsonResponse.status == true) {
               
            } else {
                console.log("Internal Server Error! Try After some time.");
            }
        }
    });
    
});

$(document).on('click', '.remove_pic',function(){
    var imageId = $(this).parents('tr').attr('class');
    var Obj = $(this);
       $.ajax({
        url: baseURL + "/globalsurveyfreev3/admin/update_url.php",
        type: "post",
        data: {'image_id' : imageId},
        dataType: 'json',
        success: function(jsonResponse) {
            if (jsonResponse.status == true) {   
                $(Obj).parent().parent('tr').find('.img_popular').find('img').attr('src','https://globalsurveyz.com/globalsurveyfreev3/images/popular_image/default-product-img.jpg');                 
                $(Obj).parent().find('a').remove();
            }
        },
        error: function(jsonResponse) {
            if (jsonResponse.status == true) {
               
            } else {
                console.log("Internal Server Error! Try After some time.");
            }
        }
    });
});

</script>


</body>
</html>