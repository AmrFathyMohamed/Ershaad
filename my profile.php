<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>My-profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css" integrity="sha512-2cWcZ9cbPMZFm2inlFOhwsBVbNMmNxKBtVXqL8OY9tXCZahhnIfXMxPCzpKqiHF2I2mOiNHNXEDUDglwd+4uYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />  </head>

  <body>

    <!-- Page Header Start -->
    <div class="container-fluid page-header pb-2 mb-5 wow fadeIn"
      data-wow-delay="1.1s">
      <div class="">
      <div class="container pb-3 pt-5">
        <nav aria-label="breadcrumb animated slideInDown ">
          <div class="d-flex justify-content-between">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                الملف الشخصي
              </li>
            </ol>
            <div>
              <button class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#editInfoModal"><i class="fa-solid fa-pencil me-2"></i>تعديل بياناتي</button>
            </div>
          </div>

        </nav>
        <div class="text-center"><img src="img/user.png" style="width: 6vw;background: white;" alt="" class="rounded-circle shadow"></div>
        <h2 class="animated slideInDown text-center arabic text- mt-4">Ahmed Mohammed</h2>
        <p class="animated slideInDown  text-center arabic fs-6 mb-1 text-primary fw-bold">abc123@xyz.com</p>
        <div class="w-40 mx-auto"><hr></div>
        <div class="d-flex justify-content-center">
          <div class="col-2">
            <h6 class="animated text-center slideInDown arabic fs-small fst-normal mb-1">الهاتف</h6>
            <p class="animated text-center slideInDown arabic fs-6 text-primary fw-bold mb-4">01020304050</p>
          </div>
          <div class="col-2">
            <h6 class="animated text-center slideInDown arabic fs-small fst-normal mb-1">النوع</h6>
            <p class="animated text-center slideInDown arabic fs-6 text-primary fw-bold mb-4">ذكر</p>
          </div>
          <div class="col-2">
            <h6 class="animated text-center slideInDown arabic fs-small fst-normal mb-1">السن</h6>
            <p class="animated text-center slideInDown arabic fs-6 text-primary fw-bold mb-4 rtl"> سنة 35</p>
          </div>
        </div>



    </div>
    </div>
    </div>
    <!-- Page Header End -->
    <!-- tabs start -->
    <ul class="nav nav-pills mb-3 justify-content-center" style="gap: 7rem;" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link px-5 rounded-0 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">جلساتي القادمة</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link px-5 rounded-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">جلساتي السابقة</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link px-5 rounded-0" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">الكورسات</button>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane w-55 px-4 mx-auto fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-25 text-white bg-success rounded-end mb-1 me-4" style="border-top-right-radius: 0px !important;">
               مقبولة
              </div>
              <h4 class="mb-0 w-85 text-right">د. مرام السيد</h4>
            </div>
           <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> 11:00 pm 12:00 pm
            </p>
            <p class=" mb-0 text-right">
              25/9/2023 <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
           </div>
          </div>
        </div>

        <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-25 text-white bg-danger rounded-end mb-1 me-4" style="border-top-right-radius: 0px !important;">
               مرفوضة
              </div>
              <h4 class="mb-0 w-85 text-right">د. مرام السيد</h4>
            </div>
           <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> 11:00 pm 12:00 pm
            </p>
            <p class=" mb-0 text-right">
              25/9/2023 <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
           </div>
          </div>
        </div>

      </div>
      <div class="tab-pane w-55 px-5 mx-auto fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 px-4 pb-2">
            <div class="d-flex align-items-center ms-n5 mb-1">
              <div class="service-icon w-25 text-white bg-warning rounded-end mb-1 me-4 pointer" data-bs-toggle="modal" data-bs-target="#rateModal" onclick="showRate()" style="border-top-right-radius: 0px !important;">
               تقييم <i class="fa-regular fa-star ms-2"></i>
              </div>
              <h4 class="mb-0 w-85 text-right">د. مرام السيد</h4>
            </div>
           <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> 11:00 pm 12:00 pm
            </p>
            <p class=" mb-0 text-right">
              25/9/2023 <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
           </div>
          </div>
        </div>
      </div>
      <div class="tab-pane w-55 px-5 mx-auto fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

      </div>
    </div>
    <!-- tabs end -->

    <!-- rate modal -->

<!-- Modal -->
<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">تقييم الجلسة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="d-block text-right mt-4">ما مدي رضاك عن الجلسة</p>
        <div class="rating mb-5 d-block text-right">
          <i class="fa-regular fa-star rateStar"></i>
          <i class="fa-regular fa-star rateStar"></i>
          <i class="fa-regular fa-star rateStar"></i>
          <i class="fa-regular fa-star rateStar"></i>
          <i class="fa-regular fa-star rateStar"></i>
      </div>
        <textarea name="" id="" cols="30" rows="6" placeholder="أكتب تعليقاً" class="rtl arabic form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary px-5">نشر</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit info Modal -->
<div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">تعديل البيانات الشخصية </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 mt-4">
          <div class="form-floating">
            <input type="text" class="form-control"id="name"placeholder="الاسم كامل" />
            <label for="name"> الاسم كامل</label>
          </div>
        </div>
        <div class="col-sm-12 mt-3">
          <div class="form-floating">
            <input type="text" class="form-control"id="الهاتف"placeholder="الهاتف" />
            <label for="الهاتف">الهاتف</label>
          </div>
        </div><div class="col-sm-12 mt-3">
          <div class="form-floating">
            <input type="number" class="form-control"id="السن"placeholder="السن" />
            <label for="السن">السن</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary px-5">حفظ</button>
      </div>
    </div>
  </div>
</div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Template Javascript -->

    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      function showRate(){}
      $(document).ready(function() {
        const ratingIcons = $('.rating .fa-regular');
        let ratingValue = 0;
        ratingIcons.click(function() {
            ratingValue = $(this).data('rating');
            ratingIcons.removeClass('fa-solid rateStar-fill').addClass('fa-regular rateStar');
            $(this).prevAll().addBack().removeClass('fa-regular rateStar').addClass('fa-solid rateStar-fill');
        });
        $(document).on('click', function() {
            console.log('Selected Rating:', ratingValue);
          });
    });
    </script>
  </body>
</html>
