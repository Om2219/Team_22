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

    <div class="email_container">
        <h1>Change email</h1>
        <form action="{{ route('update.email') }}" method="POST">
            @csrf

            <label for="current_email">Current email</label>
            <input type="email" name="current_email" id="current_email" placeholder="Enter your current email" required>


            <label for="new_email">New email</label>
            <input type="email" name="new_email" id="new_email" placeholder="Enter your new email" required>

            <label for="new_email_confirmation">Confirm new email</label>
            <input type="email" name="new_email_confirmation" id="new_email_confirmation" placeholder="Enter your new email again" required>

            <button type="submit" class="save-btn">Update email</button>
        </form>

        <br>

         <a href="/mydetails" class="save-btn">Go back</a>
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