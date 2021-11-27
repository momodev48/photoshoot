"use strict";
//require('./bootstrap');

//require('alpinejs');
document.addEventListener('DOMContentLoaded', () => {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {
                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);
                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }
});

//cacher notification apres quelques secondes

    let notificationSuccess = document.getElementById("notificationSuccess");
    if(notificationSuccess !== null)
    {
        notificationSuccess.style.display = "block";
        setTimeout(function () {
            notificationSuccess.style.display = "none";
        }, 3000);
    }


    const notificationNewsletter = document.getElementById("notificationNewsletter");
    const formNewsletter = document.querySelector(".form__newsletter");
    if(notificationNewsletter !== null)
    {
        notificationNewsletter.style.display = 'none';
        formNewsletter.addEventListener('submit',(e)=>{
            e.preventDefault();
            window.top.window.scrollTo(0,0);
            notificationNewsletter.style.display = 'block';
            setTimeout(function () {
                notificationNewsletter.style.display = 'none';
            }, 5000);
        });
    }


//hide nav scroll down and show when scroll top
const nav = document.querySelector(".navbar.navbar__admin");
function hideNav(){
    let oldScrollY = 0;
    let offsetY = 200;
    window.addEventListener('scroll', function (e) {
        if (oldScrollY > window.scrollY || window.scrollY < offsetY) {
            nav.style.display = 'block';
        } else {
            nav.style.display = 'none';
        }
        oldScrollY = window.scrollY;
    });
}
if(nav)
{
    hideNav();
}


//hide / show go top button
const btnTop = document.querySelector(".icon__top");
if (btnTop)
{
    btnTop.style.display = 'none';
    window.addEventListener("scroll", (e) => {
        let maxScroll = document.body.scrollHeight - window.innerHeight;
        let max = maxScroll-200;
        if(window.scrollY > 400 && window.scrollY < max)
        {
            btnTop.style.display = 'block';
        }
        else
        {
            btnTop.style.display = 'none';
        }
    });
}
