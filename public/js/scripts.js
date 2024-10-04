/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/

// Scripts
window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink');
        } else {
            navbarCollapsible.classList.add('navbar-shrink');
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
    }

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

    setInterval(slideGallery, 2000);

    // Services Slider
    const serviceSlider = document.querySelector('.slider');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const serviceItems = document.querySelectorAll('.slider-item');
    let serviceItemsVisible = window.innerWidth <= 768 ? 1 : 3; // 1 item per slide di mobile, 3 di laptop
    const serviceTotalItems = serviceItems.length;
    let serviceCurrentIndex = 0;

    // Hitung ulang lebar item pada resize
    let serviceSlideWidth = document.querySelector('.slider-item').offsetWidth;

    // Fungsi untuk update slider
    function updateSlider() {
        serviceSlideWidth = document.querySelector('.slider-item').offsetWidth; // Recalculate width on resize
        serviceSlider.style.transform = `translateX(-${serviceCurrentIndex * serviceSlideWidth}px)`;
    }

    // Event listener untuk tombol 'prev'
    prevBtn.addEventListener('click', function () {
        const newServiceCurrentIndex = serviceCurrentIndex - serviceItemsVisible;
        if (newServiceCurrentIndex >= 0) {
            serviceCurrentIndex = newServiceCurrentIndex;
            updateSlider();
            updateNavDots();
        }
    });

    // Event listener untuk tombol 'next'
    nextBtn.addEventListener('click', function () {
        const newServiceCurrentIndex = serviceCurrentIndex + serviceItemsVisible;
        if (newServiceCurrentIndex < serviceTotalItems) {
            serviceCurrentIndex = newServiceCurrentIndex;
            updateSlider();
            updateNavDots();
        }
    });

    // Navigasi dots
    const navDots = document.querySelectorAll('.nav-dot');

    function updateNavDots() {
        navDots.forEach(dot => dot.classList.remove('active'));

        // Menghitung jumlah dots berdasarkan serviceItemsVisible
        const numDots = Math.ceil(serviceTotalItems / serviceItemsVisible);
        
        // Menyembunyikan dots yang tidak perlu
        navDots.forEach((dot, index) => {
            dot.style.display = (index < numDots) ? 'block' : 'none';
        });

        const currentDotIndex = Math.floor(serviceCurrentIndex / serviceItemsVisible);
        navDots[currentDotIndex].classList.add('active');
    }

    // Event listener untuk window resize
    window.addEventListener('resize', () => {
        const newItemsVisible = window.innerWidth <= 768 ? 1 : 3;
        if (serviceItemsVisible !== newItemsVisible) {
            serviceItemsVisible = newItemsVisible;
            serviceCurrentIndex = 0; // Reset index pada resize
            updateSlider();
            updateNavDots();
        }
    });

    // Initialize slider dan nav-dots
    updateSlider();
    updateNavDots();

    // Homepage settings
    // Logika untuk efek fade (jika diinginkan)
    let images = document.querySelectorAll('.background-image');
    let currentImageIndex = 0;

    function fadeImages() {
        // Menyembunyikan semua gambar
        images.forEach((image) => {
            image.classList.remove('active'); // Hapus class 'active' dari semua gambar
        });

        // Tampilkan gambar yang sesuai dengan index
        images[currentImageIndex].classList.add('active'); 
        currentImageIndex = (currentImageIndex + 1) % images.length; // Loop gambar

        // Panggil kembali fungsi setelah 3 detik
        setTimeout(fadeImages, 3000);
    }

    // Mulai dengan memanggil fungsi fade
    fadeImages();
});
