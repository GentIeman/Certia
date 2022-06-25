const showPassword = (toggle, field) => {
    let passwordField = document.querySelector(`.${field}`)
    if (passwordField.type === "password") {
        passwordField.setAttribute("type", "text")
        toggle.classList.add("show")
    } else {
        passwordField.setAttribute("type", "password")
        toggle.classList.remove("show")
    }
}