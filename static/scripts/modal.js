const showTooltipBtn = document.querySelector(".open-tooltip")
const modal = document.querySelector(".modal")
const form = document.querySelector(".form-submit")

showTooltipBtn.addEventListener("click", () => {
    modal.showModal()
}, true)

modal.addEventListener("click", (event) => {
    if (event.target === event.currentTarget) modal.close()
}, false)