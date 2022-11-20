const inputMaxlength = (field, maxlength) => field.value = (field.value.length > maxlength) ? field.value.slice(0, maxlength) : field.value
const onlyNumber = field => field.value = field.value.replace(/\D/g, "").trimStart()
const personalDataValidation = (field, title) => {
    switch (title) {
        case "firstName":
        case "lastName":
        case "patronymic":
            return field.value = field.value.replace(/[^A-Za-z\s]/gi, "").trimStart()
        case "phone":
            Inputmask("+7 (999) 999 99 99", {greedy: false}).mask(field)
            break
        case "passport":
            Inputmask("9999 999999").mask(field)
            break
        case "email":
            return field.value = field.value.replace(/[^A-Za-z0-9@.]/gi, "").trimStart()
        case "birthDate":
            birthdayValidation(field)
            break
        case "gender":
            genderValidation(field)
            break
        case "password":
            return field.value = field.value.replaceAll(/[^A-Za-z()+-{}0-9]/gi, "").trimStart()
    }
}

const locationDataValidation = (field, title) => {
    switch (title) {
        case "city":
        case "street":
            field.value = field.value.replace(/[^A-Za-z\s]/gi, "").trimStart()
            break
        case "house":
        case "flat":
            inputMaxlength(field, 3)
            onlyNumber(field)
            break
        case "zipCode":
            inputMaxlength(field, 6)
            onlyNumber(field)
            break
        case "building":
            inputMaxlength(field, 2)
            onlyNumber(field)
            break
    }
}

const genderValidation = field => {
    field.value = field.value.toLowerCase()
    if (field.value === "man" || field.value === "woman") {
        field.setCustomValidity("")
    } else {
        field.setCustomValidity("Enter gender: Man or Woman")
    }
}

const birthdayValidation = field => {
    if (new Date(field.value).getFullYear() > new Date().getFullYear() - 18) {
        field.setCustomValidity("Most be over 18")
    } else {
        field.setCustomValidity("")
    }
}