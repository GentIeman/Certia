const fullNameField = document.querySelector(".fullname")
const genderField = document.querySelector(".gender")
const emailField = document.querySelector(".email")
const passwordField = document.querySelector(".password")
const addressField = document.querySelector(".address")


const onlyWords = (...fields) => [...fields].map(field => field.addEventListener("input", (event) => event.target.value = event.target.value.replace(/[^A-Za-z\s]/gi, "")))
onlyWords(fullNameField, genderField)

addressField.addEventListener("input", (event) => event.target.value = event.target.value.replace(/[^A-Za-z,.0-9]/gi, ""))
emailField.addEventListener("input", (event) => event.target.value = event.target.value.replace(/[^A-Za-z0-9@.]/gi, ""))

const prohibitEntrySpace = (...fields) => [...fields].map(field => field.addEventListener("input", (event) => event.target.value = event.target.value.replaceAll(" ", "")))
prohibitEntrySpace(emailField, passwordField, genderField)

genderField.addEventListener("input", (event) => {
    event.target.value = event.target.value.charAt(0).toLowerCase() + event.target.value.slice(1);
    if (event.target.value === "man" || event.target.value === "woman") {
        genderField.setCustomValidity("")
    } else {
        genderField.setCustomValidity("Enter gender: Man or Woman")
    }
})