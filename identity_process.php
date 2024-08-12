<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function sanitize_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idnum = sanitize_input($_POST['idnum']);
  $found = false;

  if (($handle = fopen("identities.csv", "r")) !== FALSE) {
    fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if ($data[0] == $idnum) {
        $found = true;
        $firstName = $data[1];
        $lastName = $data[2];
        $address = $data[3];
        $picture = $data[4];
        break;
      }
    }
    fclose($handle);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Identity Result - pcpuppet.tech</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php include 'header.html'; ?>

    <div class="container">
        <?php if (isset($found) && $found): ?>
            <h2>User Details</h2>
            <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
            <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <?php if (!empty($picture)): ?>
                <img src="<?php echo $picture; ?>" alt="User Picture">
            <?php else: ?>
                <p>No picture available.</p>
            <?php endif; ?>
        <?php else: ?>
            <h2>User Not Found</h2>
            <p>No user found with ID number: <?php echo $idnum; ?></p>
        <?php endif; ?>
        <a href="identity.php"><button>Search Again</button></a>
    </div>

    <?php include 'footer.html'; ?>

</body>
</html>
