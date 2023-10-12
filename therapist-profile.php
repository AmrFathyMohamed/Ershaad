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

$coursesoon = $therapistTable->getDataByTherapistId($userId, "soon");

$totalCourses = count($coursesoon);
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
          <li class="breadcrumb-item"><a href="index.php" class="text-phone">الرئيسية</a></li>
          <li class="breadcrumb-item"><a href="search.php" class="text-phone">المعالجين</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            الملف الشخصي لمعالج
          </li>
        </ol>
      </nav>
      <div class="text-center mt-3"><img src="<?= $therapist['Profile']; ?>" alt=""
          class="rounded-circle shadow prof-img">
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
          <?= $therapist['PriceAfterPercentage'] ?>
        </span><span class="px-2">/</span><span>ساعة</span></p>


    </div>
  </div>
</div>
<!-- Page Header End -->

<!-- reservation start -->
<div class="container mb-5">
  <div class="row rounded border p-4 px-sm-3">
    <div class="col-md-7 col-12 pe-5 order-last-phone px-sm-3 mt-4">
      <div class="col-12">
        <h6 class="text-right">المواعيد المتاحة</h6>
      </div>
      <div class="row gx-4" id="availableDates">

      </div>
      <div class="text-center mt-5">
        <?php
        if (isset($_SESSION['type'])) {
          if ($_SESSION['type'] == 'client') { ?>
            <button class="btn btn-primary px-4 col-12 col-md-3" onclick="reservePeriod()" id="reserveSession"> حجز هذا
              الموعد</button>
          <?php } else { ?>
            <a href="login.php" class="btn btn-light px-4 d-none d-md-block">تسجيل الدخول</a>
          <?php }
        } else { ?>
          <a href="login.php" class="btn btn-light px-4 d-none d-md-block">تسجيل الدخول</a>
        <?php } ?>

      </div>
    </div>
    <div class="col-md-5 col-12">
      <h6 class="text-right">اختر اليوم</h6>
      <input type="date" id="date" class="form-control form-control-lg">
      <p class="text-" id="dateLabel"></p>
      <h6 class="text-right mt-3">أختر نوع الجلسة</h6>
      <div class="d-flex align-items-center justify-content-around">
        <div class="col-6 pe-3" id="arg">
          <input id="argent" class="check-img-input" type="radio" name="type" checked value="Urgent Consultation" />
          <label for="argent" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <!-- <img src="img/icon/icon-02-primary.png" class="w-15" alt=""> -->
              <h6> <i class="fa-solid fa-triangle-exclamation fs-5 me-2"></i> عاجلة </h6>
            </div>
          </label>
        </div>
        <div class="col-6 ps-3" id="nor">
          <input id="normal" class="check-img-input" type="radio" name="type" value="Work" />
          <label for="normal" class="check-img-label w-100">
            <div class="check-img-content pt-2 pb-1">
              <!-- <img src="img/icon/icon-02-primary.png" class="w-15" alt=""> -->
              <h6> <i class="fa-solid fa-mug-saucer fs-5 me-2"></i> عادية</h6>
            </div>
          </label>
        </div>

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
    <?php
    $visibleComments = 5; // Number of comments to initially show
    $count = 0; // Counter for comments
    foreach ($sessions as $session) {
      if ($session['CStatus'] == 'Accepted') {
        $count++;
        if ($count <= $visibleComments) {
          ?>
          <div class="col-lg-10 mx-auto mt-3 wow fadeInUp">
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
          <?php
        }
      }
    }
    ?>
    <div class="col-12 mx-auto mt-3" id="seeMoreContainer" style="display: none;">
      <!-- Container for hidden comments -->
      <?php
      // Reset the counter and display the hidden comments
      $count = 0;
      foreach ($sessions as $session) {
        if ($session['CStatus'] == 'Accepted') {
          $count++;
          if ($count > $visibleComments) {
            ?>
            <div class="col-lg-10 mx-auto mt-3 wow" data-wow-delay="0.1s">
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
            <?php
          }
        }
      }
      ?>
    </div>
    <?php if ($count > $visibleComments) { ?>
      <div class="col-10 mx-auto mt-3">
        <button id="seeMoreButton" class="btn btn-primary">See More</button>
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
      <?php if ($totalCourses > 0) {
        foreach ($course_therapist as $course) {
          if ($course['Status'] == "Accepted") { ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="service-item rounded h-100 p-4">
                <div class="mb-4">
                  <img class="img-fluid rounded" src="img/carousel-1.jpg" alt="" />
                </div>
                <h4 class="mb-0 right pointer">
                  <?= $course['Title'] ?> <span class="badge bg-success px-3">
                    <?= $course['Type'] ?>
                  </span>
                </h4>
                <p class="mb-4 right">
                  <?= $course['Description'] ?>
                </p>

                <!-- <option value="Treatment">Treatment</option>
                                <option value="Training">Training</option> -->
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
                  <form action="reservition_course.php" method="POST">
                    <input type="hidden" name="CourseID" value="<?= $course['CourseID'] ?>">
                    <input type="hidden" name="ClientID" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="TherapistID" value="<?php echo $therapist['TherapistID']; ?>">
                    <div class="modal-header">
                      <h5 class="modal-title"> تفاصيل الكورس</h5>
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
                      <?php
                      if (isset($_SESSION['type'])) {
                        if ($_SESSION['type'] == 'client') { ?>
                          <button type="submit" class="btn btn-dark px-4" data-bs-dismiss="modal">حجز
                            الكورس</button>
                        <?php } else { ?>
                          <a href="login.php" class="btn btn-light px-4 d-none d-md-block">تسجيل الدخول</a>
                        <?php }
                      } else { ?>
                        <a href="login.php" class="btn btn-light px-4 d-none d-md-block">تسجيل الدخول</a>
                      <?php } ?>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php }
        }
      } else {
        echo '<div class="text-center">
<h4 class="text-center my-5">Soon...</h4>
          </div>';

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
  // Get the current date in yyyy-mm-dd format
  function getCurrentDate() {
    const now = new Date();
    const year = now.getFullYear();
    const month = (now.getMonth() + 1).toString().padStart(2, '0');
    const day = now.getDate().toString().padStart(2, '0');
    return `${year}-${month}-${day}`;
  }
  // Set the input's value to the current date
  document.getElementById('date').value = getCurrentDate();
  $.ajax({
    url: 'fetch_appointments.php', // Replace with your backend endpoint
    method: 'POST',
    data: {
      date: getCurrentDate(),
      TherapistID: <?= $therapist['TherapistID']; ?>
    },
    success: function (response) {
      // Handle the response and display the available appointments
      $("#availableDates").html(response);
    },
    error: function () {
      toast("حدث خطأ أثناء جلب المواعيد المتاحة.", 0);
    }
  });
  // $("#reserveSession").prop("hidden", true);
  // $("#availableDates").hide()
  // $(document).ready(function () {

  //   $("#container").simpleCalendar({
  //     fixedStartDay: false
  //   });

  //   $(".td").click(function () {
  //     if ($(".check-img-input:checked").length <= 0) {
  //       toast("اختر نوع الجلسة لعرض المواعيد", 0);
  //       $("#availableDates").hide()

  //     } else {
  //       // عرض الموعيد
  //       $("#availableDates").show()

  //     }
  //   })
  //   $(".check-img-input").change(function () {
  //     if ($("#date").val() == '') {
  //       toast(" حدد تاريخ الجلسة لعرض المواعيد", 0);
  //       $("#availableDates").hide()
  //     } else {
  //       //عرض المواعيد
  //       $("#availableDates").show()

  //     }
  //   })

  //   $('[name="period"]').change(function () {
  //     $("#reserveSession").prop("hidden", false);
  //     // حجز الموعد

  //   })

  //});
  $('#arg').show();
      $('#nor').hide();
  $('#date').on('change', function () {
    const selectedDate = $(this).val();
    const currentDate = getCurrentDate();

    // Check if the selected date is not today's date
    if (selectedDate !== currentDate) {
      // Hide the element with ID "arg"
      $('#arg').hide();
      $('#nor').show();
      $('#normal').attr('checked', 'checked');


    } else {
      // Show the element with ID "arg"
      $('#arg').show();
      $('#nor').hide();

    }
    $.ajax({
      url: 'fetch_appointments.php', // Replace with your backend endpoint
      method: 'POST',
      data: {
        date: $(this).val(),
        TherapistID: <?= $therapist['TherapistID']; ?>
      },
      success: function (response) {
        // Handle the response and display the available appointments
        $("#availableDates").html(response);
      },
      error: function () {
        toast("حدث خطأ أثناء جلب المواعيد المتاحة.", 0);
      }
    });
  });

</script>
<script>
  function reservePeriod() {
    let type = $("input[name='type']:checked").val();
    //console.log(type);
    let date = $("#date").val();
    let period = $("input[name='period']:checked").val(); // Get the selected period
    let therapistId = <?= $userId ?>; // Get the therapist ID from PHP
    let status = "Pending Review"; // Set the session status

    // Check if a period is selected
    if (!period) {
      alert("يرجى تحديد الفترة المرغوبة.");
      return;
    }
    <?php if (isset($_SESSION['user_id'])) { ?>
      console.log({
        date: date,
        time: period,
        therapistId: therapistId,
        //uid: < $_SESSION['user_id']; ?>,
        status: status
      });
      $.ajax({
        url: 'insert_session.php',
        method: 'POST',
        data: {
          date: date,
          time: period,
          therapistId: therapistId,
          uid: <?= $_SESSION['user_id']; ?>,
          status: status,
          type : type
        },
        success: function (response) {
          // Handle the response (e.g., show a success message)
          //alert(response);
          if(response == 2){
            SendUrgent();
          }
          alert("سيتم التواصل معك في أقرب وقت لتأكيد الحجز");
          // You can also perform additional actions here, such as updating the UI
        },
        error: function () {
          alert("حدث خطأ أثناء إجراء الحجز.");
        }
      });
    <?php } ?>
  }

  document.addEventListener("DOMContentLoaded", function () {
    const seeMoreButton = document.getElementById("seeMoreButton");
    const seeMoreContainer = document.getElementById("seeMoreContainer");

    if (seeMoreButton) {
      seeMoreButton.addEventListener("click", function () {
        seeMoreContainer.style.display = "block";
        seeMoreButton.style.display = "none";
      });
    }
  });
    // Get today's date in the format "YYYY-MM-DD"
    const today = new Date().toISOString().split('T')[0];

// Set the minimum date for the input field
document.getElementById("date").setAttribute("min", today);
</script>
</body>

</html>