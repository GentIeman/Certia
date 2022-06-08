const transfer = document.querySelector(".transfer-modal")
const transferForm = document.querySelector(".transfer-modal__form")
const btnTransferForm = document.querySelector(".operation__btn-transfer")
const successfulTransfer = document.querySelector(".successful-transfer")
const cardField = document.querySelector(".transfer-modal__input_card")
const amountField = document.querySelector(".transfer-modal__input_amount")

const inputMaxlength = (value, maxlength) => value = (value.length > maxlength) ? value.slice(0, maxlength) : value
const onlyNumber = (value) => value = value.replace(/\D/g, "")


cardField.addEventListener("input", (event) => event.target.value = inputMaxlength(event.target.value, 16))
amountField.addEventListener("input", (event) => event.target.value = onlyNumber(event.target.value))
btnTransferForm.addEventListener("click", () => transfer.showModal())

transferForm.addEventListener("submit", (event) => {
    event.preventDefault()
    successfulTransfer.showModal()
    transfer.close()
}, false)

successfulTransfer.addEventListener("click", () => closeModal(successfulTransfer))
transfer.addEventListener("click", () => closeModal(transfer))