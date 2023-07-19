const modalButtons = document.querySelectorAll(".open-modal");
const closeModalButtons = document.querySelectorAll(".close-modal");
const modals =  document.querySelectorAll(".modal");

const modalButtonsArray = Array.from(modalButtons);
const closeModalButtonsArray = Array.from(closeModalButtons);
const modalsArray = Array.from(modals);



modalButtonsArray.forEach(button => button.addEventListener('click', (e)=> {
  const buttonKeyClass = Array.from(e.target.classList).find(className => className.startsWith('modal--'));

  const thisButtonsModal = modalsArray.filter(
      modal => modal.classList.contains(buttonKeyClass)
    );

  thisButtonsModal[0].showModal();
}))

closeModalButtonsArray.forEach(button => button.addEventListener('click', (e)=> {
  const buttonKeyClass = Array.from(e.target.classList).find(className => className.startsWith('modal--'));

  const thisButtonsModal = modalsArray.filter(
      modal => modal.classList.contains(buttonKeyClass)
    );

  thisButtonsModal[0].close();
}))