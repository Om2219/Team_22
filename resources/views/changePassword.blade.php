<x-layout>

    <a href="/mydetails" class="save-btn">Go back</a>

    <div class="password_container">
        <h1>Change password</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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