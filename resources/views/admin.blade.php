<x-layout>
 <div class="loginPage">
 <form action="{{ route('login.store') }}" method="POST" class="loginForm">
 @csrf
 <div class="imgcontainer">
            <img src="{{ asset('images/img_avatar2.png') }}" alt= "Admin Avatar" class ="avatar">
</div>

<div class= "login">
    <label for= "uname"><b>Admin Email</b></label>
    <input id="email" type="text" placeholder= "Enter Username" name="email" required>

<label for= "psw"><b>Admin Password</b></label>
    <input id="psw" type="password" placeholder= "Enter Password" name="password" required>
   
<button type ="submit" class="mainLogin"> Login</button>
<label>
    <input type = "checkbox" checked name="remember"> Remember Me
</label>

<div class="login extra"> 
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw"><a class="login-hyperlinks" href="#"> Forget password?</a></span>
</div>

<div class="container_signin">
                <p>Not an admin? <a class="login-hyperlinks" href="/login">Login</a>.</p>
            </div>
</div>
</form>




<style>
/* border form */
.loginPage .loginForm{
    width: 380px;
    margin: 40px auto;
    background: white;
    border: 3px solid #7a4900;
    border-radius: 8px;
    font-family:'Times New Roman', Times, serif; /*possibly subject to change, settled on this for now*/

}
/** padding of the container */
 .container_signin{
    padding: 0 16px 0px;
}

.loginPage .container_signin{
    background: white;
    border-radius: 0 0 8px 8px;
}


/*inputs */
.loginPage input[type=text], 
.loginPage input[type=password]{
    width:100%;
    padding: 12px 20px;
    margin: 8px 0;
     border: 1px solid white;
    display: inline-block;
    box-sizing: border-box;
}

/*style for all buttons */
.loginPage .loginForm button{
    cursor:pointer;
    
}

.loginPage .mainLogin{
    background-color: #bdab53;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    width: 100%;
    font-weight: 600;
    margin-top: 8px;
}
/*effects for buttons */
.loginForm button:hover{
    opacity: 0.8;
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