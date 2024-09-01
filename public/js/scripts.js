/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }
    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Gallery Slider
    const wrapper = document.querySelector('.gallery-wrapper');
    const items = document.querySelectorAll('.gallery-item');
    let index = 0;

    function slideGallery() {
        index++;
        if (index >= items.length) {
            index = 0;
            wrapper.style.transition = 'none'; // Disable transition for jump
            wrapper.style.transform = `translateX(0)`; // Jump back to the start
            setTimeout(() => {
                wrapper.style.transition = 'transform 0.5s ease'; // Re-enable transition
            }, 50);
        } else {
            const itemWidth = items[index].offsetWidth + parseInt(getComputedStyle(items[index]).marginRight);
            wrapper.style.transform = `translateX(-${index * itemWidth}px)`;
        }
    }

    setInterval(slideGallery, 3000);


    // Services Slider
    const serviceSlider = document.querySelector('.slider');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const serviceItemsVisible = 3; // Jumlah item yang terlihat sekaligus
    const serviceTotalItems = document.querySelectorAll('.slider-item').length;
    const serviceSlideWidth = document.querySelector('.slider-item').offsetWidth;
    let serviceCurrentIndex = 0;

    prevBtn.addEventListener('click', function () {
        if (serviceCurrentIndex > 0) {
            serviceCurrentIndex -= serviceItemsVisible;
            serviceSlider.style.transform = `translateX(-${serviceCurrentIndex * serviceSlideWidth}px)`;
        }
    });

    nextBtn.addEventListener('click', function () {
        if (serviceCurrentIndex < serviceTotalItems - serviceItemsVisible) {
            serviceCurrentIndex += serviceItemsVisible;
            serviceSlider.style.transform = `translateX(-${serviceCurrentIndex * serviceSlideWidth}px)`;
        }
    });

});
