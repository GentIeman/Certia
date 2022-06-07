const transfer = document.querySelector(".modal.transfer")
const transferForm = document.querySelector(".transfer__form")
const btnTransferForm = document.querySelector(".operation__btn-transfer")
const successfulTransfer = document.querySelector(".successful-transfer")

const maxlengthForInputNumber = (value, maxlength) => {
    if (value.length > maxlength) value = value.slice(0, maxlength);
    return value
}

btnTransferForm.addEventListener("click", () => transfer.showModal())

transferForm.addEventListener("submit", (event) => {
    event.preventDefault()
    successfulTransfer.showModal()
    transfer.close()
}, false)

successfulTransfer.addEventListener("click", (event) => {
    if (event.target === event.currentTarget) successfulTransfer.close()
})

transfer.addEventListener("click", (event) => {
    if (event.target === event.currentTarget) transfer.close()
})