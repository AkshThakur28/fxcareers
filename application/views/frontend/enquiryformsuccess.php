<main>


    <section class="Enquiry_form_success_wraper py-5">
        <div class="container">
            <div class="Enquiry_form_success ">
                <h2 class="text-primary">THANK YOU!</h2>
                <h2>We appreciate your valuable efforts</h2>
                <img src="<?= base_url() ?>public/assets/img/enquiry_success_img.png" class="enquiry_success_img" alt="">
                <!-- <h4>Assessment Result</h4>

                <div class="radial-progress m-auto" data-score="">
                    <div class="circle">
                        <div class="mask full" style="transform: rotate(36deg);">
                            <div class="fill" style="transform: rotate(36deg);"></div>
                        </div>
                        <div class="mask half">
                            <div class="fill" style="transform: rotate(36deg);"></div>
                            <div class="fill fix" style="transform: rotate(72deg);"></div>
                        </div>
                    </div>
                    <div class="inset">
                        <span class="big" style="opacity: 1;">1</span> <span class="little" style="opacity: 1;">/
                            5</span>
                    </div>
                </div> -->

                <p class="mt-2">One of our counsellor will connect you soon!!</p>
                <a href="<?= base_url()?>" style="width:fit-content;"
                    class=" px-3 py-2 rounded  nav_login_btn mx-auto d-flex align-items-center"> <span>Back to home</span> <span class="more_nav_arrow ms-1 bg-warning"><i
                            class="ri-arrow-right-up-line text-black fw-bold"></i></span>
                </a>
            </div>
        </div>

    </section>

    <section class="cta">
        <div class="container">
            <div class="cta_box">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_right">
                            <h2>Flexible Learning Options for Every Trader</h2>
                            <div class="download_point_wraper d-md-flex ">
                                <ul class="list-inline">
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> Interactive Learning Modules</li>
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> One-Touch Mentorship</li>
                                </ul>
                                <ul class="list-inline ms-md-3 ms-0">
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> Practice Trading Platform</li>
                                    <li class=" text-black mt-4"> <img
                                            src="<?= base_url() ?>public/assets/img/black_tick.svg" class="img-fluid "
                                            alt=""> Community Engagement</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="suscribe_form text-lg-end text-start ">
                            <form action="">
                                <h2>Join Our News Letter</h2>
                                <div class="bg-white input_wraper ms-lg-auto">

                                    <input type="text" placeholder="Enter Your Email">
                                    <a href="" class="btn btn-dark text-white">Subscribe Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</main>




<script>
    window.randomize = function () {
        $('.radial-progress').each(function () {
            var transform_styles = ['-webkit-transform', '-ms-transform', 'transform'];
            $(this).find('span').fadeTo('slow', 1);
            var score = $(this).data('score');
            var deg = (((100 / 5) * score) / 100) * 180;
            var rotation = deg;
            var fill_rotation = rotation;
            var fix_rotation = rotation * 2;
            for (i in transform_styles) {
                $(this).find('.circle .fill, .circle .mask.full').css(transform_styles[i], 'rotate(' + fill_rotation + 'deg)');
                $(this).find('.circle .fill.fix').css(transform_styles[i], 'rotate(' + fix_rotation + 'deg)');
            }
        });
    }

</script>