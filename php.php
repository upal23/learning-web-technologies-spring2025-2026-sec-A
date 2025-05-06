<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Validations (PHP)</title>
</head>
<body>

<h1>Lab 7.1 - Form Validation Using PHP</h1>

<!-- 1. Name Validation -->
<h2>1. Name Validation</h2>
<form method="post">
    Name: <input type="text" name="name1">
    <input type="submit" name="submit1" value="Submit">
</form>
<?php
if (isset($_POST['submit1'])) {
    $name = trim($_POST['name1']);
    if (empty($name)) {
        echo "Name cannot be empty.<br>";
    } elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\-]*\s+[a-zA-Z.\-]+/", $name)) {
        echo "Name must start with a letter and contain at least two words.<br>";
    } else {
        echo "Valid Name.<br>";
    }
}
?>

<hr>

<!-- 2. Email Validation -->
<h2>2. Email Validation</h2>
<form method="post">
    Email: <input type="text" name="email">
    <input type="submit" name="submit2" value="Submit">
</form>
<?php
if (isset($_POST['submit2'])) {
    $email = trim($_POST['email']);
    if (empty($email)) {
        echo "Email cannot be empty.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email format.<br>";
    } else {
        echo "Valid Email.<br>";
    }
}
?>

<hr>

<!-- 3. Checkbox Selection -->
<h2>3. Checkbox Selection</h2>
<form method="post">
    <input type="checkbox" name="options[]" value="Option1"> Option 1<br>
    <input type="checkbox" name="options[]" value="Option2"> Option 2<br>
    <input type="checkbox" name="options[]" value="Option3"> Option 3<br>
    <input type="submit" name="submit3" value="Submit">
</form>
<?php
if (isset($_POST['submit3'])) {
    if (empty($_POST['options'])) {
        echo "Please select at least one option.<br>";
    } else {
        echo "Selection received.<br>";
    }
}
?>

<hr>

<!-- 4. Date Validation -->
<h2>4. Date Validation</h2>
<form method="post">
    Day: <input type="text" name="day"><br>
    Month: <input type="text" name="month"><br>
    Year: <input type="text" name="year"><br>
    <input type="submit" name="submit4" value="Submit">
</form>
<?php
if (isset($_POST['submit4'])) {
    $day = intval($_POST['day']);
    $month = intval($_POST['month']);
    $year = intval($_POST['year']);
    if (empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) {
        echo "Date fields cannot be empty.<br>";
    } elseif ($day < 0 || $day > 31 || $month < 1 || $month > 12 || $year < 1900 || $year > 2016) {
        echo "Invalid date.<br>";
    } else {
        echo "Valid date.<br>";
    }
}
?>

<hr>

<!-- 5. Radio Button Validation -->
<h2>5. Radio Button Selection</h2>
<form method="post">
    <input type="radio" name="gender" value="Male"> Male<br>
    <input type="radio" name="gender" value="Female"> Female<br>
    <input type="submit" name="submit5" value="Submit">
</form>
<?php
if (isset($_POST['submit5'])) {
    if (empty($_POST['gender'])) {
        echo "Please select a gender.<br>";
    } else {
        echo "Selected: " . $_POST['gender'] . "<br>";
    }
}
?>

<hr>

<!-- 6. Dropdown Validation -->
<h2>6. Dropdown Selection</h2>
<form method="post">
    <select name="country">
        <option value="">Select</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="India">India</option>
        <option value="Nepal">Nepal</option>
    </select>
    <input type="submit" name="submit6" value="Submit">
</form>
<?php
if (isset($_POST['submit6'])) {
    if (empty($_POST['country'])) {
        echo "Please select a country.<br>";
    } else {
        echo "Selected: " . $_POST['country'] . "<br>";
    }
}
?>

<hr>

<!-- 7. File Upload with User ID -->
<h2>7. File Upload and User ID</h2>
<form method="post" enctype="multipart/form-data">
    User ID: <input type="text" name="userid"><br>
    Upload Picture: <input type="file" name="picture"><br>
    <input type="submit" name="submit7" value="Submit">
</form>
<?php
if (isset($_POST['submit7'])) {
    $userid = intval($_POST['userid']);
    $picture = $_FILES['picture'];
    
    if (empty($_POST['userid']) || $userid <= 0) {
        echo "User ID must be a positive number.<br>";
    } elseif (empty($picture['name'])) {
        echo "Please upload a picture.<br>";
    } else {
        echo "User ID and Picture received.<br>";
    }
}
?>

</body>
</html>