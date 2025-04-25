<?php
@include 'config.php';

$select = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project X</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

    <!-- Include Alpine.js (put this in your <head> or before </body>) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
          * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: Poppins;
              }
              @font-face {
                font-family: Poppins;
                src: url(./fonts/Poppins-Medium.ttf);
              }
              .main {
                width: 100%;
                height: auto;
                display: grid;
                place-items: center;
                background-color: rgb(245, 245, 245);
                padding: 50px 0;
              }
              .main .head {
                font-size: 29px;
                position: relative;
                margin-bottom: 100px;
                font-weight: 500;
              }
              .main .head::after {
                content: " ";
                position: absolute;
                width: 50%;
                height: 3px;
                left: 50%;
                bottom: -5px;
                transform: translateX(-50%);
                background-image: linear-gradient(to right, rgba(14,216,91,0.767), rgba(12,238,100,0.747));
              }

              /* Container Css Start  */

              .container {
                width: 70%;
                height: auto;
                margin: auto 0;
                position: relative;
              }
              .container ul {
                list-style: none;
              }
              .container ul::after {
                content: " ";
                position: absolute;
                width: 2px;
                height: 100%;
                left: 50%;
                top: 0;
                transform: translateX(-50%);
                background-image: linear-gradient(to bottom, rgba(14,216,91,0.767), rgba(12,238,100,0.747));
              }
              .container ul li {
                width: 50%;
                height: auto;
                padding: 15px 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.218);
                position: relative;
                margin-bottom: 30px;
                z-index: 99;
              }
              .container ul li:nth-child(4) {
                margin-bottom: 0;
              }
              .container ul li .circle {
                position: absolute;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: #00b400;
                top: 0;
                display: grid;
                place-items: center;
              }
              .circle::after{
                content: ' ';
                width: 12px;
                height: 12px;
                background-color: #00ff7f;
                border-radius: 50%;
              }
              ul li:nth-child(odd) .circle {
                transform: translate(50%, -50%);
                right: -30px;
              }
              ul li:nth-child(even) .circle {
                transform: translate(-50%, -50%);
                left: -30px;
              }
              ul li .date {
                position: absolute;
                width: 130px;
                height: 33px;
                background-image: linear-gradient(to right,#00b400,#00ff7f);
                border-radius: 15px;
                top: -45px;
                display: grid;
                place-items: center;
                color: #fff;
                font-size: 13px;
                box-shadow: 1px 2px 12px rgba(0, 0, 0, 0.318);
              }
              .container ul li:nth-child(odd) {
                float: left;
                clear: right;
                text-align: right;
                transform: translateX(-30px);
              }
              ul li:nth-child(odd) .date {
                right: 20px;
              }
              .container ul li:nth-child(even) {
                float: right;
                clear: left;
                transform: translateX(30px);
              }
              ul li .heading {
                font-size: 17px;
                color: rgba(14,216,91,0.767);
              }
              ul li p {
                font-size: 13px;
                color: #666;
                line-height: 18px;
                margin: 6px 0 4px 0;
              }
              ul li a {
                font-size: 13px;
                text-decoration: none;
                color: #00ff7f;
                transition: all 0.3s ease;
              }


              @media only screen and (min-width:798px) and (max-width: 1100px) {
                .container{
                  width: 80%;
                }
              }

              @media only screen and (max-width: 798px) {
                .container{
                  width: 70%;
                  transform: translateX(20px);
                }
                .container ul::after{
                  left: -40px;
                }
                .container ul li {
                  width: 100%;
                  float: none;
                  clear: none;
                  margin-bottom: 80px;
                }
                .container ul li .circle{
                  left: -40px;
                  transform: translate(-50%, -50%);
                }
                .container ul li .date{
                  left: 20px;
                }
                .container ul li:nth-child(odd) {
                  transform: translateX(0px);
                  text-align: left;
                }
                .container ul li:nth-child(even) {
                  transform: translateX(0px);
                }
              }

              @media only screen and (max-width: 550px) {
                .container{
                  width: 80%;
                }
                .container ul::after{
                  left: -20px;
                }
                .container ul li .circle{
                  left: -20px;
                }
              }


        /* Custom styles for dropdown transitions */
        #menuDropdown {
            transition: opacity 200ms ease-out, transform 200ms ease-out;
        }
        
        
        /* Mobile responsiveness for dropdown */
        @media (max-width: 640px) {
            #menuDropdown {
                width: 90vw;
                left: 50%;
                transform: translateX(-50%) scale(0.95);
            }
            .container ul li div {
                width: 250px;
            }
            .container ul li:nth-child(even) div {
                left: -295px;
            }
        }

        /* Add to your styles */

    </style>

    
