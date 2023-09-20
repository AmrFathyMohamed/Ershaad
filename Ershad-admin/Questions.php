<?php
// Include necessary files
include("layout.php");
include("../classes/Database.php");
include("../classes/QuestionTable.php"); // Assuming you have a QuestionTable class

// Check if the user is logged in as an admin
if (isset($_SESSION['user_id'])) {
    $adminId = $_SESSION['user_id'];
    $database = new Database();
    $questionTable = new QuestionTable($database); // Change this to your QuestionTable class
    $questionsData = $questionTable->getQuestions(); // Assuming you have a method to fetch questions
} else {
    // Redirect or display an error message for unauthorized access
    header("Location: index.php");
    exit;
}

// Handle the form submission for adding a new question
if (isset($_POST['addQuestion'])) {
    $questionText = $_POST['questionText'];
    $answerText = $_POST['answerText'];

    if ($questionTable->insertQuestion($questionText, $answerText)) {
        // Insertion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Questions.php";</script>';
        exit;
    } else {
        // Insertion failed, handle the error
        $errorMessage = "Failed to add question.";
    }
}

// Handle the deletion of a question
if (isset($_GET['deleteQuestion'])) {
    $questionIdToDelete = $_GET['deleteQuestion'];

    if ($questionTable->deleteQuestion($questionIdToDelete)) {
        // Deletion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Questions.php";</script>';
        exit;
    } else {
        // Deletion failed, handle the error
        $errorMessage = "Failed to delete question.";
    }
}
?>

<!-- HTML structure for Questions.php -->
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Questions Management</h3>
            </div>
            <!-- Add any other page title content here -->
        </div>
    </div>

    <section class="section">
        <!-- Add Question button -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addQuestionModal">
                    Add Question
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questionsData as $question) { ?>
                            <tr>
                                <td>
                                    <?php echo $question['Question']; ?>
                                </td>
                                <td>
                                    <?php echo $question['Answer']; ?>
                                </td>
                                <td>
                                    <a href="Questions.php?deleteQuestion=<?php echo $question['QuestionID']; ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this question?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Add Question Modal -->
   
<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel"
    aria-hidden="true">
    <!-- Add question modal HTML code goes here -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuestionModalLabel">Add Question</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="questionText" class="form-label">Question Text</label>
                        <textarea class="form-control" id="questionText" name="questionText" rows="4"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="answerText" class="form-label">Answer Text</label>
                        <textarea class="form-control" id="answerText" name="answerText" rows="4"
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="addQuestion">Add Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Question Modal -->
<div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel"
    aria-hidden="true">
    <!-- Edit question modal HTML code goes here -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQuestionModalLabel">Edit Question</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" name="editQuestionId" id="editQuestionId" value="">
                    <div class="mb-3">
                        <label for="editQuestionText" class="form-label">Question Text</label>
                        <textarea class="form-control" id="editQuestionText" name="editQuestionText" rows="4"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editAnswerText" class="form-label">Answer Text</label>
                        <textarea class="form-control" id="editAnswerText" name="editAnswerText" rows="4"
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="editQuestion">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
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