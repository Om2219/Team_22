<x-layout>
    <div class="contactUsPage-master modeBoxes">
        <h1>Have some questions?</h1>
        <form method="POST" action="{{route('contactform.submit')}}">
            @csrf
            <div class="contactDetailsParagraph">
                <p>Please enter your details below to send us an email.</p>
            </div>

            <div class="align-inputBoxes">
                <div class="input-box">
                    <p>Name</p>
                    <input class="inputTxt" id="name" type="text" placeholder="enter first and last name" name="name" required>
                </div>
                
                <div class="input-box">
                    <p class="email-alignment">Email</p>
                    <input class="inputTxt" id="email" type="email" placeholder="enter email" name="email" required>
                </div>
            </div>
            
            <div class="input-box">
                <p>Subject</p>
                <input class="inputTxt" id="subject" type="text" placeholder="enter subject" name="subject" required>
            </div>
            
            <div class="input-box">
                <p>Message</p>
                <!--textarea for the purpose of writing an email on websites, so text wraps down-->
                <textarea class="inputTxt" id="message" rows="20" cols="50" type="text" placeholder="enter message" name="message" required></textarea> <!--rows 20 makes the field a suitable height, cols 50 makes the field a suitable width-->
            </div>

            <button class="sendEmail" type="submit">Send Email</button>
        </form>
    </div>
</x-layout>