<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
<div class="fixed inset-0 flex items-center justify-center p-4 bg-gray-100/50 backdrop-blur-sm">
  <div role="alert" class="w-full max-w-md rounded-lg border border-gray-200 bg-white p-6 shadow-xl">
    <div class="flex items-start gap-4">
      <!-- Icon/SVG now on the left side inline with text -->
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="size-6 mt-0.5 flex-shrink-0 text-green-600"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>

      <div class="flex-1">
        <div class="flex items-center gap-2"> <!-- Flex container for icon and heading -->
          <strong class="text-lg font-medium text-gray-900">Message captured successfully</strong>
        </div>
        
        <p class="mt-2 text-gray-600">Our team is working hard to resolve the issue.</p>

        <div class="mt-4 flex flex-wrap gap-3">
          <a href="index.php#contact" class="flex-1">
            <button
              type="button"
              class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50"
            >
              Back to Form
            </button>
          </a>
          
          <a href="index.php" class="flex-1">
            <button
              type="button"
              class="w-full rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-green-700"
            >
              Return Home
            </button>
          </a>
        </div>
      </div>

      <button
        class="-m-2 rounded-full p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-600"
        type="button"
        aria-label="Dismiss alert"
      >
        <span class="sr-only">Close</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-5"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</div>

</body>
</html>