<x-layout>
    <h1>Buy Rewards with points</h1>

    <p><strong>Your points:</strong> {{ $user->points }}</p>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <h2>Available offers</h2>

    <div style="display:grid; gap:12px; max-width:700px;">
        @foreach($offers as $offer)
            <div style="border:1px solid #333; padding:12px; border-radius:10px;">
                <p style="margin:0;"><strong>{{ $offer['name'] }}</strong></p>
                <p style="margin:0;">Cost: {{ $offer['cost_points'] }} points</p>

                <form method="POST" action="{{ route('points.vouchers.redeem') }}" style="margin-top:8px;">
                    @csrf
                    <input type="hidden" name="offer_id" value="{{ $offer['id'] }}">

                    <button class="save-btn" type="submit"
                        {{ $user->points < $offer['cost_points'] ? 'disabled' : '' }}>
                        Redeem
                    </button>
                </form>
            </div>
        @endforeach
    </div>

    <h2 style="margin-top:24px;">My generated voucher codes</h2>

    @if($myVouchers->isEmpty())
        <p>You don't have any voucher codes yet.</p>
    @else
        <ul>
            @foreach($myVouchers as $v)
                <li>
                    <strong>{{ $v->code }}</strong>
                    — {{ $v->type }} {{ $v->value }}
                    @if($v->min_spend)
                        (min £{{ number_format($v->min_spend, 2) }})
                    @endif
                    — expires {{ optional($v->expires_at)->format('d M Y') }}

                    @if($v->used_at)
                        <span style="color:gray;">(used)</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
