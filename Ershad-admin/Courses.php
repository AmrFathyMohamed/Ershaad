<?php
// Include necessary files
include("layout.php");
include("../classes/Database.php");
include("../classes/CourseTable.php"); // Assuming you have a CoursesTable class

// Check if the user is logged in as an admin
if (isset($_SESSION['user_id'])) {
    $adminId = $_SESSION['user_id'];
    $database = new Database();
    $coursesTable = new CourseTable($database); // Change this to your CoursesTable class
    $coursesData = $coursesTable->getAllCourses(); // Assuming you have a method to fetch courses
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
        echo '<script>window.location.href = "Courses.php";</script>';
        exit;
    } else {
        // Insertion failed, handle the error
        $errorMessage = "Failed to add the course.";
    }
}

// Handle the deletion of a course
if (isset($_GET['deleteCourse'])) {
    $courseIdToDelete = $_GET['deleteCourse'];

    if ($coursesTable->deleteCourse($courseIdToDelete)) {
        // Deletion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Courses.php";</script>';
        exit;
    } else {
        // Deletion failed, handle the error
        $errorMessage = "Failed to delete the course.";
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
                    <form method="POST" action="">
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
                            <input type="text" class="form-control" id="price" name="price" required>
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

</div>

<?php include("footer.php"); ?>
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