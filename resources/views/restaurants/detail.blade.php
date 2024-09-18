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
    <div class="px-3 xl:p-20 bg-slate-50">
        <div>
            <div>

                <h1 class="text-4xl font-bold text-rose-500 mb-3">
                    {{ $data['restaurant']['name'] }}
                </h1>
                <div class="flex gap-2 mb-3">
                    <div class="text-[20px] text-neutral-400">{{ $data['restaurant']['city'] }}</div>
                    <div class="flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="currentColor"
                            class="icon icon-tabler icons-tabler-filled icon-tabler-star fill-amber-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                        </svg>
                        <div class="text-[11px] text-amber-500">{{ $data['restaurant']['rating'] }}</< /div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-8 flex-wrap">
                    <img src="https://restaurant-api.dicoding.dev/images/medium/{{ $data['restaurant']['pictureId'] }}"
                        alt="" class="min-w-[200px] flex-1">
                    <p class="text-neutral-700 min-w-[200px] max-w-[480px] flex-1">
                        {{ $data['restaurant']['description'] }}
                    </p>
                </div>
            </div>
            <div class="mt-5">
                <div class="mb-5 pb-3 border-b border-slate-200">
                    <h2 class="text-2xl text-rose-500 font-bold ">Makanan</h2>
                    @foreach ($data['restaurant']['menus']['foods'] as $food)
                        <div class="mb-2">{{ $loop->iteration }}. {{ $food['name'] }}</div>
                    @endforeach
                </div>
                <div class="mb-5 pb-3 border-b border-slate-200">
                    <h2 class="text-2xl text-rose-500 font-bold">Minuman</h2>
                    @foreach ($data['restaurant']['menus']['drinks'] as $drinks)
                        <div class="mb-2">{{ $loop->iteration }}. {{ $drinks['name'] }}</div>
                    @endforeach
                </div>
            </div>
        </div>
</body>

</html>
