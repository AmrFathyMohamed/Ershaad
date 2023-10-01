<?php include("includes/header.php"); ?>

<?php include("classes/TherapistTable.php"); ?>

<?php
if (isset($_GET['SpecialtyID'])) {
    $specialtyID = $_GET['SpecialtyID'];
    $database = new Database();
    $Specialties = new SpecialtiesTable($database);
    $therapistTable = new TherapistTable($database);
    $therapists = $therapistTable->getTherapistsBySpecialization($specialtyID);
    $Specialy = $Specialties->getSpecialtyById($specialtyID);
    //$$Specialy =Specialtyists);
} else {
    header("Location: index.php");
    exit;
}
?>

<!-- Team Start -->
<div class="container-xxl py-5 px-sm-0" id="team-section">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-10">
                <div class="form-floating">
                    <input type="text" class="form-control right" id="search"
                        placeholder="بحث بأسم المعالج فى تخصص <?= $Specialy['Specialty']; ?>" />
                    <label for="search" style="right: 0!important; left: auto!important;">    متخصصين: 
                        <?= $Specialy['Specialty']; ?>
                    </label>
                </div>
            </div>
            <div class="col-2 px-sm-0">
                <button class="btn btn-primary py-3 w-100" type="button" onclick="searchTherapists()">
                    بحث
                </button>
            </div>
        </div>
        <div class="text-center mx-auto" style="max-width: 1000px">
            <h1 class="display-6 mb-5 underline">تخصص -
                <?= $Specialy['Specialty']; ?>
            </h1>
        </div>
        <div class="row g-4" id="therapistsList">
            <?php foreach ($therapists as $therapist) { ?>
                <div class="col-lg-3 col-md-6 col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <!-- You can replace the image source with the actual therapist's image -->
                        <img class="img-fluid" src="<?= $therapist['Profile']; ?>" alt="" />
                        <div class="text-center p-4 px-sm-1">
                            <h5 class="h-phone">
                                <?= $therapist['FullName']; ?>
                            </h5>
                            <span class="text-phone">
                                <?= $therapist['Specialization']; ?>
                            </span>
                        </div>
                        <div class="team-text text-center bg-white p-4 px-sm-3">
                            <h5 class="h-phone">
                                <?= $therapist['FullName']; ?>
                            </h5>
                            <p class="text-phone">
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
                                        <?= $therapist['PriceAfterPercentage']; ?> /
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
</div>
<!-- Team End -->

<?php include("includes/footer.php"); ?>
<script>
    function searchTherapists() {
        // Get the search query
        var searchQuery = document.getElementById("search").value.toLowerCase().trim();
        var therapistsList = document.getElementById("therapistsList");
        therapistsList.innerHTML = ''; // Clear previous results

        // Filter therapists based on searchQuery
        var results = <?php echo json_encode($therapists); ?>;
        var filteredResults = results.filter(function (therapist) {
            return therapist['FullName'].toLowerCase().includes(searchQuery);
        });

        // Display the first 25% of results
        var displayCount = Math.ceil(filteredResults.length * 0.25);
        for (var i = 0; i < displayCount; i++) {
            var therapist = filteredResults[i];
            addTherapistToResults(therapistsList, therapist);
        }

        // If all results match, display the rest
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
                                    <p>${therapist['PriceAfterPercentage']}/ساعة</p>
                                    <i class="fa-solid fa-money-bill-1-wave ms-2"></i>
                                </div>
                                <a class="btn w-100 btn-light m-1" href="therapist-profile.php?id=${therapist["TherapistID"]}">عرض الملف الشخصي</a>
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
</script>
</body>

</html>