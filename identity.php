<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Identity Tool - pcpuppet.tech</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'header.html'; ?>

    <div class="container">
        <h1>Identity Tool</h1>
        <form action="identity_process.php" method="POST">
            <label for="idnum">Enter ID Number:</label>
            <input type="text" id="idnum" name="idnum" required>
            <button type="submit">Search</button>
        </form>
    </div>

    <?php include 'footer.html'; ?>

</body>
</html>
