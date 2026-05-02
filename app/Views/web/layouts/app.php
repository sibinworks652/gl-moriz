<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moriz</title>
    <link rel="stylesheet" href="<?= base_url('web/assets/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/jest-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/fw-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/responsive.css') ?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/jest-style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <link rel="icon" href="<?= base_url('web/assets/images/home/fav.svg') ?>" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        .ajax-field-error {
            display: block;
            color: #c62828;
            font-size: 12px;
            line-height: 1.4;
            margin-top: 6px;
        }

        .ajax-form-message {
            color: #c62828;
            font-size: 13px;
            line-height: 1.5;
            margin-top: 12px;
        }

        .ajax-form-message.success {
            color: #1f7a3f;
        }

        .ajax-honeypot {
            position: absolute;
            left: -9999px;
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>

<body>


    <!-- header start -->
    <header class="header header-fixed">
        <div class="container-common-hdr">
            <div class=" header-area gl-py-20 gl-md-py-15">
                <div class="mobile-menu-trigger">
                    <span></span>
                </div>
                <div class="header-item item-left  logo-section pad-right-view">
                    <a href="<?= url_to('index') ?>" class="logo gl-td-none">

                        <img class="logo-width-cmn" src="<?= base_url('web/assets/images/home/moriz-logo.svg') ?>">
                    </a>
                </div>
                <!-- menu start here -->
                <div class="gl-d-flex gl-fd-row gap-hdr">
                    <div class="header-item ">
                        <div class="menu-overlay"></div>
                        <nav class="menu">
                            <div class="mobile-menu-head">
                                <div class="go-back"><i class="fa fa-angle-left"></i></div>
                                <div class="current-menu-title"></div>
                                <div class="mobile-menu-close">&times;</div>
                            </div>
                            <ul class="menu-main mb-0-common">
                                <li>
                                    <a class="active_line <?= (url_is('index') || url_is('/')) ? ' nav_link_vy' : '' ?>"
                                        href="<?= url_to('index') ?>">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?= url_to('about') ?>"
                                        class="active_line <?= url_is('about*') ? 'nav_link_vy' : '' ?>">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#"
                                        class="active_line <?= (url_is('category*') || url_is('product*')) ? 'nav_link_vy' : '' ?>">Products
                                        <i class="fa fa-angle-down menu-arrow_vy"></i></a>
                                    <!-- <div class="sub-menu mega-menu mega-menu-column-4 ">


                                        <div class="list-item">

                                            <div class="list-drp gap-40s  gl-md-pt-0">

                                                <div class="gl-po-rel gl-d-flex gl-fd-column ">
                                                    <a href="" class="listing">Moriz Aligner </a>
                                                    <a href="" class="listing">Moriz Orthodontics</a>
                                                    <a href="" class="listing">Moriz Burs & Files</a>
                                                    <a href="" class="listing">Moriz Handpeice</a>


                                                </div>

                                            </div>

                                        </div>

                                    </div> -->


                                    <div class="sub-menu mega-menu mega-menu-column-4">
                                        <div class="list-item">
                                            <div class="list-drp">
                                                <div class="menu-links">
                                                    <?php if (!empty($headerCategories)): ?>
                                                        <?php foreach ($headerCategories as $cat): ?>
                                                            <a href="<?= base_url('category/' . $cat['slug']) ?>"
                                                                class="listing" data-img="<?= base_url($cat['thumbnail']) ?>">
                                                                <?= esc($cat['name']) ?>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="menu-images">
                                                    <?php
                                                    $defaultImg = !empty($headerCategories)
                                                        ? base_url($headerCategories[0]['thumbnail'])
                                                        : base_url('web/assets/images/home/hv-one.webp');
                                                    ?>
                                                    <img src="<?= $defaultImg ?>" id="menuPreview">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?= url_to('features') ?>"
                                        class="active_line <?= url_is('features') ? ' nav_link_vy' : '' ?>">Features
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?= url_to('contact') ?>"
                                        class="active_line dis-blk <?= url_is('features') ? ' nav_link_vy' : '' ?>">Contact
                                        Us </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-item item-right gap-right">
                    <div class="country-list">
                        <div class="country-item active ">INDIA</div>
                        <div class="divider"></div>
                        <div class="country-item ">UAE</div>
                        <div class="divider"></div>
                        <div class="country-item ">UK</div>
                    </div>
                    <div class="line-brk">|</div>
                    <a href="tel:+919946574883"
                        class=" gl-po-rel gl-d-flex gl-fd-row gl-align-center gl-gap-5 gl-td-none">
                        <img class="cont-img" src="<?= base_url('web/assets/images/home/contact.svg') ?>">
                        <a href="<?= url_to('contact') ?>" class="contct-hdr gl-td-none">Contact Us</a>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <?= $this->renderSection('content') ?>
            <div class="container-common ">
                <div class="ftr-section-moriz gl-mt-60">

                    <div class="ftr-container">



                        <!-- LEFT -->
                        <div class="ftr-col ftr-left">
                            <div class="ftr-inner">

                                <div class="ftr-block">
                                    <div class="ftr-title">Site Map</div>
                                    <ul>
                                        <a href="<?= url_to('index') ?>" class="gl-td-none">
                                            <li>Home</li>
                                        </a>
                                        <a href="<?= url_to('about') ?>" class="gl-td-none">
                                            <li>About Us</li>
                                        </a>
                                        <a href="<?= url_to('product-landing') ?>" class="gl-td-none">
                                            <li>Products</li>
                                        </a>
                                        <a href="<?= url_to('features') ?>" class="gl-td-none">
                                            <li>Features</li>
                                        </a>
                                        <a href="<?= url_to('contact') ?>" class="gl-td-none">
                                            <li>Contact Us</li>
                                        </a>
                                    </ul>
                                </div>

                                <div class="ftr-block">
                                    <div class="ftr-title">Social</div>
                                    <ul>
                                        <a class="gl-td-none" target="_blank" href="https://www.facebook.com/profile.php?id=61572108437006"> <li>Facebook</li></a>
                                        <a class="gl-td-none" target="_blank" href="https://www.instagram.com/moriz_meditech?igsh=YmltdWttOTkwaXBv&utm_source=qr"> <li>Instagram</li></a>
                                        <a class="gl-td-none" target="_blank" href="https://www.linkedin.com/company/115494030/admin/dashboard/"> <li>Linkedin</li></a>
                                       
                                        
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- CENTER -->
                        <div class="ftr-col ftr-center tab-none">

                            <div class="ftr-image-wrap">

                                <!-- MAIN IMAGE -->
                                <img src="<?= base_url('web/assets/images/home/round-basll.webp') ?>"
                                    class="ftr-main-img">

                                <!-- SLIDER -->
                                <div class="ftr-overlay-slider">
                                    <div class="ftr-track" id="ftrTrack">

                                        <!-- ORIGINAL SET -->
                                        <img src="<?= base_url('web/assets/images/home/moriz-anim.svg') ?>">
                                        <img src="<?= base_url('web/assets/images/home/moriz-anim.svg') ?>">
                                        <img src="<?= base_url('web/assets/images/home/moriz-anim.svg') ?>">



                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="ftr-col ftr-right gl-pl-70 gl-lg-pl-10 gl-md-pl-10 gl-sm-pl-0">

                            <div class="ftr-desc">
                                Moriz Meditech is a leading distributor and manufacturer of orthodontic appliances &
                                accessories and dental instruments.
                            </div>

                            <div class="ftr-update-title gl-pt-35">Get Updates</div>

                            <div class="ftr-note">
                                Your information is never disclosed to third parties
                            </div>

                            <form class="footer-subscribe-form" action="<?= url_to('subscribe-submit') ?>"
                                method="post">
                                <div class="ftr-input-wrap">
                                    <input type="email" name="email" placeholder="Enter Your Email" required>

                                    <button type="submit" class="ftr-btn-icon">
                                        <img src="<?= base_url('web/assets/images/home/tele-send.svg') ?>" alt="arrow">
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>

                    <!-- COPYRIGHT -->
                    <div class="ftr-bottom gl-sm-pt-30">
                        Copyright © 2026 <a class="gl-td-none gl-text-black" href="https://www.glinfotech.net/"
                            target="_blank">GL Infotech</a>. All rights reserved.
                    </div>

                </div>

            </div>
        </div>
    </div>
    <button class="back-to-top" id="backToTop">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path d="M12 19V5" stroke="white" stroke-width="2" stroke-linecap="round" />
            <path d="M5 12L12 5L19 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <div class="whatsapp-float">
        <a href="https://wa.me/+918590070532" target="_blank">
            <img src="<?= base_url('web/assets/images/home/wsp-ico.svg') ?>" alt="WhatsApp" class="whatsapp-img">
        </a>
    </div>
    <?= $this->renderSection('scripts') ?>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger, ScrollSmoother)
            const smoother = ScrollSmoother.create({
                wrapper: "#smooth-wrapper",
                content: "#smooth-content",
                smooth: 1, // scroll smoothing speed
                effects: true // enables data-speed & data-lag
            });
        });
    </script>


    <script>
        const menu = document.querySelector(".menu");
        const menuMain = menu.querySelector(".menu-main");
        const goBack = menu.querySelector(".go-back");
        const menuTrigger = document.querySelector(".mobile-menu-trigger");
        const closeMenu = menu.querySelector(".mobile-menu-close");
        let subMenu;
        menuMain.addEventListener("click", (e) => {
            if (!menu.classList.contains("active")) {
                return;
            }
            if (e.target.closest(".menu-item-has-children")) {
                const hasChildren = e.target.closest(".menu-item-has-children");
                showSubMenu(hasChildren);
            }
        });
        goBack.addEventListener("click", () => {
            hideSubMenu();
        })
        menuTrigger.addEventListener("click", () => {
            toggleMenu();
        })
        closeMenu.addEventListener("click", () => {
            toggleMenu();
        })
        document.querySelector(".menu-overlay").addEventListener("click", () => {
            toggleMenu();
        })

        function toggleMenu() {
            menu.classList.toggle("active");
            document.querySelector(".menu-overlay").classList.toggle("active");
        }

        function showSubMenu(hasChildren) {
            subMenu = hasChildren.querySelector(".sub-menu");
            subMenu.classList.add("active");
            subMenu.style.animation = "slideLeft 0.5s ease forwards";
            const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
            menu.querySelector(".current-menu-title").innerHTML = menuTitle;
            menu.querySelector(".mobile-menu-head").classList.add("active");
        }

        function hideSubMenu() {
            subMenu.style.animation = "slideRight 0.5s ease forwards";
            setTimeout(() => {
                subMenu.classList.remove("active");
            }, 300);
            menu.querySelector(".current-menu-title").innerHTML = "";
            menu.querySelector(".mobile-menu-head").classList.remove("active");
        }

        window.onresize = function () {
            if (this.innerWidth > 991) {
                if (menu.classList.contains("active")) {
                    toggleMenu();
                }

            }
        }
    </script>

    <script>
        const header = document.querySelector('.header-fixed');
        const headerHeight = header.offsetHeight;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('is-fixed');
                document.body.style.paddingTop = headerHeight + 'px';
            } else {
                header.classList.remove('is-fixed');
                document.body.style.paddingTop = '0px';
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const animatedItems = document.querySelectorAll(".scroll-up-anim");

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("is-visible");
                        } else {
                            // REMOVE class so animation works every time
                            entry.target.classList.remove("is-visible");
                        }
                    });
                }, {
                threshold: 0.3 // 30% visible triggers animation
            }
            );

            animatedItems.forEach(item => observer.observe(item));
        });
    </script>

    <!-- banner-slider -->
    <script>
        const backToTop = document.getElementById("backToTop");

        // Show button after scrolling 300px
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTop.classList.add("show");
            } else {
                backToTop.classList.remove("show");
            }
        });

        // Smooth scroll to top
        backToTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>


    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            const data = [{
                    img: "<?= base_url('web/assets/images/home/aligner.webp') ?>",
                    text: "Aligners",
                    number: "01"
                }, {
                    img: "<?= base_url('web/assets/images/home/orthodontics.webp') ?>",
                    text: "Orthodontics",
                    number: "02"
                },

                {
                    img: "<?= base_url('web/assets/images/home/burs.webp') ?>",
                    text: "Burs & Files",
                    number: "03"
                }, {
                    img: "<?= base_url('web/assets/images/home/handpiecee.webp') ?>",
                    text: "Handpeice",
                    number: "04"
                }
            ];

            let banrIndex = 0;

            const image = document.getElementById("banrImage");
            const text = document.getElementById("banrText");
            const number = document.getElementById("banrNumber");

            function updateBanner() {

                if (!image || !text || !number) {
                    console.error("Elements not found!");
                    return;
                }

                // Fade out
                image.style.opacity = "0";
                text.style.opacity = "0";
                number.style.opacity = "0";

                setTimeout(() => {
                    banrIndex = (banrIndex + 1) % data.length;

                    image.src = data[banrIndex].img;
                    text.innerText = data[banrIndex].text;
                    number.innerText = data[banrIndex].number;

                    // Fade in
                    image.style.opacity = "1";
                    text.style.opacity = "1";
                    number.style.opacity = "1";

                }, 400);
            }

            setInterval(updateBanner, 5000);

        });
    </script> -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const data = [
            <?php foreach ($headerCategories as $index => $category): ?>
            {
                img: "<?= base_url($category['thumbnail']) ?>",
                text: "<?= addslashes($category['name']) ?>",
                number: "<?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>", // Added missing comma
                link: "<?= url_to('category-detail', $category['slug']) ?>"
            },
            <?php endforeach; ?>
        ];

        if (data.length === 0) return;

        let banrIndex = 0;
        const image = document.getElementById("banrImage");
        const text = document.getElementById("banrText");
        const number = document.getElementById("banrNumber");
        const link = document.getElementById("banrLink"); // Reference the <a> tag

        function setInitialContent() {
            image.src = data[0].img;
            text.innerText = data[0].text;
            number.innerText = data[0].number;
            link.href = data[0].link; // Set initial link
            
            image.style.opacity = "1";
            text.style.opacity = "1";
            number.style.opacity = "1";
        }

        function rotateBanner() {
            // Fade out
            image.style.opacity = "0";
            text.style.opacity = "0";
            number.style.opacity = "0";

            setTimeout(() => {
                banrIndex = (banrIndex + 1) % data.length;

                image.src = data[banrIndex].img;
                text.innerText = data[banrIndex].text;
                number.innerText = data[banrIndex].number;
                link.href = data[banrIndex].link; // Update link on rotation

                // Fade in
                image.style.opacity = "1";
                text.style.opacity = "1";
                number.style.opacity = "1";
            }, 400);
        }

        setInitialContent();
        setInterval(rotateBanner, 5000);
    });
