const loanBtn = document.querySelector(".operation__btn-loan")
const loanModal = document.querySelector(".loan-info")
const successfulModal = document.querySelector(".successful-modal-loan")
const repay = document.querySelector(".info-modal__repay")
const depositBtn = document.querySelector(".operation__btn-deposit")
const depositModal = document.querySelector(".deposit-info")


if (loanBtn) loanBtn.addEventListener("click", () => loanModal.showModal())
if (depositBtn) depositBtn.addEventListener("click", () => depositModal.showModal())

function closeModal(modal) {
    modal.addEventListener("click", (event) => {
        if (event.target === event.currentTarget) modal.close()
    })
    return modal
}


repay.addEventListener("click", () => {
    successfulModal.showModal()
    loanModal.close()
})

loanModal.addEventListener("click", closeModal(loanModal))
successfulModal.addEventListener("click", closeModal(successfulModal))
depositModal.addEventListener("click", closeModal(depositModal))