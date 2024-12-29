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
        <div class="w-96 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Movie
                Management</h2>
            <form action="{{route('genre_update')}}" method="POST" class="flex flex-col px-8 py-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="genre_id" value="{{$genre->genre_id}}">
                <label class="font-semibold text-lg text-gray-700" for="genre">Genre Name</label>
                <input type="text" name="genre" id="genre" class="rounded-md mb-4 h-8" value="{{$genre->genre}}">
                <label class="font-semibold text-lg text-gray-700" for="genre_description">Genre Description</label>
                <textarea name="genre_description" id="genre_description" cols="30" rows="3"
                    class="rounded-md mb-4">{{ $genre->genre_description }}</textarea>
                <x-primary-button id="save_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>