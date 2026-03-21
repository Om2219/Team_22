<x-layout>
    <div class="registerPage">
        @if ($errors->any())
            <div class="alert alert-danger" id="danger-alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{  $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register.store') }}" method="POST" class="RegisterForm">
            @csrf

            <div class="imgcontainer">
                <img src="{{ asset('images/img_avatar2.png') }}" alt="Avatar" class="avatar">
            </div>

            <div class="register">
                <div class="top-stuff">
                    <h2>Register</h1>
                    <p>Please fill in this form to create an account</p>
                </div>
                <hr>

                <div class="name-entry-labels">
                    <label for="title"><b>Title</b></label>
                    <label for="forename"><b>Forename</b></label>
                    <label for="surname"><b>Surname</b></label>
                </div>

                <div class="name-entry-inputs">
                    <select id="title" name="title" required>
                        <option value=""></option>
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Miss.">Miss.</option>
                        <option value="Mx.">Mx.</option>
                    </select>

                    <input id="forename" type="text" placeholder="Enter forename" name="forename" required>

                    <input id="surname" type="text" placeholder="Enter surname" name="surname" required>
                </div>


                <label for="email"><b>Email</b></label>
                <input id="email" type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input id="psw" type="password" placeholder="Enter Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="password_confirmation" id="psw-repeat" required>

                <hr>

                <p>By creating an account you are agree to our <a class="register-hyperlinks" href="/termsandprivacy">Terms & Privacy</a>.</p>

                <button type="submit" class="mainLogin">Register</button>

                <div class="container_signin">
                    <p>Already have an account? <a class="register-hyperlinks" href="/login">Login</a>.</p>
                </div>
            </div>

        </form>
    </div>   
</x-layout>

<style>
    /* border form */
    .registerPage .RegisterForm{
        width: 600px;
        margin: 40px auto;
        border: 3px solid #7a4900;
        border-radius: 8px;
    }
    
    [data-bs-theme="light"] .registerPage .RegisterForm{
        background: white;
    }
    [data-bs-theme="dark"] .registerPage .RegisterForm{
        background: rgb(44, 46, 48);
    }
    
    /** padding of the container */
    .container_signin{
        margin-left: 10px;
        margin-top: 10px;
    }

    .registerPage .container_signin{
        border-radius: 0 0 8px 8px;
    }

    /*inputs */
    .registerPage input[type=text], 
    .registerPage input[type=password]{
        width: 100%;
        height: 45px;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: inline-block;
        box-sizing: border-box;
    }

    .registerPage .name-entry-labels {
        display: flex;
        justify-content: space-between;
        padding-top: 5px;
        margin-bottom: 8px;
    }

    .registerPage .name-entry-labels label {
        width: 30%;
        text-align: center;
    }

    .registerPage .name-entry-inputs {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .registerPage .name-entry-inputs input[type="text"], .registerPage .name-entry-inputs select {
        width: 30%;
        height: 45px;
        padding: 12px 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /*style for all buttons */
    .registerPage .RegisterForm button{
        cursor:pointer;
    }
    .registerPage .mainLogin{
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        width: 100%;
        font-weight: 600;
        margin-top: 8px;
    }

    [data-bs-theme="light"] .registerPage .mainLogin{
        background-color: #bdab53;
        color: black;
    }
    [data-bs-theme="dark"] .registerPage .mainLogin{
        background-color: #8d7f3e;
        color: rgb(255, 255, 255);
    }
    .RegisterForm button:hover{
        opacity: 0.8;
    }

    /**avatar image */
    .registerPage .imgcontainer{
        text-align: center;
        margin-top: 20px;
    }
    .registerPage img.avatar{
        width: 25%;
        height: 25%;
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

    [data-bs-theme="dark"] .register-hyperlinks {
        color: #1ff2a5
    }
    /** register */
    span.psw{
        float: right;
        padding-top: 16px;
    }

    .top-stuff {
        text-align:center; 
    }

    @media screen and (max-width: 300px){
        span.psw{
            display: block;
            float: none;
        }
        .registerPage .mainLogin{
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