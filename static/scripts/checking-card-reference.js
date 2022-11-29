const clientCard = document.querySelector(".transfer-model__client-card");
const recipientCard = document.querySelector(".transfer-model__recipient-card");

function checkingCard(card) {
    Inputmask("9999 9999 9999 9999", {placeholder: ""}).mask(card)
    if (card.value.length < 19) {
        card.setCustomValidity("Not valid card number")
    } else {
        card.setCustomValidity("")
    }

    if (clientCard.value === recipientCard.value) {
        recipientCard.setCustomValidity("You can't transfer money to yourself")
    }
}