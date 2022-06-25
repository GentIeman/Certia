const trySendData = (selectorForm, phpModule, locationTo, hiddenModal, successModal) => {
    const form = document.querySelector(`.${selectorForm}`)
    form.addEventListener("submit", async (event) => {
        event.preventDefault()
        const formData = new FormData(form)
        const res = await fetch('http://ceria/views/index.php?section=' + phpModule, {
            method: "post",
            body: formData
        })
        if (res.ok) {
            let message = await res.text()
            if (message == "ok") {
                window.location.href = locationTo
                closeParentModal(hiddenModal)
                openSuccessModal(successModal)
            } else {
                closeParentModal(hiddenModal)
                openTooltip(message)
            }
        }
    })
}

const openSuccessModal = modal => {
    if (modal) document.querySelector(`.${modal}`).showModal()
}

const closeParentModal = modal => {
    if (modal) document.querySelector(`.${modal}`).close()
}

const openTooltip = message => {
    const tooltip = document.querySelector(".tooltip-wrap")
    const tooltipText = document.querySelector(".tooltip__text")
    if (tooltip) {
        tooltipText.innerHTML = message
        tooltip.classList.add("tooltip-wrap_show")
        tooltip.addEventListener("click", event => {
            if (event.target === event.currentTarget) {
                tooltip.classList.remove("tooltip-wrap_show")
                window.location.reload()
            }
        })
    }
}