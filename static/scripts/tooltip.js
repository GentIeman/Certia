const tooltip = document.querySelector(".tooltip-wrap")

tooltip.addEventListener("click", event => {
    if (event.target === event.currentTarget) tooltip.classList.remove("tooltip-wrap_show")
})