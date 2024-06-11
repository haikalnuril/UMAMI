<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <div class="text-center">
            <svg class="w-20 h-20 mx-auto text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728m12.728 0L5.636 5.636"></path>
            </svg>
            <h1 class="text-3xl font-semibold mt-4">Access Denied</h1>
            <p class="text-gray-600 mt-2">You do not have permission to view this page.</p>
            <div class="mt-6">
                <a href="<?= urlpath('back') ?>" class="text-blue-600 hover:underline">Go back to Homepage</a>
            </div>
        </div>
    </div>
</body>
</html>
