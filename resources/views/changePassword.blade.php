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

    <div class="password_container">
        <h1>Change password</h1>

        <form action="{{ route('update.password') }}" method="POST">
            @csrf

            <label for="current_password">Current password</label>
            <input type="password" name="current_password" id="current_password" placeholder="Enter your current password" required>

            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="new_password" placeholder="Enter your new password" required>

            <label for="new_password_confirmation">Confirm new password</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter your new password again" required>

            <button type="submit" class="save-btn">Update password</button>
        </form>
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