</head>
<body class="bg-gray-100 ">

<header class="bg-[#069546] shadow-md sticky top-0 z-50">

<nav>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between items-center">
                <div class="flex items-center">
                  <a href="index.php">
                      <img class="size-8 filter invert brightness-0" src="images/logo-2-removebg-preview.png" alt="X Logo">
                  </a>
                    <div class="hidden md:flex ml-10 space-x-4">
    <a href="index.php" class="text-[20px] text-white  hover:bg-white hover:text-[#069546] px-3 py-2 rounded-md text-xl">Home</a>
    <a href="#market" class="text-white  hover:bg-white hover:text-[#069546] px-3 py-2 rounded-md text-xl">Market</a>
    <a href="#about" class="text-white  hover:bg-white hover:text-[#069546] px-3 py-2 rounded-md text-xl">About</a>
    <a href="#contact" class="text-white hover:bg-white hover:text-[#069546] px-3 py-2 rounded-md text-xl">Contact</a>
    <a href="#meet" class="text-white  hover:bg-white hover:text-[#069546] px-3 py-2 rounded-md text-xl">Meet Team</a>
</div>



                </div>
                <div class="hidden md:flex items-center">

                    <div class="flex gap-4">
                        <button class="bg-[#fff000] px-4 py-2 text-green-500 rounded-lg hover:bg-white" onclick="window.location.href='registration.php'">Register</button>
                        <button class="bg-white px-4 py-2 text-green-600 rounded-lg hover:bg-[#fff000]" onclick="window.location.href='login.php' ">Login</button>
                    </div>

                    

                </div>
            </div>
        </div>
    </nav>

</header>
    
<!-- Home Section  -->
    <section id="home"
  class="relative bg-[url('images/5.jpg')] bg-cover bg-center bg-no-repeat h-[60vh]"
>
  <!-- Greenish Overlay Effect -->
  <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 via-green-700/60 to-green-900/80"></div>

  <div class="relative mx-auto max-w-screen-xl px-4 py-20 sm:px-6 lg:flex lg:items-center lg:px-8">

    <div class="max-w-xl text-center sm:text-left">
        <h1 class="text-3xl font-extrabold text-white sm:text-5xl">
            <span class="block">Join our</span>
            <span class="block text-green-500">Farming Community.</span>
        </h1>

        <p class="mt-4 max-w-lg text-white sm:text-xl/relaxed text-left">
            Share knowledge, ask questions, and learn from fellow farmers. Collaborate to overcome challenges,<br> 
            share success stories, and explore new opportunities in the agricultural industry.
        </p>
    </div>

  </div>

</section>

<!-- Market Section  -->
 <section id="market">
                      <div class="container mx-auto px-4 py-8">
                              <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Our Market</h1>
                
                              <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                                  <?php while($row = mysqli_fetch_assoc($select)) { ?>
                                      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                          <div class="h-48 overflow-hidden">
                                              <img 
                                                  src="uploaded_img/<?php echo $row['product_image']; ?>" 
                                                  alt="<?php echo $row['product_name']; ?>"
                                                  class="w-full h-full object-cover"
                                              >
                                          </div>
                                          <div class="p-4">
                                              <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $row['product_name']; ?></h3>
                                              <div class="text-2xl font-bold text-green-600">$<?php echo $row['product_price']; ?></div>
                                              <a href="payment.php">
                                              <button type="button" class="w-full mt-4 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">BUY</button>
                                              </a>
                                            </div>
                                      </div>
                                  <?php } ?>
                              </div>
                      </div>
</section>


    


