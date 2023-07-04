const hamburgerButton = document.querySelector("#hamburger-button");
const menu = document.querySelector("#menu");

hamburgerButton.addEventListener("click", () => {
    menu.classList.toggle('show');
  }
);
