<x-layout>
 <div class="registerPage">
    <form action="{{ route('register.store') }}" method="POST" class="RegisterForm">
        @csrf

        <div class="imgcontainer">
            <img src="{{ asset('images/img_avatar2.png') }}" alt="Avatar" class="avatar">
        </div>

        <div class="register">
            <h1>Register</h1>
            <p>Please fill in this form to create an account</p>

            <hr>
            <label for="email"><b>Email</b></label>
            <input id="email" type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input id="psw" type="password" placeholder="Enter Password" name="password" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="password_confirmation" id="psw-repeat" required>

            <hr>

            <p>By creating an account you are agree to our <a class="register-hyperlinks" href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="registerbtn">Register</button>

            <div class="container_signin">
                <p>Already have an account? <a class="register-hyperlinks" href="/login">Login</a>.</p>
            </div>
        </div>

    </form>

<style>

    /* border form */
.registerPage .RegisterForm{
    width: 380px;
    margin: 40px auto;
    background: white;
    border: 3px solid #7a4900;
    border-radius: 8px;
}


/** padding of the container */
 .container_signin{
    padding: 0 16px 0px;
}

.registerPage .container_signin{
    background: white;
    border-radius: 0 0 8px 8px;
}

/*inputs */
.registerPage input[type=text], 
.registerPage input[type=password]{
    width:100%;
    padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid white;
    display: inline-block;
    box-sizing: border-box;
}

/*style for all buttons */
.registerPage .RegisterForm button{
    cursor:pointer;
}
.registerPage .mainLogin{
    background-color: #bdab53;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    width: 100%;
    font-weight: 600;
    margin-top: 8px;
}
.RegisterForm button:hover{
    opacity: 0.8;
}
.registerPage .registerbtn{
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/**avatar image */
.registerPage .imgcontainer{
    text-align: center;
    margin-top: 20px;
}
.registerPage img.avatar{
    width: 40%;
    border-radius: 50%;
}


/**padding to containers */
.registerPage .register{
    padding: 16px;
}
.registerPage .register.extra{
    background-color:#f1f1f1;
}

.register-hyperlinks {
    color: #04AA6D;
}
/** register */
span.psw{
    float: right;
    padding-top: 16px;
}
@media screen and (max-width: 300px){
    span.psw{
        display: block;
        float: none;
    }
    .registerPage .registerbtn{
        width:100%;
    }
}
</style>    

</x-layout>
