<?php $this->extend('web/layouts/app'); ?>
<?php $this->section('content'); ?>

<style>
    .product-features-list {
        margin-top: 10px !important;
    }

    .product-features-list ul {
        list-style-type: disc !important;
        margin-left: 20px !important;
        padding-left: 10px;
    }

    .product-features-list li {
        font-size: 16px;
        display: list-item !important;
        font-family: "Poppins", sans-serif;
    }

    .product-features-list ul li::marker {
        color: #000;
        font-size: 1.2em;
    }
</style>

<?php $mainImage = $gallery[0]['image'] ?? $product['thumbnail'] ?? 'web/assets/images/orthodontics/product.webp'; ?>
<div class="other_common_banner pad-top-140">

    <div class="container-common-product">

        <!-- Breadcrumb -->
        <div class="ocb_breadcrumb gl-pb-20">
            <a href="<?= url_to('index') ?>">Home</a>
            <span>/</span>
            <a href="<?= url_to('product-landing') ?>">Products</a>
            <span>/</span>
            <a
                href="<?= url_to('category-detail', $product['category_slug']) ?>"><?= esc($product['category_name']) ?></a>
            <?php if (!empty($product['subcategory_name'])): ?>
                <span>/</span>
                <a
                    href="<?= url_to('category-detail', $product['category_slug']) ?>"><?= esc($product['subcategory_name']) ?></a>
            <?php endif; ?>
            <span>/</span>
            <a href="#" class="active"><?= esc($product['name']) ?></a>
        </div>

        <div class="product_deteil_slide gl-pt-30 gl-xs-pt-10">
            <div class="product_wrapper">

                <!-- LEFT IMAGE SECTION -->
                <div class="product_images">

                    <!-- MAIN IMAGE -->
                    <div class="main_image" id="zoomContainer">
                        <img id="mainProductImage" src="<?= base_url(esc($mainImage)) ?>"
                            alt="<?= esc($product['name']) ?>">
                    </div>

                    <!-- THUMBNAILS -->
                    <?php if (!empty($gallery)): ?>
                        <div class="thumbnail_images">
                            <?php foreach ($gallery as $index => $image): ?>
                                <img src="<?= base_url(esc($image['image'])) ?>" alt="<?= esc($product['name']) ?>"
                                    class="product_thumb<?= $index === 0 ? ' active' : '' ?>"
                                    data-image-src="<?= base_url(esc($image['image'])) ?>">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- RIGHT CONTENT -->
                <div class="product_content">
                    <span class="tag"><?= esc($product['category_name']) ?></span>
                    <h2 class="main-head-prdct gl-pt-20"><?= esc($product['name']) ?></h2>
                    <div class="ocb_breadcrumb">

                        <a href="<?= url_to('product-landing') ?>">Products</a>
                        <span>></span>
                        <a
                            href="<?= url_to('category-detail', $product['category_slug']) ?>"><?= esc($product['category_name']) ?></a>
                        <span>></span>
                        <a href="<?= url_to('category-detail', $product['category_slug']) ?>" class="active"><span
                                class="content_truncate-right-content"><?= esc($product['subcategory_name']) ?></span></a>
                    </div>
                    <?php if (!empty($product['type'])): ?>
                        <p class="type">Type: <span class="varient"><?= esc($product['type']) ?></span></p>
                    <?php endif; ?>
                    <?php if (!empty($product['product_information'])): ?>
                        <h4 class="prd-info gl-pt-20 gl-pb-10">Product information</h4>
                        <?php echo str_replace('<p>', '<p class="desc">', $product['product_information']) ?>
                    <?php endif; ?>

                    <!-- QTY -->
                    <div class="feature-heads">Qty</div>
                    <div class="qty_box">
                        <button class="minus">-</button>
                        <input type="number" id="qtyInput" value="1" min="1">
                        <button class="plus">+</button>
                    </div>

                    <!-- FEATURES -->
                    <?php if (!empty($product['features'])): ?>
                        <div class="feature-heads gl-pb-10">Features</div>
                        <div class="product-features-list">
                            <?php echo str_replace('<li>', '<li class="ftr-list">', $product['features']) ?>
                        </div>
                    <?php endif; ?>

                    <!-- BUTTONS -->
                    <a href="#" class="btns open-wsp-popup gl-d-flex gl-fd-row gl-td-none gl-cursor-p">

                        <img src="<?= base_url('web/assets/images/product-detail/wsps.svg') ?>" alt="">
                        <div class="wsp-btns">Order On Whatsapp</div>

                    </a>
                </div>
            </div>
        </div>


    </div>

