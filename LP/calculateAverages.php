<?php

$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array to store average values
$averages = array();

// Loop through attributes rating1 to rating15
for ($i = 1; $i <= 15; $i++) {
    $columnName = 'rating' . $i;

    // Calculate average for each attribute excluding 0 values
    $sql = "SELECT AVG($columnName) AS average FROM LP_audience_database WHERE $columnName != 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $averageValue = $row['average'];

        // Only include non-zero averages
        if ($averageValue !== null) {
            $averages[$columnName] = $averageValue;
        }
    } else {
        echo "Error calculating average for $columnName\n";
    }
}

// Sort the averages array in descending order based on values
arsort($averages);

// Print the top 3 averages
$top3Averages = array_slice($averages, 0, 3);
foreach ($top3Averages as $columnName => $averageValue) {
    echo "Top 3 - Average for $columnName: $averageValue\n";
}

// Close the database connection
$conn->close();

?>
