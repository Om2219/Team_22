<x-layout>
   <div class="admin-wrapper">
        <!-- left side -->
         <div class="message-panel">
        <h2>Messages</h2>
    
    @foreach($messages as $msg)
        @if($msg->reply)
            <div class="card" 
            style="border-left: 5px solid #28a745;"
            onclick="location.href='{{ route('admin.messages', ['id' => $msg->id]) }}'">

                <h3>{{ $msg->name }}</h3>
                <p>{{ $msg->email }}</p>
                <p>{{ $msg->subject }}</p>
                <span>Replied</span>
            </div>
        @else
            <div class="card" 
                style="border-left: 5px solid #ffc107;"
                 onclick="location.href='{{ route('admin.messages', ['id' => $msg->id]) }}'">
                
                <h3>{{ $msg->name }}</h3>
                <p>{{ $msg->email }}</p>
                <p>{{ $msg->subject }}</p>
            </div>
        @endif
    @endforeach
</div>
    
<!--right side -->
<div class="message-view">

    @if(!empty($selectedMessage))
        
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

    @else
    <p> Select a message to view</p>
    @endif
</div>

</main>

</x-layout>
    
<style>

    /**page background */

    .admin-wrapper{
        display: grid;
        grid-template-columns: 35% 65%;
        gap: 20px;
        margin: 30px;
    }

    /**left panel */
    .message-panel{
        background: #eef5f7;
        padding: 20px;
        max-height: 600px;
        border-radius: 15px;
        overflow-y: auto;
    }

    /**right panel */
    .message-view{
        display: flex;
        flex-direction: column;
        gap:20px;
    }
    
    .detail-box h2{
        color: #1f3d2b;
    }





    /* Cards */
.card {
    padding: 18px 20px;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
    transition: all  0.25s ease;
    background: #ffffff;
    position: relative;
}


.card:hover{
    transform:translateY(-5px) scale(1.01);
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
}

/**click effect */
.card:active{
    transform: scale(0.98);
}

/*Text */
.card h3{
    margin-bottom: 5px;
    color: #1f3d28;
}
.card p{
    margin: 0 0 8px;
    font-size: 0.98rem;
    line-height: 1.5;
    color: #2f3d68;
}

/** badge */
.card span{
    position: absolute;
    top: 15px;
    right: 15px;
    background: #28a745;
    color: white;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
}


.card[style*="ffc107"]{
    border-left: 5px solid #ffc107 !important;
}



/**boxes */
.detail-box,.reply-box{
    background: #ffffff;
    border-radius:16px;
    padding: 25px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 6px 15px rgba(0,0,0, 0.05);
}
/**detail text */

.detail-box h2{
    color: #1f3d2b;
}
.detail-box h3{
    margin-top: 10px;
    color: #7a4900;
}


/**staus */
.status{
    display: inline-block;
    margin-top: 8px;
    font-size: 0.85rem;
    padding: 4px 10px;
    border-radius: 20px;
}

.status.open{
    background: #fff3cd;
    color: #856404;
}

.status.read{
    background: #d4edda;
    color: #155724;
}



/**textarea */
textarea{
    width: 100%;
    min-height: 120px;
    padding: 12px;
    border-radius: 12px;
    border: 1px solid #ccc;
    transition: 0.2s;
}

/**buttons */
.cancel-btn{
    padding: 8px 15px;
    border-radius: 6px;
    text-decoration: none;
}

.cancel-btn:hover{
    background-color: #edf6fb;
}

.send-btn{
    padding: 8px 15px;
    background: #2f3d68;
    color: white;
    border: none;
    border-radius: 6px;
}

.send-btn:hover{
    background-color: #1c2f96;
    border-color: #1c2f96;
}
.reply-actions{
    margin-top: 10px;
    display: flex;
    gap: 10px;
}


/** responsive */
@media (max-width: 900px){
    .admin-wrapper{
        grid-template-columns: 1fr;
    }
}

</style>