<!-- About Section -->
<section class="py-12 px-4 sm:px-6 lg:px-8 text-center mt-12 mb-4" id="about" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto">
    <!-- Centered About Button -->
    <div class="flex justify-center">
      <button 
        @click="open = !open" 
        class="inline-flex items-center gap-x-1 text-lg font-semibold text-gray-900 bg-green-50 px-6 py-3 rounded-lg hover:bg-green-100 transition-colors"
      >
        <span>About Us</span>
        <svg :class="{ 'rotate-180': open }" class="size-5 ms-2 transition-transform" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 011.06 0L10 11.94l3.72-3.72a.75.75 0 011.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.22 9.28a.75.75 0 010-1.06Z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <!-- Dropdown Content -->
    <div class="mt-5 flex justify-center" x-show="open" x-transition>
      <div class="w-full max-w-md bg-white shadow rounded-lg border border-gray-200 overflow-hidden">
        <div class="p-0">
          <!-- Analytics -->
          <div class="group relative flex gap-x-6 p-4 hover:bg-gray-50">
            <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <svg class="size-6 text-gray-600 group-hover:text-[#00b400]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
              </svg>
            </div>
            <div>
              <a href="#" class="font-semibold text-gray-900">Analytics</a>
              <p class="mt-1 text-gray-600">Get a better understanding of your traffic</p>
            </div>
          </div>

          <!-- Engagement -->
          <div class="group relative flex gap-x-6 p-4 hover:bg-gray-50">
            <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <svg class="size-6 text-gray-600 group-hover:text-[#00b400]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
              </svg>
            </div>
            <div>
              <a href="#" class="font-semibold text-gray-900">Engagement</a>
              <p class="mt-1 text-gray-600">Speak directly to your customers</p>
            </div>
          </div>

          <!-- Security -->
          <div class="group relative flex gap-x-6 p-4 hover:bg-gray-50">
            <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <svg class="size-6 text-gray-600 group-hover:text-[#00b400]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
              </svg>
            </div>
            <div>
              <a href="#" class="font-semibold text-gray-900">Security</a>
              <p class="mt-1 text-gray-600">Your customers' data will be safe and secure</p>
            </div>
          </div>

          <!-- Integrations -->
          <div class="group relative flex gap-x-6 p-4 hover:bg-gray-50">
            <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <svg class="size-6 text-gray-600 group-hover:text-[#00b400]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
              </svg>
            </div>
            <div>
              <a href="#" class="font-semibold text-gray-900">Integrations</a>
              <p class="mt-1 text-gray-600">Your customers' data will be safe and secure</p>
            </div>
          </div>

          <!-- Automations -->
          <div class="group relative flex gap-x-6 p-4 hover:bg-gray-50">
            <div class="mt-1 flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
              <svg class="size-6 text-gray-600 group-hover:text-[#00b400]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
              </svg>
            </div>
            <div>
              <a href="#" class="font-semibold text-gray-900">Automations</a>
              <p class="mt-1 text-gray-600">Your customers' data will be safe and secure</p>
            </div>
          </div>


        </div>

        <div class="grid grid-cols-2 divide-x divide-gray-200 bg-gray-50">
          <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
            <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd" />
            </svg>
            Watch demo
          </a>
          <a href="#contact" class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
            <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd" />
            </svg>
            Contact sales
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


   
<!-- Timeline Section -->
 <section id="timeline">
<div class="main w-full flex flex-col items-center py-10 ">
    <h3 class="head">Agricultural Trend Over the Years</h3>
    <div class="container max-w-5xl w-full">
        <ul>
            <li>
                <h3 class="heading">Precision Farming</h3>
                <p>Utilizing GPS, IoT, and AI to optimize crop yields and reduce resource waste </p>
                <a href="#">Read More ></a>
                <span class="date">January 2021</span>
                <span class="circle"></span>
            </li>
            <li>
                <h3 class="heading">Sustainable Agriculture</h3>
                <p>Emphasizing eco-friendly practices such as organic farming and regenerative agriculture.</p>
                <a href="#">Read More ></a>
                <span class="date">February 2021</span>
                <span class="circle"></span>
            </li>
            <li>
                <h3 class="heading">Smart Greenhouses</h3>
                <p>Automating climate control, irrigation, and lighting for higher efficiency.</p>
                <a href="#">Read More ></a>
                <span class="date">March 2021</span>
                <span class="circle"></span>
            </li>
            <li>
                <h3 class="heading">AI & Big Data in Agriculture</h3>
                <p>Using data analytics for weather prediction, pest control, and yield forecasting.</p>
                <a href="#">Read More ></a>
                <span class="date">April 2021</span>
                <span class="circle"></span>
            </li>
        </ul>
    </div>
</div>
</section>

