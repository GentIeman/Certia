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
            let flatmask = new Inputmask("999")
            flatmask.mask(field)
            break
        case "zipCode":
            let zipmask = new Inputmask("999999")
            zipmask.mask(field)
            break
        case "building":
            let buildingmask = new Inputmask("99")
            buildingmask.mask(field)
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