<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Status Kelulusan</h3>
    <p>Nama: {{ $nama }}</p>
    <p>Mata Pelajaran: {{ $mapel }}</p>
    <p>Nilai: {{ $nilai }}</p>
    <p>Status: 
        @if($nilai >= 75)
            Lulus
        @else
            Tidak Lulus
        @endif
    </p>
</body>
</html>