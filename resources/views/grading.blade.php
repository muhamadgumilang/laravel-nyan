<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <h2>Grading Nilai</h2>
    <p>Nama: {{ $nama }}</p>
    <p>Nilai: {{ $nilai }}</p>
    <p>Grade: 
        @if($nilai >= 90)
            A
        @elseif($nilai >= 80)
            B
        @elseif($nilai >= 70)
            C
        @elseif($nilai >= 60)
            D
        @else
            E
        @endif
    </p>
</body>
</html>