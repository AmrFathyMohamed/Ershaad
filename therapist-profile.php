<?php include("includes/header.php"); ?>

<?php include("classes/TherapistTable.php"); ?>
<?php
$userId = $_GET['id'];
$database = new Database();
$therapistTable = new TherapistTable($database);
$therapist = $therapistTable->getTherapistById($userId);
$sessions = $therapistTable->getDataByTherapistIdAccepted($userId, "sessions");
$totalSessions = count($sessions);
$docements = $therapistTable->getDataByTherapistId($userId, "documents");
$course_therapist = $therapistTable->getDataByTherapistId($userId, "course_therapist");
$appointments = $therapistTable->getDataByTherapistId($userId, "appointments");
// if (isset($_SESSION['user_id'])) {
//   // Get the 'id' value from the URL
//   if ($_SESSION['type'] == 'client') {
//     $userId = $_GET['id'];
//     $database = new Database();
//     $therapistTable = new TherapistTable($database);
//     $therapist = $therapistTable->getTherapistById($userId);
//     $sessions = $therapistTable->getDataByTherapistIdAccepted($userId, "sessions");
//     $totalSessions = count($sessions);
//     $docements = $therapistTable->getDataByTherapistId($userId, "documents");
//     $course_therapist = $therapistTable->getDataByTherapistId($userId, "course_therapist");
//     $appointments = $therapistTable->getDataByTherapistId($userId, "appointments");
//   } else {
//     header("Location: index.php");
//     exit;
//   }
// } else {
//   header("Location: index.php");
//   exit;
// }

?>
<style>
  .page-header {
    position: relative;
    background:
      linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)),
      /* Gradient Overlay */
      url(img/carousel-1.jpg) center center no-repeat;
    background-size: cover;
  }

  .check-img-content {
    border: solid 2px #6691cc;
    text-align: center;
    border-radius: 6px;
    cursor: pointer;
  }

  .check-img-input:checked+.check-img-label .check-img-content {
    background-color: #6691cc;
    box-shadow: rgb(0 0 0 / 25%) 0px 0px 8px !important;
  }

  .check-img-input:checked+.check-img-label .check-img-content h6 {
    color: #fff;
  }

  .check-img-input {
    display: none;
  }

  .pointer {
    cursor: pointer;
  }

  .rounded-start-0 {
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
  }
</style>

<!-- Page Header Start -->
<div class="container-fluid page-header pb-5 mb-5 wow fadeIn" data-wow-delay="1.1s">
  <div class="">
    <div class="container  py-5">
      <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
          <li class="breadcrumb-item"><a href="search.php">المعالجين</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            الملف الشخصي لمعالج
          </li>
        </ol>
      </nav>
      <div class="text-center"><img src="<?= $therapist['Profile']; ?>" style="width: 10vw;" alt=""
          class="rounded-circle shadow">
      </div>
      <h1 class="animated slideInDown text-center arabic text- mb-4">
        <?= $therapist['FullName']; ?>
      </h1>
      <p class="animated slideInDown text-center arabic fs-5 mb-4 text-white">
        <?= $therapist['Specialization']; ?>
      </p>
      <div class="rate d-flex justify-content-center align-content-center mb-2">
        <!-- <div class="pt-1"><small class="text-white">(124 تقييم)</small></div> -->
        <h3 class="text-center px-4"><i class="fa-solid fa-star text-warning fs-4 me-2"></i>
          <?= $therapist['Rating'] ?>
        </h3>
      </div>
      <p class="animated slideInDown text-center arabic fs-5 mb-4 text-white"><span>جنية</span><span>
          <?= $therapist['Price'] ?>
        </span><span class="px-2">/</span><span>ساعة</span></p>
      <?php if (isset($_SESSION['user_id'])) {
        // Get the 'id' value from the URL
        if ($_SESSION['type'] == 'client') { ?>
          <div class="text-center">
            <button class="btn btn-primary px-4" style="width: 25vw;">التحدث الي المعالج</button>
            <form method="POST" action="send_message.php">
              <div class="d-flex align-items-center">
                <textarea id="Message" name="Message" class="form-control border-0 mx-2"
                  placeholder="Write a reply"></textarea>
                <input type="hidden" id="UserID" name="UserID" value="<?= $_SESSION['user_id']; ?>" />
                <input type="hidden" id="TherapistID" name="TherapistID" value="<?= $therapist['TherapistID']; ?>" />

                <button id="sendBtn" type="submit" class="btn me-2">
                  <i class="bi px-2 bi-send-fill fs-5" style="cursor: pointer;"></i>
                </button>
              </div>
            </form>
            <!-- <button class="btn btn-secondary px-4" style="width: 15vw;"> حجز جلسة</button> -->
          </div>
        <?php } else {
        }
      } ?>

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
          <input id="argent" class="check-img-input" type="radio" name="type" value="argent" />
          <label for="argent" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <!-- <img src="img/icon/icon-02-primary.png" class="w-15" alt=""> -->
              <h6> <i class="fa-solid fa-triangle-exclamation fs-5 me-2"></i> عاجلة </h6>
            </div>
          </label>
        </div>
        <div class="col-6 ps-3">
          <input id="normal" class="check-img-input" type="radio" name="type" value="normal" />
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
          <input id="period-1" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm" />
          <label for="period-1" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <h6>11:00 pm - 12:00 pm </h6>
            </div>
          </label>
        </div>
        <div class="col-3 pb-4">
          <input id="period-5" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm" />
          <label for="period-5" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <h6>11:00 pm - 12:00 pm </h6>
            </div>
          </label>
        </div>
        <div class="col-3 pb-4">
          <input id="period-2" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm" />
          <label for="period-2" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <h6>11:00 pm - 12:00 pm </h6>
            </div>
          </label>
        </div>
        <div class="col-3 pb-4">
          <input id="period-3" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm" />
          <label for="period-3" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <h6>11:00 pm - 12:00 pm </h6>
            </div>
          </label>
        </div>
        <div class="col-3 pb-4">
          <input id="period-4" class="check-img-input" type="radio" name="period" value="11:00 pm - 12:00 pm" />
          <label for="period-4" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <h6>11:00 pm - 12:00 pm </h6>
            </div>
          </label>
        </div>

      </div>
      <div class="text-center mt-5">
        <button class="btn btn-primary px-4" style="width: 15vw;" onclick="reservePeriod()" id="reserveSession"> حجز هذا
          الموعد</button>
      </div>
    </div>
  </div>
