const searchBtn = document.querySelector(".header__item_search")
const searchBackDrop = document.querySelector(".search-backdrop")
const resultsList = document.querySelector(".results")
const searchField = document.querySelector(".search__input")

searchBtn.addEventListener("click", () => {
    searchBackDrop.classList.add("search-backdrop_show")
    searchField.focus()
})

searchBackDrop.addEventListener("click", (event) => {
    if (event.target == event.currentTarget)  {
        searchBackDrop.classList.remove("search-backdrop_show")
        resultsList.classList.remove("results_show")
    }
})

searchField.addEventListener("click", () => resultsList.classList.add("results_show"))