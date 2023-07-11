const track = document.querySelector('.carousel__track');
let trackPosition = parseInt(getComputedStyle(track).getPropertyValue('--position'));

const slideQuantity = track.childElementCount;

const arrowRight = document.querySelector('.arrow--right');
const arrowLeft = document.querySelector('.arrow--left');

arrowRight.addEventListener('click', () => {
    if(trackPosition > 1 - slideQuantity ){
      trackPosition--;
    }
    track.style.setProperty('--position', `${trackPosition*100}%`);
  }
)

arrowLeft.addEventListener('click', () => {
    if(trackPosition < 0){
      trackPosition++;
    }
    track.style.setProperty('--position', `${trackPosition*100}%`);
  }
)
