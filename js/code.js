$(document).ready( function() {

    $('#login').on('click', function(e){

        e.preventDefault();

        if(checkLogin() == true){

            var mail = $('#loginMail').val();
            var pass = $('#loginPass').val();
            $.ajax({
                method: 'POST',
                url: 'http://localhost/warplanes/php/login.php',
                data: {mail: mail, pass: pass},
                complete: function(xhr, textStatus, errorThrown){
                   
                   if(xhr.status == 200){
                       location.reload();
                   }

                   
                   
                    
                       
                         
                        
                 },
                 error: function(){
                    var txt = '<p class="text-danger">Invalid username or password</p>';
                    $('#responseLogin').html(txt);

                         
                 
                             
     
                         
     
                 }

            });


        }
        else{
            checkLogin();
        }

        
        


    });


    $('.click').on('click', function(e){

        e.preventDefault();
        
        var href = (this).href;
        $.ajax({
            url: href,
            complete: function(data){
               var show = data.responseText;
               
                $('#types').html(show);
                    
                  
                    
                   
            },
            error: function(data, xhr, xhrs){
                    
            
                        

                    

            }




        });


    });

    $('#rate').on('click', function(e){

        e.preventDefault();
        var mark = $('#ddl').val();
        if(mark != 0){

            $.ajax({
                method: 'POST',
                url: 'http://localhost/warplanes/php/ajaxRate.php',
                data: {mark : mark},
                complete: function(data){
                   var show = data.responseText;
                   
                    $('#responseRate').html(show);
                        
                      
                        
                       
                },
                error: function(data, xhr, xhrs){

                    var show = data.responseText;
                    $('#responseRate').html(show);
                        
                
                            
    
                        
    
                }
    
    
    
    
            });


            
        }
        else{
            var txt = '<p class="text-danger">You mush choose a value</p>';

            $('#responseRate').html(txt);

        }
        
        


    });

    $('#register').on('click', function(e){
        e.preventDefault();

        if(checkReg() == true){

            var mail = $('#registerMail').val();
            var pass = $('#registerPass').val();
            $.ajax({
                method: 'POST',
                url: 'http://localhost/warplanes/php/register.php',
                data: {registerMail: mail, registerPass: pass},
                complete: function(data){
                   
                    var show = data.responseText;
                    $('#responsereg').html(show);
                   

                   
                   
                    
                       
                         
                        
                 },
                 error: function(data){

                    var show = data.responseText;
                    $('#responsereg').html(show);

                         
                 
                             
     
                         
     
                 }

            });


        }
        else{
            checkReg();
        }


        
    });


    $('#send').on('click', function(e){


        e.preventDefault();
        var sub = $('#subject').val();
        var msg = $('#msg').val();
        var adress = 'http://localhost/warplanes/php/sendMail.php';

        if(checkContact() == true){



            

            $.ajax({
                method: 'POST',
                url: adress,
                data: {sub : sub, msg : msg},
                complete: function(data){
                   var show = data.responseText;
                   
                    $('#res').html(show);
                        
                      
                        
                       
                },
                error: function(data, xhr, xhrs){

                    var show = data.responseText;
                    $('#res').html(show);
                        
                
                            
    
                        
    
                }
    
    
    
    
            });

        }
        else{
            checkContact();
        }
        

    });



    $('.buy_me').on('click', function(){

        $.ajax({

            url: 'http://localhost/warplanes/php/ajaxBuy.php',
            complete: function(data){
               var show = data.responseText;
               
                $('.feedback').html(show);
                    
                  
                    
                   
            },
            error: function(data, xhr, xhrs){

                var show = data.responseText;
               
                $('#feedback').html(show);
                    
            
                        

                    

            }

        });

    });

    

   

    
    

   




});

function checkContact(){
    var sub = document.getElementById('subject').value;
    var msg = document.getElementById('msg').value;
    var err = document.getElementsByName('errC');
    var re = /^[A-Za-z0-9\s]+$/;
    var errMsg = ['This fied is requiered', 'This field must contain leters or numbers only'];
    if(sub == '' && msg == ''){
        for(var i = 0; i < errMsg.length; i++){
            err[i].innerHTML = errMsg[0];


        }
        return false;
    }
    if(sub == ''){
        err[0].innerHTML = errMsg[0];
        return false;
    }
    if(msg = ''){

        err[1].innerHTML = errMsg[0];
        return false;

    }
    if(!sub.match(re) && !msg.match(re)){

        for(var i = 0; i < errMsg.length; i++){
            err[i].innerHTML = errMsg[1];


        }
        return false;

    }

    if(!sub.match(re)){
        err[0].innerHTML = errMsg[1];
        return false;

    }
    return true;

}



function checkLogin(){

    var mail = document.getElementById('loginMail').value;
    var pass = document.getElementById('loginPass').value;
    var reMail = /^[A-Za-z0-9]+\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\@[a-z]{3,5}\.[a-z]{1,3}$/;
    var rePass = /^[a-zA-Z0-9]+$/;
    var msg = ['This field is required', 'This field must contain leters or numbers only', 'This field must be valied email adress'];
    var err = document.getElementsByName('err');
   
    if(mail == " " && pass == " "){
        for(var i = 0; i < err.lenght; i++){
            err[i].innerHTML = msg[0];

        }
    
        return false;
    }
    if(!mail.match(reMail) && !pass.match(rePass)){
        
        err[0].innerHTML = msg[2];
        err[1].innerHTML = msg[1];

        
        return false;
    }
    if(mail == ''){
        
        err[0].innerHTML = msg[0];
        return false;
    }
    if(pass == ''){
        
        err[1].innerHTML = msg[0];
        return false;

    }
    if(!mail.match(reMail)){
        
        err[0].innerHTML = msg[2];
        return false;

    }
    if(!pass.match(rePass)){
      
        err[1].innerHTML = msg[1];
        return false;

    }

    return true;

}

function checkReg(){

    var mail = document.getElementById('registerMail').value;
    var pass = document.getElementById('registerPass').value;
    var reMail = /^[A-Za-z0-9]+\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\@[a-z]{3,5}\.[a-z]{1,3}$/;
    var rePass = /^[a-zA-Z0-9]+$/;
    var msg = ['This field is required', 'This field must contain leters or numbers only', 'This field must be valied email adress'];
    var err = document.getElementsByName('errReg');
   
    if(mail == " " && pass == " "){
        for(var i = 0; i < err.lenght; i++){
            err[i].innerHTML = msg[0];

        }
    
        return false;
    }
    if(!mail.match(reMail) && !pass.match(rePass)){
        
        err[0].innerHTML = msg[2];
        err[1].innerHTML = msg[1];

        
        return false;
    }
    if(mail == ''){
        
        err[0].innerHTML = msg[0];
        return false;
    }
    if(pass == ''){
        
        err[1].innerHTML = msg[0];
        return false;

    }
    if(!mail.match(reMail)){
        
        err[0].innerHTML = msg[2];
        return false;

    }
    if(!pass.match(rePass)){
      
        err[1].innerHTML = msg[1];
        return false;

    }

    return true;

}


