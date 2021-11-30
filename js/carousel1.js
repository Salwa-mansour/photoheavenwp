// gitteing the ul
const track =document.querySelector('.carousel__track');
const slides = Array.from(track.children)
console.log(slides)
const nextButton = document.querySelector('.carousel__button--right');
const  prevButton= document.querySelector('.carousel__button--left');
const dotsNav = document.querySelector('.carousel__nav');
const dots = Array.from(dotsNav.children);
const slideWidth = slides[0].getBoundingClientRect().width;
// console.log(slides[0])
//arrange the slides next to each other
// slides[0].style.left = slideWidth * 0 + 'px';
// slides[1].style.left = slideWidth * 1 + 'px';
// slides[2].style.left = slideWidth * 2 + 'px';
//  slides.forEach((slide,index)=>{
//      slide.style.left = slideWidth * index + 'px'
//  })
const setSlidePosition = (slide,index)=>{
    slide.style.left = slideWidth * index + 'px';
    
}
slides.forEach(setSlidePosition)

//stpes
const moveToSlide = (track,currentSlide,targetSlide)=>{
            track.style.transform = `translateX( -${targetSlide.style.left})`;
            currentSlide.classList.remove('current-slide');
            targetSlide.classList.add('current-slide');
}
const updateDots=(currentDot,targetDot) => {
    currentDot.classList.remove('current-slide');
    targetDot.classList.add('current-slide')
}
//when i click left ,move slides to the left

prevButton.addEventListener('click',()=>{
    const currentSlide = track.querySelector('.current-slide');
    const prevSlide = currentSlide.previousElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide')
    const prevDot =currentDot.previousElementSibling;
    // move to the previuos slide
    moveToSlide(track,currentSlide,prevSlide)
    //change dot color
    updateDots(currentDot,prevDot);
    toggleArows();
})
//when i click right , move slides ot the right

nextButton.addEventListener('click',() => {
    const currentSlide = track.querySelector('.current-slide')
    const nextSlide = currentSlide.nextElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide');
    const nextDot = currentDot.nextElementSibling;
    //move to the next slide
    moveToSlide(track,currentSlide,nextSlide);
    //cheng dot color
    updateDots(currentDot,nextDot);
    toggleArows();
})
// when i click the nav indicator move to that slide
dotsNav.addEventListener('click',e=>{
    //what indicator was clicked on 
    const targetDot = e.target.closest('button')
    https://stackoverflow.com/questions/5791158/javascript-what-is-the-difference-between-if-x-and-if-x-null
    // " !x will return true for every "falsy" value (empty string, 0, null, false, undefined, NaN) "
    if(!targetDot){
        // stop executing if the clicked target is not a button (target.closest===null)
    return}
    else{
        const currentSlide = track.querySelector('.current-slide');
        const currentDot = dotsNav.querySelector('.current-slide');
        const targetIndex = dots.findIndex(dot => dot === targetDot)//return the index of the clicked item-button-
        const targetSlide = slides[targetIndex];
        moveToSlide(track,currentSlide,targetSlide);
        updateDots(currentDot,targetDot);
        toggleArows();
    }
})
function toggleArows(){
   if(slides[0].classList.contains('current-slide')){
       prevButton.classList.add('hide');
    //    console.log(slides[slides.length-1])
   }else{
    prevButton.classList.remove('hide')
   }
   if(slides[slides.length-1].classList.contains('current-slide')){
       nextButton.classList.add('hide');
    //    console.log(slides[slides.length-1])
   }else{
    nextButton.classList.remove('hide')
   }

}
setInterval