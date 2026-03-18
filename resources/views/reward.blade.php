<x-layout>
     <div class="back-btn-wrapper">
        <a href="/account" class="save-btn">Go back</a>
    </div>
    <div class = "container">



        <div class="card shadow-lg border-0 mb-4 text-center">

            <h1  class = "display-4 fw-bold text-secondary">Your Points: {{ auth()->user()->points }}</h1>

        </div>

        <div class="row g-4">

            <div class="col-md-4 ">
                <div class="row row-cols-lg-1 g-1">
                    <div class="card text-center border-4 shadow-sm">
                        <div class="card-body"> 
                            <img id="sillyMonkey" src="{{ asset('images/spinny.png') }}">
                            <h4 class="mt-3">Daily Spin</h4>
                            <p class="text-secondary">Spin the wheel once a day for free points.</p>
                            <a href="/dailySpin" class="btn btn-success w-100">Spin Now</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="row row-cols-lg-1 g-1">
                    <div class="card text-center border-4 shadow-sm"> 
                        <div class="card-body"> 
                            <img class="invImg" id="sillyMonkey" src="{{ asset('images/sixSeven.png') }}">                    
                            <h4 class="mt-3">Feeling Lucky?</h4>
                            <p class="text-secondary">Try your luck and risk points for that gold plushi</p>
                            <a href="/slots" class="btn btn-success w-100">Play Here</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row row-cols-lg-1 g-1">
                    <div class="card text-center border-4 shadow-sm">       
                        <div class="card-body"> 
                            <img id="sillyMonkey" src="{{ asset('images/vouchers.png') }}">   
                            <h4 class="mt-3">Redeem Vouchers</h4>
                            <p class="text-secondary">Exchange your points for vouchers</p>
                            <a href="{{ route('points.vouchers') }}" class="btn btn-success w-100"> View Vouchers </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>