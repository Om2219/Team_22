<x-layout>
    <!-- Essentially another version of login.blade but only with password fields -->

    <div class="loginPage">
<!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">
                {{session('success')}}
            </div>
        @endif
        <!-- Error message -->
        @if ($errors->any())
            <div class="alert alert-danger" id="danger-alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- The form so admins can set their new passwords -->
        <form class="loginForm" method="POST" action="{{ route('admin.firstLogin.update') }}">
            @csrf
            <!-- default image -->
            <div class="imgcontainer">
                <img src="{{asset('images/img_avatar2.png')}}" alt="Avatar" class="avatar">
            </div>

            <div class="login">
                <div class="top-stuff">
                    <h2>Welcome</h2>
                    <p>Please set your new password to continue</p>
                </div>

                <hr>
                <!-- Set new passwords + confirm, must meet requirements -->
                <label for="new_password"><b>New Password</b></label>
            <input type="password" name="new_password" placeholder="Enter new password" required>
                <label for="new_password_confirmation"><b>Confirm Password</b></label>
                <input type="password" name="new_password_confirmation" placeholder="Confirm new password" required>

                <button type="submit" class="mainLogin">Set Password</button>

                <hr>
                <!-- To go back to normal login incase they nned to -->
                <div class="login-footer">
                    <p><a class="login-hyperlinks" href="{{ route('login') }}">Back to Login</a></p>
                </div>
            </div>
        </form>
    </div>

</x-layout>

/* Reusing the css from login for a similar looking password reset */
<style>
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

    /* inputs */
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

    /* style for all buttons */
    .loginPage .loginForm button{
        cursor: pointer;
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

    /* effects for buttons */
    [data-bs-theme="light"] .loginForm button:hover{
        opacity: 0.8;
    }

    [data-bs-theme="dark"] .loginForm button:hover{
        background-color: #d5c05f;
    }

    /* avatar image */
    .loginPage .imgcontainer{
        text-align: center;
        margin-top: 20px;
    }
    .loginPage img.avatar{
        width: 25%;
        height: 25%;
        border-radius: 50%;
    }

    /* padding to containers */
    .loginPage .login{
        padding: 16px;
    }

    .login-hyperlinks {
        color: #04AA6D;
    }
    [data-bs-theme="dark"] .login-hyperlinks {
        color: #1ff2a5;
    }

    .login-footer {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .top-stuff {
        text-align: center; 
    }
</style>