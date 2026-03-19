<x-layout>
   <div class="Contact-Us">

<main class="Contact_Us">
    <h1>Contact Messages</h1>
    
<section class="stats_1">
    @foreach($messages as $msg)
        @if($msg->reply)
            <div class="card" style="border-left-color: #28a745; opacity: 0.5;">
                <h3>{{ $msg->name }}</h3>
                <p>{{ $msg->email }}</p>
                <p>{{ $msg->subject }}</p>
                <span style="background: #28a745; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem;">Replied</span>
            </div>
        @else
            <div class="card" style="border-left-color: #ffc107; cursor: pointer;" onclick="location.href='{{ route('admin.messages', ['id' => $msg->id]) }}'">
                <h3>{{ $msg->name }}</h3>
                <p>{{ $msg->email }}</p>
                <p>{{ $msg->subject }}</p>
            </div>
        @endif
    @endforeach
</section>

@if(isset($selectedMessage))
<section class="message-detail">
    <div class="detail-box">
        <h2>{{ $selectedMessage->name }}</h2>
        <p>{{ $selectedMessage->email }}</p>
        <h3>{{ $selectedMessage->subject }}</h3>
        <span class="status {{ $selectedMessage->is_read ? 'read' : 'open' }}">
            {{ $selectedMessage->is_read ? 'Read' : 'Open' }}
        </span>

        <div class="message-text">
            <p>{{ $selectedMessage->message }}</p>
        </div>
    </div>

    <div class="reply-box">
        <h3>Reply to customer</h3>
        <form action="{{ route('admin.messages.reply', $selectedMessage->id) }}" method="POST">
            @csrf
            <textarea name="reply" placeholder="Type your reply here......" required></textarea>

            <div class="reply-actions">
                <a href="{{ route('admin.messages') }}" class="cancel-btn">Cancel</a>
                <button type="submit" class="send-btn">Reply</button>
            </div>
        </form>
    </div>

</section>
@endif

</main>
</div>
    
</x-layout>
<style>

    .Contact-Us{
        display: flex;
        min-height: 100vh;
        background-color:#d8eef8; /* light blue */
        font-family: 'Segoe UI', sans-serif;
    }


.Contact_Us{
flex:1;
padding: 40px;
background-color: #d8eef8;
 font-family: 'Segoe UI', sans-serif;
color: #0b1f78;
}

.Contact_Us h1{
    margin: 0 0 8px;
    font-size: 2.2rem;
    color:#0b1f78;
}

.Contact_Us p{
 margin: 0 0 28px;
    font-size: 1rem;
    color:#3d4a7a;
}

.stats_1{
    display: grid;
    grid-template-columns:repeat(3,1fr);
    gap: 18px;
    margin-bottom: 30px;
    margin-top: 20px;
}

.card{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(11,31,120,0.10);
    border-left: 6px solid #0b1f78;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}


.card:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(11,31,120,0.16);
}

.card h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #0b1f78;
    letter-spacing: 0.2px;

}

.card p{
    margin: 0 0 8px;
    font-size: 0.98rem;
    line-height: 1.5;
    color: #2f3d68;
}

.message-detail{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    align-items: start;
}

.detail-box,.reply-box{
    background: #ffffff;
    border-radius:14px;
    padding: 24px;
    box-shadow: 0 8px 18px rgba(11,32,120, 0.10);
}
.detail-box h2{
    margin: 0 0 10px;
    font-size: 1.6rem;
    color: #0b1f78;

}
.detail-box h3{
     margin: 12px 0 10px;
    font-size: 1.2rem;
    color: #0b1f78;
}

.detail-box p{
     margin: 0 0 12px;
    font-size: 1rem;
    color: #3d4a7a;
    line-height: 1.6;
}


.status{
    display:inline-block;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 16px;
}

.status.open{
    background-color: #dfe8ff;
    color: #0b1f78;
}

.message-text{
    margin-top:10px;
    padding-top:14px;
    border-top: 1px solid #c7dff0;
}

.message-text p{
    margin: 0;
    color: #2f3d68;
    line-height: 1.7;
}

.reply-box h3{
 margin: 0 0 16px;
 font-size: 1.2rem;
 color: #0b1f78;
}

.reply-box textarea{
    width: 100%;
    min-height: 160px;
    border: 2px solid #b8d6e8;
    border-radius: 12px;
    padding: 14px;
    font-size: 0.98rem;
    color: #2f3d68;
    background-color: #ffffff;
    resize: vertical;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}


.reply-box textarea:focus{
    outline: none;
    border-color: #0b1f78;
    box-shadow: 0 0 0 3px rgba(11,21,120, 0.10);
}

.reply-actions{
    display:flex;
    gap:12px;
    margin-top:18px;

}
.cancel-btn, .send-btn{
    padding: 11px 22px;
    border-radius: 10px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.cancel-btn{
    background-color: #ffffff;
    color: #0b1f78;
    border: 2px solid #b8d6e8;
}

.cancel-btn:hover{
    background-color: #edf6fb;
}

.send-btn{
    background-color: #0b1f78;
    color: #d8eef8;
    border: 2px solid #0b1f78;
}

.send-btn:hover{
    background-color: #1c2f96;
    border-color: #1c2f96;
}



/**Responsive */
@media (max-width:900px){
    .stats_1{
        grid-template-columns: 1fr;
    }

    .message-detail{
        grid-template-columns: 1fr;
    }

    .Contact_Us{
        padding: 22px;
    }
    .Contact_Us h1{
        font-size: 1.9rem;
    }
}

    </style>
