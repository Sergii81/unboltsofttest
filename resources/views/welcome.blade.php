<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Test</title>
        
        <link rel="stylesheet" href="styles/kendo.common.min.css" />
        <link rel="stylesheet" href="styles/kendo.default.min.css" />
        <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
        <link rel="stylesheet" href="styles/kendo.material.min.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/kendo.all.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
                .content
                {
                width: 400px;
                margin: 50px auto;
                border: 1px solid #000;
                box-shadow: 0 0 10px rgba(0,0,0,0.5);
                text-align: center;
                }
                .message {
                    width: 400px;
                    text-align: center;
                    margin: 50px auto;
                }
                .message span {
                    display: none;
                }
                #fieldlist {
                    margin: 0 auto;
                    padding-top: 10px;
                }

                #fieldlist li {
                    list-style: none;
                    padding-bottom: .7em;
                    text-align: left;
                }

                #fieldlist label {
                    display: block;
                    padding-bottom: .3em;
                    font-weight: bold;
                    font-size: 12px;
                    color: #444;
                }

                #fieldlist li .k-widget:not(.k-tooltip),
                #fieldlist li .k-textbox {
                    margin: 0 5px 5px 0;
                }

                span.k-widget.k-tooltip-validation {
                    display: inline-block;
                    width: 160px;
                    text-align: left;
                    border: 0;
                    padding: 0;
                    margin: 0;
                    background: none;
                    box-shadow: none;
                    color: red;
                }
                
                .k-tooltip-validation .k-warning {
                    display: none;
                }
            </style>
    </head>
    <body>
        <div class="message"><span>Incorrect username or password</span></div>
        <div class="content">            
                <form id="loginForm" >
                    <ul id="fieldlist">
                        <li>
                            <label for="Username">Username:</label>
                            <input type="text" class="k-textbox" name="userName" />
                        </li> 
                        <li>
                            <label for="Password">Password:</label>
                            <input type="text" class="k-textbox" name="password"  />
                        </li>   
                        
                        <li>
                             <button type="submit" class="k-primary" data-role="button" data-click='login'>Login</button>
                        </li>       
                    </ul>
                </form>
            </div>                      

           <script>
                $(document).ready(function(){
                    $('#loginForm').on('submit', function(e){
                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            });
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('loginUser') }}',
                            data: $('#loginForm').serialize(),
                            dataType: 'json',
                            success: function(answer){
                                if (answer.status == 'ok') {
                                    console.log("1");
                                }else{
                                    console.log("2");
                                }
                                    }
                        });
                    });
                });
            </script>
        
        </div>
    </body>
</html>
