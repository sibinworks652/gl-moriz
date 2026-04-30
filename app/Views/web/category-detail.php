<?php $this->extend('web/layouts/app'); ?>
<?php $this->section('content'); ?>

<?php
$showSidebar = ! empty($subcategories);
?>
            <!-- banner-slider---------------------------------------------- -->

            <div class="other_common_banner pad-top-140">

                <div class="container-common">

                    <!-- Breadcrumb -->
                    <div class="ocb_breadcrumb">
                        <a href="<?= url_to('index') ?>">Home</a>
                        <span>/</span>
                        <a href="<?= url_to('index') ?>">Products</a>
                        <span>/</span>
                        <a href="<?= url_to('category-detail', $category['slug']) ?>" class="active"><?= esc($category['name']) ?></a>
                    </div>

                    <!-- Banner Content -->
                    <div class="ocb_banner_wrap">

                        <div class="ocb_content">
                            <h1><?= esc($category['name']) ?></h1>
                            <p><?= esc($category['description'] ?: 'Braces, aligners, and treatments tailored just for you') ?></p>

                            <?php if (! empty($category['catalogue_file'])): ?>
                            <a href="<?= base_url($category['catalogue_file']) ?>" class="ocb_download_btn" download>
                                DOWNLOAD CATALOGUE
                                <span class="ocb_icon">
                                    <!-- You can replace this SVG -->
                                    <img src="<?= base_url('web/assets/images/orthodontics/download.svg')?>">
                                </span>
                            </a>
                            <?php else: ?>
                                <a href="#" class="ocb_download_btn" >
                                DOWNLOAD CATALOGUE
                                <span class="ocb_icon">
                                    <!-- You can replace this SVG -->
                                    <img src="<?= base_url('web/assets/images/orthodontics/download.svg')?>">
                                </span>
                            </a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>

            </div>




            <div class="product_cate">

                <!-- Sidebar -->
                <?php if ($showSidebar): ?>
                <div class="product_cate_sidebar" id="sidebar">
                    <button class="close-drawer" id="closeDrawerBtn">&times;</button>
                    <ul>
                        <?php foreach ($subcategories as $index => $subcategory): ?>
                            <li class="<?= $index === 0 ? 'active' : '' ?>" 
                                data-category="subcat-<?= $subcategory['id'] ?>">
                                <?= esc($subcategory['name']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="product_cate_content">

                    <div class="product_cate_sidebar mob-product-scroll">
                        <ul>
                            <?php foreach ($subcategories as $index => $subcategory): ?>
                                <li class="<?= $index === 0 ? 'active' : '' ?>" 
                                    data-category="subcat-<?= $subcategory['id'] ?>">
                                    <?= esc($subcategory['name']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Grid -->
                    <div id="no-products-message" class="hidden ocb_content">
                            <p>No products found under <span id="current-sub-name"></span></p>
                        </div>
                    <div class="product_grid">
                        <?php if (!empty($products)): ?>
                            <?php 
                                $firstSubId = !empty($subcategories) ? $subcategories[0]['id'] : null; 
                            ?>
                            <?php foreach ($products as $product): ?>
                                <?php
                                    $pSubId = $product['subcategory_id'] ?? null;
                                    $filterClass = $pSubId ? ' subcat-' . $pSubId : '';
                                    $isHidden = ($showSidebar && $pSubId != $firstSubId) ? ' hidden' : '';
                                ?>
                                <a href="<?= url_to('product-detail', $product['slug']) ?>" 
                                class="product_item <?= esc($filterClass) ?> <?= $isHidden ?>">
                                    <img src="<?= base_url(esc($product['thumbnail'] ?: 'web/assets/images/orthodontics/product.webp')) ?>" 
                                        alt="<?= esc($product['name']) ?>">
                                    <p><?= esc($product['name']) ?></p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>


            <div class="beyond_quality_area">
                <div class="container-common">

                    <div class="beyond_head">
                        <span class="tag">Products</span>
                        <h2>Clinical Quality<br>Consistent Results</h2>
                        <p>
                            We create products that support confident clinical work, delivering reliable performance across a wide range of treatments.
                        </p>
                    </div>

                    <div class="beyond_grid">
                    <!-- <?php if (!empty($categories) && is_array($categories)): ?> -->
                        <?php foreach ($categories as $category): ?>
                        <!-- Item 1 -->
                        <a href="<?= url_to('category-detail', $category['slug']) ?>" class="gl-td-none">
                        <div class="beyond_card">
                            <div class="beyond_img">
                                <img src="<?= base_url(esc($category['thumbnail']) )?>" alt="">
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
            </div>


            <div class="container-common">
                <div class="beyond_quality_sec">


                    <!-- Top Content -->
                    <div class="beyond_quality_top">
                        <div class="beyond_quality_left">
                            <div class="beyond_quality_title">
                                Built on Strength<br>Driven by Consistency
                            </div>

                            <div class="beyond_quality_img">
                                <video autoplay muted loop playsinline>
                                    <source src="<?= base_url('web/assets/images/home/small-video.mp4')?>" type="video/mp4">
                                </video>
                            </div>
                        </div>

                        <div class="beyond_quality_right">
                            <div class="beyond_quality_desc">
                                Developed for real clinical use, our materials provide strength, durability, accuracy, and consistency when it matters most.
                            </div>
                        </div>
                    </div>



                    <!-- Grid Cards -->


                    <div class="beyond_quality_grid">

                        <div class="beyond_quality_card">
                            <div class="beyond_quality_icon">
                                <img src="<?= base_url('web/assets/images/home/teeth.svg')?>" alt="">
                            </div>
                            <div class="beyond_quality_line"></div>
                            <div class="beyond_quality_card_title">Strength</div>
                            <div class="beyond_quality_card_desc">
                                Built to handle everyday clinical stress, our materials maintain their structure and perform reliably in every application.
                            </div>
                        </div>

                        <div class="beyond_quality_card">
                            <div class="beyond_quality_icon">
                                <img src="<?= base_url('web/assets/images/home/teeth.svg')?>" alt="">
                            </div>
                            <div class="beyond_quality_line"></div>
                            <div class="beyond_quality_card_title">Durability</div>
                            <div class="beyond_quality_card_desc">
                                Designed for long-term use, our materials stay stable and dependable even under demanding clinical conditions.
                            </div>
                        </div>

                        <div class="beyond_quality_card">
                            <div class="beyond_quality_icon">
                                <img src="<?= base_url('web/assets/images/home/teeth.svg')?>" alt="">
                            </div>
                            <div class="beyond_quality_line"></div>
                            <div class="beyond_quality_card_title">Accuracy</div>
                            <div class="beyond_quality_card_desc">
                                Made for precise handling, our materials help achieve accurate results across both digital and chairside workflows.
                            </div>
                        </div>

                        <div class="beyond_quality_card">
                            <div class="beyond_quality_icon">
                                <img src="<?= base_url('web/assets/images/home/teeth.svg')?>" alt="">
                            </div>
                            <div class="beyond_quality_line"></div>
                            <div class="beyond_quality_card_title">Consistency</div>
                            <div class="beyond_quality_card_desc">
                                With consistent quality in every batch, clinicians can expect reliable results every time they use our products.
                            </div>
                        </div>

                    </div>


                </div>
            </div>


            <div class="container-common ">
                <div class="qstn_accor gl-mt-35 gl-xs-mt-0">

                    <div class="qstn_accor_inner">

                        <!-- RIGHT ACCORDION -->
                        <div class="qstn_accor_box">

                            <div class="qstn_title">Do you have questions?</div>

                            <div class="qstn_item active">
                                <div class="qstn_head">
                                    <div>What does orthodontics mean?</div>
                                    <span class="icon">
                                        <svg width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6" fill="none" stroke="#fff" stroke-width="2" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="qstn_body">
                                    Orthodontics is a branch of dentistry that focuses on correcting misaligned teeth and jaws to improve function and appearance.
                                </div>
                            </div>

                            <div class="qstn_item">
                                <div class="qstn_head">
                                    <div>Do transparent aligners work?</div>
                                    <span class="icon">
                                        <svg width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6" fill="none" stroke="#fff" stroke-width="2" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="qstn_body">Yes, transparent aligners work by applying controlled pressure to gradually move teeth into the proper position over time.
                                </div>
                            </div>

                            <div class="qstn_item">
                                <div class="qstn_head">
                                    <div>Who can use dental products?</div>
                                    <span class="icon">
                                        <svg width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6" fill="none" stroke="#fff" stroke-width="2" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="qstn_body"> Dental products are used by dentists, dental labs, and sometimes patients, depending on the type and purpose of the product</div>
                            </div>

                            <div class="qstn_item">
                                <div class="qstn_head">
                                    <div>What are the types of dental materials?</div>
                                    <span class="icon">
                                        <svg width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6" fill="none" stroke="#fff" stroke-width="2" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="qstn_body">Dental materials are generally classified as preventive, restorative, and auxiliary materials used in various dental procedures.</div>
                            </div>

                            <div class="qstn_item">
                                <div class="qstn_head">
                                    <div> What are restorative dental materials?</div>
                                    <span class="icon">
                                        <svg width="18" height="18" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6" fill="none" stroke="#fff" stroke-width="2" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="qstn_body">Restorative dental materials are used to repair or replace damaged or missing tooth structure caused by decay, wear, or injury.</div>
                            </div>

                            <div class="qstn_bottom">
                                <div>My question is not here.</div>
                                <a href="#" class="qstn_btn">
                                    <span class="btn_text">Connect Us</span>
                                    <span class="btn_icon">
                                        <!-- 🔥 Paste your SVG here -->
                                        <svg width="16" height="16" viewBox="0 0 24 24">
                                            <path d="M5 12h14M13 5l7 7-7 7" stroke="#1f7db0" stroke-width="2"
                                                fill="none" />
                                        </svg>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>

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
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>

                                <div class="review-author">Dr. Arjun Menon</div>
                                <div class="review-role">Prosthodontist</div>
                                <div class="review-text">
                                    I’ve been using these dental resins for over a year now, particularly for crown and bridge work, and the consistency has been outstanding.
                                </div>

                            </div>

                            <div class="review-card">
                                <div class="quote-icon">
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>
                                <div class="review-author">Dr. Neha Sharma</div>
                                <div class="review-role">Orthodontist</div>
                                <div class="review-text">
                                    As an orthodontist working with clear aligners and splints, I rely heavily on the quality of my printed models. These resins have delivered excellent durability and dimensional stability, even in high-volume production.
                                </div>

                            </div>

                            <div class="review-card">
                                <div class="quote-icon">
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>
                                <div class="review-author">Rahul Nair</div>
                                <div class="review-role">Dental Lab Technician</div>
                                <div class="review-text">
                                    In our lab, we deal with a wide range of applications, from surgical guides to denture bases, and these resins have proven to be extremely versatile.
                                </div>

                            </div>

                            <div class="review-card">
                                <div class="quote-icon">
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>
                                <div class="review-author">Dr. Priya Iyer</div>
                                <div class="review-role">Oral Surgeon</div>
                                <div class="review-text">
                                    I primarily use surgical guide resins, and the level of precision offered here is excellent. The guides fit perfectly, which is critical for implant procedures where accuracy is non-negotiable.
                                </div>

                            </div>
                            <div class="review-card">
                                <div class="quote-icon">
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>
                                <div class="review-author">Dr. Priya Iyer</div>
                                <div class="review-role">Oral Surgeon</div>
                                <div class="review-text">
                                    I primarily use surgical guide resins, and the level of precision offered here is excellent. The guides fit perfectly, which is critical for implant procedures where accuracy is non-negotiable.
                                </div>

                            </div>
                            <div class="review-card">
                                <div class="quote-icon">
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>
                                <div class="review-author">Dr. Priya Iyer</div>
                                <div class="review-role">Oral Surgeon</div>
                                <div class="review-text">
                                    I primarily use surgical guide resins, and the level of precision offered here is excellent. The guides fit perfectly, which is critical for implant procedures where accuracy is non-negotiable.
                                </div>

                            </div>
                            <div class="review-card">
                                <div class="quote-icon">
                                    <img src="<?= base_url('web/assets/images/home/exclamation.svg')?>">
                                </div>
                                <div class="review-author">Dr. Priya Iyer</div>
                                <div class="review-role">Oral Surgeon</div>
                                <div class="review-text">
                                    I primarily use surgical guide resins, and the level of precision offered here is excellent. The guides fit perfectly, which is critical for implant procedures where accuracy is non-negotiable.
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
                                Send us your queries, and our team will respond promptly with detailed solutions and product information you can trust.
                            </div>

                            <!-- MAP -->
                            <div class="speak_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3922.7199538073896!2d76.21599457583655!3d10.52270926382072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7ef727f9a113b%3A0xe21b9605adf5e4f5!2smoriz%20meditech%20p%20ltd!5e0!3m2!1sen!2sin!4v1776850758252!5m2!1sen!2sin"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                            <!-- INFO -->
                            <div class="speak_info gl-pt-50 gl-xs-pt-20">

                                <div class="info_box">
                                    <div class="info_icon">
                                        <img src="<?= base_url('web/assets/images/home/mail.svg')?>">
                                    </div>
                                    <div>
                                        <div class="info_label">EMAIL ID</div>
                                        <a href="mailto:moriza@dental.com" target="_blank" class="info_text gl-td-none">moriza@dental.com</a>
                                    </div>
                                </div>

                                <div class="info_box">
                                    <div class="info_icon">
                                        <img src="<?= base_url('web/assets/images/home/call.svg')?>">
                                    </div>
                                    <div>
                                        <div class="info_label">PHONE NUMBER</div>
                                        <a href="tel:+919946574883" target="_blank" class="info_text gl-td-none">+91
                                            9946574883</a>
                                    </div>
                                </div>

                                <div class="info_box">
                                    <div class="info_icon">
                                        <img src="<?= base_url('web/assets/images/home/locations.svg')?>">
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
                                        <img src="<?= base_url('web/assets/images/home/visit.svg')?>">
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
                                        <input type="text">
                                    </div>

                                    <div class="form_group">
                                        <label>Last Name*</label>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="form_row">
                                    <div class="form_group">
                                        <label>Email Id*</label>
                                        <input type="email">
                                    </div>

                                    <div class="form_group">
                                        <label>Phone*</label>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="form_row full">
                                    <div class="form_group">
                                        <label>Message*</label>
                                        <textarea></textarea>
                                    </div>
                                </div>

                                <div class="form_btn_wrap">

                                    <button type="submit" class="submit_btn">
                                        Submit Message
                                    </button>

                                    <button type="button" class="arrow_btn">
                                        <svg class="arrow_icon" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="#2c6aa0" stroke-width="2"
                                                stroke-linecap="round" />
                                            <path d="M13 6L19 12L13 18" stroke="#2c6aa0" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                </div>

                            </form>
                        </div>

                    </div>


                </section>

            </div>

            <div class="dwnld_catalogue">
                <?php if (! empty($category['catalogue_file'])): ?>
                <a href="<?= base_url($category['catalogue_file']) ?>" download>
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

            <!-- footer-section -->

            <div class="container-common ">
                <div class="ftr-section-moriz gl-mt-60">

                    <div class="ftr-container">



                        <!-- LEFT -->
                        <div class="ftr-col ftr-left">
                            <div class="ftr-inner">

                                <div class="ftr-block">
                                    <div class="ftr-title">Site Map</div>
                                    <ul>
                                        <li>Home</li>
                                        <li>About</li>
                                        <li>Products</li>
                                        <li>Features</li>
                                        <li>Contact Us</li>
                                    </ul>
                                </div>

                                <div class="ftr-block">
                                    <div class="ftr-title">Social</div>
                                    <ul>
                                        <li>Facebook</li>
                                        <li>Instagram</li>
                                        <li>Youtube</li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- CENTER -->
                        <div class="ftr-col ftr-center tab-none">

                            <div class="ftr-image-wrap">

                                <!-- MAIN IMAGE -->
                                <img src="<?= base_url('web/assets/images/home/round-basll.svg')?>" class="ftr-main-img">

                                <!-- SLIDER -->
                                <div class="ftr-overlay-slider">
                                    <div class="ftr-track" id="ftrTrack">

                                        <!-- ORIGINAL SET -->
                                        <img src="<?= base_url('web/assets/images/home/moriz-anim.svg')?>">
                                        <img src="<?= base_url('web/assets/images/home/moriz-anim.svg')?>">
                                        <img src="<?= base_url('web/assets/images/home/moriz-anim.svg')?>">



                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="ftr-col ftr-right gl-pl-70 gl-lg-pl-10 gl-md-pl-10 gl-sm-pl-0">

                            <div class="ftr-desc">
                                Moriz Meditech is a leading distributor and manufacturer of orthodontic appliances & accessories and dental instruments.
                            </div>

                            <div class="ftr-update-title gl-pt-35">Get Updates</div>

                            <div class="ftr-note">
                                Your information is never disclosed to third parties
                            </div>

                            <div class="ftr-input-wrap">
                                <input type="text" placeholder="Enter Your Email">

                                <button class="ftr-btn-icon">
                                    <img src="<?= base_url('web/assets/images/home/tele-send.svg')?>" alt="arrow">
                                </button>
                            </div>

                        </div>

                    </div>

                    <!-- COPYRIGHT -->
                    <div class="ftr-bottom gl-sm-pt-30">
                        Copyright © 2026 GL Infotech. All rights reserved.
                    </div>

                </div>

            </div>

        </div>
    </div>



    <button class="mobile-filter-btn" id="openDrawer">
        <span>Product List</span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6h16M4 12h16M4 18h7"></path>
        </svg>
    </button>

    <div class="sidebar-overlay" id="closeDrawerOverlay"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('closeDrawerOverlay');
            const openBtn = document.getElementById('openDrawer');
            const closeBtnX = document.getElementById('closeDrawerBtn');
            const allMenuItems = document.querySelectorAll('.product_cate_sidebar li, .mob-product-scroll li');
            const products = document.querySelectorAll('.product_item');

            if (!sidebar || !overlay || !openBtn || !closeBtnX) {
                return;
            }

            if (window.gsap && window.ScrollTrigger) {
                gsap.registerPlugin(ScrollTrigger);

                const mm = gsap.matchMedia();
                mm.add("(min-width: 992px)", () => {
                    ScrollTrigger.create({
                        trigger: ".product_cate",
                        start: "top top+=20",
                        end: () => `bottom ${sidebar.offsetHeight + 80}px`,
                        pin: sidebar,
                        pinSpacing: false,
                        invalidateOnRefresh: true
                    });
                });
            }

            const openSidebar = () => {
                sidebar.classList.add('active');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            };

            const closeSidebar = () => {
                sidebar.classList.remove('active');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            };

            const filterProducts = (category) => {
                products.forEach(product => {
                    product.classList.toggle('hidden', !product.classList.contains(category));
                });
            };

            allMenuItems.forEach(item => {
                item.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');

                    allMenuItems.forEach(li => li.classList.remove('active'));
                    document.querySelectorAll(`[data-category="${category}"]`).forEach(match => {
                        match.classList.add('active');
                    });

                    filterProducts(category);

                    if (!this.closest('.mob-product-scroll')) {
                        const horizontalMatch = document.querySelector(`.mob-product-scroll [data-category="${category}"]`);
                        if (horizontalMatch) {
                            horizontalMatch.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest',
                                inline: 'center'
                            });
                        }
                    }

                    if (window.innerWidth < 992) closeSidebar();
                });
            });

            openBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                openSidebar();
            });

            closeBtnX.addEventListener('click', (e) => {
                e.stopPropagation();
                closeSidebar();
            });

            overlay.addEventListener('click', closeSidebar);
        });
    </script>
    <script>
