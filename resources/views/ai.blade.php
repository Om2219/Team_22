<div id="chatbot" class="aiSection">
    {{--
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
    --}}



        <div class="chat-container">

            <div class="chat-header d-flex align-items-center">
                <img src="{{ Vite::asset('public/images/monkey.png') }}" class="avatar">
                <span>Silly Monkey</span>
            </div>

            <div id="content-box" class="chat-messages d-flex flex-column p-3 gap-2"></div>

            <div class="chat-input input-group">
                <input id="input" type="text" name="input" placeholder="Type a message..." class="form-control">
                <button id="button-submit" class="btn btn-danger">Send</button>
            </div>

        </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#button-submit').on('click', function(){

        let value = $('#input').val();

        $('#content-box').append(`<div class="message user-message">${value}</div>`);

        $('#input').val("");

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
                    <div class="message bot-message">${data}</div>
                `);
            }
        });

    });
    </script>
</div>