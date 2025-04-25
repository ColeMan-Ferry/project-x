
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

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
                .btn-login {
                    width: 100%;
                    background-color: #28a745;
                    border: none;
                    padding: 10px;
                }
                .btn-login:hover {
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
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if ($password == $user["password"]) { // INSECURE! Only for testing.
                    session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["email"] = $user["email"]; // Optional: Store email for greeting
                    header("Location: admin_page.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>

        <div class="form-container">
                <form action="login.php" method="post">
                            <h2 class="form-title">LOGIN</h2>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-success btn-login">Login</button>
                </form>
                        <div class="mt-3 text-center">
                            <p>Not registered yet? <a href="registration.php" class="text-success">Register here</a></p>
                        </div>

        </div>
            
        </div>
</body>
</html>