 $(document).ready(function () {
     $("#add_email").click(
         function () {
             var email = $("#new_email").val();
             $.ajax({
                 type: 'POST',
                 url: 'http://localhost/update/addEmail',
                 dataType: 'html',
                 data: 'email=' + email,
                 success: function (response) {
                     document.getElementById('ajaxEmail').innerHTML = response;
                 }
             });
         });

     $("#add_number").click(
         function () {
             var number = $("#new_number").val();

             $.ajax({
                 type: 'POST',
                 url: 'http://localhost/update/addNumber',
                 dataType: 'html',
                 data: 'number=' + number,
                 success: function (response) {
                     document.getElementById('ajaxNumber').innerHTML = response;
                 }
             });
         });


     $('select').material_select();


 });