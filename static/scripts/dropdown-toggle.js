const dropdownToggle = document.querySelector(".header__dropdown-btn")
const dropdownMenu = document.querySelector(".dropdown__content")

dropdownToggle.addEventListener("click", () => {
    dropdownMenu.classList.toggle("dropdown__content_show")
})

document.addEventListener("click", (e) => {
    if (!e.target.closest(".header__dropdown-btn")) {
        dropdownMenu.classList.remove("dropdown__content_show")
    }
})