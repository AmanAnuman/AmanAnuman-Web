<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "my-web-contact"; // Your database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM messages ORDER BY sent_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
    <link rel="stylesheet" href="contact.css">
    <style>
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }

        .end p {
            margin: 20px;
            color: red;
            font-family: arial;
        }

        h1 {
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Submitted Messages</h1>
    <table>
        <tr>
            <th>NAME</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>SUBJECT</th>
            <th>MESSAGE</th>
            <th>SENT_AT</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['NAME']}</td>
                    <td>{$row['PHONE']}</td>
                    <td>{$row['EMAIL']}</td>
                    <td>{$row['SUBJECT']}</td>
                    <td>{$row['MESSAGE']}</td>
                    <td>{$row['SENT_AT']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No messages found.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <div class="end">
        <p>This is the end of messages Thank you()</p>
        <p>@Created by AmanAnuman// || Enock Kawogo</p>
    </div>
</body>
</html>
