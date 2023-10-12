<?php
// Include necessary files
include("layout.php");
include("../classes/Database.php");
include("../classes/CourseTable.php"); // Assuming you have a CoursesTable class
include("../classes/TherapistTable.php");
include("../classes/CourseClientTable.php");

// Check if the user is logged in as an admin
if (isset($_SESSION['user_id'])) {
    $adminId = $_SESSION['user_id'];
    $database = new Database();
    $coursesTable = new CourseTable($database); // Change this to your CoursesTable class
    $coursesData = $coursesTable->getAllCourses(); // Assuming you have a method to fetch courses
    $therapists = new TherapistTable($database);
    $therapistsData = $therapists->getTherapists();
    $courseClientTable = new CourseClientTable($database);
    $courseTable = new CourseTable($database);

    // Review
    //Accepted
    $courseTableAccepted = $courseClientTable->getAllCourseTherapists();
} else {
    // Redirect or display an error message for unauthorized access
    header("Location: index.php");
    exit;
}

// Handle the form submission for adding a new course
if (isset($_POST['addCourse'])) {
    // Handle course insertion here
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sessions = $_POST['sessions'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    if ($coursesTable->insertCourse($title, $description, $sessions, $price, $type)) {
        // Insertion successful, you can redirect or show a success message
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Courses.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}
if (isset($_POST['updateCourse'])) {
    $courseId = $_POST['editCourseId'];
    $title = $_POST['editTitle'];
    $description = $_POST['editDescription'];
    $sessions = $_POST['editSessions'];
    $price = $_POST['editPrice'];
    $type = $_POST['editType'];

    if ($coursesTable->updateCourse($courseId, $title, $description, $sessions, $price, $type)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Courses.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

// Handle the deletion of a course
if (isset($_GET['deleteCourse'])) {
    $courseIdToDelete = $_GET['deleteCourse'];

    if ($coursesTable->deleteCourse($courseIdToDelete)) {
        // Deletion successful, you can redirect or show a success message
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Courses.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

// Handle the form submission for adding a new course and therapist assignment
if (isset($_POST['addCourseTherapist'])) {
    $therapistId = $_POST['Therapist']; // Assuming the select input has the name 'Therapist'
    $courseId = $_POST['Course']; // Assuming the select input has the name 'Course'
    $status = 'Accepted'; // You can set the default status here

    // Perform the insertion into the course_therapist table
    $query = "INSERT INTO course_therapist (CourseID, TherapistID, Status, is_deleted, created_at, updated_at)
      VALUES ($courseId, $therapistId, '$status',0,NOW(),NOW())";
    $stmt = $database->executeQuery($query);
    

    if ($stmt) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Courses.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

?>

<!-- HTML structure for Courses.php -->
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Courses Management</h3>
            </div>
            <!-- Add any other page title content here -->
        </div>
    </div>

    <section class="section">
        <!-- Add Course button -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addCourseModal">
                    Add Course
                </button>
                <a href="#" data-bs-toggle="modal" data-bs-target="#addToTherapistModal"
                    class="btn icon px-5 icon-left btn-success"> Add Course to therapist </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="courseTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Sessions</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($coursesData as $course) { ?>
                            <tr>
                                <td>
                                    <?php echo $course['Title']; ?>
                                </td>
                                <td>
                                    <?php echo $course['Description']; ?>
                                </td>
                                <td>
                                    <?php echo $course['Sessions']; ?>
                                </td>
                                <td>
                                    <?php echo $course['Price']; ?>
                                </td>
                                <td>
                                    <?php echo $course['Type']; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary btn-edit-course"
                                        data-bs-toggle="modal" data-bs-target="#editCourseModal"
                                        data-courseid="<?php echo $course['CourseID']; ?>">Edit</button>
                                    <a href="Courses.php?deleteCourse=<?php echo $course['CourseID']; ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="section">
        <!-- Add Course button -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="courseTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Therapist</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($courseTableAccepted as $request) {
                            $courseClientId = $request['id'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $request['CourseName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['TherapistName']; ?>
                                </td>
                                <td>
                                    <span class="badge bg-success px-3">Accepted</span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel"
        aria-hidden="true">
        <!-- Add course modal HTML code goes here -->
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Add Course</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Courses.php">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sessions" class="form-label">Sessions</label>
                            <input type="number" class="form-control" id="sessions" name="sessions" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="Treatment">Treatment</option>
                                <option value="Training">Training</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary" name="addCourse">Add Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Course Modal -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Courses.php">
                        <input type="hidden" name="editCourseId" id="editCourseId" value="">
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editTitle" name="editTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" name="editDescription"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editSessions" class="form-label">Sessions</label>
                            <input type="number" class="form-control" id="editSessions" name="editSessions" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editPrice" name="editPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="editType" class="form-label">Type</label>
                            <select class="form-select" id="editType" name="editType" required>
                                <option value="Treatment">Treatment</option>
                                <option value="Training">Training</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary" name="updateCourse">Update Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addToTherapistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add Course to Therapist</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="Title" class="form-label">Therapist</label>
                        <Select type="text" class="form-control form-select choices" name="Therapist" id="Therapist">
                        <?php foreach ($therapistsData as $therapist) { ?>
                          <option value="<?php echo $therapist['TherapistID']; ?>"><?php echo $therapist['FullName']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Course" class="form-label">Course</label>
                        <Select type="text" class="form-control form-select choices" id="Course" name="Course">
                        <?php foreach ($coursesData as $course) { ?>
                          <option value="<?php echo $course['CourseID']; ?>"><?php echo $course['Title']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="addCourseTherapist">Add Course</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
</div>

<?php include("footer.php"); ?>

<script>
   
    $('.btn-edit-course').click(function () {
            var courseId = $(this).data('courseid');
            var courseTitle = $(this).closest('tr').find('td:eq(0)').text().trim();
            var courseDescription = $(this).closest('tr').find('td:eq(1)').text().trim();
            var courseSessions = $(this).closest('tr').find('td:eq(2)').text().trim();
            var coursePrice = $(this).closest('tr').find('td:eq(3)').text().trim();
            var courseType = $(this).closest('tr').find('td:eq(4)').text().trim();

            // Populate the Edit Course Modal fields
            $('#editCourseId').val(courseId);
            $('#editTitle').val(courseTitle);
            $('#editDescription').val(courseDescription);
            $('#editSessions').val(courseSessions);
            $('#editPrice').val(coursePrice);
            $('#editType').val(courseType);
        });
</script>

<script>
    $(document).ready(function () {
        $('#courseTable').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ],
        });
    });

</script>
</body>

</html>