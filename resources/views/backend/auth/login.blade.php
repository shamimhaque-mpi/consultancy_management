<html lang="en"><head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <!-- Page title -->
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('public/backend/css/login.css')}}">
        
    </head>
    <body>
        <div id="app">
            <div class="wrapper">
                <div class="gride">
                @if(session()->has('error'))
                <div class="warning">
                    <p>{{session()->get('error')}}</p>
                </div>
                @endif
                    <div class="form-wrapper">
                        <div class="archive">
                            <div class="icon"><img src="{{asset(settings()->logo)}}"></div> 
                            <h2>Login To Your Account</h2> 
                            <form action="{{route('admin.login')}}" method="POST">
                            @csrf
                                <div class="form">
                                    <div class="form-group">
                                        <input type="text" name="email" value="{{old('email')}}" placeholder="Enter Your Username" autofocus="autofocus">
                                    </div> 
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Enter Your Password">
                                    </div> 
                                    <div class="form-group">
                                        <a href="#" class="form-link">Forgot Your Access ?</a> 
                                        <button type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!-- App -->
    </body>
</html>