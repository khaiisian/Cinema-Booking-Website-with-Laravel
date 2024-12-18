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
        {{-- {{ $movies }} --}}
        <div class="w-96 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Movie
                Management</h2>
            <form action="/update_movie" method="POST" class="flex flex-col px-8 py-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="movie_id" value="{{ session('movie_data')['movie_id'] }}">

                {{-- Movie Title --}}
                <label class="font-semibold text-lg text-gray-700" for="movie_title">Movie Title</label>
                <input type="text" name="movie_title" id="movie_title"
                    value="{{ session('movie_data')['movie_title'] }}" class="rounded-md mb-4 h-8">

                {{-- Movie Content --}}
                <label class="font-semibold text-lg text-gray-700" for="movie_content">Movie Content</label>
                <textarea name="movie_content" id="movie_content" cols="30" rows="3"
                    class="rounded-md mb-4">{{ session('movie_data')['movie_content'] }}</textarea>

                {{-- Movie Image --}}
                <label class="block font-semibold text-lg text-gray-700" for="movie_image">Image</label>
                <div class="w-28 rounded-lg overflow-hidden my-2">
                    <img src="{{asset('images/'.session('movie_data')['movie_image'])}}" alt="">
                </div>
                {{-- <input type="hidden" name="pre_image" id="pre_image" value="{{$movie->movie_image}}"> --}}
                <input
                    class="block w-full text-md text-gray-200 border border-gray-300 rounded-lg cursor-pointer focus:outline-none bg-gray-700 placeholder-gray-400 mb-4"
                    id="movie_image" name="movie_image" type="file" accept="image/*">

                {{-- Movie Duration and Release Date --}}
                <div class="flex justify-between">
                    <div class="w-[45%]">
                        <label class="font-semibold text-lg text-gray-700" for="movie_duration">Duration (mins)</label>
                        <input type="number" name="movie_duration" id="movie_duration"
                            class="rounded-md mb-4 max-w-full h-8"
                            value="{{ session('movie_data')['movie_duration'] }}">
                    </div>
                    <div class="w-[45%]">
                        <label class="font-semibold text-lg text-gray-700" for="release_date">Release Date</label>
                        <input type="text" data-toggle="datepicker" id="release_date"
                            class="rounded-md mb-4 max-w-full h-8" value="{{ session('movie_data')['release_date'] }}"
                            name="release_date">
                    </div>
                </div>

                {{-- Movie Status --}}
                <label class="font-semibold text-lg text-gray-700" for="status">Status</label>
                <div class="flex gap-x-5 mb-4">
                    <div class="flex items-center gap-x-2">
                        <input type="radio" name="status" id="showing" value="Showing"
                            {{session('movie_data')['movie_status']==='Showing' ?'checked':''}}> Showing
                    </div>
                    <div class="flex items-center gap-x-2">
                        <input type="radio" name="status" id="upcoming" value="Upcoming"
                            {{session('movie_data')['movie_status']==='Upcoming' ?'checked':''}}> Upcoming
                    </div>
                </div>

                {{-- Age Rating --}}
                <label class="font-semibold text-lg text-gray-700" for="age_rating">Age Rating</label>
                <input type="text" name="age_rating" id="age_rating" class="rounded-md mb-4 h-8 w-[45%]"
                    value="{{ session('movie_data')['age_rating'] }}">

                {{-- Genres --}}
                <label for="genre" class="font-semibold text-lg text-gray-700">Genres</label>
                <div class="flex items-start gap-x-3">
                    <div class="w-[50%] flex flex-wrap genre_div">
                        @foreach (session('movie_data')['genres'] as $genre_id)
                        <select name="genres[]" class="genres rounded-md h-8 py-0 w-[96%] mb-2">
                            <option value="0">Select a genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{$genre->genre_id}}" {{ $genre_id===$genre->genre_id ? 'selected'
                                : '' }}>
                                {{ $genre->genre }}
                            </option>
                            @endforeach
                        </select>
                        @endforeach
                    </div>
                    <button type="button" id="genre_add" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="grey" class="bi bi-plus-circle-fill w-8"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                        </svg>
                    </button>
                </div>

                <x-primary-button id="update_btn" class="w-16 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
            </form>

        </div>
    </div>

    <script>
        $(document).ready(function () {
        $('#genre_add').click(function () { 
            let genre_html = `<select name="genres[]" class="genres rounded-md h-8 py-0 w-[96%] mb-2">
                        <option value="0">Select a genre</option>
                        @foreach ($genres as $genre)
                        <option value="{{$genre->genre_id}}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>`;

            $('.genre_div').append(genre_html);           
        });

        let selected_genres=[];
        let genre_duplicate = false;
        $('#save_btn').click(function (e) {
            $('.genres').each(function () {
                let selected_genre = $(this).val();
                if(selected_genres.includes(selected_genre)){
                    genre_duplicate = true;
                    return false;
                } 
                selected_genres.push(selected_genre);                 
            });
            
            console.log(selected_genres)  
            if(genre_duplicate){
                e.preventDefault();
                alert('please select different genres')
            } 
            
        });
    });
    </script>
</x-app-layout>