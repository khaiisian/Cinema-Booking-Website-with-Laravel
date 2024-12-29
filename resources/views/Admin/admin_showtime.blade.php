@section('header-link')
<link href="DataTables/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fengyuanchen/datepicker@0.6.5/dist/datepicker.min.css"
    integrity="sha256-b88RdwbRJEzRx95nCuuva+hO5ExvXXnpX+78h8DjyOE=" crossorigin="anonymous">
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
    <div class="w-full bg-white">
        <div class="w-96 mx-auto border border-gray-300 mt-4 rounded-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Showtime
                Management</h2>
            <form action="/showtime/save" method="POST" class="flex flex-col px-8 py-3" enctype="multipart/form-data">
                @csrf
                <label for="movies" class="font-semibold text-lg text-gray-700">Movie</label>
                <select name="movies" class="movies rounded-md py-0 w-[55%] mb-4" id="movies" required>
                    <option value="0">Select a movie</option>
                    @foreach ($movies as $movie)
                    <option value="{{$movie->movie_id}}">{{ $movie->movie_title }}</option>
                    @endforeach
                </select>

                <label for="theaters" class="font-semibold text-lg text-gray-700">Theater</label>
                <select name="theaters" class="theaters rounded-md py-0 w-[55%] mb-4 " id="theaters" required>
                    <option value="0">Select a theater</option>
                    @foreach ($theaters as $theater)
                    <option value="{{$theater->theater_id}}">{{ $theater->theater_name }}</option>
                    @endforeach
                </select>

                <label class="block font-semibold text-lg text-gray-700" for="showtime_start">Showtime Start</label>
                <div class="flex w-[40%] mb-4">
                    <input type="time" id="showtime_start"
                        class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 "
                        min="09:00" max="18:00" value="00:00" name="showtime_start" required>
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md ">
                        <svg class="w-4 h-4 text-gray-500 aria-hidden=" true xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>


                <label class="block font-semibold text-lg text-gray-700" for="showtime_end">Showtime End</label>
                <div class="flex w-[40%] mb-4">
                    <input type="time" id="showtime_end"
                        class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 "
                        min="09:00" max="18:00" value="00:00" name="showtime_end" required>
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md ">
                        <svg class="w-4 h-4 text-gray-500 aria-hidden=" true xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>

                <div class="w-[45%]"><label class="font-semibold text-lg text-gray-700" for="showtime_date">Showtime
                        Date</label>
                    <input data-toggle="datepicker" class="rounded-md mb-4 max-w-full h-8" id="showtime_date"
                        name="showtime_date" required>
                </div>

                <x-primary-button id="save_btn" class="w-16 px-4 mt-5 mb-4 ml-2">Save</x-primary-button>
            </form>
        </div>
        <div class="max-w-6xl bg-white mx-auto dt_table mt-28">
            <h2 class="text-4xl text-gray-700 font-bold">Showtime Table</h2>
            <hr class="mb-4 mt-2 border-[#8a8a8a]">
            {{-- Search Movie <input type="text" name="searchMovie" id="searchMovie" onchange="searhMovies()"
                class="h-6"> --}}
            {{-- {{ $showtimes }} --}}
            <table class="" id="data_table">
                <thead class="">
                    <tr class="bg-[#cd1f30] text-white">
                        <th>Showtime ID</th>
                        <th>Movie ID</th>
                        <th>Theater ID</th>
                        <th>Showtime Start</th>
                        <th>Showtime End</th>
                        <th>Showtime Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($showtimes as $showtime)
                    <tr>
                        <td class="flex justify-center">{{ $showtime->showtime_id }}</td>
                        <td>{{ $showtime->movie->movie_title }}</td>
                        <td>{{ $showtime->theater->theater_name }}</td>
                        <td>{{ date('h:i A', strtotime($showtime->showtime_start)) }}</td>
                        <td>{{ date('h:i A', strtotime($showtime->showtime_end)) }}</td>
                        <td class="flex justify-center">{{ $showtime->showtime_date }}</td>
                        <td>
                            <div class="flex gap-x-4">
                                <form action="{{ route('showtime_edit', ['id' => $showtime->showtime_id]) }}">
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
                                <form action="{{ route('showtime_destroy', ['id' => $showtime->showtime_id]) }}">
                                    @csrf
                                    <button
                                        class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-2 border-b-4 border-red-700 hover:border-red-500 rounded">
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
    <script>
        $(document).ready(function () {     
        $('[data-toggle="datepicker"]').datepicker();   
        let table = new DataTable('#data_table');
    });
    </script>
</x-app-layout>