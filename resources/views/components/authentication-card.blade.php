<div
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 relative">
    <!-- Animated background circles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 bg-white/10 rounded-full -top-20 -left-20 animate-pulse"></div>
        <div class="absolute w-96 h-96 bg-white/10 rounded-full -bottom-20 -right-20 animate-pulse delay-1000"></div>
    </div>

    <div class="relative z-10 backdrop-blur-sm p-4 rounded-full bg-white/20">
        {{ $logo }}
    </div>

    <div
        class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white/95 backdrop-blur-md shadow-[0_0_40px_rgba(0,0,0,0.15)] overflow-hidden sm:rounded-xl relative z-10">
        {{ $slot }}
    </div>
</div>
