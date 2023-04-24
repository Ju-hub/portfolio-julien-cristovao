import '../styles/nav.scss';
                                    
                        /*    Javascript NavBar      Gestion du bouton hamburger en mobile */
const hamburgerToggler = document.querySelector(".hamburger");
const navLinksContainer = document.querySelector(".navlinks-container");

const toggleNav = () => {
    hamburgerToggler.classList.toggle("open");
    const ariaToggle =
        hamburgerToggler.getAttribute("aria-expanded") === "true" ? "false" : "true";
        hamburgerToggler.setAttribute("aria-expanded", ariaToggle);
        navLinksContainer.classList.toggle("open");
};
hamburgerToggler.addEventListener("click", toggleNav);

new ResizeObserver((entries) => {
    console.log(entries);
    if (entries[0].contentRect.width <= 779) 
    {
    navLinksContainer.style.transition = "transform 0.3s ease-out";
    } 
    else 
    {
    navLinksContainer.style.transition = "none";
    }
    }).observe(document.body);
