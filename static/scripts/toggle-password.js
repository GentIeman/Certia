const togglePassword = (toggle, field) => {
    let passwordField = document.querySelector(`.${field}`)
    if (passwordField.type === "password") {
        passwordField.setAttribute("type", "text")
        toggle.classList.add("form__password-toggle_active")
    } else {
        passwordField.setAttribute("type", "password")
        toggle.classList.remove("form__password-toggle_active")
    }
}