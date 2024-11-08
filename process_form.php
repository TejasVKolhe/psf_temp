<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters

    $servername = "localhost";
    $username = "u331863597_biec";
    $password = "psf@BIEC69";
    $dbname = "u331863597_event"; // Replace with your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // $conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
    // mysqli_select_db($conn, 'u331863597_Trial');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $teamName = $_POST["teamName"];
    $spendAmount = $_POST["spendAmount"];
    $profitAmount = $_POST["profitAmount"];
    $thingsBoughtSold = $_POST["thingsBoughtSold"];
    $originalFileName = $_FILES["imageUpload"]["name"];

    // Upload the image to the "uploads" directory with a unique filename
    $uploadDirectory = "uploads/";
    $imageFileName = $teamName . "_" . generateUniqueFileName($uploadDirectory, $originalFileName);
    $targetFilePath = $uploadDirectory . $imageFileName;

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFilePath)) {
        // Insert data into the database
        $sql = "INSERT INTO team_data (teamName, spendAmount, profitAmount, thingsBoughtSold, imageFileName)
                VALUES ('$teamName', '$spendAmount', '$profitAmount', '$thingsBoughtSold', '$imageFileName')";

        if ($conn->query($sql) === TRUE) {
            echo "Form data has been successfully submitted.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the image.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted.";
}

// Function to generate a unique filename
function generateUniqueFileName($uploadDirectory, $fileName) {
    $count = 1;
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $baseName = pathinfo($fileName, PATHINFO_FILENAME);

    while (file_exists($uploadDirectory . $fileName)) {
        $fileName = $baseName . "_" . $count . "." . $extension;
        $count++;
    }

    return $fileName;
}
?>
