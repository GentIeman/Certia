async function trySendData(selectorForm, moduleURL, locationTo, hiddenModal) {
    const form = document.querySelector(`.${selectorForm}`)
    const formData = new FormData(form)
    const res = await fetch(moduleURL, {
        method: "post",
        body: formData
    })
    if (res.ok) {
        let message = await res.text();
        if (message === "ok") {
            window.location.href = locationTo
        } else if (message === "admin") {
            window.location.href = locationTo
        } else {
            openTooltip(message, hiddenModal)
        }
    }
}

function openTooltip(message, hiddenModal) {
    const tooltip = document.querySelector(".tooltip-wrap")
    const tooltipText = document.querySelector(".tooltip__text")
    const closeModal = document.querySelector(`.${hiddenModal}`)
    if (tooltip) {
        tooltipText.innerHTML = message
        tooltip.classList.add("tooltip-wrap_show")
    }
    if (closeModal) closeModal.close()
}