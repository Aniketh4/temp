document.querySelectorAll(".hamburger").forEach(ham => {
    ham.addEventListener("click", () => {
        document.querySelector("#sidebar").style.display = "flex";
    })
})

document.querySelector(".cross-btn").addEventListener("click", () => {
    document.querySelector("#sidebar").style.display = "none";

})