<x-layout>

    <a href="/mydetails" class="save-btn">Go back</a>

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
    </div>
</x-layout>