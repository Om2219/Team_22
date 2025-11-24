<x-layout>
 
    <div >
    <p> This is our FAQs page, where we answer questions by our customers. Below are our most commonly asked questions, and their answers:</p>
    </div>

    <div class="faq-master">
        <button class="questions" onclick="tog(this)">Can I track my order?</button>
        <div class="answer"><p>You can track your order by going into the 'accounts' page and clicking on 'my orders'.</p></div>

        <br>
        <button class="questions" onclick="tog(this)">What is the refund policy?</button>
        <div class="answer"><p>All customers get a 14-day return policy.</p></div>

        <br>
        <button class="questions" onclick="tog(this)">How do I return an item?</button>
        <div class="answer"><p>Send it back in its original packaging, and process a return ticket in the 'accounts' page.</p></div>

        <br>
        <button class="questions" onclick="tog(this)">How do I reset my password?</button>
        <div class="answer"><p>In the 'accounts' page, you can reset your account details.</p></div>

        <br>
        <button class="questions" onclick="tog(this)">What do I do if it doesn't let me log in?</button>
        <div class="answer"><p>Contact customer support via the '' page.</p></div> <!--Within the '', insert a hyperlink-->
    </div>

</x-layout>

<script>
   
function tog(btn) {
    btn.nextElementSibling.classList.toggle("show");
}

</script>