const searchIcon = document.querySelector(".header__item_search")
const searchBackDrop = document.querySelector(".search-backdrop")
const resultBlock = document.querySelector(".results")
const searchField = document.querySelector(".search__input")
const searchBtn = document.querySelector(".search__btn")
const resultsList = document.querySelector(".results__list")

const results = [
    {
        pageName: "Credits",
        link: "./credits.php"
    },
    {
        pageName: "Products",
        link: "./credits.php"
    },
    {
        pageName: "Cash loan",
        link: "./deposit.php"
    },
    {
        pageName: "Educational loan",
        link: "./credits.php"
    },
    {
        pageName: "Loan for equipment",
        link: "./credits.php"
    },
    {
        pageName: "Repair loan",
        link: "./credits.php"
    },
    {
        pageName: "Deposits",
        link: "./deposits.php"
    },
    {
        pageName: "Behind the wall",
        link: "./deposits.php"
    },
    {
        pageName: "New time",
        link: "./deposits.php"
    },
    {
        pageName: "A solid foundation",
        link: "./deposits.php"
    },
    {
        pageName: "History of success",
        link: "./deposits.php"
    },
    {
        pageName: "Transfer",
        link: "./profile.php"
    },
    {
        pageName: "Send feedbacks",
        link: "./feedbacks.php"
    },
    {
        pageName: "My activity",
        link: "./profile.php"
    },
    {
        pageName: "My cards",
        link: "./profile.php"
    },
]

searchIcon.addEventListener("click", () => {
    searchBackDrop.classList.add("search-backdrop_show")
    searchField.focus()
})

searchBtn.addEventListener("click", () => {
    for (let result of results) {
        if (result.pageName.toLowerCase().includes(searchField.value.toLowerCase())) {
            createResultList(result)
            resultBlock.classList.add("results_show")
        }
    }
})

const setAttributes = (el, attrs) => {
    for (let key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
}

const createResultList = (result) => {
    let item = document.createElement("li")
    item.setAttribute("class", "results__item")
    setAttributes(item, {"class": "results__item results__item_hover results__item_focus"});
    let link = document.createElement("a")
    setAttributes(link, {"href": result.link, "class": "results__suggestion"});
    link.innerHTML = result.pageName
    item.append(link)
    resultsList.append(item)
}

searchBackDrop.addEventListener("click", (event) => {
    if (event.target == event.currentTarget) {
        searchBackDrop.classList.remove("search-backdrop_show")
        resultBlock.classList.remove("results_show")
    }
})