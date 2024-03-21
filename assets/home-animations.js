// document.querySelector("#marquee").childNodes.forEach((child) => {
//     child.addEventListener("mouseover", () => {
//         document.querySelector(".container-modal").style.display = "flex";

//     })
// })

// document.querySelector(".cross-cm").addEventListener("click", () => {
//     document.querySelector(".container-modal").style.display = "none";

// })

var gainHead = document.querySelector(".gainer-head")
var looseHead = document.querySelector(".looser-head")
var looseTable = document.querySelector(".looser-table")
var gainerTable = document.querySelector(".gainer-table")
var sensex = document.querySelector(".sensex-cont")
var nifty = document.querySelector(".nifty-cont")
var animGreen = document.querySelector(".long-div-green")
var animRed = document.querySelector(".long-div-red")

gainHead.addEventListener("click", () => {
    gainHead.classList.add("active-gn")
    looseHead.classList.remove("active-ls")
    looseTable.style.display = "none";
    gainerTable.style.display = "block";
    animGreen.style.display = "flex"
    animRed.style.display = "none"
})

looseHead.addEventListener("click", () => {
    gainHead.classList.remove("active-gn")
    looseHead.classList.add("active-ls")
    looseTable.style.display = "block";
    gainerTable.style.display = "none";
    animGreen.style.display = "none"
    animRed.style.display = "flex"

})

sensex.addEventListener("click", () => {
    sensex.classList.add("active-market-data")
    nifty.classList.remove("active-market-data")
})

nifty.addEventListener("click", () => {
    nifty.classList.add("active-market-data")
    sensex.classList.remove("active-market-data")
})

document.querySelectorAll(".short-vid").forEach(bp => {
    bp.addEventListener("click", () => {
        document.querySelector(".video-modal").style.display = "flex";
    })
})

document.querySelectorAll(".long-vid").forEach(bp => {
    bp.addEventListener("click", () => {
        document.querySelector(".video-modal").style.display = "flex";
    })
})

document.querySelector(".cross-vid").addEventListener("click", () => {

    document.querySelector(".video-modal").style.display = "none";
})


document.querySelectorAll(".article-open").forEach((art) => {
    art.addEventListener("click", () => {
        document.querySelector(".article-modal").style.display = "flex";
    })
})

document.querySelector(".article-cross").addEventListener("click", () => {
    document.querySelector(".article-modal").style.display = "none";
})