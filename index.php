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
    <?php include("navbar.php"); ?>
    <!--caroussel-->
    <div class="CarouselMargin">

        <div id="default-carousel" class="relative" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <span
                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
                        Slide</span>
                    <img src="assets/img/Soupe.png"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="assets/img/sushi.png"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="assets/img/choux-a-la-creme.png"
                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button"
                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>
    </div>

    <!--Edito+dernier recettes-->



    <div class="edito hidden sm:block">
        <!-- Contenu de la div "edito" pour les écrans non mobiles -->
        <div id="logoEditoPosition">
            <img class="h-56 w-auto" src="assets/img/Pticuisto.png" alt="PtiCuisto">
        </div>
        <h2 id="h2Edito">Edito</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula bibendum libero maximus mattis. Nullam.
        </p>
    </div>

    <div class="editoMobile block sm:hidden">
        <!-- Contenu de la div "editoMobile" pour les écrans mobiles -->
        <div id="logoEditoPosition">
            <img class="h-56 w-auto" src="assets/img/Pticuisto.png" alt="PtiCuisto">
        </div>
        <h2 id="h2Edito">Edito</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula bibendum libero maximus mattis. Nullam.
        </p>
    </div>

    <div class="derRecette hidden sm:block">
        <!-- Contenu de la div "edito" pour les écrans non mobiles -->
        <h2>Les dernières recettes !</h2>

        <div class="blocUn">Lorem Ipsum</div>
        <div class="blocDeux">Lorem Ipsum</div>
        <div class="blocTrois">Lorem Ipsum</div>
    </div> 

    <div class="derRecetteMobile block sm:hidden">
        <!-- Contenu de la div "editoMobile" pour les écrans mobiles -->
        <h2>Les dernières recettes !</h2>

        <div class="blocUn">Lorem Ipsum</div>
        <div class="blocDeux">Lorem Ipsum</div>
        <div class="blocTrois">Lorem Ipsum</div>
    </div>
    
    <!-- Footer -->
    <footer class="classicFooter hidden sm:block">
        <div class="flex justify-center">
            <div class="classic-social-icons">
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                    <a href="https://facebook.com">
                        <img src="assets/img/Facebook_f_logo_(2019).png" alt="Logo Facebook">
                        <span class="sr-only">Facebook page</span>
                    </a>
                    
                    <a href="https://twitter.com/Azgarrrr" >
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