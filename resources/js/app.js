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
