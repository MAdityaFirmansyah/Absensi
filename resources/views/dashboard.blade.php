<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Selamat Datang, <span class="font-bold text-blue-600">{{ Auth::user()->name }}</span>! Berikut adalah ringkasan kehadiran hari ini.
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Siswa</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalSiswa }}</div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-medium">Hadir Hari Ini</div>
                    <div class="mt-2 text-3xl font-bold text-green-600">{{ $hadir }}</div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-gray-500">
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-medium">Belum Absen</div>
                    <div class="mt-2 text-3xl font-bold text-gray-600 dark:text-gray-300">{{ $belumAbsen }}</div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-medium">Tidak Masuk</div>
                    <div class="mt-2 flex items-baseline gap-2">
                        <span class="text-3xl font-bold text-red-600">{{ $sakit + $izin + $alpa }}</span>
                        <span class="text-xs text-gray-500">(S:{{ $sakit }}, I:{{ $izin }}, A:{{ $alpa }})</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Aktivitas Absensi Terakhir</h3>
                    
                    @if($riwayatTerbaru->count() > 0)
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Waktu</th>
                                        <th scope="col" class="px-6 py-3">Nama Siswa</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($riwayatTerbaru as $log)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $log->created_at->diffForHumans() }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $log->user->name }}</td>
                                        <td class="px-6 py-4">
                                            @if($log->status == 'hadir')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Hadir</span>
                                            @elseif($log->status == 'sakit')
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Sakit</span>
                                            @elseif($log->status == 'izin')
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Izin</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Alpa</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($log->time_in)
                                                Masuk: {{ $log->time_in }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Belum ada data absensi hari ini.</p>
                    @endif
                    
                    <div class="mt-4 text-right">
                        <a href="{{ route('attendances.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Lihat Semua Data &rarr;</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>