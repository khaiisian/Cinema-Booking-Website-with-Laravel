@section('header-link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fengyuanchen/datepicker@0.6.5/dist/datepicker.min.css"
    integrity="sha256-b88RdwbRJEzRx95nCuuva+hO5ExvXXnpX+78h8DjyOE=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
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
            <form action="/movie/update" method="POST" class="flex flex-col px-8 py-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">

                {{-- Movie Title --}}
                <label class="font-semibold text-lg text-gray-700" for="movie_title">Movie Title</label>
                <input type="text" name="movie_title" id="movie_title" value="{{ $movie->movie_title }}"
                    class="rounded-md mb-4 h-8">

                {{-- Movie Content --}}
                <label class="font-semibold text-lg text-gray-700" for="movie_content">Movie Content</label>
                <textarea name="movie_content" id="movie_content" cols="30" rows="3"
                    class="rounded-md mb-4">{{ $movie->movie_content }}</textarea>

                {{-- Movie Image --}}
                <label class="block font-semibold text-lg text-gray-700" for="movie_image">Image</label>
                <div class="w-28 rounded-lg overflow-hidden my-2">
                    <img src="{{asset('images/'. $movie->movie_image)}}" alt="">
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
                            class="rounded-md mb-4 max-w-full h-8" value="{{ $movie->movie_duration }}">
                    </div>
                    <div class="w-[45%]">
                        <label class="font-semibold text-lg text-gray-700" for="release_date">Release Date</label>
                        <input type="text" data-toggle="datepicker" id="release_date"
                            class="rounded-md mb-4 max-w-full h-8" value="{{ $movie->release_date }}"
                            name="release_date">
                    </div>
                </div>

                {{-- Movie Status --}}
                <label class="font-semibold text-lg text-gray-700" for="status">Status</label>
                <div class="flex gap-x-5 mb-4">
                    <div class="flex items-center gap-x-2">
                        <input type="radio" name="status" id="showing" value="Showing"
                            {{$movie->movie_status==='Showing' ?'checked':''}}> Showing
                    </div>
                    <div class="flex items-center gap-x-2">
                        <input type="radio" name="status" id="upcoming" value="Upcoming"
                            {{$movie->movie_status==='Upcoming' ?'checked':''}}> Upcoming
                    </div>
                </div>

                {{-- Age Rating --}}
                <label class="font-semibold text-lg text-gray-700" for="age_rating">Age Rating</label>
                <input type="text" name="age_rating" id="age_rating" class="rounded-md mb-4 h-8 w-[45%]"
                    value="{{ $movie->age_rating }}">

                {{-- Genres --}}
                <label for="genre" class="font-semibold text-lg text-gray-700">Genres</label>
                <div class="flex items-start gap-x-3">
                    <div class="w-[50%] flex flex-wrap genre_div">
                        @foreach ($movie->genres as $mgenre)
                        <select name="genres[]" class="genres rounded-md h-8 py-0 w-[96%] mb-2">
                            <option value="0">Select a genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{$genre->genre_id}}" {{ $mgenre->genre_id===$genre->genre_id ? 'selected'
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
                    <button id="genre_minus" type="button" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="grey" class="bi bi-dash-circle-fill w-8"
                            viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                </div>

                <x-primary-button id="update_btn" class="update_btn" class="w-20 px-4 mt-5 mb-4 ml-2">Update
                </x-primary-button>
            </form>

        </div>
    </div>
    @section('extra-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fengyuanchen/datepicker@0.6.5/dist/datepicker.min.js"
        integrity="sha256-/7FLTdzP6CfC1VBAj/rsp3Rinuuu9leMRGd354hvk0k=" crossorigin="anonymous"></script>
    @endsection
</x-app-layout>
<script>
    $(document).ready(function () {            
    $('[data-toggle="datepicker"]').datepicker();
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

    $(document).on('click', '#update_btn', function (e) {
        e.preventDefault();
        
        let selected_genres = [];
        let genre_duplicate = false;

        $('.genres').each(function () {
            let selected_genre = $(this).val();
            if (selected_genres.includes(selected_genre)) {
                genre_duplicate = true;
                return false;
            }
            selected_genres.push(selected_genre);
        });

        console.log(selected_genres);
        if (genre_duplicate) {
            alert('Please select different genres');
            return;
        }

        Swal.fire({
            title: "Update the movie!",
            text: "Are you sure to update the movie?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("Are you sure to update the movie?");
                $(this).closest('form').submit();
            } else {
                console.log("Updating movie is cancelled.");
            }
        });
    });
});
</script>