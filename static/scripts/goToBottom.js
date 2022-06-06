const goToBottomBtn = document.querySelector(".hero__btn")
goToBottomBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 700,
        behavior: "smooth"
    })
})