</div>
<!-- reservation end -->
<div class="container mb-5">
  <div class="row">
    <div class="col-10 mx-auto">
      <h6 class="text-right">اخر التقييمات</h6>

    </div>
    <?php foreach ($sessions as $session) { ?>
      <div class="col-lg-10 mx-auto mt-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 p-4 pb-2">
          <div class="testimonial-item text-">
            <div class="d-flex justify-content-end align-items-center">
              <p class="text-right mb-0">
                <?= $session['UserOpinion'] ?>
              </p>
            </div>
            <?php
            $rating = $session['UserRate'];
            for ($i = 1; $i <= 5; $i++) {
              if ($i <= $rating) {
                echo '<i class="fa-solid fa-star text-warning"></i>';
              } else {
                echo '<i class="fa-regular fa-star text-warning"></i>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!-- courswes Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto" style="max-width: 500px">
      <h1 class="display-6 mb-5"> الكورسات </h1>
    </div>
    <div class="row g-4 justify-content-center">
      <?php foreach ($course_therapist as $course) {
        if ($course['Status'] == "Accepted") { ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded h-100 p-4">
              <div class="mb-4">
                <img class="img-fluid rounded" src="img/carousel-1.jpg" alt="" />
              </div>
              <h4 class="mb-0 right pointer">
                <?= $course['Title'] ?>
              </h4>
              <p class="mb-4 right">
                <?= $course['Description'] ?>
              </p>
              <div class="text-right">
                <a class="btn btn-light px-3" data-bs-toggle="modal"
                  data-bs-target="#courseDetailsModal-<?= $course['CourseID'] ?>">تفاصيل الكورس </a>
              </div>
            </div>
          </div>
          <div class="modal fade" id="courseDetailsModal-<?= $course['CourseID'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="">
                  <div class="modal-header">
                    <h5 class="modal-title" id=""> تفاصيل الكورس</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4 class=" right pointer" data-bs-toggle="modal" data-bs-target="#courseDetailsModal">
                      <?= $course['Title'] ?>
                    </h4>
                    <p class="mb-4 right">
                      <?= $course['Description'] ?>
                    </p>
                    <div class="d-flex justify-content-between">
                      <p class=" mb-0 text-right">
                        <i class="fa-solid fa-hand-holding-dollar" style="color: #6eaedc;"></i>
                        <?= $course['Price'] ?> ج.م
                      </p>
                      <p class=" mb-0 text-right">
                        <?= $course['Sessions'] ?> جلسات <i class="fa-regular fa-calendar-check"
                          style="color: #6eaedc;"></i>
                      </p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="button" class="btn btn-dark px-4" data-bs-dismiss="modal" href="login.php">حجز الكورس</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php }
      } ?>


    </div>
  </div>
</div>
<!-- courses End -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الخبرات</h6>
        <?php foreach ($docements as $docement) {
          if ($docement['DocumentType'] == "Experience") { ?>
            <div class="service-item rounded pb-2 p-4 mb-3">
              <div class="d-flex">
                <div class="col-11 pe-4">
                  <h6 class="text-right">
                    <?= $docement['DocumentName'] ?>
                  </h6>
                  <p class="text-right mb-1 fs-small fst-italic">
                    <?= $docement['DocumentOrganization'] ?>
                  </p>
                  <h6 class="text-right">
                    <?= $docement['DocumentDate'] ?>
                  </h6>
                </div>
                <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-medal fs-3" style="color: burlywood;"></i>
                </div>
              </div>
            </div>
          <?php }
        } ?>


      </div>
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div>
          <h6 class="text-right invisible">ll</h6>
          <div class="service-item rounded h-100 p-4">
            <!-- <h6 class="text-right"> <span>اللغة : <span>العربية</span></span><i class="fa-solid fa-earth-americas ms-2"
                style="color:#6691cc "></i></h6> -->
            <h6 class="text-right"> <span>البلد : <span>
                  <?= $therapist['City']; ?>
                </span></span><i class="fa-solid fa-flag ms-2" style="color:#6691cc "></i></h6>
            <h6 class="text-right"> <span>تاريخ الانضمام : <span>
                  <?= date("Y-m-d", strtotime($therapist['created_at'])); ?>
                </span></span><i class="fa-regular fa-calendar-check ms-2" style="color:#6691cc "></i></h6>
            <h6 class="text-right"> <span>عدد الجلسات : <span>+
                  <?= $totalSessions ?>
                </span></span><i class="fa-regular fa-address-book ms-2" style="color:#6691cc "></i></h6>
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
        <?php foreach ($docements as $docement) {
          if ($docement['DocumentType'] == "Certification") { ?>
            <div class="service-item rounded pb-2 p-4 mb-3">
              <div class="d-flex">
                <div class="col-11 pe-4">
                  <h6 class="text-right">
                    <?= $docement['DocumentName'] ?>
                  </h6>
                  <p class="text-right mb-1 fs-small fst-italic">
                    <?= $docement['DocumentOrganization'] ?>
                  </p>
                  <h6 class="text-right">
                    <?= $docement['DocumentDate'] ?>
                  </h6>
                </div>
                <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-certificate fs-3 text-success"></i>
                </div>
              </div>
            </div>
          <?php }
        } ?>

      </div>
      <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="text-right">الدراسة</h6>
        <?php foreach ($docements as $docement) {
          if ($docement['DocumentType'] == "Education") { ?>
            <div class="service-item rounded pb-2 p-4 mb-3">
              <div class="d-flex">
                <div class="col-11 pe-4">
                  <h6 class="text-right">
                    <?= $docement['DocumentName'] ?>
                  </h6>
                  <p class="text-right mb-1 fs-small fst-italic">
                    <?= $docement['DocumentOrganization'] ?>
                  </p>
                  <h6 class="text-right">
                    <?= $docement['DocumentDate'] ?>
                  </h6>
                </div>
                <div class="col-1 border-start text-center px-0 ps-4 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-book-open fs-3" style="color:#7892aa;"></i>
                </div>
              </div>
            </div>
          <?php }
        } ?>

      </div>

    </div>
  </div>
</div>
<!-- course details Modal strat-->

<?php include("includes/footer.php"); ?>
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
  $(document).ready(function () {

    $("#container").simpleCalendar({
      fixedStartDay: false
    });

    $(".td").click(function () {
      if ($(".check-img-input:checked").length <= 0) {
        toast("اختر نوع الجلسة لعرض المواعيد", 0);
        $("#availableDates").hide()

      } else {
        // عرض الموعيد
        $("#availableDates").show()

      }
    })
    $(".check-img-input").change(function () {
      if ($("#date").val() == '') {
        toast(" حدد تاريخ الجلسة لعرض المواعيد", 0);
        $("#availableDates").hide()
      } else {
        //عرض المواعيد
        $("#availableDates").show()

      }
    })

    $('[name="period"]').change(function () {
      $("#reserveSession").prop("hidden", false);
      // حجز الموعد

    })

  });



</script>
<script>
  function reservePeriod() {
    let date = $("#CheckDate").val(),
      type = $('[name="type"]').val(),
      period = $('[name="period"]').val();
    console.log(date + type + period)
  }
</script>
</body>

</html>