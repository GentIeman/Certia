const showPasswordBtn = document.querySelector(".sign-in__show-password")
const password = document.querySelector(".sign-in__input_password")

showPasswordBtn.addEventListener("click", () => {
    if (password.type === "password") {
        password.setAttribute("type", "text")
        showPasswordBtn.classList.add("show")
    } else {
        password.setAttribute("type", "password")
        showPasswordBtn.classList.remove("show")
    }
})