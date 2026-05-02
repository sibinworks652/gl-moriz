<?php $this->extend('web/layouts/app'); ?>
<?php $this->section('content'); ?>


<div class="other_common_banner pad-top-140">

    <div class="container-common">

        <!-- Breadcrumb -->
        <div class="ocb_breadcrumb gl-pb-20">
            <a href="<?= url_to('index') ?>">Home</a>
            <span>/</span>
            <a href="<?= url_to('product-landing') ?>">Products</a>

        </div>

        <!-- Banner Content -->
        <div class="ocb_banner_wrap">

            <div class="ocb_content">
                <h1 class="gl-w-50">Products</h1>
                <p class="gl-w-60 gl-xs-w-90">We create products that support confident clinical work, delivering
                    reliable performance across a wide range of treatments.
                </p>


            </div>

        </div>

    </div>

</div>

<!-- banner-slider---------------------------------------------- -->









<div class="container-common gl-pt-50 gl-pb-40">

    <div class="gl-w-100 gl-po-rel gl-d-flex ">
        <div class="category-land-head gl-pb-30 gl-md-pb-20 gl-md-pt-30">Category</div>
    </div>



    <div class="beyond_grid">
        <!-- <?php if (!empty($categories) && is_array($categories)): ?> -->
            <?php foreach ($categories as $category): ?>
                <!-- Item 1 -->
                <a href="<?= url_to('category-detail', $category['slug']) ?>" class="gl-td-none">
                    <div class="beyond_card">
                        <div class="beyond_img">
                            <img src="<?= base_url(esc($category['thumbnail'])) ?>" alt="">
                        </div>
                        <div class="beyond_content">
                            <span><?= esc($category['name']) ?></span>
                            <div class="arrow">
                                <svg width="18" height="18" viewBox="0 0 24 24">
                                    <path d="M5 12h14M13 5l7 7-7 7" stroke-width="2" fill="none" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No active categories found.</p>
        <?php endif; ?>
    </div>
</div>





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

</div>

<div class="line-area"></div>
<?php $this->endSection(); ?>