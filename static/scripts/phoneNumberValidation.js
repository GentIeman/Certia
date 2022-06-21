const phoneField = document.querySelector(".phone")

phoneField.addEventListener("input", (event) => event.target.value = event.target.value.replace(/[^0-9-()+\s]/g, ""))