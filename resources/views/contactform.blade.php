<x-layout>
    <div class="contactUsPage-header">
        <h1>Contact Us</h1><br>
    </div>

    <div class="contactUsPage-master">
        <form method="POST" action="{{route('contactform.submit')}}">
            @csrf
            <p>Please enter your details below to send us an email.</p>
            <hr>

            <div class="input-box">
                <p><label for="name">Name</label></p> <!--each label is in a p element, so labels appear above their respective fields (makes specifically the textarea field look better, and has the others match its styling)-->
                <input id="name" type="text" placeholder="enter first and last name" name="name" required>
            </div>
            
            <div class="input-box">
                <p><label for="email"><br>Email</label></p>
                <input id="email" type="email" placeholder="enter email" name="email" required>
            </div>
            
            <div class="input-box">
                <p><label for="subject"><br>Subject</label></p>
                <input id="subject" type="text" placeholder="enter subject" name="subject" required>
            </div>
            
            <div class="input-box">
                <p><label for="message"><br>Message</label></p>
                <!--textarea for the purpose of writing an email on websites, so text wraps down-->
                <textarea id="message" rows="20" cols="50" type="text" placeholder="enter message" name="message" required></textarea> <!--rows 20 makes the field a suitable height, cols 50 makes the field a suitable width-->
                <hr>
            </div>

            <button class="sendEmail" type="submit">Send Email</button>
        </form>
    </div>
</x-layout>