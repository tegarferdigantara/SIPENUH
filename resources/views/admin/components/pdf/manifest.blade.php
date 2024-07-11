<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $customers->first()->umrahPackage->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Manifest Keberangkatan {{ $customers->first()->umrahPackage->name }}</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PASPOR</th>
                <th>L/P</th>
                <th>NO. PASPOR</th>
                <th>NIK</th>
                <th>ALAMAT</th>
                <th>ASAL KOTA/KAB.</th>
                <th>TEMPAT LAHIR</th>
                <th>TGL LAHIR</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $index => $customer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->customerDocument->passport_number }}</td>
                    <td>{{ $customer->customerDocument->id_number }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->birth_place }}</td>
                    <td>{{ \Carbon\Carbon::parse($customer->birth_date)->translatedFormat('j F Y') }}</td>
                    <td> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
