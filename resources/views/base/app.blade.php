<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <title>@yield('titulo') - WH Hotel</title>
</head>

<body>
    @include('base.menu')

    <div class="md:container md:mx-auto">
        @include('base.flash-message')
        @yield('content')
    </div>
</body>



<footer class="fixed bottom-0 mr-auto ml-auto w-full p-4 bg-white border-t border-gray-200 shadow flex items-center justify-center md:p-6 dark:border-gray-200">
    <span class="text-sm sm:text-center">© 2023 WH Hotel. Todos os direitos reservados.
    </span>
</footer>



</html>
