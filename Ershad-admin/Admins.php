<?php
// Include necessary files
include("layout.php");
include("../classes/Database.php");
include("../classes/AdminTable.php");

// Check if the user is logged in as an admin
if (isset($_SESSION['user_id'])) {
    $adminId = $_SESSION['user_id'];
    $database = new Database();
    $admins = new AdminTable($database);
    $adminsData = $admins->getAdmins();
} else {
    // Redirect or display an error message for unauthorized access
    header("Location: index.php");
    exit;
}

// Handle the form submission for adding a new admin
if (isset($_POST['addAdmin'])) {
    $data = array(
        $_POST['adminFullName'],
        $_POST['adminUsername'],
        $_POST['adminEmail'],
        $_POST['adminPassword']
    );

    if ($admins->insertAdmin(...$data)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Admins.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

if (isset($_POST['updateAdmin'])) {
    $data = array(
        $_POST['editAdminId'],
        $_POST['editAdminFullName'],
        $_POST['editAdminUsername'],
        $_POST['editAdminEmail'],
        $_POST['editAdminPassword']
    );

    if ($admins->updateAdmin(...$data)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Admins.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

// Handle the deletion of an admin
if (isset($_GET['deleteAdmin'])) {
    $adminIdToDelete = $_GET['deleteAdmin'];

    if ($admins->deleteAdmin($adminIdToDelete)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Admins.php";
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

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin Management</h3>
            </div>
            <!-- Add any other page title content here -->
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addAdminModal">
                    Add Admin
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($adminsData as $admin) { ?>
                            <tr>
                                <td>
                                    <?php echo $admin['FullName']; ?>
                                </td>
                                <td>
                                    <?php echo $admin['Username']; ?>
                                </td>
                                <td>
                                    <?php echo $admin['Email']; ?>
                                </td>                                
                                <td>
                                    <?php echo $admin['Password']; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary btn-edit-admin" data-bs-toggle="modal"
                                        data-bs-target="#editAdminModal"
                                        data-adminid="<?php echo $admin['AdminID']; ?>">Edit</button>
                                    <a href="deleteAdmin.php?id=<?php echo $admin['AdminID']; ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this admin?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="adminFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="adminFullName" name="adminFullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="adminUsername" name="adminUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="adminEmail" name="adminEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary" name="addAdmin">Add Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" name="editAdminId" value="">
                        <div class="mb-3">
                            <label for="editAdminFullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="editAdminFullName" name="editAdminFullName"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editAdminUsername" name="editAdminUsername"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editAdminEmail" name="editAdminEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editAdminPassword" name="editAdminPassword"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary" name="updateAdmin">Update Admin</button>
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
        $('#table1').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ],
        });
    });

   
    $('.btn-edit-admin').click(function () {
            var adminId = $(this).data('adminid');
            var adminFullName = $(this).closest('tr').find('td:eq(0)').text().trim();
            var adminUsername = $(this).closest('tr').find('td:eq(1)').text().trim();
            var adminEmail = $(this).closest('tr').find('td:eq(2)').text().trim();
            var adminPassword = $(this).closest('tr').find('td:eq(3)').text().trim();


            // Populate the Edit Admin Modal fields
            $('#editAdminModal input[name="editAdminId"]').val(adminId);
            $('#editAdminModal input[name="editAdminFullName"]').val(adminFullName);
            $('#editAdminModal input[name="editAdminUsername"]').val(adminUsername);
            $('#editAdminModal input[name="editAdminEmail"]').val(adminEmail);
            $('#editAdminModal input[name="editAdminPassword"]').val(adminPassword);

        });
</script>
</body>

</html>