const showModal = modal => document.querySelector(`.${modal}`).showModal()
const modals = document.querySelectorAll(".modal")

for (let modal of modals) {
    modal.addEventListener("click", event => {
        if (event.target === event.currentTarget) modal.close()
    })
}
