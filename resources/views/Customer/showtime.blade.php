@php
use Carbon\Carbon;
$day1 = Carbon::now();
$day2 = $day1->copy()->addDay();
$day3 = $day1->copy()->addDay(2);
$day4 = $day1->copy()->addDay(3);
@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    const baseAssetUrl = "{{ asset('') }}"; 
</script>

<x-app-layout>
    <header class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-10 flex justify-center items-center gap-4">
        <h2 class="text-3xl font-bold text-[#ffbf00]">Movie Showtimes</h2>
    </header>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
        <div class="bg-gray-200 lg:px-0 py-1 max-w-4xl mx-auto flex justify-evenly items-center rounded-lg btn">
            <button class="w-[24%] py-2 btn bg-gray-50 rounded-md act" id="day1_btn">{{ $day1->format('F j, l')
                }}</button>
            <button class="w-[24%] py-2 btn" id="day2_btn">{{ $day2->format('F j, l') }}</button>
            <button class="w-[24%] py-2 btn" id="day3_btn">{{ $day3->format('F j, l') }}</button>
            <button class="w-[24%] py-2 btn" id="day4_btn">{{ $day4->format('F j, l') }}</button>
        </div>

        <div class="max-w-5xl mx-auto mt-5 lg:px-6" id="showtimes_blog">
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function showtime_ajax(date){
                if(date==undefined){
                    date='day1';
                }
                console.log(date);
                $.ajax({
                    type: 'POST',
                    url: '/before/showtimes/ajax',
                    data: {
                        _token: "{{ csrf_token() }}",
                        date: date
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#showtimes_blog').html(response.data);
                        console.log(response.data)
                    }
                })
            }

            $('#day1_btn').click(function(){
                date = 'day1';
                console.log('click', date)
                $(".btn").removeClass('bg-gray-50 rounded-md act');
                $(this).addClass('bg-gray-50 rounded-md act');
                showtime_ajax(date);
            })

            $('#day2_btn').click(function(){
                date = 'day2';
                console.log('click', date)
                $(".btn").removeClass('bg-gray-50 rounded-md act');
                $(this).addClass('bg-gray-50 rounded-md act');
                showtime_ajax(date);
            })

            $('#day3_btn').click(function(){
                date = 'day3';
                console.log('click', date)
                $(".btn").removeClass('bg-gray-50 rounded-md act');
                $(this).addClass('bg-gray-50 rounded-md act');
                showtime_ajax(date);
            })

            $('#day4_btn').click(function(){
                date = 'day4';
                console.log('click', date)
                $(".btn").removeClass('bg-gray-50 rounded-md act');
                $(this).addClass('bg-gray-50 rounded-md act');
                showtime_ajax(date);
            })

            showtime_ajax();
        })
        
    </script>
</x-app-layout>