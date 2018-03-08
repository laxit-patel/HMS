
$('#validation_name').on('blur', function () {


                var name = $(this).val();

                var pattern_name = new RegExp("^[a-zA-Z]+$");


                if(name == "")
                {
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
                else if(!pattern_name.test(name) )
                {
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


            });


$('#validation_date').on('blur', function () {

            var date = $(this).val();
            var pattern_date = new RegExp("^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)dd$");

            if(date.test(pattern_date)) {
                if (!$(this).hasClass('generate-toast')) {
                    var code = $.toast({
                        text: "Date Blurred ",
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

$("#validation_phone").on('blur',function(){

    var phone = $(this).val();
     var pattern_phone = new RegExp("[0-9-()+]{3,20}");

     if(!pattern_phone.test(phone)) {
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

});

$("#validation_phone").on('blur',function() {

    var address = $(this).val();
    var pattern_address = new RegExp("[a-z,A-Z,0-9]{10,200}");

    if(address.length > 10)
    {
         if (!$(this).hasClass('generate-toast')) {
             var code = $.toast({
                 text: "Length Must Greater than 10",
                 heading: "Error",
                 showHideTransition: 'plain',
                 position: 'bottom-center'
             });

             code.replace("<span class='hidden'>", '');
             code.replace("</span");

             eval(code);
         };
    }

}


