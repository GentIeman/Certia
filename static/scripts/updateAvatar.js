const btn = document.querySelector(".user-card__avatar")
const subtitle = document.querySelector(".update-avatar__subtitle")
const modal = document.querySelector(".update-avatar")
const fileField = document.querySelector(".update-avatar__input")


btn.addEventListener("click", () => modal.showModal())
fileField.addEventListener("change", () => subtitle.innerHTML = fileField.value.slice(12))

modal.addEventListener("click", (event) => {
    if (event.target === event.currentTarget) modal.close()
}, false)