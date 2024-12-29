<x-app-layout>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
    <div class="w-full bg-white py-10">
        <div class="w-80 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Seat Types
                Management</h2>
            <form action="{{route('seat_type_update')}}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="seat_type_id" value="{{$seat_type->seat_type_id}}">
                <label class="font-semibold text-lg text-gray-700" for="seat_type">Seat Type Name</label>
                <input type="text" name="seat_type" id="seat_type" class="rounded-md mb-4 h-8"
                    value="{{$seat_type->seat_type}}">
                <label class="font-semibold text-lg text-gray-700" for="price">Price</label>
                <input type="number" name="price" id="price" class="rounded-md mb-4 h-8" value="{{$seat_type->price}}">
                <x-primary-button id="save_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>

    </div>
    <div class="w-3 bg-yellow-100">Hello</div>
</x-app-layout>