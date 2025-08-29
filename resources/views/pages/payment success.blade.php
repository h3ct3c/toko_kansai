<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kansai Paint
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom scrollbar for product sliders or any horizontal scroll if needed */
    ::-webkit-scrollbar {
      height: 6px;
      width: 6px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: rgba(100, 116, 139, 0.5);
      border-radius: 3px; 
    }
  </style>
</head>

<div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
    <div
        class="w-full max-w-2xl p-12 mx-4 text-center transition-all transform bg-white shadow-lg rounded-xl hover:shadow-xl">
        <!-- Success Icon -->
        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-8 bg-sky-100 rounded-full">
            <svg class="w-12 h-12 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <!-- Main Content -->
        <h1 class="mb-6 text-4xl font-extrabold text-sky-400">
            Payment Successful!
        </h1>

        <p class="mb-8 text-xl text-gray-700">
            Thank you for your purchase.
        </p>

        <div class="p-6 mb-8 rounded-lg bg-blue-50">
            <a href="https://kansaipaint.id">
            <p class="text-lg font-medium text-blue-700">
                Your tool <span class="font-bold">"https://kansaipaint.id"</span> will be listed shortly.
            </p>
            </a>
        </div>

        <!-- Contact Information -->
        <div class="pt-8 mt-8 border-t border-gray-100">
            <p class="text-lg text-gray-700">
                Have questions? Contact us at:
            </p>
            <a href="mailto:admin@eliteai.tools"
                class="inline-block mt-2 text-xl font-medium text-blue-600 transition-colors duration-200 hover:text-blue-800">
                HO@Kansaicoatings.co.id
            </a>
        </div>

        <!-- Back to Home Button -->
        <div class="mt-12">
            <a href="/order history"
                class="inline-block px-8 py-4 text-lg font-semibold text-white transition-colors duration-200 bg-sky-400 rounded-lg hover:bg-sky-900">
                Check Order History
            </a>
        </div>
    </div>
</div>

