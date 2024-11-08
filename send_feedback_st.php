<?php
$conn = mysqli_connect('localhost', 'u331863597_psf', 'psf@BIEC69', 'u331863597_feedback');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) { // Check if the form is submitted

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO startup_feedback (name, email, feedback_type, feedback) VALUES (?, ?, ?, ?)");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script type="text/javascript">alert("Feedback submitted.");</script>';

            // Print values to the console
            echo '<script type="text/javascript">';
            echo 'console.log("Name:", "' . $name . '");';
            echo 'console.log("Subject:", "' . $subject . '");';
            echo 'console.log("Email:", "' . $email . '");';
            echo 'console.log("Message:", "' . $message . '");';
            echo '</script>';

            // Redirect to main.html
            header("Location: main.html");
            exit();
        } else {
                        echo 'console.log("Chutiya:", "' . $message . '");';

            $errorMsg = "Feedback not sent: " . mysqli_stmt_error($stmt);
            echo '<script type="text/javascript">alert("Feedback not sent. Please try again later. ' . $errorMsg . '");</script>';
            echo '<script type="text/javascript">console.log("' . $errorMsg . '");</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
                    echo 'console.log("Madarchod:", "' . $message . '");';

        $errorMsg = "Error in preparing the statement: " . mysqli_error($conn);
        echo '<script type="text/javascript">alert("' . $errorMsg . '");</script>';
        echo '<script type="text/javascript">console.log("' . $errorMsg . '");</script>';
    }

    // Redirect to startup_feedback.html in case of an error
    header("Location: startup_feedback.html");
    exit();
}

mysqli_close($conn);
?>
