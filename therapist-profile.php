<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>therapist-profile</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
     <!--***************** -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css" integrity="sha512-2cWcZ9cbPMZFm2inlFOhwsBVbNMmNxKBtVXqL8OY9tXCZahhnIfXMxPCzpKqiHF2I2mOiNHNXEDUDglwd+4uYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />  </head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--******************* -->
     <link rel="stylesheet" href="css/simple-calendar.css">
  </head>
<style>
 .page-header {
    position: relative;
    background:
    linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)), /* Gradient Overlay */
        url(../img/carousel-1.jpg) center center no-repeat;
    background-size: cover;
}
  .check-img-content {
      border: solid 2px #6691cc;
      text-align: center;
      border-radius: 6px;
      cursor: pointer;
  }
  .check-img-input:checked+.check-img-label .check-img-content{
      background-color: #6691cc;
      box-shadow: rgb(0 0 0 / 25%) 0px 0px 8px !important;
  }
  .check-img-input:checked+.check-img-label .check-img-content h6{
      color: #fff;
  }
  .check-img-input{
      display: none;
  }

  .pointer{
    cursor: pointer;
}
.rounded-start-0 {
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
}
  </style>
  <body>

    <!-- Page Header Start -->
    <div class="container-fluid page-header pb-5 mb-5 wow fadeIn"
      data-wow-delay="1.1s">
      <div class="">
      <div class="container  py-5">
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="#">المعالجين</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              الملف الشخصي لمعالج
            </li>
          </ol>
        </nav>
        <div class="text-center"><img src="img/team-3.jpg" style="width: 10vw;" alt="" class="rounded-circle shadow"></div>
        <h1 class="animated slideInDown text-center arabic text- mb-4">د. سوسن علي حربي</h1>
        <p class="animated slideInDown text-center arabic fs-5 mb-4 text-white">معالج نفسي</p>
        <div class="rate d-flex justify-content-center align-content-center mb-2">
          <div class="pt-1"><small class="text-white">(124 تقييم)</small></div>
          <h3 class="text-center px-4"><i class="fa-solid fa-star text-warning fs-4 me-2"></i>4.6</h3>
      </div>
      <p class="animated slideInDown text-center arabic fs-5 mb-4 text-white"><span>جنية</span><span> 345</span><span class="px-2">/</span><span>ساعة</span></p>
<div class="text-center">
  <button class="btn btn-primary px-4" style="width: 15vw;">التحدث الي المعالج</button>
  <button class="btn btn-secondary px-4" style="width: 15vw;">  حجز جلسة</button>
</div>
    </div>
    </div>
    </div>
    <!-- Page Header End -->

     <!-- reservation start -->
     <div class="container mb-5">
      <div class="row rounded border p-4">
        <div class="col-5  border-end">
          <h6 class="text-right">اختر اليوم</h6>
          <div id="container" class="calendar-container"></div>
          <input type="date" id="date" hidden>
          <p class="text-" id="dateLabel"></p>

        <h6 class="text-right mt-3">أختر نوع الجلسة</h6>
        <div class="d-flex align-items-center justify-content-around">
          <div class="col-6 pe-3">
            <input id="argent" class="check-img-input" type="radio" name="type" value="argent"/>
            <label for="argent" class="check-img-label w-100">
                <div class="check-img-content pt-2 pb-1">
                    <!-- <img src="img/icon/icon-02-primary.png" class="w-15" alt=""> -->
                    <h6> <i class="fa-solid fa-triangle-exclamation fs-5 me-2"></i> عاجلة </h6>
                </div>
            </label>
            </div>
            <div class="col-6 ps-3">
                <input id="normal" class="check-img-input" type="radio" name="type" value="normal"/>
                <label for="normal" class="check-img-label w-100">
                    <div class="check-img-content pt-2 pb-1">
                        <!-- <img src="img/icon/icon-02-primary.png" class="w-15" alt=""> -->
                        <h6> <i class="fa-solid fa-mug-saucer fs-5 me-2"></i> عادية</h6>
                    </div>
                </label>
                </div>

        </div>
        </div>
       <div class="col-7">
        <div class="col-12">
          <h6 class="text-right">المواعيد المتاحة</h6>
        </div>
        <div class="row gx-4" id="availableDates">

          <div class="col-3 pb-4">
            <input id="period-1" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm"/>
            <label for="period-1" class="check-img-label w-100">
                <div class="check-img-content pt-2 pb-1">
                    <h6>11:00 pm - 12:00 pm </h6>
                </div>
            </label>
          </div>
          <div class="col-3 pb-4">
            <input id="period-5" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm"/>
            <label for="period-5" class="check-img-label w-100">
                <div class="check-img-content pt-2 pb-1">
                    <h6>11:00 pm - 12:00 pm </h6>
                </div>
            </label>
          </div>
          <div class="col-3 pb-4">
            <input id="period-2" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm"/>
            <label for="period-2" class="check-img-label w-100">
                <div class="check-img-content pt-2 pb-1">
                    <h6>11:00 pm - 12:00 pm </h6>
                </div>
            </label>
          </div>
          <div class="col-3 pb-4">
            <input id="period-3" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm"/>
            <label for="period-3" class="check-img-label w-100">
                <div class="check-img-content pt-2 pb-1">
                    <h6>11:00 pm - 12:00 pm </h6>
                </div>
            </label>
          </div>
          <div class="col-3 pb-4">
            <input id="period-4" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm"/>
            <label for="period-4" class="check-img-label w-100">
                <div class="check-img-content pt-2 pb-1">
                    <h6>11:00 pm - 12:00 pm </h6>
                </div>
            </label>
          </div>

        </div>
        <div class="text-center mt-5">
          <button class="btn btn-primary px-4" style="width: 15vw;" onclick="reservePeriod()" id="reserveSession">  حجز هذا الموعد</button>
        </div>
       </div>
      </div>
     </div>
     <!-- reservation end -->
