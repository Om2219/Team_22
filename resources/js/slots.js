document.addEventListener("DOMContentLoaded", function () {

    const slotBtn = document.getElementById("spinBtn");
    if (!slotBtn) return;

    const userPointsSpan = document.getElementById("userPoints");
    const betInput = document.getElementById("bet");
    const resultText = document.getElementById("spinResult");

    const reels = [
        document.getElementById("reel1"),
        document.getElementById("reel2"),
        document.getElementById("reel3")
    ];

    const spinAudio = document.getElementById("spinAudio");
    const winAudio = document.getElementById("winAudio");
    const loseAudio = document.getElementById("loseAudio");

    const symbols = ["🍒", "🍌", "🐒"];

    slotBtn.addEventListener("click", async function () {

        let currentPoints = parseInt(userPointsSpan.innerText);
        let bet = parseInt(betInput.value);
        resultText.innerText = "";

        if (!bet || bet <= 0) {
            resultText.innerText = "Enter a valid bet.";
            return;
        }

        if (currentPoints - bet < 1000) {
            resultText.innerText = "MONKEY MUST HAVE 1000 BANNANAS 🦧";
            return;
        }

        slotBtn.disabled = true;

        spinAudio.currentTime = 0;
        spinAudio.play();

        reels.forEach(reel => {
            let reelStripHTML = '';
            for (let i = 0; i < 20; i++) {
                const randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];
                reelStripHTML += `<div class="symbol">${randomSymbol}</div>`;
            }
            reel.innerHTML = `<div class="reelStrip">${reelStripHTML}</div>`;
        });

        const reelStrips = reels.map(reel => reel.querySelector(".reelStrip"));
        reelStrips.forEach(strip => {
            strip.style.animation = "spin 1s linear infinite";
        });

        const spinDurations = [1000, 1500, 1900];

        const finalSymbols = [];
        for (let i = 0; i < reels.length; i++) {
            await new Promise(resolve => setTimeout(resolve, spinDurations[i]));

            reelStrips[i].style.animation = "none";

            const finalSymbol = symbols[Math.floor(Math.random() * symbols.length)];
            finalSymbols.push(finalSymbol);

            reels[i].innerHTML = `<div class="reelStrip"><div class="symbol">${finalSymbol}</div></div>`;
        }

        let multiplier = 0;
        const [r1, r2, r3] = finalSymbols;

        if (r1 === r2 && r2 === r3) multiplier = 10;
        else if (r1 === r2 || r2 === r3 || r1 === r3) multiplier = 2;

        const pointsChange = multiplier > 0 ? bet * multiplier : -bet;

        if (multiplier > 0) {
            winAudio.play();
            resultText.innerText = `WINNERS BET MORE x${multiplier}! You won ${pointsChange} points!`;
        } else {
            loseAudio.play();
            resultText.innerText = `You lost ${bet} points, BUT THE REAL LOSER IS THE ONE THAT GIVES UP. You are only one spin aay from teh big bannanas`;
        }

        spinAudio.pause();

        try {
            const response = await fetch("/slots/spin", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ points: pointsChange })
            });

            const data = await response.json();
            if (data.success) userPointsSpan.innerText = data.points;
            else resultText.innerText = data.message;
        } catch (err) {
            console.error(err);
            resultText.innerText = "Error updating points.";
        }

        slotBtn.disabled = false;
    });
});