import './bootstrap';

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

// document.addEventListener("DOMContentLoaded", () => {

//     const video = document.getElementById("bg-video");
//     const spacer = document.querySelector(".scroll-spacer");

//     if (!video || !spacer) return;

//     video.addEventListener("loadedmetadata", () => {

//         video.play().then(() => {
//             video.pause();
//             video.currentTime = 0;

//             gsap.to(video, {
//                 currentTime: video.duration,
//                 ease: "none",
//                 scrollTrigger: {
//                     trigger: spacer,
//                     start: "top top",
//                     end: "bottom bottom",
//                     scrub: true,
//                     markers: false, // check to see if video plays ( set to true to check)
//                 }
//             });

//         }).catch((err) => {
//             console.log("Autoplay blocked:", err);
//         });

//     });

// });

document.addEventListener("DOMContentLoaded", () => {

    gsap.registerPlugin(ScrollTrigger);

    gsap.set("#pen", { rotation: -90 }); 

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".dos",
            start: "top top",
            end: "+=5000",
            scrub: 1,
            markers: false
        }
    });

    tl.to({}, { duration: 0.29 });

    //pen animation

    tl.to("#pen", {
        x: "46vw",
        y: "-50vh",
        rotation: 0,
        ease: "power2.inOut"
    })

    .to("#pen", {
        x: "85vw",
        y: "-10vh",
        rotation: 90,
        ease: "power2.inOut",
        duration: 0.29
    })

    .to("#pen", {
        x: "50vw",
        y: "40vh",
        rotation: 180,
        ease: "power2.inOut"
    });

    //block animations

    //block uno 🐒

    gsap.timeline({
        scrollTrigger: {
            trigger: ".blockUno",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true
        }
    })
    .fromTo(".blockUno",
        { x: 200, opacity: 0 },
        { x: 0, opacity: 1, ease: "none" }
    )
    .to(".blockUno",
        { x: -100, opacity: 0, ease: "none" }
    );

    //block dos 🍌

    gsap.timeline({
        scrollTrigger: {
            trigger: ".blockDos",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true
        }
    })
    .fromTo(".blockDos",
        { y: 200, opacity: 0 },
        { y: 175, opacity: 1, ease: "none" }
    )
    .to(".blockDos",
        { y: -100, opacity: 0, ease: "none" }
    );

    //block tres 🐒🍌

    gsap.timeline({
        scrollTrigger: {
            trigger: ".blocktres",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true
        }
    })
    .fromTo(".blocktres",
        { x: -200, opacity: 0 },
        { x: 0, opacity: 1, ease: "none" }
    )
    .to(".blocktres",
        { x: 100, opacity: 0, ease: "none" }
    );

});


const wheel = document.querySelector(".wheel");
const spinBtn = document.getElementById("spin");
const resultDiv = document.getElementById("result");

const segments = [
    {name: "1000", value: 1000},
    {name: "220", value: 220},
    {name: "0", value: 0},
    {name: "290", value: 290},
    {name: "29", value: 29},
    {name: "67", value: 67},
    {name: "670", value: 670},
    {name: "10", value: 10}
];

spinBtn.addEventListener("click", async function() {
    spinBtn.disabled = true;

    const spinResponse = await fetch("/dailySpin", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });
    const spinData = await spinResponse.json();

    if (!spinResponse.ok) {
        let errorData;
        try {
            errorData = await spinResponse.json();
        } catch {
            errorData = { error: "How Greedy, you only get one spin per day" };
        }
        alert(errorData.error);
        spinBtn.disabled = false;
        return;
    }

    const winningIndex = Math.floor(Math.random() * segments.length);
    const winningSegment = segments[winningIndex];

    const segmentAngle = 360 / segments.length;
    const targetAngle = 360 - (winningIndex * segmentAngle) - segmentAngle / 2;

    const extraInitialRotation = 45; 
    const extraSpins = 5 * 360;
    const totalRotation = extraSpins + extraInitialRotation + targetAngle;

    wheel.style.transition = "transform 4s cubic-bezier(0.33, 1, 0.68, 1)"; 
    wheel.style.transform = `rotate(${totalRotation}deg)`;

    setTimeout(async () => {
        const pointsResponse = await fetch(`/awardPoints/${winningSegment.value}`, {
            method: "POST",
            headers: {"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')}
        });
        const pointsData = await pointsResponse.json();

        resultDiv.innerHTML = `You won ${winningSegment.value} points! <br>Your Points: ${pointsData.newPoints}`;
        spinBtn.disabled = false;
    }, 4000);
});
