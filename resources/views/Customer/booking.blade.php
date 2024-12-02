@php
use Carbon\Carbon;
$day1 = Carbon::now();
$day2 = $day1->copy()->addDay();
$day3 = $day1->copy()->addDays(2);
$day4 = $day1->copy()->addDays(3);

@endphp
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
</head>

<body class="font-sans antialiased bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10 px-1">
        <div id="top_bar" class="pb-4">
            <a href="" class="flex justify-center items-center w-9 rounded-md p-1 bg-black">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left"
                    viewBox="0 0 16 16" class="fill-white">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </a>
        </div>
        <div id="detail_body" class=" flex justify-between">
            <div id="movie_side" class="w-[34%] bg-[#333333] p-6 rounded-lg">
                <div id="movie_img" class="h-96 mx-auto rounded-lg overflow-hidden">
                    <img class="w-full h-full" src="{{asset('images/'.$movie->movie_image)}}"
                        alt="{{$movie->movie_image}}">
                </div>
                <div id="movie_info" class=" p-3">
                    <h2 class="text-xl font-bold text-[#ffbf00]">{{ $movie->movie_title }}</h2>
                    <p class="text-white">{{ $movie->movie_content }}</p>
                </div>
            </div>
            <div id="booking_side" class="w-[65%] min-h-screen rounded-lg overflow-hidden px-3">
                <div class="flex justify-between text-white" id=" showtimes">
                    <button class="w-[23%] h-16 bg-[#B90000] rounded-lg btn" id="day1btn">{{ $day1->format('F j')
                        }}</button>
                    <button class="w-[23%] h-16 bg-[#333333] rounded-lg btn" id="day2btn">{{ $day2->format('F j')
                        }}</button>
                    <button class="w-[23%] h-16 bg-[#333333] rounded-lg btn" id="day3btn">{{ $day3->format('F j')
                        }}</button>
                    <button class="w-[23%] h-16 bg-[#333333] rounded-lg btn" id="day4btn">{{ $day4->format('F j')
                        }}</button>
                </div>

                <div class="w-[100%] min-h-44 mt-4 rounded-lg bg-[#333333] py-3 px-3" id="showtime_info">
                    {{-- @include('Customer.booking_showtime') --}}
                </div>

                <div
                    class="w-[100%] min-h-screen bg-[#333333] rounded-lg overflow-hidden mt-4 py-14 flex flex-col justify-center">
                    <div id="std_seats" class="w-[90%] mx-auto grid grid-cols-12 gap-x-0 gap-y-10">
                        @foreach ($seats as $seat)
                        @if ($seat->seat_type_id==1|| $seat->seat_type_id==2)
                        <div>
                            <div class="w-7 h-8 bg-gray-200 mx-auto available_seat" id="seat{{$seat->seat_id}}"
                                data-id="{{$seat->seat_id}}"></div>
                            <p class="text-center text-gray-200">{{ $seat->seat_code }}</p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div id="exp_seats" class="w-[85%] mx-auto grid grid-cols-10 gap-x-0 gap-y-10 mt-10">
                        @foreach ($seats as $seat)
                        @if ($seat->seat_type_id==3|| $seat->seat_type_id==4)
                        <div>
                            <div class="w-7 h-8 bg-gray-200 mx-auto available_seat" id="seat{{$seat->seat_id}}"></div>
                            <p class="text-center text-gray-200">{{ $seat->seat_code }}</p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{-- {{ $showtimes }} --}}
    </div>

    <script>
        $(document).ready(function () {
            function ajaxShowtime(date){
                if(date==undefined){
                    date='day1';
                }
                // console.log(date);
                $.ajax({
                    type: 'POST',
                    url: '/movies/ajaxShowtimes',
                    data: {
                        _token: "{{ csrf_token() }}",
                        date: date,
                        id: {{$id}}
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#showtime_info').html(response.data);
                        // console.log(response.data)
                        let unavailable_seats = response.unavailable_seats;
                        unavailable_seats.forEach(seat => {
                        $('#seat'+seat.seat_id).removeClass('bg-gray-200 available_seat');
                        $('#seat'+seat.seat_id).addClass('bg-[#B90000] booked_seat');
                        });

                        let available_seats = response.available_seats;
                        available_seats.forEach(seat=>{
                        $('#seat'+seat.seat_id).addClass('bg-gray-200 available_seat');
                        $('#seat'+seat.seat_id).removeClass('bg-[#B90000] booked_seat');
                        })
                        }
                })
            }

            $('#day1btn').click(function () { 
                ajaxShowtime('day1');
                $('.btn').removeClass('bg-[#B90000]');
                $('.btn').addClass('bg-[#333333]');
                $(this).addClass('bg-[#B90000]');         
            });
            $('#day2btn').click(function () { 
                ajaxShowtime('day2'); 
                $('.btn').removeClass('bg-[#B90000]');
                $('.btn').addClass('bg-[#333333]');
                $(this).addClass('bg-[#B90000]');           
            });
            $('#day3btn').click(function () { 
                ajaxShowtime('day3');  
                $('.btn').removeClass('bg-[#B90000]');
                $('.btn').addClass('bg-[#333333]');
                $(this).addClass('bg-[#B90000]');         
            });
            $('#day4btn').click(function () { 
                ajaxShowtime('day4'); 
                $('.btn').removeClass('bg-[#B90000]');
                $('.btn').addClass('bg-[#333333]');
                $(this).addClass('bg-[#B90000]');           
            });

            function showUnavailable(){
                let unavailable_seats = @json($unavailable_seats);
                unavailable_seats.forEach(seat => {
                    $('#seat'+seat.seat_id).removeClass('bg-gray-200 available_seat');
                    $('#seat'+seat.seat_id).addClass('bg-[#B90000] booked_seat');
                });
                let available_seats = @json($available_seats);
                available_seats.forEach(seat => {
                    $('#seat'+seat.seat_id).addClass('bg-gray-200 available_seat');
                    $('#seat'+seat.seat_id).removeClass('bg-[#B90000] booked_seat');
                });
            }

            showUnavailable();
            ajaxShowtime();

            let selected_seats = [];
            $('.available_seat').addClass('testing');

            $('.available_seat').click(function(){
                const seat_id = $(this).data('id');
                console.log('seat id', seat_id);

                if(selected_seats.includes(seat_id)){
                    selected_seats= selected_seats.filter(id=>id!=seat_id)
                } else {
                    selected_seats.push(seat_id);
                }

                console.log('selected seats', selected_seats)
            })


            
        })

        $(document).on('click', '.showtime_btn', function(){
            let showtime_id = $('.showtime_btn').data('id');
            console.log("SHOW TIME ID", showtime_id)
            $.ajax({
                type: 'POST',
                url: '/booking/seat_available',
                data: {
                    _token: "{{ csrf_token() }}",
                    showtime_id: showtime_id,
                },
                dataType: 'json',
                success:function(response){
                    let unavailable_seats = response.unavailable_seats;
                    unavailable_seats.forEach(seat => {
                    $('#seat'+seat.seat_id).removeClass('bg-gray-200 available_seat');
                    $('#seat'+seat.seat_id).addClass('bg-[#B90000] booked_seat');
                    });

                    let available_seats = response.available_seats;
                    available_seats.forEach(seat=>{
                    $('#seat'+seat.seat_id).addClass('bg-gray-200 available_seat');
                    $('#seat'+seat.seat_id).removeClass('bg-[#B90000] booked_seat');
                    })
                }
            })
        })
    </script>
</body>

</html>