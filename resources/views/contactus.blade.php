<x-layout>
    <h1>Contact Us</h1>

    <div class="contactUsPage-master">
        <div class="contactus-container">
            <p>Please enter your details below to send us an email.</p>
            <hr>

            <p><label for="name">Name</label></p>
            <input id="name" type="text" placeholder="Enter First and Last Names" name="name" required>
            
            <p><label for="email">Email</label></p>
            <input id="email" type="email" placeholder="Enter Email" name="email" required>
            
            <p><label for="subject">Subject</label></p>
            <input id="subject" type="text" placeholder="Enter Message Subject" name="subject" required>
            
            <p><label for="message">Message</label></p>
            <textarea id="message" rows="20" cols="50" placeholder="Enter Message" name="message" required></textarea> <!--rows 20 and cols 50 to make the field a suitable width and height-->
            <!--textarea for the purpose of writing an email on websites-->
            <hr>

            <button class="sendEmail">Send Email</button>

            <p>Click <a href="/account">here</a> to go back to the account page.</p>
        </div>
    </div>
</x-layout>