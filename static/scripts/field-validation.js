const inputMaxlength = (field, maxlength) => field.value = (field.value.length > maxlength) ? field.value.slice(0, maxlength) : field.value
const onlyNumber = field => field.value = field.value.replace(/\D/g, "").trimStart()
const gettingParentNode = item => item.parentNode

const personalDataValidation = (field, title) => {
    switch (title) {
        case "firstName":
        case "lastName":
        case "patronymic":
            return field.value = field.value.replace(/[^A-Za-z\s]/gi, "").trimStart()
        case "phone":
            Inputmask("+7 (999) 999 99 99", {"placeholder": ""}).mask(field)
            customValidity(field, "phone")
            break
        case "passport":
            Inputmask("9999 999999", {"placeholder": ""}).mask(field)
            customValidity(field, "passport")
            break
        case "email":
            return field.value = field.value.replace(/[^A-Za-z0-9@.]/gi, "").trimStart()
        case "birthDate":
            customValidity(field, "birthDate")
            break
        case "gender":
            customValidity(field, "gender")
            break
        case "password":
            customValidity(field, "password")
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
            customValidity(field, "zipCode")
            break
        case "building":
            inputMaxlength(field, 2)
            onlyNumber(field)
            break
    }
}

const customValidity = (field, title) => {
    let parent = gettingParentNode(field)
    switch (title) {
        case "gender":
            if (field.value === "man" || field.value === "woman") {
                field.setCustomValidity("")
                parent.classList.remove("form__label_invalid")
            } else {
                field.setCustomValidity("Enter gender: Man or Woman")
                let parent = gettingParentNode(field)
                parent.classList.add("form__label_invalid")
            }
            break
        case "zipCode":
            if (field.value.length < 6) {
                field.setCustomValidity("Enter 6 digits")
                parent.classList.add("form__label_invalid")
            } else {
                field.setCustomValidity("")
                parent.classList.remove("form__label_invalid")
            }
            break
        case "birthDate":
            if (new Date(field.value).getFullYear() > new Date().getFullYear() - 18) {
                field.setCustomValidity("Most be over 18")
                parent.classList.add("form__label_invalid")
            } else {
                field.setCustomValidity("")
                parent.classList.remove("form__label_invalid")
            }
            break
        case "password":
            if (field.value.length < 8) {
                field.setCustomValidity("Password must be at least 8 characters long")
                parent.classList.add("form__label_invalid")
            } else {
                field.setCustomValidity("")
                parent.classList.remove("form__label_invalid")
            }
            break
        case "phone":
            if (field.value.length < 18) {
                field.setCustomValidity("Not valid phone number")
                parent.classList.add("form__label_invalid")
            } else {
                field.setCustomValidity("")
                parent.classList.remove("form__label_invalid")
            }
            break
        case "passport":
            if (field.value.length < 11) {
                field.setCustomValidity("Not valid passport number")
                parent.classList.add("form__label_invalid")
            } else {
                field.setCustomValidity("")
                parent.classList.remove("form__label_invalid")
            }
    }
}