<!-- stats -->
<section class="stats-section">
    <div class="stat-card">
      <div class="icon-box orange"><i class="fas fa-book-open"></i></div>
      <div class="stat-content">
        <h3>Expert Instructors</h3>
        <div class="stat-number"><span class="counter">20</span>+</div>
        <p>Industry professionals with real-world experience</p>
      </div>
    </div>

    <div class="stat-card">
      <div class="icon-box cyan"><i class="fas fa-briefcase"></i></div>
      <div class="stat-content">
        <h3>Courses Offered</h3>
        <div class="stat-number"><span class="counter">15</span>+</div>
        <p>Specialized programs in various tech disciplines</p>
      </div>
    </div>

    <div class="stat-card">
      <div class="icon-box gray"><i class="fas fa-users"></i></div>
      <div class="stat-content">
        <h3>Students Trained</h3>
        <div class="stat-number"><span class="counter">1000</span>+</div>
        <p>Successful graduates now working in the industry</p>
      </div>
    </div>
  </section>


<!-- Meet our Team  -->
  <section id="meet">
      <h2 class="text-3xl font-bold text-center mb-10 mt-10">Meet Our Team</h2>
        
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 justify-center max-w-6xl mx-auto text-center">
              
              <!-- Mukisa Mark Cole -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/professor.jpg" alt="Mukisa Mark" class="w-40 h-40 rounded-full object-cover"
                      sizes="(max-width: 400px) 100vw, 400px">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">

                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Mukisa Mark</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                  <!-- Social Icons -->
              <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel:+256702262806" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:markcole683@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="https://github.com/ColeMan-Ferry" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Isaac the PRO -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                  <img src="./images/profile/Isaac in Office.jpg" alt="Mukisa Mark" class="w-40 h-40 rounded-full object-cover"
                  sizes="(max-width: 400px) 100vw, 400px">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Muhumuza Isaac</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                  <!-- Social Icons -->
              <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel +256701580705" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:isaacmuhumuza765@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Jemimah -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/Jemie2.jpg" alt="Sarah N." class="w-40 h-40 rounded-full object-cover">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Nalubwama Jemimah</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                   <!-- Social Icons -->
              <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel:+256748524487" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:jemimahkuteesa8@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="https://github.com/Jkuteesa" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Lucy  -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/LucyNakiyaga.jpg" alt="Sarah N." class="w-40 h-40 rounded-full object-cover">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Nakiyaga Lucy</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                  <!-- Social Icons -->
               <!-- Social Icons -->
               <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel:+256740605174" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:nakiyagalucy1@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="https://github.com/" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Racheal  -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/Racheal.jpg" alt="Sarah N." class="w-40 h-40 rounded-full object-cover">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Nabanooba Racheal</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                   <!-- Social Icons -->
              <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel:+256709541346" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:nabanobaracheal205@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="https://github.com/Nabanoba-Racheal" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Barbie  -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/Barbie.jpg" alt="Sarah N." class="w-40 h-40 rounded-full object-cover">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Kirabo Babrah</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                  <!-- Social Icons -->
              <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Shifah  -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/Sharifah.jpg" alt="Sarah N." class="w-40 h-40 rounded-full object-cover">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Nassuna Sharifah</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                  <!-- Social Icons -->
              <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="#" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Desire  -->
              <div>
                  <div class="relative w-40 h-40 mx-auto">
                      <img src="./images/profile/Kenzie 2.jpg" alt="Sarah N." class="w-40 h-40 rounded-full object-cover">
                  </div>

                  <a href="#" class="block">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">
                        <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                          <strong class="font-medium">Tukamushabe Desire</strong>
                          <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                          <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                        </div>
                  </a>

                  <!-- Social Icons -->
               <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel:+256766929987" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:desiretukamushaba24@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="https://github.com/DesireTukamushaba24" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>

              </div>

              <!-- Tendo  -->
              <div>
              <div class="relative w-40 h-40 mx-auto">
                  <img src="./images/profile/Karthy 2.jpg" alt="Sarah N." class="w-full h-full rounded-full object-cover">
              </div>
              <a href="#" class="block">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg" alt="Uganda Flag" class="mt-4 w-6 h-4 inline-block">

                  <div class="mt-4 sm:flex sm:items-center sm:justify-center sm:gap-4 translate-x-[10px]">
                      <strong class="font-medium">Nansereko Catherine</strong>
                      <span class="hidden sm:block sm:h-px sm:w-4 sm:bg-yellow-500"></span>
                      <p class="mt-0.5 opacity-50 sm:mt-0">Project X</p>
                  </div>
              </a>

               <!-- Social Icons -->
               <div class="mt-4 flex justify-center space-x-4 text-gray-600">
                  <a href="tel:+256706442225" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-phone'></i>
                  </a>
                  <a href="mailto:karthynsereko647@gmail.com" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bx-envelope'></i>
                  </a>
                  <a href="https://github.com/Nserek" class="text-2xl hover:text-[#00b400]">
                      <i class='bx bxl-github'></i>
                  </a>
              </div>
            </div>
  </section>

