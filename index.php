<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luganda Translator</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>
    <h1>Luganda Translator</h1>
    <form action="translator.php" method="post" enctype="multipart/form-data">
        <label for="text">Enter text or upload a document:</label><br>
        <textarea name="text" id="text"></textarea><br>
        <input type="file" name="file" accept=".txt"><br>
        <input type="submit" name="submit" value="Translate">
    </form>

    <div class="translation">
        <!-- Translation output will appear here -->
        <?php include 'translator.php'; ?> <!-- Include PHP script for translation -->
    </div>

    <script src="script.js"></script> <!-- Link to external JavaScript file -->
</body>
</html>

