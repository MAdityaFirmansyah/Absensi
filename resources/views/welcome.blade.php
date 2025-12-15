<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Absensi - Sistem Kehadiran Digital</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 dark:bg-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-100 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="flex items-center gap-2">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">E-Absensi</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Masuk</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Daftar</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                    <div class="text-center lg:text-left">
                        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                            Kelola Kehadiran <br>
                            <span class="text-blue-600">Lebih Efisien</span>
                        </h1>
                        <p class="mt-4 max-w-lg mx-auto lg:mx-0 text-base text-gray-500 dark:text-gray-400 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            Pantau kehadiran karyawan atau siswa secara real-time. Sistem absensi digital yang mudah digunakan, akurat, dan dapat diakses dari mana saja.
                        </p>
                        <div class="mt-8 flex justify-center lg:justify-start gap-4">
                            <a href="{{ Route::has('login') ? route('login') : '#' }}" class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                Absen Sekarang
                            </a>
                            <a href="#fitur" class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-200 to-indigo-200 dark:from-blue-900 dark:to-indigo-900 rounded-2xl transform rotate-3 scale-105 opacity-50 blur-lg"></div>
                        <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700 p-6">
                            <div class="space-y-4">
                                <div class="h-8 bg-gray-100 dark:bg-gray-700 rounded w-3/4 animate-pulse"></div>
                                <div class="space-y-2">
                                    <div class="h-4 bg-gray-100 dark:bg-gray-700 rounded w-full animate-pulse"></div>
                                    <div class="h-4 bg-gray-100 dark:bg-gray-700 rounded w-5/6 animate-pulse"></div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mt-6">
                                    <div class="h-24 bg-blue-50 dark:bg-blue-900/20 rounded-lg flex items-center justify-center border border-blue-100 dark:border-blue-800">
                                        <div class="text-center">
                                            <span class="block text-2xl font-bold text-blue-600">08:00</span>
                                            <span class="text-xs text-blue-400">Jam Masuk</span>
                                        </div>
                                    </div>
                                    <div class="h-24 bg-green-50 dark:bg-green-900/20 rounded-lg flex items-center justify-center border border-green-100 dark:border-green-800">
                                        <div class="text-center">
                                            <span class="block text-2xl font-bold text-green-600">17:00</span>
                                            <span class="text-xs text-green-400">Jam Pulang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 p-8 mb-24">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Pantau Kehadiran Siswa</h2>
                        <p class="text-gray-500 dark:text-gray-400">Masukkan NISN siswa untuk mengecek status kehadiran hari ini.</p>
                    </div>

                    <form action="{{ route('cek.absensi') }}" method="POST" class="max-w-xl mx-auto flex gap-4">
                        @csrf
                        <input type="text" name="nisn" placeholder="Masukkan NISN Siswa..." required
                            class="flex-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 p-3 shadow-sm"
                        >
                        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-150">
                            Cek Sekarang
                        </button>
                    </form>

                    @if(session('error'))
                        <div class="max-w-xl mx-auto mt-4 p-4 bg-red-100 text-red-700 rounded-lg text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('search_result'))
                        <div class="max-w-xl mx-auto mt-8 bg-gray-50 dark:bg-gray-700 rounded-xl p-6 border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ session('siswa')->name }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-300">NISN: {{ session('siswa')->nisn }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500 dark:text-gray-300">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
                                </div>
                            </div>
                            
                            <hr class="border-gray-200 dark:border-gray-600 mb-4">

                            <div class="flex items-center justify-center py-4">
                                @if(session('absensi'))
                                    <div class="text-center">
                                        @if(session('absensi')->status == 'hadir')
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                HADIR
                                            </span>
                                            <p class="mt-2 text-gray-600 dark:text-gray-300">Masuk pukul: <strong>{{ session('absensi')->time_in }}</strong></p>
                                        @else
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 uppercase">
                                                {{ session('absensi')->status }}
                                            </span>
                                            <p class="mt-2 text-gray-500 text-sm">Siswa tercatat {{ session('absensi')->status }} hari ini.</p>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            BELUM ABSEN
                                        </span>
                                        <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm">Data kehadiran belum masuk untuk hari ini.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <div id="fitur" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Real-Time Tracking</h3>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Data kehadiran tercatat detik itu juga dengan akurasi waktu server yang tinggi.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Rekap Otomatis</h3>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Laporan kehadiran bulanan dihasilkan secara otomatis siap untuk dicetak.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Akses Mobile</h3>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Desain responsif yang nyaman digunakan baik di laptop, tablet, maupun smartphone.</p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 mt-auto">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-400 text-sm">
                    &copy; {{ date('Y') }} E-Absensi. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>