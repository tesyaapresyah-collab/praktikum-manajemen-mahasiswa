<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Tampilkan error validasi jika ada --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" style="width: 100%; border: 1px solid #d1d5db; padding: 8px 12px; border-radius: 6px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" style="width: 100%; border: 1px solid #d1d5db; padding: 8px 12px; border-radius: 6px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" style="width: 100%; border: 1px solid #d1d5db; padding: 8px 12px; border-radius: 6px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}" style="width: 100%; border: 1px solid #d1d5db; padding: 8px 12px; border-radius: 6px;" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Angkatan</label>
                        <input type="text" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" style="width: 100%; border: 1px solid #d1d5db; padding: 8px 12px; border-radius: 6px;" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 10px 16px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                            Perbarui Data
                        </button>
                        <a href="{{ route('mahasiswa.index') }}" style="color: #4b5563; text-decoration: none;">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>