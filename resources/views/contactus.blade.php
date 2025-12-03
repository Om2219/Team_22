<x-layout>
    <h1>Contact Us</h1>

    <div class="contactUsPage-master">
        <div class="contactus-container">
            <p>Please enter your details below to send us an email.</p>
            <hr>

            <p><label for="name">Name</label></p> <!--each label is in a p element, so labels appear above their respective fields (makes specifically the textarea field look better, and has the others match its styling)-->
            <input id="name" type="text" placeholder="Enter First and Last Names" name="name" required>
            
            <p><label for="email">Email</label></p>
            <input id="email" type="email" placeholder="Enter Email" name="email" required>
            
            <p><label for="subject">Subject</label></p>
            <input id="subject" type="text" placeholder="Enter Message Subject" name="subject" required>
            
            <p><label for="message">Message</label></p>
            <!--textarea for the purpose of writing an email on websites, so text wraps down-->
            <textarea id="message" rows="20" cols="50" placeholder="Enter Message" name="message" required></textarea> <!--rows 20 makes the field a suitable height, cols 50 makes the field a suitable width-->
            <hr>

            <button class="sendEmail">Send Email</button>

            <p>Click <a href="/account">here</a> to go back to the account page.</p>
        </div>
    </div>
</x-layout>