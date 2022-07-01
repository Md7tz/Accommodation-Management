<?php session_start();
include '../config/db.php';
include '../config/utils.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role'] != 'student')) {
    header("location: " . URL_ROOT . '/auth/login.php');
}

// Application handling
if (isset($_POST['submit'])) {
    $name = $rooms = $budget = $from = $to = $details = "";

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rooms = filter_input(INPUT_POST, 'rooms', FILTER_SANITIZE_NUMBER_INT);
    $budget = filter_input(INPUT_POST, 'budget', FILTER_SANITIZE_NUMBER_INT);
    $from = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $to = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Casting
    $rooms = (int)$rooms;
    $budget = (int)$budget;

    // Convert to compatible timestamp
    $from = _date($from);
    $to = _date($to);
    $user_id = $_SESSION['user']['id'];

    if (!empty($name)
        && !empty($rooms)
        && !empty($budget)
        && !empty($from)
        && !empty($to)
        && !empty($details)
    ) {
        // Create Application
        $sql = <<<SQL
        INSERT INTO applications (student_name, no_of_rooms, monthly_budget, stay_from, stay_to, details, user_id)
        VALUES ('$name', $rooms, $budget, '$from', '$to', '$details', $user_id)
        SQL;

        $result = mysqli_query($conn, $sql);
        header("location: /" . URL_SUBFOLDER . "/views/dashboard.php?application=$user_id");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../inc/head.php'; ?>

<body class="bg-none">
    <div class="container-fluid bg-white h-100 fw-bold">
        <?php _include('../inc/header.php', array('header_color' => 'bg-black')) ?>
        <?php include '../inc/application.form.php' ?>
        <?php include '../inc/scripts.php' ?>
    </div>
</body>

</html>