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
    <!--***************** -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap-grid.min.css" integrity="sha512-2cWcZ9cbPMZFm2inlFOhwsBVbNMmNxKBtVXqL8OY9tXCZahhnIfXMxPCzpKqiHF2I2mOiNHNXEDUDglwd+4uYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />  </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--******************* -->
    <link href="css/chat.css" rel="stylesheet" />
    <style>
 .page-header {
    position: relative;
    background: 
    linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)), /* Gradient Overlay */
        url(../img/carousel-1.jpg) center center no-repeat;
    background-size: cover;
}
</style>
<style>

  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #0a2429;
    background-color: #accbe1;
}
  .pointer{
    cursor: pointer;
}
.rounded-start-0 {
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
}
.service-item .service-icon {
    height: 37px;
}
.rating {
        display: inline-block;
        font-size: 24px;
    }

    .rateStar {
        color: #ccc;
        cursor: pointer;
        font-size: 2rem;
    }

    .rateStar-fill  {
        color: #f39c12; /* Color for selected (solid) stars */
        cursor: pointer;
        font-size: 2rem;

    }
    .text-left{
      text-align: left;
    }
  </style>
  <body>
<!-- Navbar Start -->
<nav
class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
>
<a href="index.html" class="navbar-brand d-flex align-items-center">
  <h1 class="m-0">
    <img
      class="img-fluid me-3"
      src="img/logo-h.png"
      alt=""
    />
  </h1>
</a>
<button
  type="button"
  class="navbar-toggler"
  data-bs-toggle="collapse"
  data-bs-target="#navbarCollapse"
>
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
    <a href="sessions.html" class="nav-item nav-link px-3 ">الجلسات</a>
    <a href="chats.html" class="nav-item nav-link px-3 ">المحادثات</a>
    <a href="courses.html" class="nav-item nav-link px-3">الكورسات</a>
    <a href="my profile - therapist.html" class="nav-item nav-link px-3 active">الملف الشخصي</a>
  </div>
</div>
<a href="" class="d-inline-block mx-2 fs-5 pointer" style="color: #7892aa;">Dr. Tamer Ali</a>
<div class="nav-item dropdown">
      
      <a class="btn btn-square ms-1 btn-info rounded-circle" style="background-color: #7ce7d9;
      border-color: #7ce7d9;" data-bs-toggle="dropdown"><i class="fa-solid fa-user" style="color: #37474f;"></i></a>
      <div class="dropdown-menu bg-light border-0 m-0 shadow">
        <a href="my profile.html" class="dropdown-item">الملف الشخصي </a>
        <a class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#changePassModal">تغيير كلمة المرور</a>
        <a class="dropdown-item pointer text-danger" onclick="alertCon('هل انت متأكد انك تريد الخروج','warning',()=>logout())">تسجيل الخروج</a>
      </div>
    </div>
</nav>
<!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header pb-2 mb-5 wow fadeIn"
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
      </div>
    </div>
    </div>
    <!-- Page Header End -->
    <div class="container mb-5">
      <div class="row">
<div class="col-10 mx-auto">
  <h6 class="text-right">اخر التقييمات</h6>

</div>
        <div class="col-lg-10 mx-auto mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-4 pb-2">
            <div class="testimonial-item text-">
             <div class="d-flex justify-content-end align-items-center">
              
            <p class="text-right mb-0">
              الجلسة بتكون كافية إنك تتكلم مع الدكتور براحتك، وتقول كل اللي عندك، بعدها الدكتور بيوضح بعض النقاط لك، وفيه متابعة بتستمر مع المستخدم جزاكم الله خيرا
            </p>
             </div>
              <div class="rating w-100 mb-3">
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <a href="" class="text-primary fs-6 d-block text-left">من نجوي السيد </a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-10 mx-auto mt-3 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-4 pb-2">
            <div class="testimonial-item text-">
             <div class="d-flex justify-content-end align-items-center">
              
            <p class="text-right mb-0">
              الجلسة بتكون كافية إنك تتكلم مع الدكتور براحتك، وتقول كل اللي عندك، بعدها الدكتور بيوضح بعض النقاط لك، وفيه متابعة بتستمر مع المستخدم جزاكم الله خيرا
            </p>
             </div>
              <div class="rating w-100 mb-3">
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid text-warning fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <a href="" class="text-primary fs-6 d-block text-left">من نجوي السيد </a>
            </div>
          </div>
        </div>

      </div>
    </div>
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
    <!-- rate modal -->

<!-- Modal -->
<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=""> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary px-5">نشر</button>
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
    <!-- ********************** -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.all.js" integrity="sha512-AqI7WBZEjM+wOnNSxgOafzB2xKgQpxsNmTVzPINEu9CDiFgrisyJOrqCHarauciq+82uHWgGjfPBzidkuykxBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js" integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ********************** -->
    <script>
      var count = $(".chat-content").children().length;
      if (count == 0) {
          $(".chat-content").html(`
                  <div class="w-45 px-0 h-100 mx-auto">
                      <img src="assets/Images/empty-chat.svg" class="d-inline-block"/>
                      <p class="text-muted text-center ps-2 fs-small" style="letter-spacing: 0.09rem; text-transform: uppercase;">Start a conversation</p>
                  </div>
          `)
      }

       scrollEnd()
       function scrollEnd(){
          $(".chat-content").scrollTop($(".chat-content")[0].scrollHeight);
          $(".chat-content").animate({ scrollTop: $(".chat-content")[0].scrollHeight }, 2000);
      }
      function sendNewMessage(sendBtn) {
      let message = $("#newMessageContent").val().replace(/\n/g, "<br>");

      let messageElement = $(`
          <div class="message-user ps-2 me-3 my-2">
          <div class="d-flex justify-content-end align-items-top">
              <div class="response me-2 delivered">
              <p class="mb-0">${message}</p>
              </div>
              <div class="avatar avatar-md"></div>
          </div>
          </div>
      `);
      let messageElement2 = $(`
          <div class="message-user ps-2 me-3 my-3">
          <div class="d-flex justify-content-end align-items-top">
              <div class="response me-2 delivered">
              <p class="mb-0">${message}</p>
              </div>
              <div class="avatar avatar-md"></div>
          </div>
          </div>
      `);

      messageElement.addClass("slide-in");

      if ($(".chat-content").children().last().hasClass("message-user")) {
          $(".chat-content").append(messageElement);
      }else if($(".chat-content").children().last().hasClass("message-agent")){
          $(".chat-content").append(messageElement2);
      }else{
          $(".chat-content").append(messageElement2);
      }

      $("#newMessageContent").val('');
      $("#newMessageContent").css("height", "43px");

      scrollEnd();

      setTimeout(function () {
          messageElement.find(".response").addClass("seen");
      }, 3000);
      }

     $('#newMessageContent').on('input', function() {
          this.style.height = '43px'; 
          this.style.height = (this.scrollHeight > this.offsetHeight) ? `${this.scrollHeight}px` : '43px'; 
      });

  </script>
  </body>
</html>
