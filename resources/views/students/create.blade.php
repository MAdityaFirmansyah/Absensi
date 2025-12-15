<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">NISN</label>
                        <input type="number" name="nisn" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                        <p class="text-xs text-gray-500 mt-1">*NISN akan menjadi password default siswa.</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>