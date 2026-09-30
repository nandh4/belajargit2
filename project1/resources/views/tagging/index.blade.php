<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Tagging</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f5f6fa;
        }

        h1 {
            margin-bottom: 20px;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        .empty {
            text-align: center;
            padding: 30px;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">

    <h1>Data Tagging</h1>

    <div>
       @auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('tagging.create') }}"
           style="padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
            + Tambah Data
        </a>
    @endif

    <a href="{{ route('tagging.import') }}"
       style="padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
        Import CSV
    </a>

    <a href="{{ route('tagging.map', ['kecamatan' => request('kecamatan')]) }}"
        style="padding: 10px 15px; background: #6f42c1; color: white; text-decoration: none; border-radius: 5px;">
        🗺️ Lihat Peta
    </a>
@endauth
    </div>

</div>

    <div class="table-container">

    <form action="{{ route('tagging.index') }}" method="GET" style="margin-bottom: 20px;">

        @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        
        <label for="kecamatan"><strong>Filter Kecamatan:</strong></label>

        <select name="kecamatan" id="kecamatan" onchange="this.form.submit()">
            <option value="">-- Semua Kecamatan --</option>

            @foreach($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->kode_wilayah }}"
                    {{ request('kecamatan') == $kecamatan->kode_wilayah ? 'selected' : '' }}>
                    {{ $kecamatan->nama_wilayah }}
                </option>
            @endforeach
        </select>
    </form>

            <form action="{{ route('tagging.index') }}" method="GET" style="margin-bottom: 20px;">

        @if(request('kecamatan'))
            <input type="hidden" name="kecamatan" value="{{ request('kecamatan') }}">
        @endif

        <label for="search"><strong>Pencarian Data:</strong></label>

        <input
            type="text"
            name="search"
            id="search"
            value="{{ request('search') }}"
            placeholder="Cari assignment ID, nama usaha, atau nama KK..."
            style="padding: 8px; width: 300px;"
        >

        <button type="submit" style="padding: 8px 15px;">
            Cari
        </button>

        @if(request('search') || request('kecamatan'))
            <a href="{{ route('tagging.index') }}"
            style="
                margin-left: 10px;
                padding: 8px 12px;
                background: #6c757d;
                color: white;
                text-decoration: none;
                border-radius: 4px;
            ">
                Reset Filter
            </a>
        @endif
    </form>

    <div style="overflow-x: auto;">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Assignment ID</th>
                    <th>Status</th>
                    <th>Level 6 Code</th>
                    <th>Nama Usaha</th>
                    <th>Nama KK</th>
                    <th>Ada Keluarga</th>
                    <th>Ada Bangunan Usaha</th>
                    <th>Accuracy</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($taggings as $tagging)
                

                    <tr>
                        <td>
                            {{ $taggings->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $tagging->assignment_id }}
                        </td>

                        <td>
                            @if($tagging->assignment_status_alias === 'APPROVED BY Pengawas')
                                <span style="padding: 5px 10px; background: #28a745; color: white; border-radius: 15px;">
                                    Approved
                                </span>

                            @elseif($tagging->assignment_status_alias === 'SUBMITTED BY Pencacah')
                                <span style="padding: 5px 10px; background: #ffc107; color: black; border-radius: 15px;">
                                    Submitted
                                </span>

                            @elseif($tagging->assignment_status_alias === 'REJECTED BY Pengawas')
                                <span style="padding: 5px 10px; background: #dc3545; color: white; border-radius: 15px;">
                                    Rejected
                                </span>

                            @else
                                {{ $tagging->assignment_status_alias }}
                            @endif
                        </td>

                        <td>
                            {{ $tagging->level_6_full_code }}
                        </td>

                        <td>
                            {{ $tagging->nama_usaha_bang ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->nama_kk ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->ada_keluarga_label ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->ada_bang_usaha_label ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->geotag_accuracy ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->geotag_latitude ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->geotag_longitude ?? '-' }}
                        </td>

    <td>
    @if(auth()->user()->role === 'admin')

        <a href="{{ route('tagging.edit', $tagging->id) }}"
           style="padding: 5px 10px; background: #ffc107; color: black; text-decoration: none; border-radius: 4px;">
            Edit
        </a>

        <form action="{{ route('tagging.destroy', $tagging->id) }}"
              method="POST"
              style="display: inline;"
              onsubmit="return confirm('Yakin ingin menghapus data ini?');">

            @csrf
            @method('DELETE')

            <button type="submit"
                    style="padding: 5px 10px; background: #dc3545; color: white; border: none; border-radius: 4px;">
                Hapus
            </button>
        </form>
    @else
        <span style="color: #666;">Hanya lihat</span>
    @endif
</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="11" class="empty">
                            Belum ada data tagging.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        </div>

        <div class="pagination">
            {{ $taggings->links() }}
        </div>

    </div>

</body>
</html>