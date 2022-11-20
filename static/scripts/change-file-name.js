const subtitle = document.querySelector(".update-avatar__subtitle")
const fileField = document.querySelector(".update-avatar__input")

fileField.addEventListener("change", () => subtitle.innerHTML = fileField.value.slice(12))