<x-layout>

    <a href="/account" class = "save-btn">Go back</a></button>

    <div class="details_container">
        <h1>Manage Account Details</h1>

        <div class="email_section">
            <h2>Email address</h2>
            <label for="email">Email: </label>
            <input type="text" id="email" value="{{$censoredemail}}" disabled class="greyed-out-input">
            <br><br><br>

            <a href="/changeEmail" class = "save-btn">Change email</a></button>
        </div>

        <div class="password_section">
            <br>
            <h2>Password</h2>
            <br>

            <a href="/changePassword" class = "save-btn">Change password</a></button>
        </div>
    </div>
   
</x-layout>