</div>

<div class="special_grids pt-90s">

    <div class="special_track" id="specialTrack">

        <div class="special_item">
            <img src="<?= base_url('web/assets/images/product-detail/genuines.webp') ?>" alt="">
            <div class="special_text">
                <div>100%</div>
                <div>Genuine Products</div>
            </div>
        </div>

        <div class="special_item">
            <img src="<?= base_url('web/assets/images/product-detail/best-practices.webp') ?>" alt="">
            <div class="special_text">
                <div>Best</div>
                <div>Price Assurance</div>
            </div>
        </div>

        <div class="special_item">
            <img src="<?= base_url('web/assets/images/product-detail/speedds.webp') ?>" alt="">
            <div class="special_text">
                <div>Fast Pan</div>
                <div>India Delivery</div>
            </div>
        </div>

        <div class="special_item">
            <img src="<?= base_url('web/assets/images/product-detail/warrantys.webp') ?>" alt="">
            <div class="special_text">
                <div>Manufacturer</div>
                <div>Warranty</div>
            </div>
        </div>

        <div class="special_item">
            <img src="<?= base_url('web/assets/images/product-detail/calls.webp') ?>" alt="">
            <div class="special_text">
                <div>Dedicated</div>
                <div>Support</div>
            </div>
        </div>

    </div>