<!-- courswes Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto" style="max-width: 500px">
      <h1 class="display-6 mb-5">  الكورسات </h1>
    </div>
    <div class="row g-4 justify-content-center">

      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 p-4">
          <div class="mb-4">
            <img class="img-fluid rounded" src="img/carousel-1.jpg" alt="" />
          </div>
          <h4 class="mb-0 right pointer" >كيفية التخلص من الوسواس القهرس</h4>
          <p class="mb-4 right">
            ستحصل من خلال هذة الدورة علي العلاج المعرفى السلوكى للوسواس القهري وايضا العلاج المعرفى السلوكى للاكتئاب
          </p>
         <div class="text-right">
          <a class="btn btn-light px-3" data-bs-toggle="modal" data-bs-target="#courseDetailsModal">تفاصيل الكورس </a>
         </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 p-4">
          <div class="mb-4">
            <img class="img-fluid rounded" src="img/carousel-1.jpg" alt="" />
          </div>
          <h4 class="mb-0 right pointer">كيفية التخلص من الوسواس القهرس</h4>
          <p class="mb-4 right">
            ستحصل من خلال هذة الدورة علي العلاج المعرفى السلوكى للوسواس القهري وايضا العلاج المعرفى السلوكى للاكتئاب
          </p>
         <div class="text-right">
          <a class="btn btn-light px-3" data-bs-toggle="modal" data-bs-target="#courseDetailsModal">تفاصيل الكورس </a>
         </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 p-4">
          <div class="mb-4">
            <img class="img-fluid rounded" src="img/carousel-1.jpg" alt="" />
          </div>
          <h4 class="mb-0 right pointer">كيفية التخلص من الوسواس القهرس</h4>
          <p class="mb-4 right">
            ستحصل من خلال هذة الدورة علي العلاج المعرفى السلوكى للوسواس القهري وايضا العلاج المعرفى السلوكى للاكتئاب
          </p>
         <div class="text-right">
          <a class="btn btn-light px-3" data-bs-toggle="modal" data-bs-target="#courseDetailsModal">تفاصيل الكورس </a>
         </div>
        </div>
      </div>


    </div>
  </div>
