<div class="w-full flex justify-between">
    <div class="seat_layout w-[70%] py-8 bg-[#292929] rounded-xl">
        <div class="w-[90%] mx-auto mb-6">
            <select name="theater_id" id="theater_id" class="rounded-md h-9 py-0">
                <option value="1" selected>Theater A</option>
                <option value="2">Theater B</option>
            </select>
        </div>
        <div id="std_seats" class="w-[90%] mx-auto grid grid-cols-12 gap-x-0 gap-y-10">
            @foreach ($seats as $seat)
            @if ($seat->seat_type_id==1|| $seat->seat_type_id==2)
            @if ($seat->seat_status=='usable')
            <div>
                <div class="w-7 h-8 bg-green-500 mx-auto rounded-sm available_seat seats" id="seat{{$seat->seat_id}}"
                    data-id="{{$seat->seat_id}}"></div>
                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
            </div>
            @elseif($seat->seat_status=='maintenance')
            <div>
                <div class="w-7 h-8 bg-red-600 mx-auto rounded-sm available_seat seats" id="seat{{$seat->seat_id}}"
                    data-id="{{$seat->seat_id}}"></div>
                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
            </div>
            @endif
            @endif
            @endforeach
        </div>
        <div id="exp_seats" class="w-[85%] mx-auto grid grid-cols-10 gap-x-0 gap-y-10 mt-10">
            @foreach ($seats as $seat)
            @if ($seat->seat_type_id==3|| $seat->seat_type_id==4)
            @if ($seat->seat_status=='usable')
            <div>
                <div class="w-7 h-8 bg-green-500 mx-auto rounded-sm available_seat seats" id="seat{{$seat->seat_id}}"
                    data-id="{{$seat->seat_id}}"></div>
                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
            </div>
            @elseif($seat->seat_status=='maintenance')
            <div>
                <div class="w-7 h-8 bg-red-600 mx-auto rounded-sm available_seat seats" id="seat{{$seat->seat_id}}"
                    data-id="{{$seat->seat_id}}"></div>
                <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
            </div>
            @endif
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