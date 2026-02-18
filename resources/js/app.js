import './bootstrap';
<<<<<<< Updated upstream
=======

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
        ease: "power2.inOut"
    })

    .to("#pen", {
        x: "50vw",
        y: "40vh",
        rotation: 180,
        ease: "power2.inOut"
    });

});

let wheel = document.querySelector(".wheel");
let btn = document.getElementById("spin");
let number = Math.ceil(Math.random() * 1000);

let clicks = 0;
btn.onclick = function () {
  clicks += 1;
  if(clicks == 1 ){
	wheel.style.transform = "rotate(" + number + "deg)";
	number += Math.ceil(Math.random() * 1000);
  }
}


>>>>>>> Stashed changes
