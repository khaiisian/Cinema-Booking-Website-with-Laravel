@section('header-link')
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
        <div class="w-96 mx-auto border border-gray-300 mt-4 rounded-lg overflow-hidden mb-8">
            <h2 class="text-2xl font-bold text-white text-center py-4 bg-[#cd1f30] ">Showtime
                Management</h2>
            <form action="/showtime/update" method="POST" class="flex flex-col px-8 py-3">
                @csrf
                <input type="hidden" name="showtime_id" value="{{$showtime->showtime_id}}">
                <label for=" movies" class="font-semibold text-lg text-gray-700">Movie</label>
                <select name="movies" class="movies rounded-md py-0 w-[55%] mb-4" id="movies" required>
                    <option value="0">Select a movie</option>
                    @foreach ($movies as $movie)
                    <option value="{{$movie->movie_id}}" {{$showtime->movie_id==$movie->movie_id?'selected':''}}>{{
                        $movie->movie_title }}</option>
                    @endforeach
                </select>

                <label for="theaters" class="font-semibold text-lg text-gray-700">Theater</label>
                <select name="theaters" class="theaters rounded-md py-0 w-[55%] mb-4 " id="theaters" required>
                    <option value="0">Select a theater</option>
                    @foreach ($theaters as $theater)
                    <option value="{{$theater->theater_id}}" {{$showtime->
                        theater_id==$theater->theater_id?'selected':''}}>
                        {{
                        $theater->theater_name }}</option>
                    @endforeach
                </select>

                <label class="block font-semibold text-lg text-gray-700" for="showtime_start">Showtime Start</label>
                <div class="flex w-[40%] mb-4">
                    <input type="time" id="showtime_start"
                        class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 "
                        min="09:00" max="18:00" value="{{$showtime->showtime_start}}" name="showtime_start" required>
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
                        min="09:00" max="18:00" value="{{$showtime->showtime_end}}" name="showtime_end" required>
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
                        name="showtime_date" value="{{$showtime->showtime_date}}" required>
                </div>

                <x-primary-button id="update" class="w-20 px-4 mt-5 mb-4 ml-2">Update</x-primary-button>
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
    });
</script>