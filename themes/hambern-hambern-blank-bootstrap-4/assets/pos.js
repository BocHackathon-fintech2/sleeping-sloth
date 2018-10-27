$(document).ready( function(){
    
    $(document).on("click",".itemDiv",function() {
       var price = parseFloat($(this).data('price')) ; 
       var name = $(this).data('name') ; 
       
        $('#resultTable tr:last').after('<tr><td>'+'1'+'</td><td>'+name+'</td><td>'+price+'</td></tr>');
        
       var total = parseFloat($("#totalPrice").val());
       console.log(total);
       var tempTotal = total + price;
       total = tempTotal.toFixed(2)
       $("#totalPrice").val(total);
    });
    
     $(document).on("click",".paymentMethod",function() {
      // $('#receiptMethod1, #receiptMethod2').show();
       $('#exampleModal').modal('show');
    });
    
    
    
});