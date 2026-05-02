<?php $this->extend('web/layouts/app'); ?>
<?php $this->section('content'); ?>
            <div class="other_common_banner pad-top-140">

                <div class="container-common">

                    <!-- Breadcrumb -->
                    <div class="ocb_breadcrumb gl-pb-20">
                        <a href="<?= url_to('index') ?>">Home</a>
                        <span>/</span>
                        <a href="<?= url_to('features') ?>">Features</a>

                    </div>

                    <!-- Banner Content -->
                    <div class="ocb_banner_wrap">

                        <div class="ocb_content">
                            <h1 class="gl-w-50">Features</h1>
                            <p class="gl-w-60 gl-xs-w-90">Designed to deliver performance, efficiency, and a seamless experience.
                            </p>


                        </div>

                    </div>

                </div>

            </div>

            <!-- banner-slider---------------------------------------------- -->

            <!-- moriz-advantage------------------ -->
            <div class="container-common">
                <section class="moriz_advanatage_sec">


                    <!-- Heading -->
                    <div class="moriz_header">
                        <div class="moriz_tag gl-mb-10 slide-up">Features</div>
                        <div class="moriz_title slide-up">The Moriz Advantage</div>
                        <div class="moriz_desc slide-up">
                            Moriz delivers top-quality, cost-effective dental materials. We understand your challenges and offer tailored solutions, becoming your partner in success.
                        </div>
                    </div>

                    <!-- Grid -->
                    <div class="moriz_grid">

                        <!-- Box 1 -->
                        <div class="moriz_box">
                            <div class="moriz_icon">
                                <img src="<?= base_url('web/assets/images/about/quality.svg')?>" alt="">
                            </div>
                            <div class="moriz_number">01</div>
                            <div class="moriz_content">
                                <div class="moriz_heading">Superior Quality</div>
                                <div class="moriz_text">
                                    Our products undergo rigorous testing to ensure they meet the highest industry standards, providing reliability and performance you can trust.
                                </div>
                            </div>
                        </div>

                        <!-- Box 2 -->
                        <div class="moriz_box">
                            <div class="moriz_icon">
                                <img src="<?= base_url('web/assets/images/about/cost-effective.svg')?>" alt="">
                            </div>
                            <div class="moriz_number">02</div>
                            <div class="moriz_content">
                                <div class="moriz_heading">Cost-Effective Solutions</div>
                                <div class="moriz_text">
                                    We offer competitive pricing without compromising on quality, helping you manage your practice more efficiently and profitably.
                                </div>
                            </div>
                        </div>

                        <!-- Box 3 -->
                        <div class="moriz_box">
                            <div class="moriz_icon">
                                <img src="<?= base_url('web/assets/images/about/swift.svg')?>" alt="">
                            </div>
                            <div class="moriz_number">03</div>
                            <div class="moriz_content">
                                <div class="moriz_heading">Swift Delivery</div>
                                <div class="moriz_text">
                                    Our streamlined logistics ensure your orders arrive quickly, minimizing downtime and keeping your practice running smoothly.
                                </div>
                            </div>
                        </div>

                        <!-- Box 4 -->
                        <div class="moriz_box">
                            <div class="moriz_icon">
                                <img src="<?= base_url('web/assets/images/about/support.svg')?>" alt="">
                            </div>
                            <div class="moriz_number">04</div>
                            <div class="moriz_content">
                                <div class="moriz_heading">Exceptional Support</div>
                                <div class="moriz_text">
                                    Our dedicated customer service team is always ready to assist you, providing expert advice and prompt resolution to your queries.
                                </div>
                            </div>
                        </div>

                    </div>


                </section>
            </div>
            <!-- moriz-advantage------------------ -->


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
                                <a href="<?= url_to('contact') ?>" class="qstn_btn">
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
                                        <a href="mailto:morizmeditech@gmail.com" target="_blank" class="info_text gl-td-none">morizmeditech@gmail.com</a>
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