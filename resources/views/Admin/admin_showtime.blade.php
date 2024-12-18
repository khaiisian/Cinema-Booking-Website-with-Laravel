<x-app-layout>
    <div class="w-full bg-white">
        <div class="max-w-5xl bg-white mx-auto dt_table">
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
                        <th>Is Deleted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($showtimes as $showtime)
                    <tr>
                        <td>{{ $showtime->showtime_id }}</td>
                        <td>{{ $showtime->movie_id }}</td>
                        <td>{{ $showtime->theater_id }}</td>
                        <td>{{ $showtime->showtime_start }}</td>
                        <td>{{ $showtime->showtime_end }}</td>
                        <td>{{ $showtime->showtime_date }}</td>
                        <td>{{ $showtime->is_deleted }}</td>
                        <td>
                            <div class="flex gap-x-2">
                                <button
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                    Edit
                                </button>
                                <button
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>