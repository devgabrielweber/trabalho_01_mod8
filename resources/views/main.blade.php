<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            height: 100%;
            box-sizing: border-box;
        }

        body {
            position: relative;
            margin: 0;
            min-height: 100%;
            padding-bottom: 6rem;
            box-sizing: inherit;
        }

        footer {
            position: fixed;
            right: 0;
            left: 0;
            bottom: 0;

        }
    </style>
    <title>@yield('titulo') - WH Hotel</title>
</head>

<body>

<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8 border-b-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-16 w-auto" src="/images/logo.png" alt="AA">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        </div>
        <a href="/login">Login</a>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
</header>


    <h3 class="pt-4 text-4xl font-medium text-center mb-4">WH Hotel</h3>

    <div class="font-medium flex flex-col w-3/4 mr-auto ml-auto h-full">
        <div>
            <h3 class="text-black-700">Mais que um hotel, sua segunda casa.</h3>
            <img class="w-full" src="https://www.grangehotels.com/media/4250/1-grange-white-hall-hotel-1920x900.jpg" /> 
        </div>
    </div>

    </body>



<footer
    class="bottom-0 mr-auto ml-auto w-full p-4 bg-white border-t border-gray-200 shadow flex items-center justify-center md:p-6 dark:border-gray-200">
    <span class="text-sm sm:text-center">© 2023 WH Hotel. Todos os direitos reservados.
    </span>
</footer>



</html>