</div>



<!-- contact section  -->
 <section id="contact">
<div class="relative isolate  px-6 py-24 sm:py-32 lg:px-8">
  <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
    <div class="relative left-1/2 -z-10 aspect-1155/678 w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
  </div>

  <div class="mx-auto max-w-3xl bg-white shadow-lg rounded-2xl p-12 sm:p-16">
    <div class="text-center">
      <h2 class="text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Contact Us</h2>
      <p class="mt-2 text-lg text-gray-600">Stay Connected – Reach Out Anytime!</p>
    </div>

    <form action="connect.php" method="POST" class="mt-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2">

                    <div>
                        <label for="fname" class="block text-sm font-semibold text-gray-900">First name</label>
                        <input type="text" name="fname" id="fname" autocomplete="given-name" class="mt-2 block w-full rounded-md border border-gray-300 px-3.5 py-2 text-base text-gray-900 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    </div>
                    <div>
                        <label for="lname" class="block text-sm font-semibold text-gray-900">Last name</label>
                        <input type="text" name="lname" id="lname" autocomplete="family-name" class="mt-2 block w-full rounded-md border border-gray-300 px-3.5 py-2 text-base text-gray-900 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-semibold text-gray-900">Email</label>
                        <input type="email" name="email" id="email" autocomplete="email" class="mt-2 block w-full rounded-md border border-gray-300 px-3.5 py-2 text-base text-gray-900 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block text-sm font-semibold text-gray-900">Phone number</label>
                        <input type="text" name="phone" id="phone" class="mt-2 block w-full rounded-md border border-gray-300 px-3.5 py-2 text-base text-gray-900 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-semibold text-gray-900">Message</label>
                        <textarea name="message" id="message" rows="4" class="mt-2 block w-full rounded-md border border-gray-300 px-3.5 py-2 text-base text-gray-900 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-500 focus:outline-none"></textarea>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit" name="contact" class="block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Let's Talk
                    </button>
                </div>
    </form>
  </div>
</div>
</section>



<!-- footer section  -->
<footer class="bg-white">
    <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div>
          <div class="text-teal-600 font-extrabold text-3xl">
            <p>Project X</p>
              
          </div>
  
          <p class="mt-4 max-w-xs text-gray-500">
          Farming made smarter, profits made bigger—because your success is our harvest!
          </p>
  
          <ul class="mt-8 flex gap-6">
            <li>
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Facebook</span>
  
                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Instagram</span>
  
                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Twitter</span>
  
                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">GitHub</span>
  
                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
              >
                <span class="sr-only">Dribbble</span>
  
                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
          </ul>
        </div>
  
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
          <div>
            <p class="font-medium text-gray-900">Services</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Market Price Updates </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Weather Forecasting </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Expert Advice & Consultancy </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> E-Commerce Marketplace </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75">Agri-Trends & Insights</a>
              </li>
            </ul>
          </div>
  
          <div>
            <p class="font-medium text-gray-900">Company</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#about" class="text-gray-700 transition hover:opacity-75"> About </a>
              </li>
  
              <li>
                <a href="#meet" class="text-gray-700 transition hover:opacity-75"> Meet the Team </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
              </li>
            </ul>
          </div>
  
          <div>
            <p class="font-medium text-gray-900">Helpful Links</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="index.php" class="text-gray-700 transition hover:opacity-75"> Home </a>
              </li>
  
              <li>
                <a href="#market" class="text-gray-700 transition hover:opacity-75"> Market </a>
              </li>
  
              <li>
                <a href="#contact" class="text-gray-700 transition hover:opacity-75"> Contact </a>
              </li>
            </ul>
          </div>
  
          <div>
            <p class="font-medium text-gray-900">Legal</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Accessibility </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Returns Policy </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75"> Refund Policy </a>
              </li>
  
              <li>
                <a href="#" class="text-gray-700 transition hover:opacity-75">
                  Hiring-3 Statistics
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
  
      <p class="text-xs text-gray-500">&copy; 2025. Project X. All rights reserved.</p>
    </div>
  </footer>

  <!-- jQuery and CounterUp -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

  <script src="script.js"></script>
</body>
</html>
