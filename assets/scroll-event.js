var header = document.querySelector("#header-ls");
var news = header.querySelectorAll(".news");

news.forEach((n) => {
    n.addEventListener("mouseover", () => {
        // console.log(n);
        document.querySelector("#header-img").src = "./assets/img/" + n.dataset.srce;
    })
})

