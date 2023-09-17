<?php include("includes/header.php"); ?>
<?php include("./classes/TherapistTable.php"); ?>
<?php
$database2 = new Database();
$therapistTable2 = new TherapistTable($database2);
$therapists2 = $therapistTable2->getRandomTopRatedTherapists(15);
$alltherapists = $therapistTable2->getTherapists();
?>


<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
    <h1 class="display-4 animated slideInDown mb-4">المعالجين</h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          المعالجين
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->

<!-- Team Start -->
<div class="container-xxl py-5 px-sm-0">
  <div class="container">
    <div class="text-center mx-auto" style="max-width: 500px">
      <h1 class="display-6 mb-5">المعالجين</h1>
    </div>
    <div class="row g-4">
      <div class="col-10">
        <div class="form-floating">
          <input type="text" class="form-control right" id="search" placeholder=">بحث بأسم المعالج" />
          <label for="search" style="right: 0!important; left: auto!important;">بحث بأسم المعالج</label>
        </div>
      </div>
      <div class="col-2 px-sm-0">
        <button class="btn btn-primary py-3 w-100" type="button" onclick="searchTherapists()">
          بحث
        </button>
      </div>
    </div>
    <div class="row g-2">
      <div class="col-md-9 mt-5 order-last-phone">
        <div class="row g-4" id="therapistsList">
          <?php foreach ($therapists2 as $therapist) { ?>
            <div class="col-lg-4 col-md-6 col-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
              <div class="team-item rounded px-sm-1">
                <!-- You can replace the image source with the actual therapist's image -->
                <img class="img-fluid" src="<?= $therapist['Profile']; ?>" alt="" />
                <div class="text-center p-4 px-sm-3">
                  <h5 class="h-phone">
                    <?= $therapist['FullName']; ?>
                  </h5>
                  <span  class="text-phone">
                    <?= $therapist['Specialization']; ?>
                  </span>
                </div>
                <div class="team-text text-center bg-white p-4 px-sm-3">
                  <h5 class="h-phone">
                    <?= $therapist['FullName']; ?>
                  </h5>
                  <p  class="text-phone">
                    <?= $therapist['Specialization']; ?>
                  </p>
                  <div class="d- justify-content-center">
                    <div class="rate d-flex justify-content-center align-content-center mb-2">
                      <?php
                      $rating = $therapist['Rating'];
                      for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                          echo '<i class="fa-solid fa-star text-warning"></i>';
                        } else {
                          echo '<i class="fa-regular fa-star text-warning"></i>';
                        }
                      }
                      ?>
                    </div>
                    <div class="price d-flex justify-content-center align-content-center">
                      <p>
                        <?= $therapist['Price']; ?> /
                        ساعة
                      </p>
                      <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                    </div>
                    <a class="btn w-100 btn-light m-1" href="therapist-profile.php?id=<?=$therapist["TherapistID"];?>">عرض الملف الشخصي</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
      <div class="col-md-3 col-12 mt-5">
        <form method="POST" id="filterForm">
          <div class="border rounded py-4 px-2">
            <p class="right">التاريخ</p>
            <div class="form-floating">
              <input type="date" class="form-control" id="date" name="date" placeholder="التاريخ" />
              <label for="date">التاريخ</label>
            </div>
            <hr>
            <p class="right">النوع</p>
            <div class="d-flex">
              <p class="me-5">النوع</p>
              <div class="form-check form-check-primary me-3">
                <input class="form-check-input" type="checkbox" name="GenderM" id="Male" checked>
                <label class="form-check-label" for="Male">
                  ذكر
                </label>
              </div>
              <div class="form-check form-check-primary me-3">
                <input class="form-check-input" type="checkbox" name="GenderF" id="Female" checked>
                <label class="form-check-label" for="Female">
                  انثي
                </label>
              </div>
            </div>
            <hr>
            <p class="right">التخصص</p>
            <select class="form-control form-control-lg" id="speciality" name="speciality">
              <option value="All">كل التخصصات</option>
              <?php foreach ($specialties as $spec) { ?>
                <option value="<?= $spec["Specialty"] ?>">
                  <?= $spec["Specialty"] ?>
                </option>
              <?php } ?>
            </select>
            <hr>
            <div class="border rounded py-4 px-2">
              <p class="right">سعر الجلسة</p>
              <input type="range" class="form-range" min="0" max="1000" step="1" id="customRange3" name="priceRange"
                value="100">
              <p class="right" id="priceValue">100</p>
              <hr>
              <button class="btn btn-primary py- w-100 px-5" type="submit"> تطبيق الفلاتر </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Team End -->
