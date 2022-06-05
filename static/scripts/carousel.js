const carousel = document.querySelector(".carousel__track")
const slides = document.querySelectorAll(".carousel__slide")
const dots = document.querySelectorAll(".carousel__dot")
let counter = 0
const duration = 4000

const showSlide = (n) => {
    counter = (n || n == 0) ? n : counter + 1
    if (counter > slides.length - 1) counter = 0
    carousel.style.transform = `translateX(-${counter * 100}%)`
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("carousel__dot_active")
    }
    dots[counter].classList.add("carousel__dot_active")
}

const dotClick = () => {
    for (let i = 0; i < slides.length; i++) {
        dots[i].addEventListener("focus", () => {
            showSlide(counter = i)
            dots[counter].blur()
        })
    }
}
dotClick()

setTimeout(() => {
    setInterval(showSlide, duration)
}, duration)