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

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO News (Type, Title, Num, Description, SPhoto, LPhoto) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $type);
    $stmt->bindParam(2, $title);
    $stmt->bindParam(3, $num);
    $stmt->bindParam(4, $description);
    $stmt->bindParam(5, $sphoto);
    $stmt->bindParam(6, $lphoto);

    // Execute the statement
    try {
        $stmt->execute();
        echo "News inserted successfully!";
    } catch(PDOException $error) {
        echo "Error: " . $error->getMessage();
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
