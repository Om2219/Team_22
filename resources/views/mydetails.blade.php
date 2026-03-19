<x-layout>

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

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
        
        <br>

        <a href="/account" class = "save-btn">Go back</a></button>
    </div>
   
</x-layout>

<script>

    //these scripts set the success and failure messages to fade out
    //after 2 seconds of being on screen
    //looks badboy

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });
</script>