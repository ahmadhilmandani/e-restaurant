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
    <div class="bg-slate-50 py-6 w-full min-h-screen flex justify-center items-center">
        <form action="/reservation" method="POST" class="max-w-[640px] w-full">
          @csrf
            <main class="bg-slate-100 border border-slate-200 p-4">
                <h1 class="text-rose-400 text-center mb-5 font-bold text-4xl">
                    RSVP
                </h1>
                <div class="flex gap-3 mb-5">
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Atas nama</label>
                        <input name="name" type="text"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-400 border border-slate-200 bg-slate-50">
                    </div>
                </div>

                <div class="flex gap-3 mb-5">
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Jumlah Kursi</label>
                        <input name="chair" type="number"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-400 border border-slate-200 bg-slate-50">
                    </div>
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Jam</label>
                        <input name="clock" type="time"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-400 border border-slate-200 bg-slate-50">
                    </div>
                </div>

                <button
                    class="block w-full py-1.5 bg-rose-400 text-white font-bold text-center hover:bg-rose-500 transition-all">Pesan!</button>
            </main>
        </form>
    </div>
</body>

</html>
