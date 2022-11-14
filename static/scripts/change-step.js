const form = document.querySelector(".form")

const sections = Array.from(form.querySelectorAll(".form__section"))
for (let section of sections) {
    section.addEventListener("input", () => {
        checkFieldValue(section)
    })
}

function checkFieldValue(section) {
    let filledFields = 0
    let btn = section.querySelector(".form__btn_disabled")
    let inputs = Array.from(section.querySelectorAll(".form__input"))
    for (let input of inputs) {
        if (input.value) filledFields++
    }
    if (btn) {
        if (filledFields === inputs.length) {
            btn.disabled = false
            btn.classList.remove("form__btn_disabled")
        } else {
            btn.disabled = true
            btn.classList.add("form__btn_disabled")
        }
    }
}

const changeStep = dir => {
    const formSections = Array.from(form.querySelectorAll(".form__section"))
    let currentSection = form.querySelector(".form__section_active")
    let currentSectionIndex = formSections.indexOf(currentSection)
    let nextSectionIndex = currentSectionIndex + dir
    let nextSection = formSections[nextSectionIndex]

    currentSection.classList.remove("form__section_active")
    nextSection.classList.add("form__section_active")
}