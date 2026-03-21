<x-layout>

    @if ($errors->any())
        <div class="alert alert-danger" id="danger-alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="password-container">
        <h1>Change password</h1>

        <form action="{{route('update.password')}}" method="POST">
            @csrf

            <label for="current_password">Current password</label>
            <input type="password" name="current_password" id="current_password" placeholder="Enter your current password" required>

            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="new_password" placeholder="Enter your new password" required>

            <label for="new_password_confirmation">Confirm new password</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter your new password again" required>

            <button type="submit" class="save-btn">Update password</button>
        </form>

        <br>

        <div class="back-btn-wrapper">
            <a href="/mydetails" class="save-btn">Go back</a>
        </div>
    </div>

</x-layout>

<script>

    //these scripts set the success and failure messages to fade out
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

<style>
    .password-container {
        width: 600px;
        margin: 40px auto;
        border: 3px solid #7a4900;
        border-radius: 8px;
        padding: 20px;
        background: white;
        text-align: left;
    }

    [data-bs-theme="light"] .password-container {
        background: white;
    }

    [data-bs-theme="dark"] .password-container {
        background: rgb(44, 46, 48);
    }

    .password-container h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
    }

    .password-container label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 8px;
        display: inline-block;
    }

    .password-container input[type="password"] {
        width: 100%;
        height: 45px;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: inline-block;
        box-sizing: border-box;
    }

    .password-container button {
        width: 100%;
        padding: 14px 20px;
        margin-top: 16px;
        background-color: #bdab53;
        color: black;
        font-weight: 600;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .password-container a.save-btn {
        display: inline-block;
        text-align: center;
        margin-top: 15px;
        font-weight: 600;
        padding: 12px 20px;
        background-color: #bdab53;
        color: black;
        border-radius: 4px;
        text-decoration: none;
    }

    [data-bs-theme="light"] .password-container a.save-btn {
        background-color: #bdab53;
        color: black;
    }
    [data-bs-theme="dark"] .password-container a.save-btn {
        background-color: #8d7f3e;
        color: rgb(255, 255, 255);
    }

    .password-container button:hover, .password-container a.save-btn:hover {
        opacity: 0.8;
    }
</style>