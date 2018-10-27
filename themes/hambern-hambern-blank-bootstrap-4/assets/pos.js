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
        $('#phoneNumberDiv').hide();
    });
    
         $(document).on("click","#digitalRBtn",function() {
      // $('#receiptMethod1, #receiptMethod2').show();
       $('#phoneNumberDiv').show();
    });
    
    
    $(document).on("click","#sendReceipt",function() {
      // $('#receiptMethod1, #receiptMethod2').show();
       $('#phoneNumberDiv').show();
    });
    
    
        $(document).on("click","#sendReceiptBtn",function() {
             var total = parseFloat($("#totalPrice").val());
             var phone = $("#phone").val();
             var category = "Supermarket";
             var vendorName = "My Cheap Supermarket";
             var location = "Nicosia";
             
             
            $.request('onSendReceipt', {
                   //pass the inputed data code & descritpion to the ajax call
                   data: { total: total, phone: phone, category: category, vendorName: vendorName, location:location  },
                   success: function(data) {
                         this.success(data).done(function() {
                            console.log(data);
                         })
                   }});
                   
        });
    
    
    
});