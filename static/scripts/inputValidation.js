const onlyWords = field => field.value = field.value.replace(/[^A-Za-z\s]/gi, "")
const emailValidation = field => field.value = field.value.replace(/[^A-Za-z0-9@.]/gi, "")
const phoneValidation = field => field.value = field.value.replace(/[^0-9-()+\s]/g, "")
const passwordValidation = field => field.value = field.value.replaceAll(/[^A-Za-z()+-{}0-9]/gi, "")
const inputMaxlength = (field, maxlength) => field.value = (field.value.length > maxlength) ? field.value.slice(0, maxlength) : field.value
const onlyNumber = field => field.value = field.value.replace(/\D/g, "")
const trimLeft = field => field.value = field.value.trimLeft()

const fullNameValidation = field => {
    onlyWords(field)
    trimLeft(field)
}

const addressValidation = field => {
    field.value = field.value.replace(/[^A-Za-z\s,.0-9]/gi, "")
    trimLeft(field)
}

const recipientValidation = (field, length = null) => {
    inputMaxlength(field, length)
    onlyNumber(field)
}

const genderValidation = () => {
    const genderField = document.querySelector(`.gender`)
    genderField.value = genderField.value.toLowerCase()
    if (genderField.value === "man" || genderField.value === "woman") {
        genderField.setCustomValidity("")
    } else {
        genderField.setCustomValidity("Enter gender: Man or Woman")
    }
}