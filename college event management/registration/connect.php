<?php
// connect.php — save registration form data into MySQL

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

// Collect inputs safely
$full_name         = trim($_POST['full_name'] ?? '');
$gender            = $_POST['gender'] ?? '';
$year              = intval($_POST['year'] ?? 0);
$branch            = trim($_POST['branch'] ?? '');
$college_name      = trim($_POST['college_name'] ?? '');
$reg_number        = trim($_POST['reg_number'] ?? '');
$participation_for = $_POST['participation_for'] ?? '';

// Validate
if ($full_name==='' || $gender==='' || $year<1 || $year>5 ||
    $branch==='' || $college_name==='' || $reg_number==='' ||
    $participation_for==='') {
    http_response_code(422);
    echo '❌ Invalid input. Please check all fields.';
    exit;
}

// DB connection
$servername = 'localhost';
$username   = 'kaladhar';       // or 'root' if using default XAMPP
$password   = 'Kaladhar@011';   // empty string "" if root has no password
$dbname     = 'college';

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset('utf8mb4');

    $sql = 'INSERT INTO event_details (full_name, gender, year, branch, college_name, reg_number, participation_for)
            VALUES (?, ?, ?, ?, ?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssissss', $full_name, $gender, $year, $branch, $college_name, $reg_number, $participation_for);
    $stmt->execute();

    // Redirect to a success page
    header('Location: success.html');
    exit;
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        echo '❌ That registration number already exists!';
    } else {
        error_log('DB error: '.$e->getMessage());
        echo '❌ Server error. Please try again later.';
    }
} finally {
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
}
?>
