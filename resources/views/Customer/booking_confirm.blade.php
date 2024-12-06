<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    {{--
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('CSS/app.css') }}">
    @yield('css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     if (performance.getEntriesByType("navigation")[0]?.type === "back_forward") {
        //         window.location.reload(true);
        //     }
        // });
    </script>
</head>

<body>
    <div class="w-[35%] mx-auto mt-4 rounded-xl p-6 bg-[#333333]  text-white">
        @php
        $_showtime = $booking_details['showtime_info'][0];
        @endphp
        @if (session('booking_token'))
        <p>{{ session('booking_token') }}</p>
        @else
        <p>No session</p>
        @endif
        <h1 class="text-3xl font-semibold mb-4 text-[#ffbf00]">Booking Details</h1>
        {{-- hello
        {{ $_showtime }} --}}
        <div class="flex justify-center w-[100%] gap-x-4 mt-6">
            <div class="w-[45%] h-80 bg-white rounded-lg overflow-hidden img">
                {{-- {{ $_showtime['movie']['movie_image'] }} --}}
                <img class="h-full w-full" src="{{asset('images/'.$_showtime['movie']['movie_image'])}}" alt="">

            </div>
            <div class="w-[53%] h-96 booking_info ">
                <h2 class="text-2xl font-semibold mb-3">{{ $_showtime->movie->movie_title }}</h2>
                <div class="flex items-center p-1 h-6 ml-1 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="white" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                    </svg>
                    <p>&nbsp;: {{ $_showtime->showtime_start }} - {{ $_showtime->showtime_end }}</p>
                </div>
                <div class="flex items-center p-1 h-6 ml-1 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>
                    <p>&nbsp; : {{ \Carbon\Carbon::parse($_showtime->showtime_date)->format('F j, l') }}
                    </p>
                </div>
                <div class="flex items-center p-1 h-6 ml-1 mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                        <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0M1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0" />
                        <path
                            d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm6 8.73V7.27l-3.5 1.555v4.35zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                        <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6M7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                    </svg>
                    <p>&nbsp;: {{ $_showtime->theater->theater_name }}</p>
                </div>
                <p class="ml-1 mb-2">Seats :
                    @foreach ($booking_details['seats'] as $seat)
                    <span>{{ $seat->seat_code }} @if (!$loop->last), @endif </span>
                    @endforeach
                </p>
                <p class="ml-1 mb-2">Total : {{ $booking_details['total_price'] }} kyats</p>
                <form action="/booking/book" method="POST">
                    @csrf
                    <input type="hidden" name="booking_token" value="{{ session('booking_token') }}">
                    <input type="hidden" name="showtime_id" id="showtime_id" value="{{$_showtime->showtime_id}}">
                    <input type="hidden" name="seat_ids" id="seat_ids"
                        value="{{json_encode($booking_details['seats'])}}">
                    <input type="hidden" name="total_price" id="total_price"
                        value="{{$booking_details['total_price']}}">
                    <x-primary-button id="book_btn" class="mt-10 ml-2">
                        Book
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
    {{-- {{$seats}} --}}
    {{-- {{$total_price}} --}}
</body>

</html>