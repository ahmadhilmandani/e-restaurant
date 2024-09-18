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
        <div class="border-b border-slate-200 mb-10 pb-3">
            <h1 class="text-4xl font-bold text-rose-500 mb-3">
                Pilih Restoran!😋
            </h1>
            <p class="text-neutral-700">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque id perspiciatis
                vel hic tempore sequi harum ab corporis, voluptatum officia animi distinctio molestias quibusdam minima
                nisi cum neque accusantium. Non.</p>
        </div>
        <div class="flex gap-16 items-start justify-start flex-wrap" id="restaurant-list">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const apiUrl = 'https://restaurant-api.dicoding.dev/list';

        axios.get(apiUrl).then(function(restaurantRes) {
            const restaurants = restaurantRes.data.restaurants;

            const restaurantContainer = document.getElementById('restaurant-list');
            restaurants.forEach((val) => {
                const card = document.createElement('div');
                card.className = 'min-w-[200px] xl:min-w-[240px] flex-1 bg-white overflow-hidden border border-slate-200';

                card.innerHTML = `
                    <div class="w-full aspect-video overflow-hidden">
                        <img src="https://restaurant-api.dicoding.dev/images/medium/${val.pictureId}" alt="${val.name}">
                    </div>
                    <div class="card-content pt-3 px-6 pb-6">
                        <h3 class="text-[18px] font-bold text-red-500 mb-1">${val.name}</h3>
                        <div class="flex gap-2 mb-3">
                            <div class="text-[11px] text-neutral-400">${val.city}</div>
                            <div class="flex gap-1 items-center">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="11"  height="11"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-star fill-amber-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                <div class="text-[11px] text-amber-500">${val.rating}</div>
                            </div>
                        </div>
                        <p class="line-clamp-3 text-neutral-700 mb-5">${val.description}</p>
                        <div class="flex gap-3">
                            <a href="/restaurant/${val.id}" class="block min-w-[80px] flex-1 border border-rose-500 hover:bg-rose-500 hover:text-white transition-all p-1.5 text-[13px] text-center text-rose-500 font-bold">Detail</a>
                            <a href="/" class="block min-w-[80px] flex-1 border border-rose-500 hover:bg-rose-600 transition-all bg-rose-500 p-1.5 text-[13px] text-center text-white font-bold">Booking</a>
                            </div>
                    </div>
                `;

                restaurantContainer.appendChild(card);
            })
        }).catch(function(error) {
            console.error('Error fetching data:', error);
        });
    </script>
</body>

</html>
