<x-layout>

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" id="danger-alert">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif
    

    <div class="refund-container">
        <h1>Refund Ticket for Order {{$order->order_ref}}</h1>
        <div class="refund-panels">
            <div class="refund-form modeBoxes">
                <form action="{{route('refund.submit', $order->order_ref)}}" method="POST">
                    @csrf

                    <div class="reference_number">
                        <label for="order_ref">Order reference: </label>
                        <input type="text" class="form-control" value="{{$order->order_ref}}" disabled class="greyed-out-input">
                    </div>

                    <br>

                    <div class="refund_reason">
                        <label for="reason">Refund reason: </label>
                        <select name="reason" id="reason" class="form-control" required>
                            <option value="damaged">Product was damaged on arrival</option>
                            <option value="wrong_item">Received wrong item</option>
                            <option value="not_satisfied">Not happy with the product</option>
                            <option value="buyers-remorse">No longer want the product</option>
                            <option value="gift">Product was a gift that I no longer want</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <br>

                    <label for="detailed_reason">Detailed reason (optional): </label>
                    <textarea name="detailed_reason" id="detailed_reason" rows="4" class="form-control" placeholder="I want to issue a refund because..."></textarea>

                    <br>

                    <button type="submit" class="save-btn">Submit Refund Request</button>
                </form>
            </div>

            <div class="order-summary modeBoxes">
                <h3>Order Summary</h3>

                @foreach ($items as $product)
                    <div class="summary-item">
                        <img src="{{asset('images/products/' . $product->product_image)}}" 
                            alt="{{$product->name}}" width="80">

                        <div class="summary-details">
                            <p><strong>{{$product->name}}</strong></p>
                            <p>Qty: {{$product->quantity}}</p>
                            <p>£{{number_format($product->price * $product->quantity, 2)}}</p>
                        </div>
                    </div>
                @endforeach

                <p class="final-total">
                    <strong>Total: £{{number_format($order->total, 2)}}</strong>
                </p>
            </div>
        </div>
    </div>

    <br>

    <div class="back-btn-wrapper">
        <a href="{{ route('orders.details', $order->order_ref) }}" class="save-btn">Back to Order Details</a>
    </div>

</x-layout>

<script>

    //these scripts set the success and failure messages to fade out
    //after 2 seconds of being on screen
    //looks badboy

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('danger-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });
</script>

<style>
    .refund-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 25px;
        padding: 30px 20px;
        text-align: center;
    }

    .refund-panels {
        display: flex;
        gap: 30px;
        width: 100%;
        max-width: 1200px;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .refund-form {
        display: flex;
        flex: 1;
        flex-direction: column;
        gap: 20px;
        min-width: 300px;
        max-width: 600px;
        width: 100%;
        padding: 30px;
        border: 1px solid lightgray;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        text-align: left;
    }

    .order-summary {
        display: flex;
        flex: 1;
        flex-direction: column;
        gap: 20px;
        min-width: 300px;
        max-width: 600px;
        width: 80%;
        padding: 30px;
        border: 1px solid lightgray;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        text-align: left;
    }

    .order-summary h3 {
        padding-bottom: 15px;
    }

</style>