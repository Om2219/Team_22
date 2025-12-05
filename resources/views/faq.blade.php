<x-layout>

    <h1>Frequently Asked Questions</h1>

    <p>This is our FAQs page, where we answer questions by our customers. Below are our most commonly asked questions, and their answers:</p>

    <div class="faq-master">
        <button class="questions" onclick="tog(this)">Can I track my order?</button>
        <div class="answer"><p>You can track your order by going into the <a class="faq-hyperlinks" href="/account">account</a> page and clicking on 'my orders'.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">What is the refund policy?</button>
        <div class="answer"><p>All customers get a 14-day return policy.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">How do I return an item?</button>
        <div class="answer"><p>Send it back in its original packaging, and process a return ticket in the 'accounts' page.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">How do I reset my password?</button>
        <div class="answer"><p>In the <a class="faq-hyperlinks" href="/account">account</a> page, you can reset your account details.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">What do I do if it doesn't let me log in?</button>
        <div class="answer"><p>Contact customer support via the <a class="faq-hyperlinks" href="/contactform">contact us</a> page.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">What should I do if my order doesn't show up?</button>
        <div class="answer"><p>Customer support can be contacted via the <a class="faq-hyperlinks" href="/contactform">contact us</a> page, they should be able to resolve these issues.</p></div> 
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">Do you offer international delivery?</button>
        <div class="answer"><p>We currently only do deliveries in the United Kingdom, and Republic of Ireland.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">What payment methods do you offer?</button>
        <div class="answer"><p>At Roots, we offer card payment (Credit and Debit) and PayPal.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">How long are orders expected to take?</button>
        <div class="answer"><p>Orders are expected to take 1-2 weeks.</p></div>
        <br>
        <hr>

        <br>
        <button class="questions" onclick="tog(this)">When should my refund be processed?</button>
        <div class="answer"><p>Refunds usually take around 5-10 business days.</p></div>
        <br>
    </div>

</x-layout>

<script>
   
function tog(btn) {
    btn.nextElementSibling.classList.toggle("show"); // when any button is clicked, activates the CSS to display the answers
}

</script>