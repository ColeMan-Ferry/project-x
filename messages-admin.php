<?php

session_start(); // Start the session

// Redirect to login if user is not authenticated
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Stop script execution
}


// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "project-x";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT * FROM contact_us ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">

 <!-- Sidebar Navigation -->
 <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
            <div class="flex items-center justify-center h-16 bg-green-600">
                <h1 class="text-white font-bold text-xl">Admin Panel</h1>
            </div>
            <nav class="mt-6">
            <a href="admin_page.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-box mr-3"></i>
                    <span>Products</span>
                </a>
                <a href="index.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-home mr-3"></i>
                    <span>Home</span>
                </a>
                <a href="messages-admin.php" class="flex items-center px-6 py-3 text-white bg-green-700">
                    <i class="fas fa-comment mr-3"></i>
                    <span>Messages</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Settings</span>
                </a>
                <a href="logout.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </div>

        <!-- !-- Main Content --> 
        <div class="ml-64">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm mb-8">
                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">Received Messages</h2>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        <div class="flex items-center">
                            <img src="./images/professor.jpg" alt="User" class="w-8 h-8 rounded-full">
                            <span class="ml-2 text-sm font-medium">Admin User</span>
                        </div>
                    </div>
                </div>
            </header>


    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
        <?php if ($result->num_rows > 0): ?>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">First Name</th>
                        <th class="border border-gray-300 px-4 py-2">Last Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Phone</th>
                        <th class="border border-gray-300 px-4 py-2">Message</th>
                        <th class="border border-gray-300 px-4 py-2">Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?php echo $row['ID']; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['fname']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['lname']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['message']); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <?php 
                                if (isset($row['created_at'])) {
                                    echo date('M j, Y g:i A', strtotime($row['created_at']));
                                } else {
                                    echo 'N/A';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600 text-center">No messages found.</p>
        <?php endif; ?>

    </div>
</body>
</html>
