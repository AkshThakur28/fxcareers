<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/images/favicon.png" rel="icon">
    <title>FXcareers</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/css/fonts/remixicon.css">
    <link rel="stylesheet" href="assets/css/animate/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper/swiper-bundle.min.css">
    <!-- Custom Style File -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <section class=" registration-sec overlay-full position-relative bg-image"
        style="background-image: url('assets/images/bg-image.jpg');">
        <div class="container position-relative z-1">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-9 ">
                    <div class="form-wrapper p-4">
                        <h3 class="py-4 mb-5 text-center title">Fill in the registration information</h3>
                        <!-- <div class="expo-details-wrapper pb-4">                           
                        <img src="assets/images/11.jpg" alt="" >
                        <div class="expodetails">
                            <h4 class="fw-600">Learn Forex trading in just one day in Dubai</h4>
                            <p class="mb-0"><i class="ri-calendar-line"></i> 7th - 8th October 2024</p>
                            <p class="mb-0"><i class="ri-map-2-line"></i> Millennium Plaza Downtown Hotel - 23215 Sheikh Zayed Rd - Trade Centre - Trade Centre 1 - Dubai - United Arab Emirates</p>
                        </div>
                       </div> -->
                        <div class="">                      
                        <form action="checkout.php" method="post">
                            <div class="row g-4 justify-content-center">
                                <div class="col-md-6">
                                    <label for="">Full Name *</label>
                                    <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email *</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Mobile Number *</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="Enter your name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Location *</label>
                                    <input type="text" name="location" id="location" placeholder="Enter your location"
                                        class="form-control">
                                </div>
                                <div class="col-lg-6  mt-5">                                   
                                    <button class="btn-default d-block w-100 " type="submit"  name="submit" style="border-radius: 0.5rem;background: #000;">Register <i class="ps-2 ri-arrow-right-line"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                </div>
            </div>


        </div>
    </section>
</body>

</html>