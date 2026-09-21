<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-[#fce4ec] via-[#f9d8e2] to-[#f8cfdc] min-h-screen">

    <div class="max-w-2xl mx-auto px-6 py-10">

<div class="max-w-2xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#7a4b5b]">
            Edit Mahasiswa
        </h1>

        <p class="text-[#a87888] mt-1">
            Ubah informasi data mahasiswa
        </p>
    </div>


    <!-- Card Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-[#f5dce3] p-6">

        <!-- Error Validasi -->
        @if ($errors->any()) 
            <div class="bg-[#fdecef] border border-[#f3cbd6] text-[#a05268] px-4 py-3 rounded-xl mb-6">

                <p class="font-semibold mb-2">
                    Data belum sesuai:
                </p>

                <ul class="list-disc list-inside text-sm"> 

                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach

                </ul>

            </div>
        @endif


        <!-- Form -->
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
              method="POST">

            @csrf 
            @method('PUT')


            <!-- Nama -->
            <div class="mb-5">

                <label class="block text-sm font-medium text-[#704653] mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $mahasiswa->nama) }}"
                    class="w-full border border-[#efcdd7] rounded-xl px-4 py-3 text-gray-700 outline-none focus:border-[#e99aaa] focus:ring-2 focus:ring-[#fce1e7]"
                    placeholder="Masukkan nama mahasiswa"
                >

            </div>


            <!-- Email -->
            <div class="mb-6">

                <label class="block text-sm font-medium text-[#704653] mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $mahasiswa->email) }}"
                    class="w-full border border-[#efcdd7] rounded-xl px-4 py-3 text-gray-700 outline-none focus:border-[#e99aaa] focus:ring-2 focus:ring-[#fce1e7]"
                    placeholder="Masukkan email mahasiswa"
                >

            </div>


            <!-- Tombol -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-[#e99aaa] hover:bg-[#df8498] text-white px-5 py-2.5 rounded-xl font-medium transition">
                    ✏️ Update
                </button>


                <a href="{{ route('mahasiswa.index') }}"
                   class="bg-[#f9dce4] hover:bg-[#f3cbd5] text-[#a2576c] px-5 py-2.5 rounded-xl font-medium transition">
                    ← Kembali
                </a>

            </div>

        </form>

    </div>


    <!-- Footer -->
    <p class="text-center text-xs text-[#c18d9d] mt-6">
        Sistem Data Mahasiswa
    </p>

</div>

</body>
</html>
