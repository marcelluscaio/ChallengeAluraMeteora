const hamburgerButtons = document.querySelectorAll(".header__hamburger-button");
const ariaButtonString = hamburgerButtons[0].getAttribute("aria-expanded");
let ariaButtonBoolean = ariaButtonString === "true";

const menu = document.querySelector("#menu");
const ariaMenuString = menu.getAttribute("aria-hidden");
let ariaMenuBoolean = ariaMenuString === "true";

hamburgerButtons.forEach(
  button => button.addEventListener("click", 
    () => {
      menu.classList.toggle('show');
      ariaButtonBoolean = !ariaButtonBoolean;
      ariaMenuBoolean = !ariaMenuBoolean;
      hamburgerButtons.forEach(button => button.setAttribute("aria-expanded", ariaButtonBoolean));
      menu.setAttribute("aria-hidden", ariaMenuBoolean);
    }
  )
);
