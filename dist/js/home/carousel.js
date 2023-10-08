const track = document.querySelector('.carousel__track');
let trackPosition = parseInt(getComputedStyle(track).getPropertyValue('--position'));

const slideQuantity = track.childElementCount;

const arrowRight = document.querySelector('.arrow--right');
const arrowLeft = document.querySelector('.arrow--left');

const navigation = document.querySelector(".carousel__controls__navigation");
const navigationButtons = navigation.querySelectorAll("button");
let activeNavigation = navigation.querySelector(".navigation--active");

[arrowRight, arrowLeft].forEach(
  button => button.addEventListener(
    'click', (e) => carouselEngine(e.target)
  )
);

navigationButtons.forEach(
  button => button.addEventListener(
    'click', (e) => changeSlideOnNavigation(e.target)
  )
);

function carouselEngine(button){
  if(button.classList.contains('arrow--left')){
    if(trackPosition > 0){
      trackPosition--;
    }
  } else if (button.classList.contains('arrow--right')){
    if(trackPosition < slideQuantity - 1){
      trackPosition++;
    }
  }
  moveTrack(trackPosition);
  changeActiveNavigation(trackPosition)
}

function moveTrack(trackPosition){
  track.style.setProperty('--position', `${trackPosition*-100}%`);
};

function changeActiveNavigation(trackPosition){
  if(activeNavigation !== navigationButtons[trackPosition]){
    activeNavigation.classList.remove("navigation--active");
    activeNavigation = navigationButtons[trackPosition];
    navigationButtons[trackPosition].classList.add("navigation--active");
  }
};

function changeSlideOnNavigation(navigation){
  console.log(navigation)
}

//function for aria hidden
//function for clicking navigation
