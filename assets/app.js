/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import './styles/fontawesome/css/all.min.css'


const ratio = 0.1;
const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}
const handleIntersect = function (entries, observer) {
    entries.forEach(function(entry){
        if(entry.intersectionRatio > ratio){
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)
        }
    })

}
document.documentElement.classList.add('reveal-loaded');
const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function(r){
    observer.observe(r)
    
})