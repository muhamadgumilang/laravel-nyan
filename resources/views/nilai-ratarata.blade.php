<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Nilai Siswa</h2>
    <table border="1" cellpadding="5">
        <tr>
            <td>Nama</td>
            <td>Nilai</td>
        </tr>
        @php
            $total = 0;
            $count = count($siswa);
        @endphp

        @foreach($siswa as $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['nilai'] }}</td>
            </tr>
            @php $total += $item['nilai']; @endphp
        @endforeach
    </table>

    @php $rata2 = $total / $count; @endphp
    <h3>Rata-rata: {{ number_format($rata2, 2) }}</h3>
    <h3>Status Kelas: 
        @if($rata2 >= 75)
            Lulus
        @else
            Remedial
        @endif
    </h3>
</body>
</html>