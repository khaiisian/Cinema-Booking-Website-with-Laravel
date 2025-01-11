@php
use Carbon\Carbon;
$day1 = Carbon::now();
$day2 = $day1->copy()->addDay();
$day3 = $day1->copy()->addDays(2);
$day4 = $day1->copy()->addDays(3);
@endphp
<div class="w-full flex justify-between">
    <div class="seat_layout w-[70%] py-8 bg-[#292929] rounded-xl">
        <div class="w-[85%] mx-auto flex justify-start gap-x-10 mb-10">
            <div class="flex items-center">
                <p class="text-gray-100 font-semibold">Date &nbsp;:</p>
                <select name="showtime_date" id="showtime_date" class="rounded-md ml-2 h-9 pl-2 pr-6 py-0 text-sm">
                    <option value="1" selected>{{ $day1->format('F j, l') }}</option>
                    <option value="2">{{ $day2->format('F j, l') }}</option>
                    <option value="3">{{ $day3->format('F j, l') }}</option>
                    <option value="4">{{ $day4->format('F j, l') }}</option>
                </select>
            </div>
            <div class="flex items-center">
                <p class="text-gray-100 font-semibold">Showtime &nbsp;:</p>
                <select name="showtime_option" id="showtime_option" class="rounded-md ml-2 h-9 pl-2 pr-6 py-0 text-sm">
                    @foreach ($showtimes as $_showtime)
                    <option value="{{$_showtime->showtime_id}}">{{ $_showtime->showtime_start }}: &nbsp;{{
                        $_showtime->movie->movie_title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p id="theater_title" class="text-2xl text-gray-100 font-semibold text-center mb-5">{{
            $showtime->theater->theater_name }}</p>
        {{-- {{ $unavailable_seats }} --}}
        <div id="std_seats" class="w-[90%] mx-auto grid grid-cols-12 gap-x-0 gap-y-10">
            @foreach ($seats as $seat)
            @if (in_array($seat->seat_type_id, [1, 2]))
            @php
            $isUnavailable = $unavailable_seats->contains('seat_id', $seat->seat_id);
            @endphp
            <div>
                <div class="w-7 h-8 mx-auto rounded-sm booking_seats {{ $isUnavailable ? 'bg-[#B90000] Booked' : 'bg-gray-50 Available' }}"
                    id="seat{{ $seat->seat_id }}" data-id="{{ $seat->seat_id }}"></div>
                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
            </div>
            @endif
            @endforeach

        </div>
        <div id="exp_seats" class="w-[85%] mx-auto grid grid-cols-10 gap-x-0 gap-y-10 mt-10">
            @foreach ($seats as $seat)
            @if ($seat->seat_type_id == 3 || $seat->seat_type_id == 4)
            {{ $isUnavailable = false }}
            @foreach ($unavailable_seats as $unavailable_seat)
            @if ($seat->seat_id == $unavailable_seat->seat_id)
            {{ $isUnavailable = true }}
            @break
            @endif
            @endforeach
            <div>
                <div class="w-7 h-8 mx-auto rounded-sm booking_seats {{ $isUnavailable ? 'bg-[#B90000] Booked' : 'bg-gray-50 Available' }}"
                    id="seat{{ $seat->seat_id }}" data-id="{{ $seat->seat_id }}"></div>
                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="w-[28%]">
        <div class=" min-h-80 border border-gray-300 bg-gray-50 rounded-lg px-4 py-4">
            <p class="text-2xl font-semibold">Seat information</p>
            <div class="" id="seat_info">
                <p class="mt-3 seat_p">Select a seat to see information</p>
                {{-- @include('Admin.seat_info') --}}
            </div>
        </div>

    </div>
</div>