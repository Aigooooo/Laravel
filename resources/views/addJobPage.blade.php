<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<form id="add-job-form">
        <label for="job_title">Job Title:</label>
        <input type="text" id="job-title" name="job_title" required><br>

        <label for="job_description">Job Description:</label>
        <input type="text" id="job-description" name="job_description" required><br>

        <label for="positions_available">Positions Available:</label>
        <input type="number" id="positions-available" name="positions_available" required><br>

        <button type="submit">Add Job</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="scripts/addJobs.js"></script>
</body>
</html>