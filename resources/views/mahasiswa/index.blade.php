<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tombol dengan Tulisan Biru --}}
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="mb-4">
                        <a href="{{ route('mahasiswa.create') }}" style="background-color: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; padding: 10px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block;">
                            + Tambah Mahasiswa
                        </a>
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Prodi</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Angkatan</th>
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($mahasiswas as $mhs)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->nim }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->program_studi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mhs->angkatan }}</td>
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>