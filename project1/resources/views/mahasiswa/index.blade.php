<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>


<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-[#fce4ec] via-[#f9d8e2] to-[#f8cfdc] min-h-screen">

<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#7a4b5b]">
            Data Mahasiswa
        </h1>

        <p class="text-[#a87888] mt-1">
            Kelola data mahasiswa dengan mudah
        </p>
    </div>


    <!-- Pesan Berhasil -->
    @if (session('success'))
        <div class="bg-[#fcecef] border border-[#f3cbd6] text-[#8a5364] px-4 py-3 rounded-xl mb-6">
            ✓ {{ session('success') }}
        </div>
    @endif


    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-[#f5dce3] overflow-hidden">

        <!-- Bagian Atas -->
        <div class="p-6 border-b border-[#f5e1e6]">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h2 class="text-xl font-semibold text-[#704653]">
                        Daftar Mahasiswa
                    </h2>

                    <p class="text-sm text-[#ad7f8d] mt-1">
                        Total {{ $mahasiswa->count() }} data mahasiswa
                    </p>
                </div>


                <!-- Tombol Tambah -->
                <a href="{{ route('mahasiswa.create') }}"
                   class="bg-[#e99aaa] hover:bg-[#df8498] text-white px-5 py-2.5 rounded-xl font-medium text-sm text-center transition">
                    + Tambah Data
                </a>

            </div>


            <!-- Pencarian -->
            <div class="mt-5">

                <div class="relative">

                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#c58b9b]">
                        🔍
                    </span>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari nama atau email mahasiswa..."
                        class="w-full border border-[#f0ccd6] rounded-xl pl-11 pr-4 py-3 text-sm text-gray-700 outline-none focus:border-[#e99aaa] focus:ring-2 focus:ring-[#fce1e7]"
                    >

                </div>

            </div>

        </div>


        <!-- Tabel -->
        <div class="overflow-x-auto">

            <table class="w-full" id="mahasiswaTable">

                <thead class="bg-[#fdf0f4]">

                    <tr class="text-left text-sm text-[#875565]">

                        <th class="px-6 py-4 font-semibold">
                            ID
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Nama
                        </th>

                        <th class="px-6 py-4 font-semibold">
                            Email
                        </th>

                        <th class="px-6 py-4 font-semibold text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($mahasiswa as $mhs)

                        <tr class="mahasiswa-row border-t border-[#f6e5e9] hover:bg-[#fff8fa] transition">

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $mhs->id }}
                            </td>


                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <!-- Avatar -->
                                    <div class="w-9 h-9 rounded-full bg-[#f9d5df] flex items-center justify-center text-[#a95e72] font-bold">
                                        {{ strtoupper(substr($mhs->nama, 0, 1)) }}
                                    </div>

                                    <span class="nama-mahasiswa font-medium text-[#68424e]">
                                        {{ $mhs->nama }}
                                    </span>

                                </div>

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-500 email-mahasiswa">
                                {{ $mhs->email }}
                            </td>


                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <!-- Edit -->
                                    <form action="{{ route('mahasiswa.edit', $mhs->id) }}"
                                          method="GET">

                                        <button type="submit"
                                                class="bg-[#f9dce4] hover:bg-[#f4cbd6] text-[#a2576c] px-3 py-2 rounded-lg text-sm">
                                            ✏️ Edit
                                        </button>

                                    </form>


                                    <!-- Hapus -->
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="bg-[#fde2e6] hover:bg-[#f8cfd6] text-[#b65f6b] px-3 py-2 rounded-lg text-sm">
                                            🗑️ Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-12">

                                <div class="text-4xl mb-3">
                                    📭
                                </div>

                                <p class="text-gray-600 font-medium">
                                    Belum ada data mahasiswa
                                </p>

                            </td>

                        </tr>

                    @endforelse


                    <!-- Jika pencarian tidak menemukan data -->
                    <tr id="noResult" class="hidden">

                        <td colspan="4" class="text-center py-10">

                            <div class="text-3xl mb-2">
                                🔍
                            </div>

                            <p class="text-gray-600 font-medium">
                                Data tidak ditemukan
                            </p>

                            <p class="text-sm text-gray-400 mt-1">
                                Coba gunakan nama atau email yang berbeda.
                            </p>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>


    <!-- Footer -->
    <p class="text-center text-xs text-[#c18d9d] mt-6">
        Sistem Data Mahasiswa
    </p>

</div>


<!-- JavaScript Pencarian -->
<script>

    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.mahasiswa-row');
    const noResult = document.getElementById('noResult');

    searchInput.addEventListener('keyup', function () {

        const keyword = searchInput.value.toLowerCase();

        let ditemukan = false;

        rows.forEach(function (row) {

            const nama = row.querySelector('.nama-mahasiswa').textContent.toLowerCase();
            const email = row.querySelector('.email-mahasiswa').textContent.toLowerCase();

            if (nama.includes(keyword) || email.includes(keyword)) {

                row.style.display = '';
                ditemukan = true;

            } else {

                row.style.display = 'none';

            }

        });


        if (ditemukan || keyword === '') {

            noResult.classList.add('hidden');

        } else {

            noResult.classList.remove('hidden');

        }

    });

</script>

</body>

</html>
