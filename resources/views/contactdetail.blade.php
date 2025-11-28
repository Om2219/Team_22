<x-layout>
 


    <div class="account-container">
        <h1 class="page-title">Manage Account Details</h1>

        <div class="details-card">
            <h2 class="card-header">📞 Contact Information</h2>
            
            <form action="/account/update-details" method="POST">
                @csrf <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="student@university.ac.uk">
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="07123 456789">
                </div>

                <button type="submit" class="save-btn">Update Contact Info</button>
            </form>
        </div>

        <div class="details-card">
            <h2 class="card-header">🔒 Security & Password</h2>
            
            <form action="/account/update-password" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-input">
                </div>

                <div class="form-group">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-input">
                    <p class="helper-text">Must be at least 8 characters long.</p>
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="new_password_confirmation" class="form-input">
                </div>

                <button type="submit" class="save-btn">Change Password</button>
            </form>
        </div>
    </div>
   
</x-layout>