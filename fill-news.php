<?php
session_start();
include 'config.php'; // Include your database configuration file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $type = $title = $num = $description = $sphoto = $lphoto = "";

    // Validate and sanitize input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Assign form values to variables after sanitization
    $type = test_input($_POST["type"]);
    $title = test_input($_POST["title"]);
    $num = test_input($_POST["num"]);
    $description = test_input($_POST["description"]);
    $sphoto = test_input($_POST["sphoto"]);
    $lphoto = test_input($_POST["lphoto"]);

    // Check if data already exists for given Type and Num
    $existing_data = $conn->prepare("SELECT COUNT(*) AS count FROM News WHERE Type = ? AND Num = ?");
    $existing_data->bindParam(1, $type);
    $existing_data->bindParam(2, $num);
    $existing_data->execute();
    $row = $existing_data->fetch(PDO::FETCH_ASSOC);
    $count = $row['count'];

    if ($count > 0) {
        // Data exists, perform update
        $update_stmt = $conn->prepare("UPDATE News SET Title = ?, Description = ?, SPhoto = ?, LPhoto = ? WHERE Type = ? AND Num = ?");
        $update_stmt->bindParam(1, $title);
        $update_stmt->bindParam(2, $description);
        $update_stmt->bindParam(3, $sphoto);
        $update_stmt->bindParam(4, $lphoto);
        $update_stmt->bindParam(5, $type);
        $update_stmt->bindParam(6, $num);

        try {
            $update_stmt->execute();
            echo "News updated successfully!";
        } catch(PDOException $error) {
            echo "Error updating news: " . $error->getMessage();
        }
    } else {
        // Data does not exist, perform insert
        $insert_stmt = $conn->prepare("INSERT INTO News (Type, Title, Num, Description, SPhoto, LPhoto) VALUES (?, ?, ?, ?, ?, ?)");
        $insert_stmt->bindParam(1, $type);
        $insert_stmt->bindParam(2, $title);
        $insert_stmt->bindParam(3, $num);
        $insert_stmt->bindParam(4, $description);
        $insert_stmt->bindParam(5, $sphoto);
        $insert_stmt->bindParam(6, $lphoto);

        try {
            $insert_stmt->execute();
            echo "News inserted successfully!";
        } catch(PDOException $error) {
            echo "Error inserting news: " . $error->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert News</title>
</head>
<body>
    <h2>Insert News</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type"><br>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="num">Num:</label><br>
        <input type="number" id="num" name="num"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="sphoto">SPhoto:</label><br>
        <input type="text" id="sphoto" name="sphoto"><br>
        <label for="lphoto">LPhoto:</label><br>
        <input type="text" id="lphoto" name="lphoto"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
