<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$mem1 = mysqli_real_escape_string($conn, $_POST['mem1']);
$mem2 = mysqli_real_escape_string($conn, $_POST['mem2']);
$mem3 = mysqli_real_escape_string($conn, $_POST['mem3']);
$mem4 = mysqli_real_escape_string($conn, $_POST['mem4']);

$sql = "INSERT INTO users (Team_Name, contact, password, email, member_1, member_2, member_3, member_4) 
        VALUES ('$username', '$contact', '$password', '$email', '$mem1', '$mem2', '$mem3', '$mem4')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">window.location.href = "./comingsoon/index";</script>';
    exit();
} else {
    $errorMsg = "Registration Failed: " . mysqli_error($conn);
    echo '<script type="text/javascript">alert("' . $errorMsg . '");</script>';
    echo '<script type="text/javascript">window.location.href = "munafa.html";</script>';
}

mysqli_close($conn);
?>