document.querySelectorAll('.product_cate_sidebar li').forEach(tab => {
    tab.addEventListener('click', function() {
        const targetCategory = this.getAttribute('data-category');
        const subName = this.innerText; // Gets the name from the clicked sidebar item

        // 1. Update Sidebar Active State
        document.querySelectorAll('.product_cate_sidebar li').forEach(li => li.classList.remove('active'));
        this.classList.add('active');

        // 2. Filter Products
        let visibleCount = 0;
        document.querySelectorAll('.product_item').forEach(product => {
            if (product.classList.contains(targetCategory)) {
                product.classList.remove('hidden');
                visibleCount++;
            } else {
                product.classList.add('hidden');
            }
        });

        // 3. Handle "No Products Found" message
        const messageDiv = document.getElementById('no-products-message');
        const nameSpan = document.getElementById('current-sub-name');

        if (visibleCount === 0) {
            nameSpan.innerText = subName;
            messageDiv.classList.remove('hidden');
        } else {
            messageDiv.classList.add('hidden');
        }
    });
});

// Run on page load to check the first active subcategory
window.addEventListener('DOMContentLoaded', () => {
    const activeTab = document.querySelector('.product_cate_sidebar li.active');
    if (activeTab) activeTab.click();
});
</script>

    <?php $this->endSection(); ?>
