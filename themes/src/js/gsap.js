"use strict";
const tl = gsap.timeline();
const screenHeight = window.innerHeight;

tl.fromTo(
  ".js-loading__start",
  {
    opacity: 1,
  },
  {
    delay: 1,
    duration: 1,
    autoAlpha: 0,
  }
)
  .fromTo(".js-loading__left", { y: screenHeight, opacity: 1 }, { y: 0, opacity: 1, duration: 1 })
  .fromTo(".js-loading__right", { y: screenHeight + 80, opacity: 1 }, { y: 0, opacity: 1, duration: 1 })
  .to(".js-loading__middle", { opacity: 0, duration: 1, autoAlpha: 0 })
  .fromTo(
    ".js-loading__last",
    {
      opacity: 1,
    },
    {
      delay: 1,
      duration: 1,
      autoAlpha: 0,
    }
  );
