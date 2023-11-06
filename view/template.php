<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pticuisto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navBackground">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 right-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->

                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                  Icon when menu is closed.
      
                  Menu open: "hidden", Menu closed: "block"
                -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                  Icon when menu is open.
      
                  Menu open: "block", Menu closed: "hidden"
                -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <div id="logoPosition">
                        <img class="h-16 w-auto" src="assets/img/Logo.png" alt="Your Company">
                    </div>
                </div>

            </div>
            <div class="relative inline-block text-right">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="index.php" id="hrefcolor"
                            class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Accueil</a>
                        <a href="#" id="hrefcolor"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Nos
                            recettes</a>
                        <a href="filtres.php" id="hrefcolor"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Filtres</a>
                        <a href="#" id="hrefcolor"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Connexion</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="index.php" id="hrefcolor"
                    class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Accueil</a>
                <a href="" id="hrefcolor"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Nos
                    recettes</a>
                <a href="filtres.php" id="hrefcolor"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Filtres</a>
                <a href="#" id="hrefcolor"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Connexion</a>
            </div>
        </div>
    </nav>



    <!-- Contenu -->
        <?= $content?>
    <!-- Fin Contenu -->



    <!-- Footer -->
    <footer class="classicFooter hidden sm:block">
        <div class="flex justify-center">
            <div class="classic-social-icons">
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                    <a href="https://facebook.com">
                        <img src="assets/img/Facebook_f_logo_(2019).png" alt="Logo Facebook">
                        <span class="sr-only">Facebook page</span>
                    </a>
                    
                    <a href="https://twitter.com/" >
                       <img src="assets/img/Logo_of_Twitter.png" alt="Logo Twitter">
                        <span class="sr-only">Twitter page</span>
                    </a>

                    <a href="https://instagram.com" >
                        <img src="assets/img/Instagram_icon.png" alt="Logo Instagram">
                         <span class="sr-only">Instagram page</span>
                     </a>
                </div>
            </div>
        </div>
    </footer>

    <footer class="footerMobile block sm:hidden">
        <div class="flex justify-center">
            <div class="mobile-social-icons">
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                    <a href="https://facebook.com">
                        <img src="assets/img/Facebook_f_logo_(2019).png" alt="Logo Facebook">
                        <span class="sr-only">Facebook page</span>
                    </a>
                    
                    <a href="https://twitter.com/" >
                       <img src="assets/img/Logo_of_Twitter.png" alt="Logo Twitter">
                        <span class="sr-only">Twitter page</span>
                    </a>

                    <a href="https://instagram.com" >
                        <img src="assets/img/Instagram_icon.png" alt="Logo Instagram">
                         <span class="sr-only">Instagram page</span>
                     </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</body>

</html>