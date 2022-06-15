<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dark bg-gradient">
    <div class="fs-2 my-3 text-white">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
