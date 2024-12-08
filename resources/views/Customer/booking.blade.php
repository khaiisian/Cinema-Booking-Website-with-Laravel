@php
use Carbon\Carbon;
$day1 = Carbon::now();
$day2 = $day1->copy()->addDay();
$day3 = $day1->copy()->addDays(2);
$day4 = $day1->copy()->addDays(3);

$current_time = now()->format('Y-m-d H:i');
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
            <div id="booking_side" class="w-[66%] min-h-screen rounded-lg overflow-hidden px-3">
                <div class="flex justify-between text-white" id=" showtimes">
                    <button class="w-[23%] h-16 bg-[#B90000] rounded-lg btn" data-id="{{$day1->format('Y-m-d')}}"
                        id="day1btn">{{
                        $day1->format('F j')
                        }}</button>
                    <button class="w-[23%] h-16 bg-[#333333] rounded-lg btn" data-id="{{$day2->format('Y-m-d')}}"
                        id="day2btn">{{
                        $day2->format('F j')
                        }}</button>
                    <button class="w-[23%] h-16 bg-[#333333] rounded-lg btn" data-id="{{$day3->format('Y-m-d')}}"
                        id="day3btn">{{
                        $day3->format('F j')
                        }}</button>
                    <button class="w-[23%] h-16 bg-[#333333] rounded-lg btn" data-id="{{$day4->format('Y-m-d')}}"
                        id="day4btn">{{
                        $day4->format('F j')
                        }}</button>
                </div>

                <div class="w-[100%] min-h-44 mt-4 rounded-lg bg-[#333333] py-3 px-3" id="showtime_info">
                    {{-- @include('Customer.booking_showtime') --}}

                </div>

                <div
                    class="w-[100%] min-h-screen bg-[#333333] rounded-lg overflow-hidden mt-4 py-14 flex flex-col justify-center">

                    {{-- Seat satatus --}}
                    <div class="flex gap-x-6 px-6 mb-6 justify-between">
                        <div class="flex items-center gap-x-2 text-gray-50">
                            <div class="w-5 h-6 bg-gray-50 mx-auto rounded-sm"></div>
                            <p class="text-sm">Available seats</p>
                        </div>
                        <div class="flex items-center gap-x-2 text-gray-50">
                            <div class="w-5 h-6 bg-[#ffbf00] mx-auto rounded-sm"></div>
                            <p class="text-sm">Selected seats</p>
                        </div>
                        <div class="flex gap-x-2 items-center text-gray-50">
                            <div class="w-5 h-6 bg-[#B90000] mx-auto rounded-sm"></div>
                            <p class="text-sm">Booked seats</p>
                        </div>
                        <div class="flex gap-x-2 items-center text-gray-50">
                            <div class="w-5 h-6 bg-gray-500 mx-auto rounded-sm"></div>
                            <p class="text-sm">Overdue seats</p>
                        </div>
                    </div>

                    {{-- Seat Types --}}
                    <div class="flex justify-start gap-x-2 text-gray-50 text-sm px-4 mb-12">
                        <div>
                            <p><span class="border rounded-lg border-gray-500 px-2 py-0"> A001-C012</span>
                                Standard(10000)
                            </p>
                        </div>
                        <div>
                            <p><span class="border rounded-lg border-gray-500 px-2 py-0"> D001-E012</span>
                                Premium(15000)
                            </p>
                        </div>
                        <div>
                            <p><span class="border rounded-lg border-gray-500 px-2 py-0"> F001-F010</span>
                                VIP(20000)
                            </p>
                        </div>
                        <div>
                            <p><span class="border rounded-lg border-gray-500 px-2 py-0"> G001-G010</span>
                                Couple(23000)
                            </p>
                        </div>
                    </div>

                    <form action="/booking/booking_details" method="POST">
                        <div id="std_seats" class="w-[90%] mx-auto grid grid-cols-12 gap-x-0 gap-y-10">
                            @foreach ($seats as $seat)
                            @if ($seat->seat_type_id==1|| $seat->seat_type_id==2)
                            <div>
                                <div class="w-7 h-8 bg-gray-50 mx-auto rounded-sm available_seat seats"
                                    id="seat{{$seat->seat_id}}" data-id="{{$seat->seat_id}}"></div>
                                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div id="exp_seats" class="w-[85%] mx-auto grid grid-cols-10 gap-x-0 gap-y-10 mt-10">
                            @foreach ($seats as $seat)
                            @if ($seat->seat_type_id==3|| $seat->seat_type_id==4)
                            <div>
                                <div class="w-7 h-8 bg-gray-50 mx-auto rounded-sm available_seat seats"
                                    id="seat{{$seat->seat_id}}" data-id="{{$seat->seat_id}}"></div>
                                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="mt-16 min-w-[100%] flex justify-end px-20">
                            @csrf
                            <input type="hidden" name="showtime_id" id="showtime_id">
                            <input type="hidden" name="selectedSeats" id="selectedSeats">
                            {{-- <x-primary-button id="book_btn">
                                Book
                            </x-primary-button> --}}
                            <x-primary-button type="submit" id="book_btn">
                                Book
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{-- {{ $showtimes }} --}}
    </div>

    <script>
        let selected_seats = [];
        $(document).ready(function () {

            // Properly handle showtime_id
            let showtime_id = {!! isset($showtime_id) ? json_encode($showtime_id) : 'null' !!};

            let showtime_dates = @json($showtime_date);
            let showtime_date = showtime_dates[0];
            if(showtime_date){
                $('.btn').removeClass('bg-[#B90000] bg-[#333333]');
                $('.btn').addClass('bg-[#333333]');
                $('button[data-id="'+showtime_date+'"]').addClass('bg-[#B90000]');
            console.log(showtime_date)
            }

            function ajaxShowtime(date) {             
                let data = {
                    _token: "{{ csrf_token() }}",
                    id: {{$id}}
                };
              
               if (date === undefined && showtime_id) {
                   console.log('Both date and showtime_id exist');
                    data.showtime_id = showtime_id;
                 } else if (date === undefined) {
                      data.date = 'day1';  // Provide a default value
                      console.log('Default date value assigned');
                 } else {
                     data.date = date;
                    console.log("Date provided:", date);
                }
             
               console.log('Data to send:', data);


                console.log(data)
                selected_seats =[];
                // console.log(date);
                $.ajax({
                    type: 'POST',
                    url: '/movies/ajaxShowtimes',
                    data: data,
                    // dataType: 'json',
                    success: function(response){
                        $('#showtime_info').html(response.data); // Showtime information

                        let unavailable_seats = response.unavailable_seats;
                        unavailable_seats.forEach(seat => {
                        $('#seat'+seat.seat_id).removeClass('bg-gray-50 bg-[#ffbf00] available_seat');
                        $('#seat'+seat.seat_id).addClass('bg-[#B90000] booked_seat');
                        });

                        let available_seats = response.available_seats;
                        available_seats.forEach(seat=>{
                        $('#seat'+seat.seat_id).addClass('bg-gray-50 bg-[#ffbf00] available_seat');
                        $('#seat'+seat.seat_id).removeClass('bg-[#B90000] bg-[#ffbf00] booked_seat');
                        })

                        let showtime_ids = response.show_id;
                        console.log(showtime_ids)
                        showtime_id = showtime_ids[0];
                        $('#showtime_id').val(showtime_id);
                        console.log("Value is", showtime_id)

                        let current_time = "{{$current_time}}";

                        let showtime_end = response.showtime_end;

                        console.log(current_time);

                        console.log(showtime_end);

                        if(current_time>showtime_end){

                            $('.seats').removeClass('bg-gray-50 available_seat bg-[#B90000] bg-[#ffbf00] booked_seat')

                            $('.seats').addClass('bg-gray-500 overdue_seat')
                            $('#book_btn').text('Overdue booking time')
                            $('#book_btn').prop('disabled', true)

                            console.log('current is lareger')

                        } else {
                            $('.seats').removeClass('bg-gray-500 overdue_seat')    
                            $('#book_btn').text('Book')
                            $('#book_btn').prop('disabled', false)                     
                        }
                        }
                })
            }

            // showUnavailable();
            ajaxShowtime();
            // $('.available_seat').addClass('testing');

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

            

            // console.log(showtime_id)

            // $('.available_seat').click(function(){
                
            // })
            $('#book_btn').click(function(e){
                if(selected_seats.length==0){
                    alert ("No seat selected");
                    e.preventDefault();
                    return;
                }
                location.reload();
            
            })


            
        })

        $(document).on('click', '.available_seat', function() {
    // Your click logic
                const seat_id = $(this).data('id');
                console.log('seat id', seat_id);

                if(selected_seats.includes(seat_id)){
                    selected_seats= selected_seats.filter(id=>id!=seat_id);
                    $(this).addClass('bg-gray-50');
                    $(this).removeClass('bg-[#ffbf00]');
                } else {
                    selected_seats.push(seat_id);
                    $(this).removeClass('bg-gray-50');
                    $(this).addClass('bg-[#ffbf00]');
                }

                console.log('selected seats', selected_seats)
                $('#selectedSeats').val(JSON.stringify(selected_seats));
                console.log("value", $('#selectedSeats').val())

        });

        $(document).on('click', '.showtime_btn', function(){
            let showtime_id = $('.showtime_btn').data('id');
            $('#showtime_id').val(showtime_id);
            console.log("Value isss", showtime_id);
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
                        $('#seat'+seat.seat_id).removeClass('bg-gray-50 bg-[#ffbf00] available_seat');
                        $('#seat'+seat.seat_id).addClass('bg-[#B90000] booked_seat');
                        });

                        let available_seats = response.available_seats;
                        available_seats.forEach(seat=>{
                        $('#seat'+seat.seat_id).addClass('bg-gray-50 bg-[#ffbf00] available_seat');
                        $('#seat'+seat.seat_id).removeClass('bg-[#B90000] bg-[#ffbf00] booked_seat');
                        })
                }
            })
        })
    </script>
</body>

</html>