const closeModal = (modal) => {
    modal.addEventListener("click", (event) => {
        if (event.target === event.currentTarget) modal.close()
    })
}

export {closeModal}