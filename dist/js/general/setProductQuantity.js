const fieldsColorSize = document.querySelectorAll(".modal__form__color-size");

console.log(productInformation)

fieldsColorSize.forEach(field => 
  field.addEventListener("click", e => {
    if(e.target.matches("input")){
      const select = e.target.closest('form').querySelector('select');
      const type = e.target.dataset.type;
      const value = e.target.value;
      select.dataset[type] = value;

      if(select.dataset.cor && select.dataset.tamanho){
        const dialog = select.closest('dialog');
        const title = dialog.querySelector('h3').innerText;
        //console.log(title);
        //console.log("mostra")
        console.log()
      }
    }
  }
))

// colocar event listener nas divs. Checar o que t[a embaixo
// 
// usar https://developer.mozilla.org/en-US/docs/Web/API/Element/closest
//https://gomakethings.com/a-native-vanilla-javascript-way-to-get-the-closest-matching-parent-element/

//https://gomakethings.com/using-multiple-selectors-with-queryselector-queryselectorall-closest-and-matches/
//https://gomakethings.com/event-delegation-and-nested-elements/

//https://css-tricks.com/practical-use-cases-for-javascripts-closest-method/