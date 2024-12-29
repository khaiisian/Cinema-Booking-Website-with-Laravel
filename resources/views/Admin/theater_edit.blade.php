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
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Theater
                Update</h2>
            <form action="{{route('theater_upate')}}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="theater_id" value="{{$theater->theater_id}}">
                <label class="font-semibold text-lg text-gray-700" for="theater_name">Theater Name</label>
                <input type="text" name="theater_name" id="theater_name" class="rounded-md mb-4 h-8"
                    value="{{$theater->theater_name}}">
                <label class="font-semibold text-lg text-gray-700" for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="rounded-md mb-4 h-8"
                    value="{{$theater->capacity}}">
                <x-primary-button id="save_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>