<x-layout>

    @if ($errors->any())
        <div class="alert alert-danger" id="danger-alert">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

    <div class="phone-container">
        <h1>Change phone number</h1>

        <label for="current_phone">Current phone number</label>
            @if(auth()->user()->phone_number)
                <input type="text" value="{{auth()->user()->phone_number}}" disabled class="greyed-out-input">
            @else
                <input type="text" value="No phone number set" disabled class="greyed-out-input">
            @endif

        <hr>

        <form action="{{route('update.phone')}}" method="POST">
            @csrf

            <label for="new_phone">New phone number</label>
            <input type="text" name="new_phone" id="new_phone" placeholder="Enter new phone number" maxlength="15" required>

            <label for="new_phone_confirmation">Confirm new phone number</label>
            <input type="text" name="new_phone_confirmation" id="new_phone_confirmation" placeholder="Enter new phone number again" maxlength="15" required>

            <button type="submit" class="save-btn">Update phone number</button>
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

    //this script basically formats the phone number as +44 7xxx xxxxxx
    //if you type 44, it automatically does +44
    //it puts spaces automatically where they need to be
    //then puts it in the database as +44 7xxx xxxxxx

    document.addEventListener("DOMContentLoaded", function () {
        const formatPhoneNumber = (phone) => {
            phone = phone.replace(/\D/g, '');

            if (phone.startsWith('44')) {
                if (phone.length > 2) {
                    if (phone.length < 6) {
                        phone = '+44 ' + phone.substring(2, 6);
                    } 
                    else if (phone.length <= 12) {
                        phone = '+44 ' + phone.substring(2, 6) + ' ' + phone.substring(6, 12);
                    }
                }
                else if (phone.length <= 3) {
                    phone = '+44';
                }
            }
            return phone;
        };

        document.getElementById('new_phone').addEventListener('input', function (e) {
            e.target.value = formatPhoneNumber(e.target.value);
        });

        document.getElementById('new_phone_confirmation').addEventListener('input', function (e) {
            e.target.value = formatPhoneNumber(e.target.value);
        });

        document.getElementById('save-btn').addEventListener('click', function (e) {
            var phoneNumberInput = document.getElementById('new_phone');

            phoneNumberInput.value = phoneNumberInput.value.replace(/\s+/g, '');
        });
    });
</script>

<style>
    .phone-container {
        width: 600px;
        margin: 40px auto;
        border: 3px solid #7a4900;
        border-radius: 8px;
        padding: 20px;
        background: white;
        text-align: left;
    }

    [data-bs-theme="light"] .phone-container {
        background: white;
    }

    [data-bs-theme="dark"] .phone-container {
        background: rgb(44, 46, 48);
    }

    .phone-container h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
    }

    .phone-container label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 8px;
        display: inline-block;
    }

    .phone-container input[type="text"] {
        width: 100%;
        height: 45px;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: inline-block;
        box-sizing: border-box;
    }

    .phone-container button {
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

    .phone-container a.save-btn {
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

    [data-bs-theme="light"] .phone-container a.save-btn {
        background-color: #bdab53;
        color: black;
    }
    [data-bs-theme="dark"] .phone-container a.save-btn {
        background-color: #8d7f3e;
        color: rgb(255, 255, 255);
    }

    .phone-container button:hover, .phone-container a.save-btn:hover {
        opacity: 0.8;
    }
</style>