</div>
<?php if (!empty($relatedProducts)): ?>
    <div class="container-common-product pt-90s ">
        <div class="related_products">

            <!-- Header -->
            <div class="related_products-header">
                <div class="related_products-title">Related Products</div>

                <div class="related_products-arrows">
                    <button class="rp-prev">
                        <img src="<?= base_url('web/assets/images/product-detail/line-arrow.svg') ?>">
                    </button>

                    <button class="rp-next">
                        <img src="<?= base_url('web/assets/images/product-detail/line-arrow-right.svg') ?>">
                    </button>
                </div>
            </div>

            <!-- Slider -->
            <div class="related_products-slider gl-pb-70 brd-btm-new">
                <div class="related_products-track">

                    <!-- Slides -->
                    <?php foreach ($relatedProducts as $relatedProduct): ?>
                        <div class="rp-slide">
                            <a href="<?= url_to('product-detail', $relatedProduct['slug']) ?>">
                                <div class="rp-inner"><img class="gl-w-100"
                                        src="<?= base_url(esc($relatedProduct['thumbnail'] ?: 'web/assets/images/orthodontics/product.webp')) ?>">
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<section class="beyond_quality_area">
    <div class="container-common">

        <div class="beyond_head">
            <span class="tag">Products</span>
            <h2>Clinical Quality<br>Consistent Results</h2>
            <p>
                We create products that support confident clinical work, delivering reliable performance across a wide
                range of treatments.
            </p>
        </div>

        <div class="beyond_grid">

            <!-- Item 1 -->
            <?php foreach ($categories as $category): ?>
                <a href="<?= url_to('category-detail', $category['slug']) ?>" class="gl-td-none">
                    <div class="beyond_card">
                        <div class="beyond_img">
                            <img src="<?= base_url($category['thumbnail']) ?>" alt="<?= esc($category['name']) ?>">
                        </div>
                        <div class="beyond_content">
                            <span><?= esc($category['name']) ?></span>
                            <div class="arrow">
                                <svg width="18" height="18" viewBox="0 0 24 24">
                                    <path d="M5 12h14M13 5l7 7-7 7" stroke="white" stroke-width="2" fill="none" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<div class="container-common ">
    <section class="customer-review-area gl-mt-35">


        <div class="review-header">
            <div class="review-left">
                <div class="review-sub">CUSTOMER REVIEWS</div>
                <div class="review-title">Real results from Real people</div>
            </div>

            <div class="review-nav">
                <button class="nav-btn prev-btn">
                    <!-- LEFT SVG -->
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path d="M15 6l-6 6 6 6" fill="none" stroke="#1b6fa8" stroke-width="2" />
                    </svg>
                </button>

                <button class="nav-btn next-btn">
                    <!-- RIGHT SVG -->
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path d="M9 6l6 6-6 6" fill="none" stroke="#1b6fa8" stroke-width="2" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- SLIDER -->
        <div class="review-slider">
            <div class="review-track">

                <!-- CARD -->
                <div class="review-card">
                    <div class="quote-icon">
                        <!-- SVG -->
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>

                    <div class="review-author">Dr. Anita Sharma</div>
                    <div class="review-role">Dentist</div>
                    <div class="review-text">
                        "These composite materials have transformed my restorative work. Excellent handling and
                        aesthetics!"

                    </div>

                </div>

                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Dr. Aisha Matthew</div>
                    <div class="review-role">Oral Surgeon</div>
                    <div class="review-text">
                        "Consistently high-quality surgical materials. They've become indispensable in my procedures."

                    </div>

                </div>

                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Rajesh Patel</div>
                    <div class="review-role">Lab Technician</div>
                    <div class="review-text">
                        "Unmatched precision in impression materials. It's streamlined our lab work significantly."

                    </div>

                </div>

                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Thomas Kurien</div>
                    <div class="review-role">Orthodontist</div>
                    <div class="review-text">
                        "Moriz orthodontic supplies are reliable and patient-friendly. A real practice enhancer."

                    </div>

                </div>
                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Dr. Priya Desai</div>
                    <div class="review-role">Dentist</div>
                    <div class="review-text">
                        "This polishing system has improved my cleaning efficiency. Patients notice the difference!"
                    </div>

                </div>
                <div class="review-card">
                    <div class="quote-icon">
                        <!-- SVG -->
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>

                    <div class="review-author">Dr. Anita Sharma</div>
                    <div class="review-role">Dentist</div>
                    <div class="review-text">
                        "These composite materials have transformed my restorative work. Excellent handling and
                        aesthetics!"

                    </div>

                </div>

                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Dr. Aisha Matthew</div>
                    <div class="review-role">Oral Surgeon</div>
                    <div class="review-text">
                        "Consistently high-quality surgical materials. They've become indispensable in my procedures."

                    </div>

                </div>

                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Rajesh Patel</div>
                    <div class="review-role">Lab Technician</div>
                    <div class="review-text">
                        "Unmatched precision in impression materials. It's streamlined our lab work significantly."

                    </div>

                </div>

                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Thomas Kurien</div>
                    <div class="review-role">Orthodontist</div>
                    <div class="review-text">
                        "Moriz orthodontic supplies are reliable and patient-friendly. A real practice enhancer."

                    </div>

                </div>
                <div class="review-card">
                    <div class="quote-icon">
                        <img src="<?= base_url('web/assets/images/home/exclamation.svg') ?>">
                    </div>
                    <div class="review-author">Dr. Priya Desai</div>
                    <div class="review-role">Dentist</div>
                    <div class="review-text">
                        "This polishing system has improved my cleaning efficiency. Patients notice the difference!"
                    </div>

                </div>


            </div>
        </div>


    </section>
</div>
<!-- customer-review-area------------------------ -->

