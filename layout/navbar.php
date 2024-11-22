<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .content {
            flex-grow: 1;
            padding: 2rem;
        }
        /* Navbar kanan */
        .navbar-right {
            display: flex;
            flex-direction: row-reverse;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navbar -->
    <nav class="navbar-right mt-2 shadow-sm mr-10 ml- rounded-lg  px-4 py-3 fixed top-0 left-0 right-0 z-50">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex items-center gap-3 lg:order-2">
                <a href="index.php?page=create" type="button" class="group inline-flex items-center px-4 py-2 text-sm font-medium text-blue-900 bg-transparent border border-blue-600 rounded hover:bg-blue-600 hover:text-white focus:z-10 focus:ring-2">
                    <svg class="w-4 h-4 mr-2 text-blue-900 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    tambah laporan
                </a>
                
                <!-- Notification icon -->
                <button type="button" data-dropdown-toggle="notification-dropdown" class="flex items-center justify-center relative w-9 h-9 rounded-xl text-gray-600 bg-blue-200 hover:bg-acent1 hover:text-white focus:bg-acent1 focus:text-white transition-all duration-200">
                    <span class="absolute flex h-5 w-6 -top-2 -right-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-600 opacity-75"></span>
                        <span class="relative flex items-center justify-center rounded-full h-6 w-6 bg-blue-600 text-[9px] text-white">02</span>
                    </span>
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z" />
                    </svg>
                </button>

                <!-- User Profile -->
                <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full object-cover" src="https://siap.idn.sch.id/style/app-assets/images/avatars/user-ikhwan.png" alt="user photo" />
                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow rounded-xl" id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-800"><?= $_SESSION['name'] ?></span>
                        <span class="block text-sm text-gray-800 truncate"><?= $_SESSION['username'] ?></span>
                    </div>
                    <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-200">My profile</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-200">Account settings</a>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                        <li>
                            <a href="index.php?page=logout" class="block py-2 px-4 text-sm hover:bg-blue-200 rounded">Log out</a>
                        </li>
                    </ul>
                </div>
                <!-- End of user profile -->
            </div>
        </div>
    </nav>
    <!-- End of the Navbar -->

   
</body>
</html>
