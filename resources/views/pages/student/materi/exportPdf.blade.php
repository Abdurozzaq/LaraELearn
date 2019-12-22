<html>
    <head>
        <title>{{ $singleMateri->judul }}</title>
    </head>
    <body>
        <center>
            <h5>{{ $singleMateri->judul }}</h5>
            <h6>{{ $singleMateri->mapel }}</h6>
            <h6>{{ $singleMateri->kelas }}</h6>
        </center>

        <h1>{{ $singleMateri->judul }}</h1>
        <br>
        {!! $singleMateri->isi !!}
        <br>
        <br>
        <br>
        <h2><strong>Kesimpulan :</strong></h2>
        <p>{{ $singleMateri->kesimpulan}}</p>
        <br>
        <h4><strong>Info :</strong></h4>
        <p><strong>Mata Pelajaran :</strong>  {{ $singleMateri->mapel }}</p>
        <p><strong>Untuk Kelas :</strong>  {{ $singleMateri->kelas }}</p>
        <br>
        <h4><strong>Keterangan :</strong></h4>
        <p>{{ $singleMateri->keterangan }}</p>
    </body>
</html>
