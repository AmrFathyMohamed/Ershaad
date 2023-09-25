<?php include("includes/header.php"); ?>

<?php include("classes/ClientTable.php"); ?>
<?php include("classes/SessionTable.php"); ?>

<?php
if (isset($_SESSION['user_id'])) {
  // Get the 'id' value from the URL
  if ($_SESSION['type'] == 'client') {
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $clientTable = new ClientTable($database);
    $client = $clientTable->getClientById($userId);
    $sessions = $clientTable->getDataByClientIdAccepted($userId, "sessions");
    $course_client = $clientTable->getDataByClientId($userId, "course_client");
    $sessions = new SessionTable($database);
    $sessionsData = $sessions->getSessionsclient($userId);
  } else {
    header("Location: index.php");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}

?>

<!-- Page Header Start -->
<div class="container-fluid page-header pb-2 mb-5 wow fadeIn" data-wow-delay="1.1s">
  <div class="">
    <div class="container pb-3 pt-5">
      <nav aria-label="breadcrumb animated slideInDown ">
        <div class="d-flex justify-content-between">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              الملف الشخصي
            </li>
          </ol>
          <div>
            <!-- <button class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#editInfoModal"><i class="fa-solid fa-pencil me-2"></i>تعديل بياناتي</button> -->
          </div>
        </div>

      </nav>
      <div class="text-center"><img src="img/user.png" style="width: 6vw;background: white;" alt=""
          class="rounded-circle shadow"></div>
      <h2 class="animated slideInDown text-center arabic text- mt-4">
        <?= $client['FullName']; ?>
      </h2>
      <p class="animated slideInDown  text-center arabic fs-6 mb-1 text-primary fw-bold">
        <?= $client['Email']; ?>
      </p>
      <div class="w-40 mx-auto">
        <hr>
      </div>
      <div class="d-flex justify-content-center">
        <div class="col-2">
          <h6 class="animated text-center slideInDown arabic fs-small fst-normal mb-1">الهاتف</h6>
          <p class="animated text-center slideInDown arabic fs-6 text-primary fw-bold mb-4">
            <?= $client['Phone']; ?>
          </p>
        </div>
        <div class="col-2">
          <h6 class="animated text-center slideInDown arabic fs-small fst-normal mb-1">النوع</h6>
          <p class="animated text-center slideInDown arabic fs-6 text-primary fw-bold mb-4">
            <?= $client['FullName']; ?>Gemder
          </p>
        </div>
        <div class="col-2">
          <h6 class="animated text-center slideInDown arabic fs-small fst-normal mb-1">السن</h6>
          <p class="animated text-center slideInDown arabic fs-6 text-primary fw-bold mb-4 rtl"> سنة
            <?= $client['Age']; ?>
          </p>
        </div>
      </div>



    </div>
  </div>
</div>
<!-- Page Header End -->
<!-- tabs start -->
<ul class="nav nav-pills mb-3 justify-content-center" style="gap: 7rem;" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link px-5 rounded-0 active" id="pills-home-tab" data-bs-toggle="pill"
      data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">جلساتي
      القادمة</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link px-5 rounded-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
      type="button" role="tab" aria-controls="pills-profile" aria-selected="false">جلساتي السابقة</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link px-5 rounded-0" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
      type="button" role="tab" aria-controls="pills-contact" aria-selected="false">الكورسات</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane w-55 px-4 mx-auto fade show active" id="pills-home" role="tabpanel"
    aria-labelledby="pills-home2-tab">

    <?php
    $currentDate = new DateTime(); // Get the current date and time
    
    foreach ($sessionsData as $session) {
      $startTime = new DateTime($session['Time']);

      // Calculate the end time by adding 1 hour to the start time
      $endTime = clone $startTime;
      $endTime->add(new DateInterval('PT1H'));
      $sessionDate = new DateTime($session['Date']);
      $sessionTypeClass = ($session['Type'] == 'Urgent' && $session['Type'] != 'Courses') ? 'bg-success' : 'bg-danger';
      $sessionTypeName = ($session['Type'] == 'Urgent' && $session['Type'] != 'Courses') ? 'عادية' : 'عاجلة';
      if ($sessionDate->format('Y-m-d') >= $currentDate->format('Y-m-d')) {
        echo '<div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 px-4 pb-2">
                  <div class="d-flex align-items-center ms-n5 mb-1">';
                  if ($sessionDate->format('Y-m-d') == $currentDate->format('Y-m-d')) {
                    echo '<div class="service-icon w-50 text-white bg-primary rounded-end mb-1 me-4"  onclick="showChat(\'' . $session['TherapistID'] . '\')"
                      style="border-top-right-radius: 0px !important;">تحدث الي المعالج <i class="fa-solid fa-comments ms-2"></i></div>';
                  }
                  echo '                     
                    <h4 class="mb-0 w-85 text-right">' . $session['FullName'] . '</h4>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="mb-0 text-right">
                      <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> ' . $startTime->format('h:i A') . ' - ' . $endTime->format('h:i A') . '
                    </p>
                    <p class="badge bg-'.$sessionTypeClass .' text-white">'.$sessionTypeClass .'</p>
                    <p class="mb-0 text-right">
                      ' . $sessionDate->format('d-m-Y') . ' <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
                    </p>
                  </div>
                </div>
            </div>';
      }
    } ?>
  </div>
  <div class="tab-pane w-55 px-5 mx-auto fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- <div class="col-lg-10 mt-3 wow fadeInUp" data-wow-delay="0.1s">
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
        </div> -->
    <?php
    $currentDate = new DateTime(); // Get the current date and time
    
    foreach ($sessionsData as $session) {
      $startTime = new DateTime($session['Time']);

      // Calculate the end time by adding 1 hour to the start time
      $endTime = clone $startTime;
      $endTime->add(new DateInterval('PT1H'));
      $sessionDate = new DateTime($session['Date']);
      $sessionTypeClass = ($session['Type'] == 'Work' && $session['Type'] != 'Courses') ? 'bg-success' : 'bg-danger';
      $sessionTypeName = ($session['Type'] == 'Work' && $session['Type'] != 'Courses') ? 'عادية' : 'عاجلة';
      if ($sessionDate->format('Y-m-d') < $currentDate->format('Y-m-d')) {
        echo '<div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 px-4 pb-2">
                  <div class="d-flex align-items-center ms-n5 mb-1">
                  <div class="service-icon w-50 text-white bg-warning rounded-end mb-1 me-4 pointer"  onclick="showRate(\'' . $session['SessionID'] . '\')" style="border-top-right-radius: 0px !important;">
                  تقييم <i class="fa-regular fa-star ms-2"></i>
                 </div>
                    <h4 class="mb-0 w-85 text-right">' . $session['FullName'] . '</h4>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="mb-0 text-right">
                      <i class="fa-regular fa-clock" style="color: #6eaedc;"></i> ' . $startTime->format('h:i A') . ' - ' . $endTime->format('h:i A') . '
                    </p>
                    <p class="mb-0 text-right">
                      ' . $sessionDate->format('d-m-Y') . ' <i class="fa-regular fa-calendar-check" style="color: #6eaedc;"></i>
                    </p>
                  </div>
                </div>
                </div>

                
            ';
      }
    } ?>
  </div>
  <div class="tab-pane w-55 px-5 mx-auto fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  <?php foreach ($course_client as $course) { ?>
      <div class="col-lg-12 mt-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item rounded h-100 px-4 pb-2">
          <div class="ms-n5 mb-1">
            <?php if ($course['Status'] == "Pending Review") { ?>
              <div class="service-icon w-50 text-white bg-warning rounded-end mb-1 me-4"
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
  <?php } ?>
  </div>
  </div>

</div>
<!-- tabs end -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="send_message.php">
        <div class="modal-header">
          <h5 class="modal-title" id="">تحدثت الي معالجك</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <textarea id="Message" name="Message" cols="30" rows="4" placeholder="أكتب رسالتك"
            class="rtl arabic form-control"></textarea>
          <input type="hidden" id="UserID" name="UserID" value="<?= $_SESSION['user_id']; ?>" />
          <input type="hidden" id="T" name="T" value="0" />

          <input type="hidden" id="therapistID" name="TherapistID" value="<?= $therapist['TherapistID']; ?>" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary px-5" id="send">ارسال</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- rate modal -->

<!-- Modal -->
<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="send_rate.php">
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
          <textarea name="Comment" id="comment" cols="30" rows="6" placeholder="أكتب تعليقاً"
            class="rtl arabic form-control"></textarea>
          <input type="text" hidden id="SessionID" name="SessionID">
          <input type="text" hidden id="ratingVal" name="Rate">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary px-5" id="pupl">نشر</button>
        </div>
      </form>
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
            <input type="text" class="form-control" id="name" placeholder="الاسم كامل" />
            <label for="name"> الاسم كامل</label>
          </div>
        </div>
        <div class="col-sm-12 mt-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="الهاتف" placeholder="الهاتف" />
            <label for="الهاتف">الهاتف</label>
          </div>
        </div>
        <div class="col-sm-12 mt-3">
          <div class="form-floating">
            <input type="number" class="form-control" id="السن" placeholder="السن" />
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
<?php include("includes/footer.php"); ?>
<script>
 function showRate(sessionID) {
  $("#SessionID").val(sessionID)
  $("#rateModal").modal('show')
  }

  function showChat(therID) {
  $("#therapistID").val(therID)
  $("#chatModal").modal('show')
  }
  $(document).ready(function () {
    const ratingIcons = $('.rating .fa-regular');
    let ratingValue = 0;
    
    ratingIcons.click(function () {
      ratingValue = $(this).index() + 1;
      ratingIcons.removeClass('fa-solid rateStar-fill').addClass('fa-regular rateStar');
      $(this).prevAll().addBack().removeClass('fa-regular rateStar').addClass('fa-solid rateStar-fill');
    });
    
    $("#pupl").on('click', function () {
      $("#ratingVal").val(ratingValue); 
      alert('Session ID:'+ $("#sessionID").val());
      alert('Rating:'+ $("#ratingVal").val());
      alert('Comment:'+ $("#comment").val());
    });
  });
</script>
</body>

</html>