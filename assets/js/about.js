const intro = document.querySelector('.intro')
const video = document.querySelector('video')
const text = document.querySelector('.intro-txt')
// END SECTION
const section = document.querySelector('section')
const end = section.querySelector('h1')

// SCROLL MAGIC
const controller = new ScrollMagic.Controller();

const scene = new ScrollMagic.Scene({
    duration: 9000,
    triggerElemnt: intro,
    triggerHook: 0
})

.setPin(intro)
.addTo(controller)

// Video Animtion 
let accelamount = 0.1;
let scrollpos = 0;
let delay = 0;

scene.on("update", e => {
    scrollpos = e.scrollPos / 1000;
})

setInterval(() => {
    delay += (scrollpos - delay) * accelamount;
    console.log(scrollpos, delay);

    video.currentTime = scrollpos;

}, 28.7)