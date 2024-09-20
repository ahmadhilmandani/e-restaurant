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
    <div class="bg-slate-50 py-6 w-full min-h-screen flex justify-center items-center relative overflow-">
        @if ($errors->any())
            <div
                class="bg-rose-500 border-b border-rose-200 w-full text-center py-4 font-bold text-white fixed top-0 left-0 right-0 z-10 toast-animation">
                Gagal!
            </div>
        @endif
        <form action="/rsvp" method="POST" class="max-w-[640px] w-full">
            @csrf
            <main class="bg-slate-100 border border-slate-200 p-4">
                <h1 class="text-rose-500 text-center mb-5 font-bold text-4xl">
                    RSVP at {{ $data['restaurant']['name'] }}
                </h1>
                <div>
                    <img src="https://restaurant-api.dicoding.dev/images/medium/{{ $data['restaurant']['pictureId'] }}"
                        alt="" class="max-w-[320px] mx-auto w-full">
                </div>
                <small
                    class="mt-2 mb-5 text-[12px] italic mx-auto text-center block">{{ $data['restaurant']['address'] }}</small>
                <input name="restaurant_address" type="hidden" value="{{ $data['restaurant']['address'] }}">
                <input name="restaurant_name" type="hidden" value="{{ $data['restaurant']['name'] }}">
                <input name="restaurant_pic_id" type="hidden" value="{{ $data['restaurant']['pictureId'] }}">
                <div class="flex gap-3 mb-5">
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Atas nama</label>
                        <input name="name" type="text" value="{{ $user_name }}"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-500 border border-slate-200 bg-slate-50"
                            readonly>
                    </div>
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Jumlah Kursi</label>
                        <input name="chair" type="number"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-500 border border-slate-200 bg-slate-50">
                        @error('chair')
                            <small class="text-[12px] text-rose-500">
                                Harus diisi
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3 mb-5">
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Tanggal</label>
                        <input name="rsvp_date" type="date"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-500 border border-slate-200 bg-slate-50">
                        @error('rsvp_date')
                            <small class="text-[12px] text-rose-500">
                                Harus diisi
                            </small>
                        @enderror
                    </div>
                    <div class="min-w-[180px] flex-1">
                        <label for="" class="block mb-1 text-[14px] font-semibold">Jam</label>
                        <input name="rsvp_time" type="time"
                            class="block w-full px-3 py-1.5 focus:outline-none focus:border-none focus:ring-1 focus:ring-rose-500 border border-slate-200 bg-slate-50">
                        @error('rsvp_time')
                            <small class="text-[12px] text-rose-500">
                                Harus diisi
                            </small>
                        @enderror
                    </div>
                </div>

                <button
                    class="block w-full py-1.5 bg-rose-500 text-white font-bold text-center hover:bg-rose-600 transition-all">RSVP!</button>
            </main>
        </form>
    </div>
</body>

</html>
