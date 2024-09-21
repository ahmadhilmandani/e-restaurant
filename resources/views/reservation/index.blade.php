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
    <div class="bg-slate-50 w-full min-h-screen px-3 xl:p-20">
        <a href="/" class="flex gap-2 items-center text-neutral-900">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left stroke-neutral-900">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
            </svg>
            kembali

        </a>
        @foreach ($reservationData as $data)
            <div class="mt-10 border border-slate-300 p-10 flex gap-10 bg-slate-100 flex-wrap">
                <div class="min-w-[190px] flex-1">
                    <h1 class="text-rose-500 font-bold text-3xl mb-5">
                        {{ $data->restaurant_name }}
                    </h1>
                    <img src="https://restaurant-api.dicoding.dev/images/medium/{{ $data->restaurant_picture_id }}"
                        alt="" class="w-full">
                </div>
                <div class="min-w-[200px] flex-1">
                    <div class="flex gap-10 mb-10">
                        <div class="min-w-[160px] flex-1">
                            <b class="block mb-2">Atas Nama</b>
                            <div>{{ Auth::user()->name }}</div>
                        </div>
                        <div class="min-w-[160px] flex-1">
                            <b class="block mb-2">Jumlah Kursi</b>
                            <div>{{ $data->reserved_chair }}</div>
                        </div>
                    </div>
                    <div class="flex gap-10 mb-10">
                        <div class="min-w-[160px] flex-1">
                            <b class="block mb-2">Tanggal</b>
                            <div>{{ $data->rsvp_date }}</div>
                        </div>
                        <div class="min-w-[160px] flex-1">
                            <b class="block mb-2">Jam</b>
                            <div>{{ $data->rsvp_time }}</div>
                        </div>
                    </div>
                    <div class="flex gap-5 flex-wrap">
                        <form class="block min-w-[200px] flex-1" action="/rsvp/{{ $data->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full border border-rose-500 hover:bg-rose-500 hover:text-white transition-all p-1.5 text-[13px] text-center text-rose-500 font-bold">
                                Hapus
                            </button>
                        </form>
                        <a href="/rsvp/{{ $data->id }}/edit"
                            class="block min-w-[200px] flex-1 border border-yellow-500 hover:bg-yellow-500 hover:text-white transition-all p-1.5 text-[13px] text-center text-yellow-500 font-bold">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="">

        </div>
    </div>
</body>

</html>
