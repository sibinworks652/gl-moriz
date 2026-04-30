<?php $this->extend('web/layouts/app'); ?>
<?php $this->section('content'); ?>
            <!-- banner-slider------------------------------------------------>

            <section class="video_slider_vy container-common ">
                <div class="video_slider_wrapper_vy">

                    <!-- Slide 1 -->
                    <div class="video_slide_vy active">
                        <video autoplay muted loop class="video_bg_vy">
                            <source src="<?= base_url('web/assets/images/home/banner.mp4')?>" type="video/mp4">
                        </video>



                        <div class="content_vy">

                            <h1 class="title_vy">Expertly Engineered Dental Materials</h1>
                            <span class="tag_vy">Moriz Meditech provides advanced dental products that support clinicians in delivering superior patient care.</span>

                            <div class="gl-po-rel gl-d-flex gl-fd-row gap-20">
                                <a href="" class="common-btn gl-td-none gl-pt-40 gl-xs-pt-20">
                                    <div class="white-btn">View Products</div>

                                </a>


                            </div>
                        </div>
                    </div>


                    <div class="banr_box">
                        <div class="banr_inner">

                            <div class="banr_img">
                                <img id="banrImage" src="<?= base_url('web/assets/images/home/aligner.webp')?>" alt="">
                            </div>

                            <div class="banr_content gl-w-100 gl-po-rel gl-d-flex gl-fd-row">
                                <h4 class="gl-d-flex bnr-slide-txt" id="banrText">Aligners</h4>
                                <span class="gl-d-flex banr-slide-num" id="banrNumber">01</span>
                            </div>

                        </div>
                    </div>


                </div>

            </section>


            <!-- ---------------------------precision-area -->
            <div class="container-common ">
                <div class="precision_area_box gl-pt-70 gl-xs-pt-30">

                    <!-- Left Image -->
                    <div class="precision_card">
                        <img src="<?= base_url('web/assets/images/home/left-img.webp')?>" alt="Dental Image">
                    </div>

                    <!-- Center Content -->
                    <div class="precision_card precision_center">
                        <div class="precision_content">
                            <span class="precision_tag">About Us</span>
                            <h3>Orthodontics for <br> Better Alignment</h3>
                            <p>
                                We develop advanced dental materials and solutions, including orthodontic systems, instruments, and restorative products, designed for dentists and laboratories in daily treatments.
                            </p>



                        </div>


                        <div class="read_more_wrap">
                            <a href="#" class="read_more_btn">
                                    Read More
                                    <span class="arrow_icon">
                                      <img src="<?= base_url('web/assets/images/home/side-arow.svg')?>">
                                    </span>
                                </a>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="precision_card">
                        <img src="<?= base_url('web/assets/images/home/right-img.webp')?>" alt="Dental Image">
                    </div>

                </div>
            </div>
            <!-- ---------------------------precision-area -->


            <section class="beyond_quality_area">
                <div class="container-common">

                    <div class="beyond_head">
                        <span class="tag">Products</span>
                        <h2>Clinical Quality<br>Consistent Results</h2>
                        <p>
                            We create products that support confident clinical work, delivering reliable performance across a wide range of treatments.
                        </p>
                    </div>

                    <div class="beyond_grid">
                    <?php if (!empty($activeCategories) && is_array($activeCategories)): ?>
                        <?php foreach ($activeCategories as $category): ?>
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
            </section>


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
                                        <a href="tel:+919946574883" target="_blank" class="info_text gl-td-none">+91 9946574883</a>
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
                
            </div>

            <div class="line-area"></div>
    <?php $this->endSection(); ?>
    