<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('attendances.update', $attendance) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Siswa</label>
                        <select name="user_id" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ $attendance->user_id == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} ({{ $student->nisn }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tanggal</label>
                        <input type="date" name="date" value="{{ $attendance->date }}" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Jam Masuk</label>
                            <input type="time" name="time_in" value="{{ $attendance->time_in }}" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Jam Pulang</label>
                            <input type="time" name="time_out" value="{{ $attendance->time_out }}" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Status</label>
                        <select name="status" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
                            <option value="hadir" {{ $attendance->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="sakit" {{ $attendance->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="izin" {{ $attendance->status == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="alpa" {{ $attendance->status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('attendances.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>