<?php include("includes/footer.php"); ?>
<script>
  function searchTherapists() {
    var searchQuery = document.getElementById("search").value.toLowerCase().trim();
    var therapistsList = document.getElementById("therapistsList");
    therapistsList.innerHTML = '';
    var results = <?php echo json_encode($alltherapists); ?>;
    var filteredResults = results.filter(function (therapist) {
      return therapist['FullName'].toLowerCase().includes(searchQuery);
    });
    var displayCount = Math.ceil(filteredResults.length * 0.25);
    for (var i = 0; i < displayCount; i++) {
      var therapist = filteredResults[i];
      addTherapistToResults(therapistsList, therapist);
    }
    if (filteredResults.length <= displayCount) {
      for (var i = displayCount; i < filteredResults.length; i++) {
        var therapist = filteredResults[i];
        addTherapistToResults(therapistsList, therapist);
      }
    }
  }
  function addTherapistToResults(parentElement, therapist) {
    const therapistDiv = document.createElement('div');
    therapistDiv.className = 'col-lg-3 col-md-6 wow fadeInUp';
    therapistDiv.setAttribute('data-wow-delay', '0.1s');
    therapistDiv.innerHTML = `<div class="team-item rounded">
                        <img class="img-fluid" src="${therapist['Profile']}" alt="" />
                        <div class="text-center p-4">
                            <h5 class="text-">${therapist['FullName']}</h5>
                            <span>${therapist['Specialization']}</span>
                        </div>
                        <div class="team-text text-center bg-white p-4">
                            <h5>${therapist['FullName']}</h5>
                            <p>${therapist['Specialization']}</p>
                            <div class="d- justify-content-center">
                                <div class="rate d-flex justify-content-center align-content-center mb-2">
                                ${getStarRating(therapist['Rating'])}
                                </div>
                                <div class="price d-flex justify-content-center align-content-center">
                                    <p>${therapist['Price']}/ساعة</p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1" href="therapist-profile.php?id=${therapist['TherapistID'];}">عرض الملف الشخصي</a>
                            </div>
                        </div>
                    </div>
                </div>`;
    parentElement.appendChild(therapistDiv);
  }
  function getStarRating(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
      if (i <= rating) {
        stars += '<i class="fa-solid fa-star text-warning"></i>';
      } else {
        stars += '<i class="fa-regular fa-star text-warning"></i>';
      }
    }
    return stars;
  }
  const priceRangeInput = document.getElementById("customRange3");
  const priceValueElement = document.getElementById("priceValue");

  // Display the initial value
  priceValueElement.textContent = priceRangeInput.value;

  // Update the displayed value as the user changes the input
  priceRangeInput.addEventListener("input", function () {
    priceValueElement.textContent = this.value;
  });
</script>


<script>
  $("#filterForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting traditionally

    // Get the form data
    const formData = $(this).serialize();

    // Make an AJAX request to fetch filtered data
    $.ajax({
      url: "checksearch.php", // Update the URL to your PHP script
      method: "POST",
      data: formData,
      dataType: "html", // Expect HTML response
      success: function (data) {
        // Update the therapistsList div with the filtered data
        $("#therapistsList").html(data);
      },
      error: function () {
        // Handle errors if any
        alert("An error occurred while fetching data.");
      },
    });
  });
</script>
</body>

</html>