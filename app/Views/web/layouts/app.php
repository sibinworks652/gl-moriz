<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moriz</title>
    <link rel="stylesheet" href="<?= base_url('web/assets/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/jest-style.css')?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/fw-style.css')?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/responsive.css')?>">
    <link rel="stylesheet" href="<?= base_url('web/assets/jest-style.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="icon" href="<?= base_url('web/assets/images/home/fav.svg')?>" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

                        <img class="logo-width-cmn" src="<?= base_url('web/assets/images/home/moriz-logo.svg')?>">
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
                                    <a class="active_line nav_link_vy" href="<?= url_to('index') ?>">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="">About Us </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Products <i class="fa fa-angle-down menu-arrow_vy"></i></a>
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
                                                            class="listing" 
                                                            data-img="<?= base_url($cat['thumbnail']) ?>">
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
                                    <a href="">Features </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-item item-right gap-right">
                    <div class="country-list">
                        <div class="country-item active gl-cursor-p">INDIA</div>
                        <div class="divider"></div>
                        <div class="country-item gl-cursor-p">UAE</div>
                        <div class="divider"></div>
                        <div class="country-item gl-cursor-p">UK</div>
                    </div>
                    <div class="line-brk">|</div>
                    <a href="tel:+919946574883" class=" gl-po-rel gl-d-flex gl-fd-row gl-align-center gl-gap-5 gl-td-none">
                        <img class="cont-img" src="<?= base_url('web/assets/images/home/contact.svg')?>">
                        <a href="tel:+919946574883" class="contct-hdr gl-td-none">Contact Us</a>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="smooth-wrapper">
        <div id="smooth-content">
                <?= $this->renderSection('content') ?>
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
            <img src="<?= base_url('web/assets/images/home/wsp-ico.svg')?>" alt="WhatsApp" class="whatsapp-img">
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

        window.onresize = function() {
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


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const data = [{
                    img: "<?= base_url('web/assets/images/home/aligner.webp')?>",
                    text: "Aligners",
                    number: "01"
                }, {
                    img: "<?= base_url('web/assets/images/home/orthodontics.webp')?>",
                    text: "Orthodontics",
                    number: "02"
                },

                {
                    img: "<?= base_url('web/assets/images/home/burs.webp')?>",
                    text: "Burs & Files",
                    number: "03"
                }, {
                    img: "<?= base_url('web/assets/images/home/handpiecee.webp')?>",
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
        document.addEventListener("DOMContentLoaded", function() {

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
    
</body>

</html>