<!-- form-area--------------------- -->
<div class="container-common">
    <section class="speak_form_area">


        <div class="speak_form_inner">

            <!-- LEFT SIDE -->
            <div class="speak_left">

                <div class="contact_tag">Contact Us</div>

                <div class="speak_title">
                    Speak directly with our experts
                </div>

                <div class="speak_desc">
                    Send us your queries, and our team will respond promptly with detailed solutions and product
                    information you can trust.
                </div>

                <!-- MAP -->
                <div class="speak_map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3922.7199538073896!2d76.21599457583655!3d10.52270926382072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7ef727f9a113b%3A0xe21b9605adf5e4f5!2smoriz%20meditech%20p%20ltd!5e0!3m2!1sen!2sin!4v1776850758252!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- INFO -->
                <div class="speak_info gl-pt-50 gl-xs-pt-20">

                    <div class="info_box">
                        <div class="info_icon">
                            <img src="<?= base_url('web/assets/images/home/mail.svg') ?>">
                        </div>
                        <div>
                            <div class="info_label">EMAIL ID</div>
                            <a href="mailto:morizmeditech@gmail.com" target="_blank"
                                class="info_text gl-td-none">morizmeditech@gmail.com</a>
                        </div>
                    </div>

                    <div class="info_box">
                        <div class="info_icon">
                            <img src="<?= base_url('web/assets/images/home/call.svg') ?>">
                        </div>
                        <div>
                            <div class="info_label">PHONE NUMBER</div>
                            <a href="tel:+919946574883" target="_blank" class="info_text gl-td-none">+91 9946574883</a>
                        </div>
                    </div>

                    <div class="info_box">
                        <div class="info_icon">
                            <img src="<?= base_url('web/assets/images/home/locations.svg') ?>">
                        </div>
                        <div>
                            <div class="info_label">ADDRESS</div>
                            <div class="info_text">
                                Palakkal angadi road, pallikkulam, thrissur, kerala 680001
                            </div>
                        </div>
                    </div>

                    <div class="info_box">
                        <div class="info_icon">
                            <img src="<?= base_url('web/assets/images/home/visit.svg') ?>">
                        </div>
                        <div>
                            <div class="info_label">VISIT US</div>
                            <div class="info_text">Monday - Friday<br>9AM - 5PM</div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- RIGHT FORM -->
            <div class="speak_form_box gl-md-mt-40">
                <form class="form_inner">

                    <div class="form_row">
                        <div class="form_group">
                            <label>First Name*</label>
                            <input type="text" required>
                        </div>

                        <div class="form_group">
                            <label>Last Name*</label>
                            <input type="text" required>
                        </div>
                    </div>

                    <div class="form_row">
                        <div class="form_group">
                            <label>Email Id*</label>
                            <input type="email" required>
                        </div>

                        <div class="form_group">
                            <label>Phone*</label>
                            <input type="text" required>
                        </div>
                    </div>

                    <div class="form_row full">
                        <div class="form_group">
                            <label>Message*</label>
                            <textarea required></textarea>
                        </div>
                    </div>

                    <div class="form_btn_wrap">

                        <button type="submit" class="submit_btn">
                            Submit Message
                        </button>

                        <button type="button" class="arrow_btn">
                            <svg class="arrow_icon" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19" stroke="#2c6aa0" stroke-width="2" stroke-linecap="round" />
                                <path d="M13 6L19 12L13 18" stroke="#2c6aa0" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>

                    </div>

                </form>
            </div>

        </div>


    </section>

</div>

<div class="dwnld_catalogue">
    <?php if (!empty($product['category_catalogue_file'])): ?>
        <a href="<?= base_url($product['category_catalogue_file']) ?>" download>
            <span class="text">Download Catalogue</span>
            <!-- Corner Borders -->
            <span class="corner top-left"></span>
            <span class="corner top-right"></span>
            <span class="corner bottom-left"></span>
            <span class="corner bottom-right"></span>
        </a>
    <?php else: ?>
        <a href="#">
            <span class="text">Download Catalogue</span>

            <!-- Corner Borders -->
            <span class="corner top-left"></span>
            <span class="corner top-right"></span>
            <span class="corner bottom-left"></span>
            <span class="corner bottom-right"></span>
        </a>
    <?php endif; ?>
</div>

<div class="line-area"></div>

