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

    @if (session('validatedData'))
    <div>{{ session('validatedData') }}</div>
    @endif
    <div class="w-full bg-white py-10">
        {{-- {{ $movies }} --}}
        <div class="w-96 mx-auto border border-gray-300 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Movie
                Management</h2>
            <form action="/save/movies" method="POST" class="flex flex-col px-8 py-3" enctype="multipart/form-data">
                @csrf
                <label class="font-semibold text-lg text-gray-700" for="movie_title">Movie Title</label>
                <input type="text" name="movie_title" id="movie_title" class="rounded-md mb-4 h-8">

                <label class="font-semibold text-lg text-gray-700" for="movie_content">Movie Content</label>
                <textarea name="movie_content" id="movie_content" cols="30" rows="3" class="rounded-md mb-4"></textarea>


                <label class="block font-semibold text-lg text-gray-700" for="movie_image">Image</label>
                <input
                    class="block w-full text-md text-gray-200 border border-gray-300 rounded-lg cursor-pointer focus:outline-none bg-gray-700 placeholder-gray-400 mb-4"
                    id="movie_image" name="movie_image" type="file" accept="image/*">




                <div class="flex justify-between">
                    <div class="w-[45%]"><label class="font-semibold text-lg text-gray-700"
                            for="movie_duration">Duration</label>
                        <input type="number" name="movie_duration" id="movie_duration"
                            class="rounded-md mb-4 max-w-full h-8">
                    </div>

                    <div class="w-[45%]"><label class="font-semibold text-lg text-gray-700" for="release_date">Release
                            Date</label>
                        {{-- <input type="text" name="release_date" id="release_date" class="rounded-md"> --}}
                        <input data-toggle="datepicker" class="rounded-md mb-4 max-w-full h-8" name="release_date">
                    </div>
                </div>

                <label class="font-semibold text-lg text-gray-700" for="status">Status</label>
                <div class="flex gap-x-5 mb-4">
                    <div class="flex items-center gap-x-2"><input type="radio" name="status" id="showing"
                            value="Showing">Showing
                    </div>
                    <div class="flex items-center gap-x-2">
                        <input type="radio" name="status" id="upcoming" value="Upcoming">Upcoming
                    </div>
                </div>

                <label class="font-semibold text-lg text-gray-700" for="age_rating">Age Rating</label>
                <input type="text" name="age_rating" id="age_rating" class="rounded-md mb-4 h-8 w-[45%]">

                <label for="genre" class="font-semibold text-lg text-gray-700">Genres</label>
                <div class="flex items-start gap-x-3">
                    <div class="w-[50%] flex flex-wrap genre_div">
                        <select name="genres[]" class="genres rounded-md h-8 py-0 w-[96%] mb-2">
                            <option value="0">Select a genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{$genre->genre_id}}">{{ $genre->genre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="genre_add" type="button" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="grey" class="bi bi-plus-circle-fill w-8"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                        </svg>
                    </button>
                </div>

                <x-primary-button id="save_btn" class="w-16 px-4 mt-5 mb-4 ml-2">Save</x-primary-button>
            </form>
        </div>
        <div class="max-w-7xl bg-white mx-auto dt_table mt-28">
            <h2 class="text-4xl text-gray-700 font-bold">Movies Table</h2>
            <hr class="mb-4 mt-2 border-[#8a8a8a]">
            {{-- Search Movie <input type="text" name="searchMovie" id="searchMovie" onchange="searhMovies()"
                class="h-6"> --}}
            {{-- {{ $movies }} --}}
            <table class="" id="data_table">
                <thead class="">
                    <tr class="bg-[#cd1f30] text-white ">
                        <th>Movie ID</th>
                        <th>Movie Title</th>
                        <th>Movie Content</th>
                        <th>Image</th>
                        <th>Release date</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Age Rating</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($movies as $movie)
                    <tr>
                        <td class="border">{{ $movie->movie_id }}</td>
                        <td class="border">{{ $movie->movie_title }}</td>
                        <td class="border">{{ $movie->movie_content }}</td>
                        <td class="border">{{ $movie->movie_image }}</td>
                        <td class="border">{{ $movie->release_date }}</td>
                        <td class="border">{{ $movie->movie_duration }}</td>
                        <td class="border">{{ $movie->movie_status }}</td>
                        <td class="border">{{ $movie->age_rating }}</td>
                        <td class="border">
                            @foreach ($movie->genres as $genre)
                            {{ $genre->genre }}@if(! $loop->last),&nbsp;
                            @endif
                            @endforeach</td>
                        <td class="border">
                            <div class="flex gap-x-2">
                                <form action="/movie_select" method="POST">
                                    @csrf
                                    <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-400 text-white font-semibold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                        Edit
                                    </button>
                                </form>
                                <form action="/movie_delete" method="POST">
                                    @csrf
                                    <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
                                    <button
                                        class="bg-red-500 hover:bg-red-400 text-white font-semibold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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