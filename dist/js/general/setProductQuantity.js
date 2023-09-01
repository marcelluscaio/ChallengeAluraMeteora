const fieldsColorSize = document.querySelectorAll(".modal__form__color-size");

fieldsColorSize.forEach(field => 
  field.addEventListener("click", e => {
    if(e.target.matches("input")){
      const select = e.target.closest('form').querySelector('select');
      const type = e.target.dataset.type;
      const value = e.target.value;
      select.dataset[type] = value;
      
      const dialog = select.closest('dialog');
      const title = dialog.querySelector('h3').innerText;
      const thisProduct = productInformation.find(item => item[0] === title);
      const availableSizesOrColors = thisProduct[1].filter(item => item[type] === select.dataset[type]).map(item => {
        const {quantidade, ...remaining} = item;
        const target = Object.keys(remaining).find(key => key !== type);
        return item[target]
      }
      );

    const inputsOtherType = dialog.querySelectorAll(`.modal__form__color-size input:not([data-type="${type}"])`);
    inputsOtherType.forEach(input => availableSizesOrColors.includes(input.value) ? input.disabled = false : input.disabled = true );

      if(select.dataset.cor && select.dataset.tamanho){
        const quantity = thisProduct[1].find(item => item.cor === select.dataset.cor && item.tamanho === select.dataset.tamanho).quantidade;
        
        while(select.firstChild){
          select.removeChild(select.firstChild)
        };

        for(i=0; i<= quantity; i++){
          const option = document.createElement('option');
          option.value = i;
          option.innerText = i;
          select.appendChild(option)
        }
      }

    }
  }
))

//Refs

/* https://developer.mozilla.org/en-US/docs/Web/API/Element/closest
https://developer.mozilla.org/en-US/docs/Learn/HTML/Howto/Use_data_attributes
 
Para criar o documento no php
https://www.php.net/manual/en/function.substr.php
https://www.php.net/manual/en/function.strpos.php

https://www.freecodecamp.org/news/find-vs-filter-javascript/
https://www.javascripttutorial.net/dom/manipulating/remove-all-child-nodes/

https://dev.to/elukuro/how-to-clone-object-except-for-one-or-some-keys-623

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/values
 */

// https://developer.mozilla.org/en-US/docs/Web/API/Element/closest
// https://gomakethings.com/a-native-vanilla-javascript-way-to-get-the-closest-matching-parent-element/
//https://gomakethings.com/using-multiple-selectors-with-queryselector-queryselectorall-closest-and-matches/
//https://gomakethings.com/event-delegation-and-nested-elements/
//https://css-tricks.com/practical-use-cases-for-javascripts-closest-method/