<div class="wsp-overlay-pop" id="wspPopup">

    <div class="wsp-overlay-pop-bg"></div>

    <div class="wsp-overlay-pop-box">

        <span class="wsp-overlay-pop-close">&times;</span>

        <h3 class="wsp-overlay-pop-title">
            <img src="<?= base_url('web/assets/images/product-detail/wsp-green.svg') ?>"> Request Quote Via Whatsapp
        </h3>

        <form id="wspForm">

            <input type="text" id="wspCustomerName" placeholder="Full Name*" required>

            <input type="email" id="wspCustomerEmail" placeholder="Email Address*" required>

            <input type="tel" id="wspCustomerPhone" placeholder="Phone*" required>

            <textarea id="wspCustomerAddress" placeholder="Delivery Address*" required></textarea>

            <button type="submit">Request a quotation</button>

        </form>

    </div>
</div>
<script>
    // THUMBNAIL CLICK CHANGE IMAGE
    const thumbs = document.querySelectorAll(".product_thumb");
    const mainImg = document.getElementById("mainProductImage");

    thumbs.forEach(thumb => {
        thumb.addEventListener("click", function () {

            // Change image
            mainImg.src = this.src;

            // Active class
            thumbs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");
        });
    });


    // 🔥 ZOOM EFFECT (FULL IMAGE MOVE)
    const zoomContainer = document.getElementById("zoomContainer");

    zoomContainer.addEventListener("mousemove", function (e) {
        const rect = zoomContainer.getBoundingClientRect();

        const x = (e.clientX - rect.left) / rect.width * 100;
        const y = (e.clientY - rect.top) / rect.height * 100;

        mainImg.style.transformOrigin = `${x}% ${y}%`;
        mainImg.style.transform = "scale(2)";
    });

    zoomContainer.addEventListener("mouseleave", function () {
        mainImg.style.transform = "scale(1)";
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const qtyInput = document.getElementById("qtyInput");
        const plusBtn = document.querySelector(".plus");
        const minusBtn = document.querySelector(".minus");
        const wspPopup = document.getElementById("wspPopup");
        const openBtn = document.querySelector(".open-wsp-popup");
        const closeBtn = document.querySelector(".wsp-overlay-pop-close");
        const overlay = document.querySelector(".wsp-overlay-pop-bg");
        const wspForm = document.getElementById("wspForm");

        const productEnquiry = {
            name: <?= json_encode($product['name'] ?? '') ?>,
            category: <?= json_encode($product['category_name'] ?? '') ?>,
            subcategory: <?= json_encode($product['subcategory_name'] ?? '') ?>,
            link: <?= json_encode(current_url()) ?>
        };

        if (qtyInput && plusBtn && minusBtn) {
            let isFirstClick = true;

            qtyInput.addEventListener("focus", function () {
                if (isFirstClick) {
                    this.value = "";
                    isFirstClick = false;
                }
            });

            qtyInput.addEventListener("blur", function () {
                if (this.value === "" || parseInt(this.value, 10) < 1) {
                    this.value = 1;
                }
                isFirstClick = true;
            });

            plusBtn.addEventListener("click", () => {
                const value = parseInt(qtyInput.value, 10) || 1;
                qtyInput.value = value + 1;
            });

            minusBtn.addEventListener("click", () => {
                const value = parseInt(qtyInput.value, 10) || 1;
                qtyInput.value = value > 1 ? value - 1 : 1;
            });
        }

        if (wspPopup && openBtn && closeBtn && overlay && wspForm) {
            document.body.appendChild(wspPopup);

            const openPopup = () => {
                wspPopup.classList.add("active");
                document.body.style.overflow = "hidden";
            };

            const closePopup = () => {
                wspPopup.classList.remove("active");
                document.body.style.overflow = "";
            };

            openBtn.addEventListener("click", (e) => {
                e.preventDefault();
                openPopup();
            });

            closeBtn.addEventListener("click", closePopup);
            overlay.addEventListener("click", closePopup);

            wspForm.addEventListener("submit", function (e) {
                e.preventDefault();

                const quantity = qtyInput && qtyInput.value ? qtyInput.value : "1";
                const name = document.getElementById("wspCustomerName").value.trim();
                const email = document.getElementById("wspCustomerEmail").value.trim();
                const phone = document.getElementById("wspCustomerPhone").value.trim();
                const address = document.getElementById("wspCustomerAddress").value.trim();

                const message = [
                    "Hello Moriz Meditech,",
                    "",
                    "I would like to enquire about this product.",
                    "",
                    "Product Details:",
                    `Product Name: ${productEnquiry.name}`,
                    `Category: ${productEnquiry.category}`,
                    productEnquiry.subcategory ? `Subcategory: ${productEnquiry.subcategory}` : "",
                    `Quantity: ${quantity}`,
                    `Product Link: ${productEnquiry.link}`,
                    "",
                    "Customer Details:",
                    `Name: ${name}`,
                    `Email: ${email}`,
                    `Phone: ${phone}`,
                    `Delivery Address: ${address}`
                ].filter(Boolean).join("\n");

                window.open(`https://wa.me/918590070532?text=${encodeURIComponent(message)}`, "_blank");
                closePopup();
            });
        }
    });
