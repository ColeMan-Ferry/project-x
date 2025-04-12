
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
                        body{
                    padding:50px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 90vh;
                    background-color: #f8f9fa;
                }

                .form-container {
                    max-width: 400px;
                    margin: 50px auto;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 
            0 10px 25px -5px rgba(0, 0, 0, 0.1),
            0 8px 10px -6px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
                    background-color: #ffffff;
                }
                .form-title {
                    color: #28a745; /* Bootstrap's success green */
                    margin-bottom: 20px;
                    font-weight: 600;
                    text-align: center;
                }
                .btn-register {
                    width: 100%;
                    background-color: #28a745;
                    border: none;
                    padding: 10px;
                }
                .btn-register:hover {
                    background-color: #218838; /* Darker green */
                }
                .alert {
                    margin-top: 15px;
                }

                .form-control:focus {
                    border-color: #28a745; /* Bootstrap success green */
                    box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25); /* Green glow */
                }
    </style>

</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
        //    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $password);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <div class="form-container">
                <form action="registration.php" method="post">
                        <h2 class="form-title">REGISTER</h2>
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email:">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password:">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-register">Register</button>
                </form>
                
                <div class="mt-3 text-center">
                        <div class="inline-flex flex-col items-center">
                                <p class="text-sm">Not registered yet? <a href="login.php" class="text-success hover:underline">Login</a></p>
                            <a href="index.php" class="flex items-center text-gray-600 hover:text-gray-900 mb-2">
                                    <i class="fas fa-home mr-2" style="color:#28a745;"></i>
                                    <span style="color:#28a745; text-decoration: none;" >Home</span>
                            </a>
                        </div>
                </div>
        </div>
    </div>
</body>
</html>