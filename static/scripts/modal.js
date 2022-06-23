const btn = document.querySelector(".open-modal")
const modal = document.querySelector(".modal")
const form = document.querySelector(".form-submit")

form.addEventListener("submit", () => {
    modal.showModal()
}, true)

modal.addEventListener("click", (event) => {
    if (event.target === event.currentTarget) modal.close()
}, false)