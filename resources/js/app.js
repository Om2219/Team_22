import './bootstrap';

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {

    const video = document.getElementById("bg-video");
    const spacer = document.querySelector(".scroll-spacer");

    if (!video || !spacer) return;

    video.addEventListener("loadedmetadata", () => {

        video.play().then(() => {
            video.pause();
            video.currentTime = 0;

            gsap.to(video, {
                currentTime: video.duration,
                ease: "none",
                scrollTrigger: {
                    trigger: spacer,
                    start: "top top",
                    end: "bottom bottom",
                    scrub: true,
                    markers: false, // check to see if video plays ( set to true to check)
                }
            });

        }).catch((err) => {
            console.log("Autoplay blocked:", err);
        });

    });

});
