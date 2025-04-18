<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Dental</title>
    <link rel="icon" href="{{ asset('images/icons/logo-small.png') }}">
    @vite('resources/css/app.css')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="box-border bg-white">
    <header class="fixed w-[100%] h-20 bg-[rgb(139,179,229)] z-50">
        <div class="flex w-[88%] md:w-[80%] h-[100%] justify-between items-center  m-auto">
            <div class="">

                <img class="h-12 md:hidden drop-shadow-[0_0_4px_rgba(255,255,255,1)]" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                <img class="h-12 hidden md:block drop-shadow-[0_0_4px_rgba(255,255,255,1)]" src="{{ asset('images/logo/logo-large.png') }}" alt="">
            </div>
            <nav class="nav-links absolute md:relative w-[100%] md:w-auto h-[100vh]  md:h-auto md:top-auto top-[-100vh] left-0 md:left-auto  md:bg-transparent bg-black bg-opacity-80 md:bg-opacity-0">
                <ul class="md:flex">
                    <li><a class="flex h-20 p-3 lg:p-5 items-center text-white" href="">Inicio</a></li>
                    <li><a class="flex h-20 p-3 lg:p-5 items-center text-white" href="">Servicios</a></li>
                    <li><a class="flex h-20 p-3 lg:p-5 items-center text-white" href="">Testimonios</a></li>
                    <li><a class="flex h-20 p-3 lg:p-5 items-center text-white" href="">Contactame</a></li>
                    <li><a class="flex h-20 p-3 lg:p-5 items-center text-white" href="{{ action([App\Http\Controllers\authController::class,"showLoginForm"]) }}">Login</a></li>
                </ul>
            </nav>
            <div class="md:hidden">
                <ion-icon onclick="onToggleMenu(this)" class="cursor-pointer text-3xl" name="menu"></ion-icon>
            </div>
        </div>
    </header>
    <script>
        const navLinks=document.querySelector(".nav-links");
        function onToggleMenu(e){
            if(e.name==="menu"){
                e.name="close";
            }else{
                e.name="menu";
            }
            navLinks.classList.toggle("top-[5rem]");

        }
    </script>
    <main class="h-screen overflow-y-scroll scroll-smooth snap-y snap-mandatory bg-gradient-to-b from-white to-[#aeccff]">
        <div class="w-full h-screen snap-start flex justify-center items-center">
            <div class="flex justify-between w-full h-[50vh] px-[10vw] pt-[10vh] pb-0 bg-white">
                <div class=" w-1/2 ">
                    <h1 class="mb-3 font-bold text-2xl text-[#84afdf]">OdontoCenter Hap.</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio hic fuga quod possimus? Officiis eligendi exercitationem voluptas in vel suscipit esse modi laboriosam perferendis? Ea fuga ex voluptate dolorum quam!</p>
                </div>
                <div class="">
                    <img src="{{ asset('images/logo/logo-small.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="w-full h-screen snap-start flex justify-center items-center">
            <div class="w-full px-[10vw] py-[2.5vh] bg-white">
                <h1 class="mb-3 font-bold text-2xl text-blue-300">Servicios</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full h-screen snap-start flex justify-center items-center">
            <div class="w-full px-[10vw] py-[2.5vh] bg-white">
                <h1 class="mb-3 font-bold text-2xl text-[#84afdf]">Testimonios</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                    <div class=" max-w-sm border border-gray-700 rounded-lg shadow-sm p-6 flex justify-center items-center flex-col">
                        <img class="" src="{{ asset('images/logo/logo-small.png') }}" alt="">
                        <div class="pt-4">
                            <h1>Endodoncia</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-screen snap-start flex justify-center items-center">
            <div class="w-3/5 flex items-center flex-col">
                <h1 class="mb-3 font-bold text-2xl text-[#84afdf]">Contactanos</h1>
                <div class="">
                    <h2 class="text-center w-full">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quo repudiandae nulla distinctio, cumque eius dolore laboriosam eligendi rerum odit aperiam tempora. Quia impedit recusandae accusantium unde. A, saepe optio!
                    </h2>
                    <button class="fixed left-1/2 transform -translate-x-1/2 bottom-32 bg-blue-500 text-white p-3 rounded">click</button>
                </div>
            </div>
        </div>
      </main>



</body>

</html>
