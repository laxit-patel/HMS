
$('#validation_name').on('blur', function () {


                var name = $(this).val();

                var pattern_name = new RegExp("^[a-zA-Z]+$");


                if(name == "")
                {
                    $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
                     if ( !$(this).hasClass('generate-toast') ) {
                    var code = $.toast({
                        text: "Name Is Empty",
                        heading: "Error",
                        showHideTransition: 'plain',
                        position: 'bottom-center'});

                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval( code );

                };

                }
                else if(!/^[A-z ]+$/.test(name) )
                {
                    $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
                    if ( !$(this).hasClass('generate-toast') ) {
                    var code = $.toast({
                        text: "Only String Allowed",
                        heading: "Error",
                        showHideTransition: 'plain',
                        position: 'bottom-center'});

                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval( code );
                };
                }
                else if( name.length < 3   )
                {
                    $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
                    if ( !$(this).hasClass('generate-toast') ) {
                        var code = $.toast({
                            text: "Length Must be Greater Than 3 ",
                            heading: "Error",
                            showHideTransition: 'plain',
                            position: 'bottom-center'});

                        code.replace("<span class='hidden'>", '');
                        code.replace("</span");

                        eval( code );
                    };
                }
                else if( name.length > 16   )
                {
                    $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
                    if ( !$(this).hasClass('generate-toast') ) {
                    var code = $.toast({
                        text: "Length Must be Less Than 16 ",
                        heading: "Error",
                        showHideTransition: 'plain',
                        position: 'bottom-center'});

                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval( code );
                };
                }
                else
                {
                    $(this).css("background-color","");
                    $(':input[type="submit"]').prop('disabled', false);
                }




            });


$('#validation_date').on('blur', function () {

            var date = $(this).val();
            var pattern_date = new RegExp("[0-9/]");

            if(!pattern_date.test(date)) {
                $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
                if (!$(this).hasClass('generate-toast')) {
                    var code = $.toast({
                        text: "Date Not Valid",
                        heading: "Error",
                        showHideTransition: 'plain',
                        position: 'bottom-center'
                    });

                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval(code);
                };
            }
            else if(date == "")
            {
                 $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
                if (!$(this).hasClass('generate-toast')) {
                    var code = $.toast({
                        text: "Date Cant Be Empty ",
                        heading: "Error",
                        showHideTransition: 'plain',
                        position: 'bottom-center'
                    });

                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval(code);
                };
            }
            else
            {
                 $(this).css("background-color","");
                    $(':input[type="submit"]').prop('disabled', false);
            }


});

$("#validation_phone").on('blur',function(){

    var phone = $(this).val();
     var pattern_phone = new RegExp("[0-9-()+]{3,20}");

     if(!pattern_phone.test(phone)) {
          $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
         if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Invalid Phone Number",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
     }
     else if(phone.length < 10)
     {
          $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
         if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Length Must Be 10",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
     }
     else if(phone.length > 13)
     {
          $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
         if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Length Must Be Less Then 13",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
     }
     else
     {
          $(this).css("background-color","");
                    $(':input[type="submit"]').prop('disabled', false);
     }

});

$("#validation_address").on('blur',function() {

    var address = $(this).val();

    if(address.length < 10)
    {
         $(this).css("background","linear-gradient(180deg,#FDD8D8,transparent)");
                    $(':input[type="submit"]').prop('disabled', true);
        if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Address Invalid",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
    }
    else
    {
         $(this).css("background","");
                    $(':input[type="submit"]').prop('disabled', false);
    }

});

$("#validation_email").on('blur',function() {

    var email = $(this).val();
    var pattern_email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);

    if(!pattern_email.test(email))
    {
        if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Email is not Valid",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
    }

});

$("#patient_email").on('blur',function(){

    var email = $(this).val();
    var pattern_email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);



    if(!pattern_email.test(email))
    {
        if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Email is not Valid",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
    }



});

$("#validation_password").on('blur',function(){

    var password = $(this).val();
    if(password.length < 8)
    {
        if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Password Too short",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
    }
    else if(password.length > 20)
    {
        if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Password Too Long",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
    }



});


$("#validation_repass").on('blur',function(){

    var password = $("#validation_password").val();
     var repassword = $(this).val();

     if(password != repassword)
     {
          if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Password Not Matched",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
     }



});
