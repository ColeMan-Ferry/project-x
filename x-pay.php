<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-X® - Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            500: '#2ecc71',
                            600: '#27ae60',
                        },
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-md mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-primary-500 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">Project-X®</h1>
        </div>

        <!-- Order Summary -->
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">ORDER SUMMARY</h2>
            <div class="mt-2">
                <p class="text-sm text-gray-600">TOTAL TO PAY</p>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="px-6 py-4">
            <h3 class="text-md font-semibold text-gray-800 mb-4">NEW PAYMENT METHOD</h3>

            <!-- Mobile Money Option -->
            <div class="mb-6">
                <div class="flex items-center mb-3">
                    <input type="radio" id="mobileMoney" name="paymentMethod" class="mr-2" checked>
                    <label for="mobileMoney" class="font-medium">Mobile Money</label>
                </div>
                
                <div class="ml-6">
                    <p class="text-sm text-gray-600 mb-2">Select your operator</p>
                    <select class="w-full p-2 border rounded-md mb-3 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="" disabled selected>Operator Required</option>
                        <option value="mtn">MTN</option>
                        <option value="airtel">Airtel</option>
                        <option value="africell">Africell</option>
                    </select>
                    
                    <div class="flex items-center mb-2">
                        <span class="bg-gray-100 p-2 border rounded-l-md">+256</span>
                        <input type="tel" placeholder="Insert mobile number without 0" 
                               class="w-full p-2 border rounded-r-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                    <p class="text-xs text-red-500">Phone Number required</p>
                </div>
            </div>

            <!-- Bank Cards Option -->
            <div class="mb-6">
                <div class="flex items-center mb-3">
                    <input type="radio" id="bankCards" name="paymentMethod" class="mr-2">
                    <label for="bankCards" class="font-medium">Bank Cards</label>
                    <span class="ml-2 text-gray-500">VISA</span>
                </div>
                <!-- Card details would appear here when selected -->
            </div>

            <div class="border-t pt-4 mt-4">
                <div class="bg-gradient-to-r from-primary-50 to-green-100 p-4 rounded-md">
                    <h3 class="text-lg font-bold text-center text-primary-600">PAY NOW: UGX 3,904,700</h3>
                </div>
                
                <div class="mt-4 flex items-start">
                    <input type="checkbox" id="terms" class="mt-1 mr-2">
                    <label for="terms" class="text-sm text-gray-600">
                        By clicking "Pay Now", I accept Project-X's Terms & Conditions and Privacy and Cookie Notice
                    </label>
                </div>
                
                <button class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-3 px-4 rounded-md mt-4 transition duration-200">
                    PAY NOW
                </button>
                
                <p class="text-xs text-gray-500 mt-4">
                    Please note: Project-X will never ask you for your password, PIN, CVV or full card details over the phone or via email.
                </p>
                
                <a href="index.php#contact">
                <p class="text-sm text-primary-500 mt-2">
                    <i class="fas fa-question-circle mr-1"></i> Need help? <a href="index.php#contact" class="underline">Contact us</a>
                </p></a>

                            <!-- Add this where you want the links to appear -->
            <!-- Navigation container -->
                <div class="mx-4 my-6 p-4 border border-gray-200 rounded-xl shadow-sm bg-white">
                    <h2 class="text-center text-lg font-semibold text-gray-700 mb-4">Navigation</h2>

                    <div class="flex justify-center gap-6">
                        <a href="payment.php" class="inline-flex items-center gap-2 text-blue-600 hover:text-green-600 font-medium transition duration-200">
                            <i class="fas fa-wallet"></i>
                            BACK TO PAYMENT
                        </a>

                        <a href="index.php" class="inline-flex items-center gap-2 text-blue-600 hover:text-green-600 font-medium transition duration-200">
                            <i class="fas fa-home"></i>
                            BACK TO HOME
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

   
</body>
</html>