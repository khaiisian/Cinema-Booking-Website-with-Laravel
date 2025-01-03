<form action="{{route('seat_update')}}" method="POST">
    @csrf
    <div class="w-[85%] grid grid-cols-2 gap-y-3 mt-3 ml-2">
        @foreach ($seats as $seat)
        <input type="hidden" name="seat_id" value="{{$seat->seat_id}}">
        {{-- {{ $seat }} --}}
        <p>Seat Code:</p>
        {{ $seat->seat_code }}

        <p>Seat Type: </p>
        {{ $seat->seat_type->seat_type }}


        <p>Theater: </p>
        {{ $seat->theater->theater_name }}

        {{-- <P>{{ $seat->seat_code }}</P>
        <p>{{ $esat->seat_type->seat_type }}</p>
        <p>{{ $seat->theater->theater_name }} </p> --}}
        @endforeach
        <p>Status: </p>
        <select name="operational_status" id="operational_status" class="rounded-md h-8 py-0 operational_status">
            <option value="usable" {{$seat->seat_status=='usable'?'selected':''}}>Usable</option>
            <option value="maintenance" {{$seat->seat_status=='maintenance'?'selected':''}}>Maintenance</option>
        </select>
        <button type="submit"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2.5 mb-2 mt-2">Update</button>
    </div>
</form>