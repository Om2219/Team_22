<x-layout>
    <div class="loginPage">
        @if ($errors->any())
            <div class="alert alert-danger" id="danger-alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="loginForm" method="POST" action="{{route('forgotPassword.update')}}">
            @csrf
            <div class="imgcontainer">
                <img src="{{asset('images/img_avatar2.png')}}" class="avatar">
            </div>

            <div class="login">
                <div class="top-stuff">
                    <h2>Forgot Password</h2>
                    <p>Enter your email and choose a new password</p>
                </div>

                <hr>

                <label for="email"><b>Email address</b></label>
                <input type="text" name="email" placeholder="Enter email address" required>

                <label for="new_password"><b>New Password</b></label>
                <input type="password" name="new_password" placeholder="Enter new password" required>

                <label for="new_password_confirmation"><b>Confirm Password</b></label>
                <input type="password" name="new_password_confirmation" placeholder="Confirm new password" required>

                <button type="submit" class="mainLogin">Reset Password</button>

                <hr>

                <div class="login-footer">
                    <p>Want to go back? <a class="login-hyperlinks" href="{{route('login')}}">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</x-layout>


<style>

    /*reusing this css*/


    /* border form */
    .loginPage .loginForm{
        width: 600px;
        margin: 40px auto;
        border: 3px solid #7a4900;
        border-radius: 8px;
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

    .login-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        margin-right: 10px;
    }

    .top-stuff {
        text-align:center; 
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

<script>

    //this script sets the failure message to fade out
    //after 2 seconds of being on screen
    //looks badboy

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('danger-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });
</script>