<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="bg-slate-50 py-6 w-full min-h-screen flex justify-center items-center gap-10">
      <div class="mb-2">
        <h1>Atas nama</h1>
        <p>{{ $name }}</p>
      </div>
      <div class="mb-2">
        <h1>Jumlah kursi</h1>
        <p>{{ $chair }}</p>
      </div>
      <div class="mb-2">
        <h1>Jam</h1>
        <p>{{ $clock }}</p>
      </div>
    </div>
</body>

</html>
