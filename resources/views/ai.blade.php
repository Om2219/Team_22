{{-- <x-layout>
    <div>

        <div>
            <img src="{{ Vite::asset('public/images/monkey.png') }}" >
            Milky
        </div>

        <div></div>
        <div id ="content-box">

            <div>
                BANANANS
            </div>

            <div>
                BANANANS
            </div>
        </div>

        <div>
           <div>
               <input id="input" type="text" name="input">
           </div>
           <button id="button-submit">Send</button>
        </div>

    </div>
</x-layout> --}}


<x-layout>
    <div class="chat-container">

        <div class="chat-header">
            <img src="{{ Vite::asset('public/images/monkey.png') }}" class="avatar">
            <span>Silly Monkey</span>
        </div>

        <div id="content-box" class="chat-messages"></div>

        <div class="chat-input">
            <input id="input" type="text" name="input" placeholder="Type a message...">
            <button id="button-submit">Send</button>
        </div>

    </div>
</x-layout>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

$('#button-submit').on('click', function(){

    let value = $('#input').val();

    $('#content-box').append(`<div>${value}</div>`);

    $.ajax({
        type: 'POST',
        url: '{{url("send")}}',
        data: { input: value },

        success: function(data){
            $('#content-box').append(`
                <div>
                    <img src="{{ Vite::asset('public/images/monkey.png') }}" class="bob">
                    Silly Monkey
                </div>
                <div>${data}</div>
            `);
        }
    });

});
</script>