<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <title>Add user</title>
        <script src="{{URL::asset('Jquery/jquery.min.js')}}"></script>
    </head>
    <body class="antialiased">
        <h1>Add New User </h1>
        <a href="{{url('usersList')}}" target="_blank" rel="noopener noreferrer">All Users List </a>
        <br/>
        <div class="form-group">
            <span class="errorMsg" style="color:red;"></span>
            <span class="successMsg" style="color:green;"></span>
        </div>
        <br/>
        <form id="Adduserform" action="javascript:void(0)" method="post">
        @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name"  id="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="test" name="email"  id="email">
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text"   name="mobile" id="mobile">
            </div>
            <div class="form-group">
                <button type="submit">Add New user</button>
            </div>
        </form>

        <script>
            $('#Adduserform').submit(function(e){
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let mobile = $('#mobile').val();
                var Emailpattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                var Mobilepattern = /^\d*(?:\.\d{1,2})?$/;
                $('.errorMsg').html("");
                if(name){
                    if(email){
                        if(Emailpattern.test(email)){
                            if(mobile){
                                if(Mobilepattern.test(mobile)){
                                    if(mobile.length==10){
                                        $.ajax({
                                            type: "POST",
                                            url: "{{url('adduser')}}",
                                            data: {'name': name, 'email': email,'mobile':mobile,"_token": "{{ csrf_token() }}"},
                                            success: function(response){
                                                console.log(response)
                                                if(response=='200'){
                                                    $('.successMsg').html(`User Added Successfully`);
                                                }
                                                $('#Adduserform')[0].reset();
                                            }
                                        });
                                    
                                    }
                                    else{
                                        $('.errorMsg').html(`Please put 10  digit mobile number!`);
                                    }

                                }
                                else{
                                    $('.errorMsg').html(`invalid mobile!`);
                                }

                            }
                            else{
                                $('.errorMsg').html(`Mobile is required`);
                            }
                        }
                        else{
                            $('.errorMsg').html(`invalid Email!`);
                        }
                    }
                    else{
                        $('.errorMsg').html(`Email is required`);
                    }
                }
                else{
                    $('.errorMsg').html(`Name is required`);
                }
                
            });
        </script>
    </body>
</html>
