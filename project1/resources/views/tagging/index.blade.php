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

    <a href="{{ route('tagging.map') }}"
       style="padding: 10px 15px; background: #6f42c1; color: white; text-decoration: none; border-radius: 5px;">
        🗺️ Lihat Peta
    </a>
@endauth
    </div>

</div>

    <div class="table-container">

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
                            {{ $tagging->assignment_status_alias }}
                        </td>

                        <td>
                            {{ $tagging->level_6_full_code }}
                        </td>

                        <td>
                            {{ $tagging->nama_usaha_bang }}
                        </td>

                        <td>
                            {{ $tagging->nama_kk }}
                        </td>

                        <td>
                            {{ $tagging->ada_keluarga_label }}
                        </td>

                        <td>
                            {{ $tagging->ada_bang_usaha_label }}
                        </td>

                        <td>
                            {{ $tagging->geotag_accuracy }}
                        </td>

                        <td>
                            {{ $tagging->geotag_latitude }}
                        </td>

                        <td>
                            {{ $tagging->geotag_longitude }}
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

        <div class="pagination">
            {{ $taggings->links() }}
        </div>

    </div>

</body>
</html>