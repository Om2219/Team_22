<x-layout>
    @vite('resources/js/slots.js')
    <div class="container mt-4 text-center">
        <h1 class="font-bold mb-5">Banana Blast</h1>

        <p>Your Points: <span id="userPoints">{{ auth()->user()->points }}</span></p>

        <div id="slot-machine" class="flex justify-center gap-4 mb-5">
            <div class="container text-center">
                <div class="row align-items-start">

                    <div class="col reel" id="reel1">
                        <div class = "reelStrip">
                            <div class="symbol">🍒</div>
                            <div class="symbol">🍌</div>
                            <div class="symbol">🐒</div>
                            <div class="symbol">🍒</div>
                            <div class="symbol">🍌</div>
                            <div class="symbol">🐒</div>
                        </div>
                    </div>

                    <div class="col reel" id="reel2">
                        <div class = "reelStrip">
                            <div class="symbol">🍒</div>
                            <div class="symbol">🍌</div>
                            <div class="symbol">🐒</div>
                            <div class="symbol">🍒</div>
                            <div class="symbol">🍌</div>
                            <div class="symbol">🐒</div>
                        </div>
                    </div>

                    <div class="col reel" id="reel3">
                        <div class = "reelStrip">
                            <div class="symbol">🍒</div>
                            <div class="symbol">🍌</div>
                            <div class="symbol">🐒</div>
                            <div class="symbol">🍒</div>
                            <div class="symbol">🍌</div>
                            <div class="symbol">🐒</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <button id="spinBtn" class="headbut">Blast</button>
            <label for="bet" class="font-bold">Your Bet:</label>
            <input type="number" id="bet" value="10" min="10" step="1" class="rounded">
            <span id="betWarning" class="text-red-500"></span>
        </div>

        <p id="spinResult" class="mt-4"></p>

        <audio id="spinAudio" src="{{ asset('Audio/slot_main.mp3') }}"></audio>
        <audio id="winAudio" src="{{ asset('Audio/slots_winner.mp3') }}"></audio>
        <audio id="loseAudio" src="{{ asset('Audio/slots_loser.mp3') }}"></audio>
    </div>
</x-layout>