<?php include("includes/header.php"); ?>

<?php include("classes/TherapistTable.php"); ?>
<?php
if (isset($_SESSION['user_id'])) {
  // Get the 'id' value from the URL
  if ($_SESSION['type'] == 'therapist') {
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapistTable = new TherapistTable($database);
    $therapist = $therapistTable->getTherapistById($userId);
    // $sessions = $therapistTable->getDataByTherapistIdAccepted($userId, "sessions");
    // $totalSessions = count($sessions);
    // $docements = $therapistTable->getDataByTherapistId($userId, "documents");
    $course_therapist = $therapistTable->getDataByTherapistId($userId, "course_therapist");
    // $appointments = $therapistTable->getDataByTherapistId($userId, "appointments");
  } else {
    header("Location: index.php");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}

?>
<style>
  .page-header {
    position: relative;
    background:
      linear-gradient(rgba(190, 235, 255, 0.77), rgba(255, 223, 252, 0.563)),
      /* Gradient Overlay */
      url(img/feature.jpg) center center no-repeat;
    background-size: cover;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    color: #0a2429;
    background-color: #accbe1;
  }

  .pointer {
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

  .rateStar-fill {
    color: #f39c12;
    /* Color for selected (solid) stars */
    cursor: pointer;
    font-size: 2rem;

  }

  .form-floating>label {
    right: 0;
  }
</style>

<!-- Page Header Start -->
<div class="container-fluid page-header p-5 mb-5 wow fadeIn" data-wow-delay="1.1s">
  <div class="">
    <div class="container pb-3 pt-5">
      <nav aria-label="breadcrumb animated slideInDown ">
        <div class="d-flex justify-content-between">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              الكورسات
            </li>
          </ol>
          <div>
            <!-- <button class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#requestCourseModal"><i
                class="fa-solid fa-pencil me-2"></i>طلب أضافة كورس</button> -->
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
</div>
<!-- Page Header End -->
<!-- tabs start -->
<ul class="nav nav-pills mb-3 justify-content-center" style="gap: 7rem;" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link px-5 rounded-0 active" id="pills-profile-tab" data-bs-toggle="pill"
      data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
      الكورسات</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <?php foreach ($course_therapist as $course) { ?>
    <div class="tab-pane w-55 px-4 mx-auto fade show active" id="pills-home" role="tabpanel"
      aria-labelledby="pills-home-tab">
      <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 px-4 pb-2">
          <div class="ms-n5 mb-1">
            <?php if ($course['Status'] == "Pending Review") { ?>
              <div class="service-icon w-25 text-white bg-warning rounded-end mb-1 me-4"
                style="border-top-right-radius: 0px !important;">
                قيد المراجعة
              </div>
            <?php } else if ($course['Status'] == "Cancelled") { ?>
                <div class="service-icon w-25 text-white bg-danger rounded-end mb-1 me-4"
                  style="border-top-right-radius: 0px !important;">
                  مرفوض
                </div>
            <?php } else if ($course['Status'] == "Accepted") { ?>
                  <div class="service-icon w-25 text-white bg-success rounded-end mb-1 me-4"
                    style="border-top-right-radius: 0px !important;">
                    مقبول
                  </div>
            <?php } ?>
            <h4 class="mb-0 w-100 text-right">
              <?= $course['Title'] ?>
            </h4>
            <p class="text-right w-100">
              <?= $course['Description'] ?>
            </p>
          </div>
          <div class="d-flex justify-content-between">
            <p class=" mb-0 text-right">
              <i class="fa-solid fa-hand-holding-dollar" style="color: #6eaedc;"></i>
              <?= $course['Price'] ?> ج.م
            </p>
            <p class=" mb-0 text-right">
              <?= $course['Sessions'] ?> جلسات <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
            </p>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<!-- tabs end -->

<!-- rate modal -->

<!-- Modal -->
<div class="modal fade" id="requestCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id=""> طلب اضافة كورس</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
          <div class="col-sm-12 mt-4">
            <div class="form-floating">
              <input type="text" class="form-control rtl" id="title" placeholder="عنوان الكورس" />
              <label for="title"> عنوان الكورس</label>
            </div>
          </div>
          <div class="col-12">
            <textarea name="" id="" cols="30" rows="6" placeholder="التفاصيل "
              class="rtl arabic form-control mt-3"></textarea>
          </div>
          <div class="col-sm-6 mt-3">
            <div class="form-floating">
              <input type="text" class="form-control rtl" id="price" placeholder="السعر" />
              <label for="price">السعر</label>
            </div>
          </div>
          <div class="col-sm-6 mt-3">
            <div class="form-floating">
              <input type="text" class="form-control rtl" id="sessionNumber" placeholder="عدد الجلسات" />
              <label for="sessionNumber">عدد الجلسات</label>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="button" class="btn btn-primary px-5">تقديم الطلب</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include("includes/footer.php"); ?>
</body>

</html>