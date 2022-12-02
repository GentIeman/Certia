const input = document.querySelector(".client-info__input")
const selector = document.querySelector(".client-info__select")

selector.addEventListener("change", function() {
    switch (selector.value) {
        case "client_age":
            input.parentElement.classList.remove("client-info__label_hide")
            input.type = "number"
            input.min = "0"
            input.max = "100"
            changeInputValue(input, "number")
            break
        case "client_last_name":
            input.parentElement.classList.remove("client-info__label_hide")
            input.type = "text"
            changeInputValue(input, "string")
            break
        case "client_gender":
            input.parentElement.classList.remove("client-info__label_hide")
            input.type = "text"
            changeInputValue(input, "string")
            break
        case "client_phone":
            input.parentElement.classList.remove("client-info__label_hide")
            input.type = "tel"
            Inputmask("+7 (999) 999 99 99", {"placeholder": ""}).mask(input)
            break
        case "account":
            input.parentElement.classList.remove("client-info__label_hide")
            Inputmask("9999 9999 9999 9999 9999", {"placeholder": ""}).mask(input)
            break
        default:
            input.parentElement.classList.add("client-info__label_hide")
    }
})
const changeInputValue = (input, type) => {
    input.addEventListener("input", function() {
        switch (type) {
            case "number":
                input.value = input.value.replace(/[^0-9]/gi, "")
                break
            case "string":
                input.value = input.value.replace(/[^A-Za-z\s]/gi, "")
                break
        }
    })
}