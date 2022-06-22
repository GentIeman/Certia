const loanBtn = document.querySelector(".operation__btn-loan")
const loanModal = document.querySelector(".loan-info")
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

loanModal.addEventListener("click", closeModal(loanModal))
depositModal.addEventListener("click", closeModal(depositModal))