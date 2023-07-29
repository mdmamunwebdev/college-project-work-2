let arrow = document.querySelectorAll(".arrow");

for (let i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;    //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");

    // Remove class from all children elements of .container div
    const showMenue = document.querySelectorAll('.sidebar *');

    showMenue.forEach(
        (element) => {
            element.classList.remove('showMenu');
        }
    );
});