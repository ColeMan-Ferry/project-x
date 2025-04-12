<?php 
session_start(); // Start session

// Server variables
$server = 'localhost';
$user  = 'root';
$password = '';
$database = 'project-x';

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Connection failed! " . mysqli_connect_error());
}

// Saving data (Registration)
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $checkName = $conn->query("SELECT name FROM user WHERE name = '$name' ");
    if ($checkName->num_rows > 0){
        $_SESSION['register_error'] = 'Name ia already registered!';
    }else{

    $query = "INSERT INTO user(name,password,role) VALUES ('$name','$password','$role')";
}

    if (mysqli_query($conn, $query)) {
        $success_message = "Registration successful! You can now log in.";
        echo "$success_message";
       header("Location: ./login/login.php");
       exit();
    } else {
        echo "Failed to register " . mysqli_error($conn);
    }
    
}

// Contact form submission
if (isset($_POST['contact'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact_us(fname, lname, email, phone, message) VALUES ('$fname', '$lname', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $query)) { 
    header('Location: success.php');
    exit();
}
}

// Login
if ($user) { 
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 1) {
        header("Location: admin.php");
    } else {
        header("Location: user.php");
    }
    exit();
} else {
    header("Location: login.php");
    exit();
}



?>
