<x-layout>
 <div class="loginPage">
 <form action="{{ route('login.store') }}" method="POST" class="loginForm">
 @csrf
 <div class="imgcontainer">
            <img src="{{ asset('images/img_avatar2.png') }}" alt= "Avatar" class ="avatar">
</div>

<div class= "login">
    <label for= "uname"><b>Username</b></label>
    <input id="email" type="text" placeholder= "Enter Username" name="email" required>

<label for= "psw"><b>Password</b></label>
    <input id="psw" type="password" placeholder= "Enter Password" name="password" required>
   
<button type ="submit" class="mainLogin"> Login</button>
<label>
    <input type = "checkbox" checked name="remember"> Remember Me
</label>
</div>


<div class="login extra"> 
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forget <a href="#"> password?</a></span>
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
}

/*inputs */
.loginPage input[type=text], 
.loginPage input[type=password]{
    width:100%;
    padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
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
    margin; 8px 0;
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
    width: 40%;
    border-radius: 50%;
}

/**padding to containers */
.loginPage .login{
    padding: 16px;
}
 .loginPage .login.extra{
    background-color:#f1f1f1;
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