</script>


<!-- related-product-slider -->

<script>
    const rpContainer = document.querySelector('.related_products');
    const rpWrapper = document.querySelector('.related_products-track');
    const rpSlides = document.querySelectorAll('.rp-slide');
    const rpNext = document.querySelector('.rp-next');
    const rpPrev = document.querySelector('.rp-prev');

    let rpIndex = 0;

    /* Visible slides */
    function rpVisibleSlides() {
        if (window.innerWidth <= 575) return 2;
        if (window.innerWidth <= 991) return 3;
        return 4;
    }

    /* Update slider */
    function rpUpdateSlider() {
        const slide = rpSlides[0];
        const style = window.getComputedStyle(rpWrapper);
        const gap = parseInt(style.gap || 0);

        const slideWidth = slide.getBoundingClientRect().width + gap;

        rpWrapper.style.transform = `translateX(-${rpIndex * slideWidth}px)`;
    }

    /* Next */
    rpNext.addEventListener('click', () => {
        if (rpIndex < rpSlides.length - rpVisibleSlides()) {
            rpIndex++;
        } else {
            rpIndex = 0;
        }
        rpUpdateSlider();
    });

    /* Prev */
    rpPrev.addEventListener('click', () => {
        if (rpIndex > 0) {
            rpIndex--;
        } else {
            rpIndex = rpSlides.length - rpVisibleSlides();
        }
        rpUpdateSlider();
    });

    /* Auto Slide */
    let rpAuto = setInterval(() => {
        rpNext.click();
    }, 3000);

    /* Pause on hover */
    rpContainer.addEventListener('mouseenter', () => {
        clearInterval(rpAuto);
    });

    rpContainer.addEventListener('mouseleave', () => {
        rpAuto = setInterval(() => {
            rpNext.click();
        }, 3000);
    });

    /* Resize fix */
    window.addEventListener('resize', () => {
        rpIndex = 0;
        rpUpdateSlider();
    });

    /* Init */
    rpUpdateSlider();
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {

        const specialSliderTrack = document.getElementById("specialTrack");

        if (specialSliderTrack && window.innerWidth <= 750) {

            let sliderPosition = 0;
            const sliderSpeed = 0.5;

            // Duplicate once for smooth start
            const sliderItems = Array.from(specialSliderTrack.children);
            sliderItems.forEach(item => {
                const clone = item.cloneNode(true);
                specialSliderTrack.appendChild(clone);
            });

            function moveSlider() {
                sliderPosition -= sliderSpeed;
                specialSliderTrack.style.transform = `translateX(${sliderPosition}px)`;

                const firstItem = specialSliderTrack.children[0];
                const firstItemWidth = firstItem.offsetWidth + 20; // 20 = gap

                if (Math.abs(sliderPosition) >= firstItemWidth) {
                    specialSliderTrack.appendChild(firstItem);
                    sliderPosition += firstItemWidth;
                    specialSliderTrack.style.transform = `translateX(${sliderPosition}px)`;
                }

                requestAnimationFrame(moveSlider);
            }

            moveSlider();
        }

    });
</script>
<?php $this->endSection(); ?>