@section('header-link')
<link href="DataTables/datatables.min.css" rel="stylesheet">
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

    <div class="w-full bg-white py-3">
        <div class="max-w-4xl bg-white mx-auto dt_table mt-28">
            <div class="max-w-7xl bg-white mx-auto dt_table mt-28">
                <h2 class="text-4xl text-gray-700 font-bold">Seat Type Table</h2>
                <hr class="mb-4 mt-2 border-[#8a8a8a]">
                {{-- Search Movie <input type="text" name="searchMovie" id="searchMovie" onchange="searhMovies()"
                    class="h-6"> --}}
                {{-- {{ $movies }} --}}
                <table class="" id="data_table">
                    <thead class="">
                        <tr class="bg-[#cd1f30] text-white ">
                            <th>
                                <p class="text-center">Contact ID</p>
                            </th>
                            <th>
                                <p class="text-center">User ID</p>
                            </th>
                            <th>
                                <p class="text-center">User Name</p>
                            </th>
                            <th>
                                <p class="text-center">Contact Title</p>
                            </th>
                            <th>
                                <p class="text-center">Contact Message</p>
                            </th>
                            <th>
                                <p class="text-center">
                                    Actions
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($contact_msgs as $contact_msg)
                        <tr class="border-b">
                            <td>
                                <p class="text-center">{{ $contact_msg->contact_id }}</p>
                            </td>
                            <td>
                                <p class="text-center">{{ $contact_msg->user->u_id }}</p>
                            </td>
                            <td>
                                <p class="text-center">{{ $contact_msg->user->u_name }}</p>
                            </td>
                            <td>
                                <p class="text-center">{{ $contact_msg->contact_title }}</p>
                            </td>
                            <td>
                                <p class="text-center">{{ $contact_msg->contact_msg }}</p>
                            </td>
                            <td class="">
                                <div class="flex gap-x-4 justify-center">
                                    {{-- <form action="{{route('seat_type_edit', ['id'=>$contact_msg->contact_id])}}">
                                        @csrf
                                        <button
                                            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-pencil-fill w-6" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                            </svg>
                                        </button>
                                    </form> --}}
                                    <form action="{{route('contact_delete', ['id'=>$contact_msg->contact_id])}}">
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
    </div>

    @section('extra-scripts')
    <script src="DataTables/datatables.min.js"></script>
    @endsection
</x-app-layout>
<script>
    $(document).ready(function () {                
        let table = new DataTable('#data_table');
    });
</script>