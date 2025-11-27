<x-layout>
 
    <style>
       
        .account-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            font-family: 'Arial', sans-serif;
        }

        .page-title {
            color: #4a3b2a;
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 2px solid #6b8e23;
            padding-bottom: 10px;
        }

        
        .details-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .card-header {
            font-size: 1.4rem;
            color: #6b8e23; 
            margin-bottom: 20px;
            font-weight: bold;
        }

        
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #4a3b2a;
            font-weight: bold;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box; 
        }

        .form-input:focus {
            border-color: #6b8e23;
            outline: none;
            box-shadow: 0 0 5px rgba(107, 142, 35, 0.3);
        }

        
        .save-btn {
            background-color: #4a3b2a; 
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .save-btn:hover {
            background-color: #6b8e23; 
        }
        
        .helper-text {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
        }
    </style>

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