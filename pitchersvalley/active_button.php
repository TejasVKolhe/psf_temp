<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown and Buttons</title>
    <style>
        /* Add your desired styles here */
        .selected-option {
            background-color: #66bb6a; /* Green color as an example */
            color: #fff; /* White text color as an example */
        }
    </style>
     <style>
    #startTimerBtn{
        position: relative;
        margin: 5% 5%;
        padding: 1.5rem;
    }
</style>
</head>
<body>

<h2>Select an Option:</h2>

<form id="optionsForm">
    <label for="optionNumber">Select Option Number:</label>
    <select id="optionNumber" name="optionNumber">
        <?php
        // Generate options from 1 to 15
        for ($i = 1; $i <= 15; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>

    <input type="button" value="Submit" onclick="submitForm()">
</form>

 <button id="startTimerBtn">Start Timer</button>

    <script>
        document.getElementById('startTimerBtn').addEventListener('click', function() {
            // Send an AJAX request to update the database with the current time + 3 minutes
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'timer.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Timer updated successfully.');
                }
            };

            // Calculate the end time (current time + 3 minutes) in seconds
            const endTime = Math.floor(Date.now() / 1000) + 180;

            // Send the endTime as a parameter to the server
            xhr.send('endTime=' + endTime);
        });
    </script>

<script>
var selectedOption;

function submitForm() {
    selectedOption = document.getElementById("optionNumber").value;
    console.log("Selected Option:", selectedOption);

    if (selectedOption === undefined || selectedOption === "") {
        alert("Please select an option before submitting.");
        return;
    }

    // Perform AJAX request to send the values to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "change_active_button.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the server response if needed
            console.log(xhr.responseText);
        }
    };

    // Send selected option to the server
    xhr.send('optionNumber=' + encodeURIComponent(selectedOption));
}
</script>

</body>
</html>