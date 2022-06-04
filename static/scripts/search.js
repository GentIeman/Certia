const searchBtn = document.querySelector(".header__item_search")
const search = document.querySelector(".search-backdrop")
const searchField = document.querySelector(".search")
const resultsList = document.querySelector(".results")

searchBtn.addEventListener("click", () => search.classList.add("search-backdrop_show"))

search.addEventListener("click", (event) => {
    if (event.target == event.currentTarget)  {
        search.classList.remove("search-backdrop_show")
        resultsList.classList.remove("results_show")
    }
})

searchField.addEventListener("click", () => resultsList.classList.add("results_show"))