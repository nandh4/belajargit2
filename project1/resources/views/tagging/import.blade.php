<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Import Data Tagging</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        input[type="file"] {
            width: 100%;
            margin: 20px 0;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .success {
            background-color: #d4edda;
            padding: 10px;
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Import Data Tagging</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('tagging.import.process') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <label for="file">
            Pilih File CSV:
        </label>

        <input
            type="file"
            name="file"
            id="file"
            accept=".csv,.txt"
            required
        >

        <button type="submit">
            Import CSV
        </button>

    </form>

</div>

</body>
</html>