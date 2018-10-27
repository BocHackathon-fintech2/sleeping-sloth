$(document).ready( function(){
    
    $(document).on("click",".itemDiv",function() {
       var price = parseFloat($(this).data('price')) ; 
       var name = $(this).data('name') ; 
       
       var category = $(this).data('category') ; 
       
        $('#resultTable tr:last').after('<tr data-price="'+price+'" data-name="'+name+'" data-category="'+category+'"><td>'+'1'+'</td><td>'+name+'</td><td>'+price+'</td></tr>');
        
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
             var category = "Electronic Store";
             var vendorName = "Electronics Store";
             var location = "Paphos";
             
             
            $.request('onSendReceipt', {
                   //pass the inputed data code & descritpion to the ajax call
                   data: { total: total, phone: phone, category: category, vendorName: vendorName, location:location  },
                   success: function(data) {
                         this.success(data).done(function() {
                            var id = data["result"];
                            console.log('ID='+id);
                            var counter = 0;
                             $('#resultTable tr').each(function (i, row) {
                               
                                 
                                if(counter !=0){
                                    
                                      console.log($(this).data('price'));
                                 console.log($(this).data('name'));
                                 console.log($(this).data('category'));
                                 
                                 var itemPrice = $(this).data('price');
                                 var itemName = $(this).data('name');
                                 var itemCategory = $(this).data('category');
                                 
                                    $.request('onSendItem', {
                                       //pass the inputed data code & descritpion to the ajax call
                                       data: { id: id, price: itemPrice, name: itemName, category:itemCategory, quantity: "1"  },
                                       success: function(data) {
                                             this.success(data).done(function() {
                                               console.log('succsess');
                                                
                                                
                                                
                                                
                                             })
                                       }});
                                      
                                }
                               counter = 1; 
                             });//end for tr
                            
                                $('#exampleModal').modal('hide');
                         })
                   }});
                   
        });
    
    
    
});