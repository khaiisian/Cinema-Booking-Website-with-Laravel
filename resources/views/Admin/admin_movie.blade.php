@section('header-link')
<link href="DataTables/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fengyuanchen/datepicker@0.6.5/dist/datepicker.min.css"
    integrity="sha256-b88RdwbRJEzRx95nCuuva+hO5ExvXXnpX+78h8DjyOE=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<x-app-layout>
    @if ($errors->any())
    <script>
        const errors = @json($errors->all());
        let errorMessage = "Validation Errors:\n";
        errors.forEach(error => {
            errorMessage += `- ${error}\n`;
        });
        alert(errorMessage);
    </script>
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
                {{-- <input type="text" name="age_rating" id="age_rating" class="rounded-md mb-4 h-8 w-[45%]"> --}}

                <select name="age_rating" class="age_rating rounded-md h-8 py-0 w-[55%] mb-2">
                    <option value="0">Select age rating</option>
                    <option value="PRG">PRG</option>
                    <option value="PG-13">PG-13</option>
                    <option value="PRT">PRT</option>
                    <option value="PR8">PR8</option>
                    <option value="PR">PR</option>
                    <option value="R">R</option>
                </select>


                <label for="genre" class="font-semibold text-lg text-gray-700">Genres</label>
                <div class="flex items-start gap-x-3">
                    <div class="w-[50%] flex flex-wrap genre_div">
                        <select name="genres[]" class="genres rounded-md h-8 py-0 w-[96%] mb-2" data-id=0>
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
                    <button id="genre_minus" type="button" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="grey" class="bi bi-dash-circle-fill w-8"
                            viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z" />
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
                        <th>Release Date</th>
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
                        <td class="border">
                            <div class="w-28"><img src="{{asset('images/'. $movie->movie_image )}}" alt=""
                                    class="w-full h-full" srcset=""></div>
                        </td>
                        <td class="border w-28 text-center">
                            <p>{{ $movie->release_date }}</p>
                        </td>
                        <td class="border">{{ $movie->movie_duration }}</td>
                        <td class="border">{{ $movie->movie_status }}</td>
                        <td class="border">{{ $movie->age_rating }}</td>
                        <td class="border">
                            @foreach ($movie->genres as $genre)
                            {{ $genre->genre }}@if(! $loop->last),&nbsp;
                            @endif
                            @endforeach</td>
                        <td class="border">
                            <div class="flex gap-x-4">
                                <form action="{{ route('movie_edit', ['id' => $movie->movie_id]) }}">
                                    @csrf
                                    <button
                                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="bi bi-pencil-fill w-6" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('movie_destroy', ['id' => $movie->movie_id]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="delete_movie bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-2 border-b-4 border-red-700 hover:border-red-500 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="bi bi-trash3-fill w-6" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
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

    @section('extra-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fengyuanchen/datepicker@0.6.5/dist/datepicker.min.js"
        integrity="sha256-/7FLTdzP6CfC1VBAj/rsp3Rinuuu9leMRGd354hvk0k=" crossorigin="anonymous"></script>
    <script src="DataTables/datatables.min.js"></script>
    @endsection


</x-app-layout>

<script>
    $(document).ready(function () {
        $('[data-toggle="datepicker"]').datepicker();
        let table = new DataTable('#data_table');
        // let genre_html_list=[];
        let counter = 0;
        $('#genre_add').click(function () { 
        let genre_html = `<select name="genres[]" class="genres rounded-md h-8 py-0 w-[96%] mb-2" data-id=${++counter}>
                    <option value="0">Select a genre</option>
                    @foreach ($genres as $genre)
                    <option value="{{$genre->genre_id}}">{{ $genre->genre }}</option>
                    @endforeach
                </select>`;

        $('.genre_div').append(genre_html);           
        });


        $('#genre_minus').click(function () { 
        if(counter!=0){
            console.log(counter)
            $('[data-id="' + counter + '"]').remove();
            counter--;
        }
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

        $(document).on('click', '.delete_movie', function (e) {
            e.preventDefault();
            Swal.fire({
            title: "Are you sure you want to delete the movie?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("Are you sure to delete the movie?");
                    $(this).closest('form').submit();
                } else {
                    console.log("Removing movie is confirmed.");
                }
            });
        });

});


</script>