</script>

    <script>
        const items = document.querySelectorAll(".qstn_item");

        items.forEach((item) => {
            item.querySelector(".qstn_head").addEventListener("click", () => {

                // close all
                items.forEach(i => i.classList.remove("active"));

                // open clicked
                item.classList.add("active");
            });
        });
    </script>

    <script>
        const crSection = document.querySelector('.customer-review-area');
        const crTrack = crSection.querySelector('.review-track');
        const crNextBtn = crSection.querySelector('.next-btn');
        const crPrevBtn = crSection.querySelector('.prev-btn');

        let crIndex = 0;
        let autoSlideInterval;

        // 🔥 Responsive visible cards
        function getVisibleCards() {
            if (window.innerWidth <= 768) return 1.2;
            if (window.innerWidth <= 1200) return 2.5;
            return 3.5;
        }

        // 🔥 Card move width
        function getMoveValue() {
            const card = crSection.querySelector('.review-card');
            const gap = 25;
            return card.offsetWidth + gap;
        }

        // 🔥 Max index
        function getMaxIndex() {
            const total = crTrack.children.length;
            const visible = getVisibleCards();
            return Math.ceil(total - visible);
        }

        // 🔥 Update slide
        function updateSlider() {
            crTrack.style.transform = `translateX(-${crIndex * getMoveValue()}px)`;
        }

        // NEXT
        function nextSlide() {
            if (crIndex < getMaxIndex()) {
                crIndex++;
            } else {
                crIndex = 0; // 🔁 loop
            }
            updateSlider();
        }

        // PREV
        function prevSlide() {
            if (crIndex > 0) {
                crIndex--;
            } else {
                crIndex = getMaxIndex(); // loop reverse
            }
            updateSlider();
        }

        // BUTTON EVENTS
        crNextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });

        crPrevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });

        // 🔥 AUTO SLIDE START
        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                nextSlide();
            }, 3000); // ⏱ change speed here
        }

        // 🔥 RESET AUTO SLIDE
        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // ⛔ Pause on hover
        crSection.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        crSection.addEventListener('mouseleave', () => {
            startAutoSlide();
        });

        // 🔄 Reset on resize
        window.addEventListener('resize', () => {
            crIndex = 0;
            updateSlider();
        });

        // INIT
        startAutoSlide();
    </script>


    <script>
        const track = document.getElementById('ftrTrack');

        // Duplicate content dynamically
        track.innerHTML += track.innerHTML;

        let pos = 0;
        let speed = 0.9; // adjust speed here

        function animate() {
            pos -= speed;

            // when half scrolled, reset (no jump)
            if (Math.abs(pos) >= track.scrollWidth / 2) {
                pos = 0;
            }

            track.style.transform = `translateX(${pos}px)`;
            requestAnimationFrame(animate);
        }

        animate();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const menuItemsList = document.querySelectorAll('.listing');
            const menuPreviewImg = document.getElementById('menuPreview');
            const menuImageBox = document.querySelector('.menu-images');

            // Hover image change
            menuItemsList.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    const imgPath = link.getAttribute('data-img');

                    menuPreviewImg.style.opacity = 0;

                    setTimeout(() => {
                        menuPreviewImg.src = imgPath;
                        menuPreviewImg.style.opacity = 1;
                    }, 150);
                });
            });

            // 🔥 Responsive hide/show
            function handleMenuImage() {
                if (window.innerWidth <= 991) {
                    menuImageBox.style.display = "none";
                } else {
                    menuImageBox.style.display = "block";
                }
            }

            // Run on load
            handleMenuImage();

            // Run on resize
            window.addEventListener("resize", handleMenuImage);

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const contactEndpoint = "<?= url_to('contact-submit') ?>";
            const subscribeEndpoint = "<?= url_to('subscribe-submit') ?>";

            function addSpamFields(form) {
                if (!form.querySelector('[name="website"]')) {
                    const website = document.createElement('input');
                    website.type = 'text';
                    website.name = 'website';
                    website.tabIndex = -1;
                    website.autocomplete = 'off';
                    website.className = 'ajax-honeypot';
                    form.appendChild(website);
                }

                let startedAt = form.querySelector('[name="form_started_at"]');
                if (!startedAt) {
                    startedAt = document.createElement('input');
                    startedAt.type = 'hidden';
                    startedAt.name = 'form_started_at';
                    form.appendChild(startedAt);
                }
                startedAt.value = Math.floor(Date.now() / 1000);
            }

            function clearMessages(form) {
                form.querySelectorAll('.ajax-field-error, .ajax-form-message').forEach(function (item) {
                    item.remove();
                });
            }

            function showFieldError(field, message) {
                if (!field) return;

                const error = document.createElement('span');
                error.className = 'ajax-field-error';
                error.textContent = message;
                field.insertAdjacentElement('afterend', error);
            }

            function showFormMessage(form, message, isSuccess) {
                const messageBox = document.createElement('div');
                messageBox.className = 'ajax-form-message' + (isSuccess ? ' success' : '');
                messageBox.textContent = message;
                form.appendChild(messageBox);

                if (isSuccess) {
                    setTimeout(function () {
                        messageBox.remove();
                    }, 4500);
                }
            }

            function setButtonLoading(form, isLoading) {
                const button = form.querySelector('button[type="submit"], button:not([type])');
                if (!button) return;

                button.disabled = isLoading;
                if (isLoading) {
                    if (button.textContent.trim() !== '') {
                        button.dataset.originalText = button.textContent;
                        button.dataset.textWasChanged = '1';
                        button.textContent = 'Sending...';
                    }
                } else if (button.dataset.textWasChanged === '1') {
                    button.textContent = button.dataset.originalText;
                    delete button.dataset.textWasChanged;
                }
            }

            function postAjax(form, endpoint, data, fieldMap) {
                clearMessages(form);
                setButtonLoading(form, true);

                fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: data
                })
                    .then(function (response) {
                        return response.json().then(function (payload) {
                            if (!response.ok) {
                                throw payload;
                            }
                            return payload;
                        });
                    })
                    .then(function (payload) {
                        form.reset();
                        addSpamFields(form);
                        showFormMessage(form, payload.message || 'Submitted successfully.', true);
                    })
                    .catch(function (payload) {
                        const errors = payload && payload.errors ? payload.errors : {};
                        Object.keys(errors).forEach(function (key) {
                            showFieldError(fieldMap[key], errors[key]);
                        });
                        showFormMessage(form, (payload && payload.message) || 'Please check the form and try again.', false);
                    })
                    .finally(function () {
                        setButtonLoading(form, false);
                    });
            }

            document.querySelectorAll('form.form_inner').forEach(function (form) {
                addSpamFields(form);

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const inputs = form.querySelectorAll('input:not([type="hidden"]):not(.ajax-honeypot)');
                    const message = form.querySelector('textarea');
                    const data = new FormData();
                    const fieldMap = {
                        first_name: inputs[0],
                        last_name: inputs[1],
                        email: inputs[2],
                        phone: inputs[3],
                        message: message
                    };

                    data.append('first_name', inputs[0] ? inputs[0].value.trim() : '');
                    data.append('last_name', inputs[1] ? inputs[1].value.trim() : '');
                    data.append('email', inputs[2] ? inputs[2].value.trim() : '');
                    data.append('phone', inputs[3] ? inputs[3].value.trim() : '');
                    data.append('message', message ? message.value.trim() : '');
                    data.append('page', window.location.href);
                    data.append('website', form.querySelector('[name="website"]').value);
                    data.append('form_started_at', form.querySelector('[name="form_started_at"]').value);

                    postAjax(form, contactEndpoint, data, fieldMap);
                });
            });

            document.querySelectorAll('form.footer-subscribe-form').forEach(function (form) {
                addSpamFields(form);

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const emailInput = form.querySelector('[name="email"]');
                    const data = new FormData();
                    data.append('email', emailInput ? emailInput.value.trim() : '');
                    data.append('page', window.location.href);
                    data.append('website', form.querySelector('[name="website"]').value);
                    data.append('form_started_at', form.querySelector('[name="form_started_at"]').value);

                    postAjax(form, subscribeEndpoint, data, { email: emailInput });
                });
            });

            document.querySelectorAll('.ftr-input-wrap').forEach(function (wrapper) {
                if (wrapper.closest('form.footer-subscribe-form')) {
                    return;
                }

                const emailInput = wrapper.querySelector('input');
                const button = wrapper.querySelector('button');
                if (!emailInput || !button) {
                    return;
                }

                const form = document.createElement('form');
                form.className = 'footer-subscribe-form';
                form.action = subscribeEndpoint;
                form.method = 'post';
                form.noValidate = false;
                wrapper.parentNode.insertBefore(form, wrapper);
                form.appendChild(wrapper);
                emailInput.type = 'email';
                emailInput.name = 'email';
                button.type = 'submit';
                addSpamFields(form);

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const data = new FormData();
                    data.append('email', emailInput.value.trim());
                    data.append('page', window.location.href);
                    data.append('website', form.querySelector('[name="website"]').value);
                    data.append('form_started_at', form.querySelector('[name="form_started_at"]').value);

                    postAjax(form, subscribeEndpoint, data, { email: emailInput });
                });
            });
        });
    </script>


    <script>
        // gsap animations
        function animateOnScroll(className, effect = "fade", options = {}) {
            const elements = document.querySelectorAll(className);
            const isMobile = window.innerWidth <= 768;
            elements.forEach((el, index) => {
                let animProps = {};
                switch (effect) {
                    case "fade":
                        animProps = {
                            opacity: 0
                        };
                        break;
                    case "slide-up":
                        animProps = {
                            opacity: 0,
                            y: 50
                        };
                        break;
                    case "slide-down":
                        animProps = {
                            opacity: 0,
                            y: -50
                        };
                        break;
                    case "slide-left":
                        animProps = {
                            opacity: 0,
                            x: -50
                        };
                        break;
                    case "slide-right":
                        animProps = {
                            opacity: 0,
                            x: 50
                        };
                        break;
                    case "zoom":
                        animProps = {
                            opacity: 0,
                            scale: 0.8
                        };
                        break;
                    case "rotate":
                        animProps = {
                            opacity: 0,
                            rotation: 45
                        };
                        break;
                    default:
                        animProps = {
                            opacity: 0
                        };
                }

                gsap.from(el, {
                    ...animProps,
                    duration: options.duration || 1,
                    delay: (options.delay || 0) + (options.delayIncrement || 0) * index,
                    ease: options.ease || "power2.out",
                    scrollTrigger: {
                        trigger: el,
                        start: isMobile ? (options.startMobile || "top 95%") :
                            (options.start || "top 90%"),
                        toggleActions: options.toggleActions || "play none none reverse"
                    }
                });
            });
        }

        /*** Text animations (with letter or word stagger support) */
        function animateTextOnScroll(className, effect = "text-fade", options = {}) {
            const elements = document.querySelectorAll(className);
            const isMobile = window.innerWidth <= 768;

            elements.forEach(el => {
                let targets = el;

                // Split text for stagger
                if (options.stagger) {
                    const text = el.textContent.trim();
                    if (options.staggerType === "words") {
                        el.innerHTML = text.split(" ").map(word => `<span class="word">${word}&nbsp;</span>`).join("");
                    } else {
                        el.innerHTML = text.split("").map(ch => `<span>${ch}</span>`).join("");
                    }
                    targets = el.querySelectorAll("span");
                }

                let animProps = {};
                switch (effect) {
                    case "text-fade":
                        animProps = {
                            opacity: 0
                        };
                        break;
                    case "text-slide-up":
                        animProps = {
                            opacity: 0,
                            y: 30
                        };
                        break;
                    case "text-slide-down":
                        animProps = {
                            opacity: 0,
                            y: -30
                        };
                        break;
                    case "text-zoom":
                        animProps = {
                            opacity: 0,
                            scale: 0.9
                        };
                        break;
                    case "text-rotate":
                        animProps = {
                            opacity: 0,
                            rotationX: 90
                        };
                        break;
                    default:
                        animProps = {
                            opacity: 0
                        };
                }

                gsap.from(targets, {
                    ...animProps,
                    duration: options.duration || 1,
                    delay: options.delay || 0,
                    ease: options.ease || "power2.out",
                    stagger: options.stagger || 0,
                    transformOrigin: "center bottom",
                    scrollTrigger: {
                        trigger: el,
                        start: isMobile ? (options.startMobile || "top 95%") :
                            (options.start || "top 80%"),
                        toggleActions: options.toggleActions || "play none none reverse"
                    }
                });
            });
        }


        // gsap animations
        window.addEventListener("load", () => {
            if (typeof gsap !== "undefined" &&
                typeof ScrollTrigger !== "undefined" &&
                typeof animateOnScroll === "function") {

                gsap.registerPlugin(ScrollTrigger);

                animateOnScroll(".g-zoom-in", "zoom");
                animateOnScroll(".g-fade-in", "fade", {
                    delay: 0.2
                });
                animateOnScroll(".g-slide-down-in", "slide-down");
                animateOnScroll(".g-slide-left-in", "slide-left");
                animateOnScroll(".g-slide-right-in", "slide-right");
                animateOnScroll(".g-rotate-in", "rotate");
                animateOnScroll(".g-slide-up", "slide-up", {
                    delay: 0.1
                });
            }
        });

        window.addEventListener("load", () => {
            if (typeof gsap !== "undefined" &&
                typeof ScrollTrigger !== "undefined" &&
                typeof animateTextOnScroll === "function") {

                gsap.registerPlugin(ScrollTrigger);
                // Text stagger (letters)
                animateTextOnScroll(".g-text-stagger-letters", "text-slide-up", {
                    stagger: 0.05,
                    duration: 0.8
                });
                // Text stagger (words)
                animateTextOnScroll(".g-text-stagger-words", "text-slide-up", {
                    stagger: 0.15,
                    duration: 1,
                    staggerType: "words"
                });

            }
        });
    </script>

</body>

</html>