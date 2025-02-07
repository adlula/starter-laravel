<div :class="open ? 'w-64' : 'w-16'" class="bg-white h-screen transition-all duration-300 flex flex-col shadow-lg"
    x-transition>
    <!-- Title -->
    <a href="" class="px-4 py-3 flex items-center justify-center">
        <img src="https://img.daisyui.com/images/daisyui-logo/daisyui-logomark-1024-1024.png" alt="Logo"
            class="w-12 rounded-full">
        <span x-show="open" class="w-full px-2 text-xl font-bold">Dashboard</span>
    </a>
    <!-- Line -->
    <div class="h-[1px] mx-4 bg-base-300"></div>
    <!-- Profile -->
    <div class="flex items-center px-4 py-3">
        <img src="{{ asset('assets/img/profile.jpg') }}" alt="Logo"
            class="w-8 h-8 rounded-full flex-shrink-0">
        <span x-show="open" class="ml-3 flex-1">{{ Auth::user()->name }}</span>
    </div>
    <!-- Line -->
    <div class="h-[1px] mx-4 bg-base-300"></div>
    <!-- Tombol Toggle -->
    <!-- Menu -->
    <nav class="flex-1">
        <a href="#" class="flex items-center px-4 py-3 my-1 hover:bg-base-300">
            <i class="w-8 text-center fas fa-home"></i>
            <span x-show="open" class="ml-3 flex-1">Dashboard</span>
        </a>
        <a href="#" class="flex items-center px-4 py-3 my-1 hover:bg-base-300">
            <i class="w-8 text-center fas fa-user"></i>
            <span x-show="open" class="ml-3 flex-1">Profile</span>
        </a>
        <a href="#" class="flex items-center px-4 py-3 my-1 hover:bg-base-300">
            <i class="w-8 text-center fas fa-cog"></i>
            <span x-show="open" class="ml-3 flex-1">Settings</span>
        </a>
    </nav>
</div>
