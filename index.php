<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" .
        mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $title = $_POST['article-title'];
    $category = $_POST['article-category'];
    $tags = $_POST['article-tags'];
    $description = $_POST['desc'];
    $sql = "INSERT INTO `article-submission-form`.`responses` (`name`, `email`, `mobile`, `title`, `category`, `tags`,
    `description`, `dt`) VALUES ('$name', '$email', '$mobile', '$title',
     '$category', '$tags', '$description', current_timestamp());";
    
    if($con->query($sql) == true){
        $insert = true;
        header("Location: index.php");
        exit;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Submission Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">
        <h1>Welcome to Article Submission Form</h1>
        <p>Fill this form to submit your article for publication</p>
        <?php
        if($insert == true){
            echo "<p class='success'>Successfully Submitted</p>";
        }
        ?>
    </div>
    <div class="form-box">
        <form action="index.php" onsubmit = "validateForm()" method="post" required>
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="email" name="email" id="email" placeholder="Enter your E-mail address">
            <input type="phone" name="mobile" id="mobile" placeholder="Enter your Mobile Number">
            <input type="text" name="article-title" id="article-title" placeholder="Enter Article Title">
            <input type="text" name="article-category" id="article-category" placeholder="Enter Article Category">
            <input type="text" name="article-tags" id="article-tags" placeholder="Enter Article Tags">
            <textarea name="desc" id="article-desc" cols="7" rows="5" placeholder="Little About the article"></textarea>
            <div class="buttons">
                <button class="btn">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>