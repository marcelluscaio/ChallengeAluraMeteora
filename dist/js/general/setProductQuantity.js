const fieldsColorSize = document.querySelectorAll(".modal__form__color-size");

fieldsColorSize.forEach(field => 
  field.addEventListener("click", e => {
    if(e.target.matches("input")) console.log(e.target)
  }
))

// colocar event listener nas divs. Checar o que t[a embaixo
// 
// usar https://developer.mozilla.org/en-US/docs/Web/API/Element/closest
//https://gomakethings.com/a-native-vanilla-javascript-way-to-get-the-closest-matching-parent-element/