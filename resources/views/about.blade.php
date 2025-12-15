<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tentang Kelas RPL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold">Rekayasa Perangkat Lunak</h3>
                </div>

                <p class="mb-6 leading-relaxed">
                    Jurusan Rekayasa Perangkat Lunak (RPL) adalah kompetensi keahlian yang mempelajari cara-cara pengembangan perangkat lunak, 
                    mulai dari pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak, dan manajemen kualitas.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-lg font-bold mb-2 text-blue-600 dark:text-blue-400">Visi & Misi</h4>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Mencetak programmer handal dan berakhlak mulia.</li>
                            <li>Mengembangkan teknologi tepat guna untuk masyarakat.</li>
                            <li>Menghasilkan lulusan yang siap kerja di industri IT.</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <h4 class="text-lg font-bold mb-2 text-blue-600 dark:text-blue-400">Kompetensi Lulusan</h4>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Web Development (Laravel, PHP, React).</li>
                            <li>Mobile Development (Flutter, Kotlin).</li>
                            <li>Database Management (MySQL, PostgreSQL).</li>
                            <li>UI/UX Design Dasar.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>