<x-layout>

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" id="danger-alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="details-container">

        <div class="details-section modeBoxes">
            <div class="header-section">
                <h1>Hello, {{auth()->user()->forename}} 😊</h1>
                <h3>Manage your account details</h3>
            </div>

            <hr>

            <div class="email-section">
                <h2>Email address</h2>
                <label>Email:</label>
                <input type="text" value="{{$censoredemail}}" disabled class="greyed-out-input">
                <br><br>
                <a href="{{route('change.email')}}" class="save-btn">Change email</a>
            </div>

            <hr>

            <div class="password-section">
                <h2>Password</h2>
                <a href="{{route('change.password')}}" class="save-btn">Change password</a>
            </div>

            <hr>

            <div class="name-section">
                <h2>Name & title</h2>
                <a href="{{route('change.name')}}" class="save-btn">Change name & title</a>
            </div>

            <hr>

            <div class="phone-section">
                <h2>Phone number</h2>
                @if ($censoredphone)
                    <label>Phone number:</label>
                    <input type="text" value="{{$censoredphone}}" disabled class="greyed-out-input">
                    <br><br>
                @else
                    <p style="color: gray;">No phone number set</p>
                @endif
                <a href="{{route('change.phone')}}" class="save-btn">Set / change phone number</a>
            </div>
        </div>

        <div class="pfp-panel modeBoxes">
            <div class="profile-section">
                <h2>Profile picture</h2>

                @if(auth()->user()->profile_picture_path)
                    <img id="pfp-preview" src="{{asset(auth()->user()->profile_picture_path)}}" alt="Profile picture" class="pfp">
                    <br><br>
                    <form action="{{route('pfp.remove')}}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="save-btn" onclick="return confirm('Are you sure you want to remove your profile picture?');">
                            Remove profile picture
                        </button>
                    </form>
                @else
                    <p id="no-pfp-text" style="color: gray;">No profile picture set</p>
                    <img id="pfp-preview" style="display:none;" width="100">
                @endif

                <br><br>

                <form id="pfp-form" action="{{route('pfp.upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="pfp-input" name="profile_picture" accept=".jpeg,.jpg,.png,.gif" hidden>
                    <button type="button" class="save-btn" onclick="document.getElementById('pfp-input').click();">
                        Set profile picture
                    </button>
                </form>
            </div>
        </div>

    </div>

    <div class="back-btn-wrapper">
        <a href="/account" class="save-btn">Go back</a>
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

    //this script lets the user input a file, and it sets the file as the profile picture

    document.getElementById('pfp-input').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (!file) return;

        const img = new Image();
        const objectUrl = URL.createObjectURL(file);

        img.onload = function () {
            document.getElementById('pfp-form').submit();
        };

        img.src = objectUrl;
    });
</script>

<style>
    .details-container {
        display: flex;
        flex-direction: row;
        gap: 30px;
        padding: 30px;
        justify-content: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .details-section {
        flex: 1;
        min-width: 300px;
        max-width: 700px;
        padding: 30px;
        border: 1px solid lightgray;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        text-align: left;
    }

    .pfp-panel {
        width: 300px;
        height: 60%;
        padding: 30px;
        border: 1px solid lightgray;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        text-align: center;
    }

    .details-container input { 
        margin-top: 10px; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
        outline: none; 
    }

    .pfp {
        width: 200px;
        height: 200px;
        object-fit: cover;
        object-position: center;
        border-radius: 50%;
    }
</style>