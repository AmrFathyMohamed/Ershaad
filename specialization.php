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
        <div class="text-center mx-auto container">
            <h6 class="fw-normal mb-5 text-primary">
            <?php
                
                    if ($Specialy['SpecialtyID'] ==1) {
                        echo 'الإرشاد الأسري هو عملية مساعدة أفراد الأسرة فرادى أو كجماعة في فهم الحياة الأسرية ومسؤلياتها لتحقيق الاستقرار والتوافق الأسري وحل المشكلات الأسرية. ويمكن تعريفه أيضاً بأنه عملية مساعدة جميع أفراد الأسرة فرادى أو جماعة لفهم متطلبات الحياة العائلية وما يتصل بها من حقوق وواجبات متبادلة. ويهدف الإرشاد الأسري إلى حل المشكلات الأسرية، و تحسين التواصل الأسري وتعزيز التفاهم والاحترام المتبادل، و تعزيز الصحة النفسية للأسرة، و تنمية مهارات الأسرة في حل المشكلات، واتخاذ القرارات، والتعامل مع الضغوط.';
                    } else if ($Specialy['SpecialtyID'] ==2) {
                        echo '
                        يعد العلاج الزوجي نوعاً من أنواع المعالجة النفسية، حيث يقوم المعالج بمساعدة الشخصين الذين تربطهما علاقة عاطفية على اكتساب نظرة أعمق إلى علاقتهما لحل النزاع، والوصول إلى الرضا، وتحسين العلاقة من خلال مجموعة متنوعة من التقنيات العلاجية.  يركز المعالج على علاج العلاقة بحد ذاتها، بدلاً من علاج كل فرد على حدى؛ فمن خلال العلاقة، يستطيع الفرد الوصول إلى خبايا نفسه التي ساهمت في المشكلة.
                        ';
                    } 
                    else if ($Specialy['SpecialtyID'] ==3) {
                        echo '
                        الدعم النفسي هو مجموعة من الأنشطة والتدخلات التي تهدف إلى تحسين الصحة النفسية والاجتماعية للأفراد أو المجموعات التي تواجه ظروفاً صعبة أو استثنائية. يقوم المعالج بتقديم المساعدة والتعاطف والتشجيع والرعاية للمستفيدين، ويساعدهم على تطوير قدراتهم ومهاراتهم في التكيف والتغلب على المشكلات والصعوبات التي تواجههم. كما يساهم الدعم النفسي في تعزيز الثقة بالنفس والاحترام الذاتي والاندماج الاجتماعي للأفراد.
                        ';
                    } else if ($Specialy['SpecialtyID'] ==4) {
                        echo '
                        يشمل علم النفس الإجتماعي دراسة العلاقة بين فرد وآخر، والتأثير المتبادل بين الفرد والجماعة، وبين جماعة وأخرى. ويدخل فيه علم النفس التجريبي وعلم النفس التربوي وعلم الاجتماع والأنثروبولوجيا، وأهم موضوعاته أثر الأسرة والمدرسة والدين والمركز الاقتصادي والجو السياسي، في نمو الفرد وتوافقه مع البيئة، ودراسة الأنماط سلوكية كالعدوان، والمشاركة الوجدانية والمنافسة والتعاون والزعامة، وطبيعة الاتجاهات. 
                        ';
                    } else if ($Specialy['SpecialtyID'] ==5) {
                        echo '
                        اللايف كوتشنج، أو التدريب على الحياة، هو عملية تهدف إلى مساعدة الأشخاص على تحقيق أهدافهم الشخصية والمهنية. المدرب، أو اللايف كوتش، هو شخص مؤهل بشكل احترافي لمساعدة الآخرين على للوصول إلى نتائج أفضل في حياتهم. المدرب يعمل على مساعدة الأشخاص في التعرف على مصادر القوة لديهم وكيفية استغلالها في التخطيط الجيد واختيار أهدافهم المستقبلية بشكل صحي. يساعدك المدرب في التعرف على نفسك بشكل أدق والتعرف على تفاصيلك لكي تتمكن من وضع رؤية جيدة لنفسك. يساعدك المدرب على النمو من خلال تحليل وضعك الحالي ، وتحديد المعتقدات المقيدة والتحديات والعقبات المحتملة الأخرى التي تواجهها ووضع خطة عمل مخصصة مصممة لمساعدتك على تحقيق نتائج محددة في حياتك.
                        ';
                    } else if ($Specialy['SpecialtyID'] ==6) {
                        echo '
                        مشكلة التخاطب هي مشكلة تتعلق بالقدرة على استخدام اللغة والنطق بشكل سليم وفعال. قد تحدث هذه المشكلة لأسباب مختلفة، مثل العوامل الوراثية أو السمعية أو العقلية أو البيئية أو النفسية أو الصحية. قد تؤثر مشكلة التخاطب على التواصل والتعلم والاندماج الاجتماعي للأفراد، سواء كانوا أطفالًا أو بالغين. مشكلة التخاطب تعتمد على نوعها وسببها وشدتها ويمكن حلها عن طريق التحدث مع اخصائي التخاطب.

                        ';
                    } else if ($Specialy['SpecialtyID'] ==7) {
                        echo '
                        ضطراب طيف التوحد عبارة عن حالة ترتبط بنمو الدماغ وتؤثر على كيفية تمييز الشخص للآخرين والتعامل معهم على المستوى الاجتماعي، مما يتسبب في حدوث مشكلات في التفاعل والتواصل الاجتماعي. كما يتضمن الاضطراب أنماط محدودة ومتكررة من السلوك.   يبدأ اضطراب طيف التوحد في مرحلة الطفولة المبكرة ويتسبب في نهاية المطاف في حدوث مشكلات على مستوى الأداء الاجتماعي — على الصعيد الاجتماعي، في المدرسة والعمل، على سبيل المثال. 


                        ';
                    } else if ($Specialy['SpecialtyID'] ==8) {
                        echo '
                        ذوي الاحتياجات الخاصة هم الأشخاص الذين يحتاجون إلى مساعدة إضافية أو خاصة بسبب إعاقة جسدية أو عقلية أو نفسية أو حسية. نحن ندعم ذوي الاحتياجات الخاصة نفسيا وعقليا ليتمكنوا من التأثير في المجتمع من حولهم والوصول بهم إلى أفضل ما يمكن التوصل إليه من النواحي الطبية والنفسية والاجتماعية والتربوية والمهنية.هذا التأهيل يساهم في إعادة النظر فيما تملكه هذه الفئة من مهارات يمكن استغلالها والعمل على تطويرها وإتاحة الفرص لهم ليكونوا جزءا فعالا من المجتمع؛ الأمر الذي ينعكس إيجابا على صحتهم النفسية والعقلية.

                        ';
                    } else if ($Specialy['SpecialtyID'] ==9) {
                        echo '
                        نمية المهارات للأطفال هي عملية تهدف إلى تطوير قدرات الأطفال وإبراز مواهبهم وإمكانياتهم في مختلف المجالات العقلية والحركية والاجتماعية والفنية. لتنمية المهارات للأطفال، يمكن اتباع بعض الطرق والأساليب التي تساعد على تحفيز الإبداع والتفكير والتعلم لدى الأطفال.

                        ';
                    } else if ($Specialy['SpecialtyID'] ==10) {
                        echo '
                        حدث اضطراب التعلُّم عندما يستوعب المخ المعلومات ويتعامل معها بغير الطريقة السليمة. ويؤدي ذلك إلى إعاقة الشخص عن تعلم المهارات الجديدة والاستفادة منها جيدًا. ولذلك تكون هناك فجوة بين المهارات المتوقعة منهم وفق أعمارهم ومستويات ذكائهم وبين أدائهم في المدرسة. وتؤثر اضطرابات التعلُّم الشائعة على قدرة الطفل على القراءة، والكتابة، والحساب، واستخدام اللغة أو فهمها، والتواصل الاجتماعي، وتعلُّم المهارات الأخرى التي لا تُستخدم فيها الكلمات
                        ';
                    } else if ($Specialy['SpecialtyID'] ==11) {
                        echo '
                        تعديل السلوك هو عملية تغيير السلوك عن طريق استخدام مبادئ التعلم ونظرية التعلم. ويعد تعديل السلوك نهجًا علاجيًا يستخدم في مجموعة متنوعة من الإعدادات، بما في ذلك المدارس والعيادات والمنازل. يهدف تعديل السلوك إلى إحداث تغيير إيجابي في سلوك الفرد من خلال تقنيات مثل التعزيز الإيجابي والسلبي، أو العقاب على السلوك الخاطئ تعتبر احدى طرق العلاج من خلال تعديل السلوك. يستخدم تعديل السلوك لمعالجة مجموعة متنوعة من المشاكل في كل من البالغين والأطفال. يستخدم هذا النمط من العلاج لعلاج جميع أنواع الحالات مثل اضطراب الوسواس القهري (OCD) واضطراب نقص الانتباه / فرط النشاط (ADHD)، والرهاب ، سلس البول (التبول في الفراش) ، واضطراب القلق العام ، واضطراب قلق الانفصال ،العديد من المشكلات الشائعة الأخرى وغيرها من المخاوف المتعددة.
                        ';
                    } 
                ?>
            </h6>
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