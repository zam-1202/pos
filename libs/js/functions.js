var items = "";
function suggetion() {

     $('#sug_input').keyup(function(e) {

         var formData = {
             'product_name' : $('input[name=title]').val()
         };

         if(formData['product_name'].length >= 1){

           // process the form
           $.ajax({
               type        : 'POST',
               url         : 'ajax.php',
               data        : formData,
               dataType    : 'json',
               encode      : true
           })
               .done(function(data) {
                   //console.log(data);
                   $('#result').html(data).fadeIn();
                   $('#result li').click(function() {

                     $('#sug_input').val($(this).text());
                     $('#result').fadeOut(500);

                   });

                   $("#sug_input").blur(function(){
                     $("#result").fadeOut(500);
                   });

               });

         } else {

           $("#result").hide();

         };

         e.preventDefault();
     });

 }
  $('#sug-form').submit(function(e) {
    var formData = {
        'p_name' : $('input[name=title]').val()
    };
    // process the form
    $.ajax({
        type        : 'POST',
        url         : 'ajax.php',
        data        : formData,
        dataType    : 'json',
        encode      : true
    }).done(function(data) {
            items = items.concat(data);
            console.log(items);
            $('#product_info').html(items).show();
            total();
            $('.datePicker').datepicker('update', new Date());
        }).fail(function() {
            $('#product_info').html(items).show();
        });
    e.preventDefault();
  });
  function total(){
    $('#quantity').change(function(e)  {
            var price = parseFloat($('#price').val());
            var qty  = parseFloat($('#quantity').val());
            var total = qty * price ;
                $('#total').val(total);
    });
  }

  $(document).ready(function() {

    //tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('.submenu-toggle').click(function () {
       $(this).parent().children('ul.submenu').toggle(200);
    });
    //suggetion for finding product names
    suggetion();
    // Calculate total ammont
    total();

    $('.datepicker')
        .datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
  });

  