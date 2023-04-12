<?php include "database.php"; ?>
<?php
// create a select queary
$query = "SELECT * FROM shouts ORDER BY id DESC";
// we then create anther variable to hold the result of our query
$shouts = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOUT IT!</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div id="container">
        <header>
            <h1>SHOUT IT! Shoutbox</h1>
        </header>
        <div id="shouts">
            <ul>
                <!-- when we have multiple records coming back we need to create a loop and output each iteration -->
                <?php while ($row = mysqli_fetch_assoc($shouts)) : ?>
                    <li class="shout"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?> </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div id="input">
            <?php if(isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>
            <form method="post" action="process.php">
                <input type="text" name="user" placeholder="Enter your name">
                <input type="text" name="message" placeholder="Enter a message">
                <br>
                <input class="shout-btn" type="submit" name="submit" value="Shout It Out!">
            </form>
        </div>
    </div>

</body>

</html>