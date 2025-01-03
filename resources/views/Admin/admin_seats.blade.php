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
        <div class="w-[75%] min-h-96 mx-auto rounded-lg px-4 py-2 overflow-hidden">
            <h2 class="text-3xl font-bold text-[#cd1f30] ">Seats
                Management</h2>
            <div class="flex gap-x-5 mb-4 border border-gray-300 py-2 px-3 rounded-lg mt-4">
                <div class="flex items-center gap-x-2">
                    <input type="radio" name="monitor_status" id="Booking" value="Booking">Booking Status
                </div>
                <div class="flex items-center gap-x-2">
                    <input type="radio" name="monitor_status" id="Operational" value="Operational">Operational Status
                </div>
            </div>
            <div class="w-full flex justify-between">
                <div class="seat_layout w-[70%] py-8 bg-[#292929] rounded-xl">
                    <div class="w-[90%] mx-auto mb-6">
                        <select name="" id="" class="rounded-md h-9 py-0">
                            <option value="">Theater A</option>
                            <option value="">Theater B</option>
                        </select>
                    </div>
                    <div id="std_seats" class="w-[90%] mx-auto grid grid-cols-12 gap-x-0 gap-y-10">
                        @foreach ($seats as $seat)
                        @if ($seat->seat_type_id==1|| $seat->seat_type_id==2)
                        @if ($seat->seat_status=='usable')
                        <div>
                            <div class="w-7 h-8 bg-gray-50 mx-auto rounded-sm available_seat seats"
                                id="seat{{$seat->seat_id}}" data-id="{{$seat->seat_id}}"></div>
                            <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
                        </div>
                        @elseif($seat->seat_status=='maintenance')
                        <div>
                            <div class="w-7 h-8 bg-gray-600 mx-auto rounded-sm available_seat seats"
                                id="seat{{$seat->seat_id}}" data-id="{{$seat->seat_id}}"></div>
                            <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    <div id="exp_seats" class="w-[85%] mx-auto grid grid-cols-10 gap-x-0 gap-y-10 mt-10">
                        @foreach ($seats as $seat)
                        @if ($seat->seat_type_id==3|| $seat->seat_type_id==4)
                        @if ($seat->seat_status=='usable')
                        <div>
                            <div class="w-7 h-8 bg-gray-50 mx-auto rounded-sm available_seat seats"
                                id="seat{{$seat->seat_id}}" data-id="{{$seat->seat_id}}"></div>
                            <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
                        </div>
                        @elseif($seat->seat_status=='maintenance')
                        <div>
                            <div class="w-7 h-8 bg-gray-600 mx-auto rounded-sm available_seat seats"
                                id="seat{{$seat->seat_id}}" data-id="{{$seat->seat_id}}"></div>
                            <p class="text-center text-gray-50">{{ $seat->seat_code }}</p>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="seat_info w-[28%]  border border-gray-300 bg-gray-50 rounded-lg px-4 py-4">
                    <p class="text-2xl font-semibold">Seat information</p>
                    <div class="" id="seat_info">
                        <p class="mt-3 seat_p">Select a seat to see information</p>
                        {{-- @include('Admin.seat_info') --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('.seats').click(function () { 
                let seat_id = $(this).data('id');
                console.log(seat_id);
                $.ajax({
                type: "POST",
                url: "/ajax/seat_info",
                data: {
                   _token: "{{ csrf_token() }}",
                  id: seat_id,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response.message);
                    console.log(response.seat);
                    $('#seat_info').html(response.data);
                  if (response.success) { // Assuming server returns a 'success' key
                      $('.seat_p').remove();
                 } 
                //  else {
                //        alert("Failed to fetch seat information.");
                //    }
                },
                // error: function (xhr, status, error) {
                //     console.error("Error: " + error);
                //     alert("An error occurred while fetching seat information.");
                // }
            });

            });
        });

        // $(document).on('click', '#operational_status',function () {
            
        // });
    </script>

</x-app-layout>