</div>
<!-- courses End -->
<div class="container-xxl py-5">
<div class="container">
  <div class="row gx-4">
    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
      <h6 class="text-right">الخبرات</h6>
      <div class="service-item rounded pb-2 p-4 mb-3">
        <div class="d-flex">
          <div class="col-11 pe-4">
            <h6 class="text-right">دورة اعداد الاخصائى النفسى الاكلينيكى مستشفى </h6>
            <p class="text-right mb-1 fs-small fst-italic">د.جمال ماضى ابوالعزايم للطب النفسى وعلاج الادمان</p>
            <h6 class="text-right">03/01/2019</h6>
          </div>
          <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-medal fs-3" style="color: burlywood;"></i>
          </div>
        </div>
      </div>

      <div class="service-item rounded pb-2 p-4 mb-3">
        <div class="d-flex">
          <div class="col-11 pe-4">
            <h6 class="text-right">دورة اعداد الاخصائى النفسى الاكلينيكى مستشفى </h6>
            <p class="text-right mb-1 fs-small fst-italic">د.جمال ماضى ابوالعزايم للطب النفسى وعلاج الادمان</p>
            <h6 class="text-right">03/01/2019</h6>
          </div>
          <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-medal fs-3" style="color: burlywood;"></i>
          </div>
        </div>
      </div>

    </div>
    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
      <div>
        <h6 class="text-right invisible">ll</h6>
      <div class="service-item rounded h-100 p-4">
        <h6 class="text-right"> <span>اللغة : <span>العربية</span></span><i class="fa-solid fa-earth-americas ms-2" style="color:#6691cc "></i></h6>
        <h6 class="text-right"> <span>البلد : <span>مصر</span></span><i class="fa-solid fa-flag ms-2" style="color:#6691cc "></i></h6>
        <h6 class="text-right"> <span>تاريخ الانضمام : <span>24/9/2010</span></span><i class="fa-regular fa-calendar-check ms-2" style="color:#6691cc "></i></h6>
        <h6 class="text-right"> <span>عدد الجلسات : <span>+300</span></span><i class="fa-regular fa-address-book ms-2" style="color:#6691cc "></i></h6>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container-xxl py-5">
  <div class="container">
    <div class="row gx-4">

      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الشهادات</h6>

        <div class="service-item rounded pb-2 p-4 mb-3">
          <div class="d-flex">
            <div class="col-11 pe-4">
              <h6 class="text-right">دورة اعداد الاخصائى النفسى الاكلينيكى مستشفى </h6>
              <p class="text-right mb-1 fs-small fst-italic">د.جمال ماضى ابوالعزايم للطب النفسى وعلاج الادمان</p>
              <h6 class="text-right">03/01/2019</h6>
            </div>
            <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-certificate fs-3 text-success"></i>
            </div>
          </div>
        </div>

        <div class="service-item rounded pb-2 p-4 mb-3">
          <div class="d-flex">
            <div class="col-11 pe-4">
              <h6 class="text-right">دورة اعداد الاخصائى النفسى الاكلينيكى مستشفى </h6>
              <p class="text-right mb-1 fs-small fst-italic">د.جمال ماضى ابوالعزايم للطب النفسى وعلاج الادمان</p>
              <h6 class="text-right">03/01/2019</h6>
            </div>
            <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-certificate fs-3 text-success"></i>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الدراسة</h6>

        <div class="service-item rounded pb-2 p-4 mb-3">
          <div class="d-flex">
            <div class="col-11 pe-4">
              <h6 class="text-right">دورة اعداد الاخصائى النفسى الاكلينيكى مستشفى </h6>
              <p class="text-right mb-1 fs-small fst-italic">د.جمال ماضى ابوالعزايم للطب النفسى وعلاج الادمان</p>
              <h6 class="text-right">03/01/2019</h6>
            </div>
            <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-book-open fs-3" style="color:#7892aa;"></i>
            </div>
          </div>
        </div>
        <div class="service-item rounded pb-2 p-4 mb-3">
          <div class="d-flex">
            <div class="col-11 pe-4">
              <h6 class="text-right">دورة اعداد الاخصائى النفسى الاكلينيكى مستشفى </h6>
              <p class="text-right mb-1 fs-small fst-italic">د.جمال ماضى ابوالعزايم للطب النفسى وعلاج الادمان</p>
              <h6 class="text-right">03/01/2019</h6>
            </div>
            <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-book-open fs-3" style="color:#7892aa;"></i>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  </div>
   <!-- course details Modal strat-->
   <div class="modal fade" id="courseDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="">
        <div class="modal-header">
          <h5 class="modal-title" id=""> تفاصيل الكورس</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class=" right pointer" data-bs-toggle="modal" data-bs-target="#courseDetailsModal">كيفية التخلص من الوسواس القهرس</h4>
          <p class="mb-4 right">
            ستحصل من خلال هذة الدورة علي العلاج المعرفى السلوكى للوسواس القهري وايضا العلاج المعرفى السلوكى للاكتئاب
          </p>
         <ul class="rtl">
            <li class="text-right fw-bold">
              الدرس الاول
            </li>
            <li class="text-right fw-bold">
              الدرس الثاني
            </li>
            <li class="text-right fw-bold">
              الدرس الثالث
            </li>
            <li class="text-right fw-bold">
              الدرس الرابع
            </li>
         </ul>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
          <button type="button" class="btn btn-dark px-4" data-bs-dismiss="modal">حجز الكورس</button>
        </div>
         </form>
      </div>
    </div>
  </div>
  <!-- course details Modal end-->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <!-- ********************** -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.all.js" integrity="sha512-AqI7WBZEjM+wOnNSxgOafzB2xKgQpxsNmTVzPINEu9CDiFgrisyJOrqCHarauciq+82uHWgGjfPBzidkuykxBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js" integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ********************** -->
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script defer src="js/jquery.simple-calendar.js"></script>
    <script>
      function toast(text, type) {
            if (type == 0) {
                Toastify({
                    text: text,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#dc3545",
                }).showToast()
            } else {
                Toastify({
                    text: text,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#1db56e",
                }).showToast()
            }

        }
        $("#reserveSession").prop("hidden", true);
        $("#availableDates").hide()
        $(document).ready(function(){

            $("#container").simpleCalendar({
                fixedStartDay: false
            });

            $(".td").click(function (){
              if ($(".check-img-input:checked").length <= 0) {
                toast("اختر نوع الجلسة لعرض المواعيد",0);
                $("#availableDates").hide()

                } else {
                  // عرض الموعيد
                $("#availableDates").show()

                }
            })
            $(".check-img-input").change(function(){
              if($("#date").val()==''){
                toast(" حدد تاريخ الجلسة لعرض المواعيد",0);
                $("#availableDates").hide()
              }else{
                //عرض المواعيد
                $("#availableDates").show()

              }
            })

            $('[name="period"]').change(function(){
                $("#reserveSession").prop("hidden", false);
                // حجز الموعد

            })

          });



    </script>
    <script>
      function reservePeriod(){
          let date = $("#CheckDate").val(),
              type = $('[name="type"]').val(),
              period = $('[name="period"]').val();
              console.log(date + type + period)
        }
    </script>
  </body>
</html>
