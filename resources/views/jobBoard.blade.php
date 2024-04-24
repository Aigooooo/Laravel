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

<button><a href="addJobPage">Add Job</a></button>
<table id="data-table">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Job Description</th>
            <th>Position_Available</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <!-- Table row will be dynamically populated here -->
    </tbody>
</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="scripts/displayJobs.js"></script>
</body>
</html>