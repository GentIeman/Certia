const transfer = document.querySelector(".transfer-modal")
const transferForm = document.querySelector(".transfer-modal__form")
const btnTransferForm = document.querySelector(".operation__btn-transfer")
const successfulTransfer = document.querySelector(".successful-transfer")
const cardRecipient = document.querySelector(".transfer-modal__input_recipient")
const amountField = document.querySelector(".transfer-modal__input_amount")
const btnOpenTooltip = document.querySelector(".open-tooltip")

const inputMaxlength = (value, maxlength) => value = (value.length > maxlength) ? value.slice(0, maxlength) : value
const onlyNumber = (value) => value = value.replace(/\D/g, "")

function closeModal(modal) {
    modal.addEventListener("click", (event) => {
        if (event.target === event.currentTarget) modal.close()
    })
    return modal
}

cardRecipient.addEventListener("input", (event) => event.target.value = inputMaxlength(event.target.value, 16))
amountField.addEventListener("input", (event) => event.target.value = onlyNumber(event.target.value))
btnTransferForm.addEventListener("click", () => transfer.showModal())

btnOpenTooltip.addEventListener("click", () => {
    successfulTransfer.showModal()
    transfer.close()
}, false)

transfer.addEventListener("click", closeModal(transfer))