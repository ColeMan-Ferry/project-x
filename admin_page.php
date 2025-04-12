<?php
session_start(); // Start the session

// Redirect to login if user is not authenticated
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Stop script execution
}

@include 'config.php';

if(isset($_POST['add_product'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

    if(empty($product_name) || empty($product_price) || empty($product_image)){
        $message[] = 'Please fill out all fields';
    }else{
        $insert = "INSERT INTO products(product_name,product_price,product_image) VALUES('$product_name', '$product_price', '$product_image')";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully';
        }else{
            $message[] = 'Could not add the product';
        }
    }
};

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:admin_page.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Product Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#1E40AF',
                        dark: '#1F2937',
                        light: '#F9FAFB',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Sidebar Navigation -->
        <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
            <div class="flex items-center justify-center h-16 bg-green-600">
                <h1 class="text-white font-bold text-xl">Admin Panel</h1>
            </div>
            <nav class="mt-6">
                <a href="#" class="flex items-center px-6 py-3 text-white bg-green-700">
                    <i class="fas fa-box mr-3"></i>
                    <span>Products</span>
                </a>
                <a href="index.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-home mr-3"></i>
                    <span>Home</span>
                </a>
                <a href="messages-admin.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
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

        <!-- Main Content -->
        <div class="ml-64">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">Product Management</h2>
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

            <!-- Page Content -->
            <main class="p-6">
                <?php if(isset($message)): ?>
                    <div class="mb-6 space-y-2">
                        <?php foreach($message as $msg): ?>
                            <div class="px-4 py-3 rounded bg-green-100 text-green-800 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                <?php echo $msg; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Add Product Card -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Add New Product</h3>
                        <button class="text-green-600 hover:text-green-800">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                    
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="space-y-4">
                        <div>
                            <label for="product_name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <input 
                                type="text" 
                                id="product_name" 
                                name="product_name" 
                                placeholder="Enter product name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                            >
                        </div>
                        
                        <div>
                            <label for="product_price" class="block text-sm font-medium text-gray-700 mb-1">Product Price</label>
                            <input 
                                type="number" 
                                id="product_price" 
                                name="product_price" 
                                placeholder="Enter product price"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                            >
                        </div>
                        
                        <div>
                            <label for="product_image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                            <div class="flex items-center space-x-4">
                                <label class="flex flex-col items-center justify-center w-full p-4 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                        <p class="text-sm text-gray-500">Click to upload image</p>
                                    </div>
                                    <input 
                                        id="product_image" 
                                        name="product_image" 
                                        type="file" 
                                        accept="image/png, image/jpeg, image/jpg"
                                        class="hidden"
                                    >
                                </label>
                            </div>
                        </div>
                        
                        <button 
                            type="submit" 
                            name="add_product" 
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out"
                        >
                            <i class="fas fa-plus mr-2"></i> Add Product
                        </button>
                    </form>
                </div>

                <!-- Products Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Product List</h3>
                    </div>
                    
                    <?php $select = mysqli_query($conn, "SELECT * FROM products"); ?>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php while($row = mysqli_fetch_assoc($select)): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-md object-cover" src="uploaded_img/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $row['product_name']; ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-semibold">$<?php echo $row['product_price']; ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="admin_update.php?edit=<?php echo $row['ID']; ?>" class="text-green-600 hover:text-blue-900 mr-4">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <a href="admin_page.php?delete=<?php echo $row['ID']; ?>" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash mr-1"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination would go here -->
                    <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">20</span> results
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <a href="#" aria-current="page" class="z-10 bg-green-50 border-blue-500 text-green-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        1
                                    </a>
                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        2
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </main>
        </div>
    </div>
</body>
</html>