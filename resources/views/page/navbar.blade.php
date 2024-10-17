<nav class="fixed-nav bg-white shadow-md">
    <div class="flex items-center justify-between px-4 py-2">
        <!-- Logo y título -->
        <div class="flex items-center">
            <a href="" class="p-2">
                <img class="h-16" src="{{ asset('img/logo.png') }}" alt="Logo" />
            </a>
            <div class="ml-2 mb-1">
                <h1 class="font-bold text-2xl text-black">F’trick</h1>
                <h2 class="text-xl text-black">consultora &</h2>
                <h2 class="text-xl text-black">constructora</h2>
            </div>
        </div>

        <!-- Menú de navegación -->
        <div class="flex items-center">
            <a href="#inicio" class="flex items-center px-5 text-black hover:text-blue-700 transition duration-500 ease select-none">
                <img src="{{ asset('icons/inicio.svg') }}" alt="Inicio" class="w-5">
                <p class="ml-2">Inicio</p>
            </a>
            <a href="#nosotros" class="flex items-center px-5 text-black hover:text-blue-700 transition duration-500 ease select-none">
                <img src="{{ asset('icons/nosotros.svg') }}" alt="Nosotros" class="w-5">
                <p class="ml-2">Nosotros</p>
            </a>
            <a href="{{ url('/lecciones') }}" class="flex items-center px-5 text-black hover:text-blue-700 transition duration-500 ease select-none">
                <img src="{{ asset('icons/nosotros.svg') }}" alt="Nosotros" class="w-5">
                <p class="ml-2">Servicios</p>
            </a>
            <a href="#gestion" class="flex items-center px-5 text-black hover:text-blue-700 transition duration-500 ease select-none">
                <img src="{{ asset('icons/gestion.svg') }}" alt="Gestión" class="w-5">
                <p class="ml-2">Proyectos</p>
            </a>
            <a href="{{ url('/admin') }}">
                <button class="bg-customBlue text-white flex items-center px-4 py-2 ml-4 transition duration-500 ease select-none hover:bg-blue-500 ds">
                    <img src="{{ asset('icons/intranet.svg') }}" alt="Intranet" class="w-5">
                    <span class="ml-2">Dashboard</span>
                </button>
            </a>
        </div>
    </div>
</nav>
