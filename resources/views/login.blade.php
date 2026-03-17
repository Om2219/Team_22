<x-layout>
    <div class="loginPage">
        @if (session('success'))
        <div class="alert alert-success">
            {{  session('success') }}
        </div>
        @endif
        @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{  $errors->first('email') }}
        </div>
        @endif
        <form action="{{ route('login.store') }}" method="POST" class="loginForm">
            @csrf
            <div class="imgcontainer">
                        <img src="{{ asset('images/img_avatar2.png') }}" alt= "Avatar" class ="avatar">
            </div>

            <div class= "login">
                <label for= "uname"><b>Email address</b></label>
                <input id="email" type="text" placeholder= "Enter email address" name="email" required>

                <label for= "psw"><b>Password</b></label>
                <input id="psw" type="password" placeholder= "Enter password" name="password" required>
            
                <button type ="submit" class="mainLogin"> Login</button>
                <label>
                    <input type = "checkbox" checked name="remember"> Remember Me
                </label>

                <div class="login extra"> 
                    <span class="psw"><a class="login-hyperlinks" href="#"> Forget password?</a></span>
                </div>

                <div class="container_signin">
                    <p>New to Roots? <a class="login-hyperlinks" href="/register">Register</a></p>
                    <p>Are you an admin? <a class="login-hyperlinks" href="{{ route('admin.login') }}">Admin</a></p>
                </div>
            </div>
        </form>
    </div>

    <style>
        /* border form */
        .loginPage .loginForm{
            width: 600px;
            margin: 40px auto;
            border: 3px solid #7a4900;
            border-radius: 8px;
            font-family:'Times New Roman', Times, serif; /*possibly subject to change, settled on this for now*/
        }

        [data-bs-theme="light"] .loginPage .loginForm{
            background: white;
        }

        [data-bs-theme="dark"] .loginPage .loginForm{
            background: rgb(44, 46, 48);
        }

        /** padding of the container */
        .container_signin{
            padding: 0 16px 0px;
        }

        .loginPage .container_signin{
            border-radius: 0 0 8px 8px;
        }


        /*inputs */
        .loginPage input[type=text], 
        .loginPage input[type=password]{
            width: 100%;
            height: 45px;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            box-sizing: border-box;
        }

        /*style for all buttons */
        .loginPage .loginForm button{
            cursor:pointer;
            
        }

        .loginPage .mainLogin{
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            width: 100%;
            font-weight: 600;
            margin-top: 8px;
        }

        [data-bs-theme="light"] .loginPage .mainLogin{
            background-color: #bdab53;
            color: black;
        }
        [data-bs-theme="dark"] .loginPage .mainLogin{
            background-color: #8d7f3e;
            color: rgb(255, 255, 255);
        }

        /*effects for buttons */
        [data-bs-theme="light"] .loginForm button:hover{
            opacity: 0.8;
        }

        [data-bs-theme="dark"] .loginForm button:hover{
            background-color: #d5c05f;

        }

        /**extra style for the cancel button */
        .loginPage .cancelbtn{
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /**avatar image */
        .loginPage .imgcontainer{
            text-align: center;
            margin-top: 20px;
        }
        .loginPage img.avatar{
            width: 25%;
            height: 25%;
            border-radius: 50%;
        }

        /**padding to containers */
        .loginPage .login{
            padding: 16px;
        }

        .login-hyperlinks {
            color: #04AA6D;
        }
        [data-bs-theme="dark"] .login-hyperlinks {
            color: #1ff2a5;
        }

        /** forgot password */
        span.psw{
            float: right;
            padding-top: 16px;
        }

        /**change style from span and cancel button on extra small */
        @media screen and (max-width: 300px){
            span.psw{
                display: block;
                float: none;
            }
            .loginPage .cancelbtn{
                width:100%;
            }
        }
    </style>    
</x-layout>