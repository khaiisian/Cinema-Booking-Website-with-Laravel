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
                    <input type="radio" name="monitor_status" class="monitor_status" id="Booking"
                        value="Booking">Booking Status
                </div>
                <div class="flex items-center gap-x-2">
                    <input type="radio" name="monitor_status" class="monitor_status" id="Operational"
                        value="Operational">Operational Status
                </div>
            </div>
            <div id="seat_management_body">
                {{-- @include('Admin.operational_seat'); --}}
                {{-- @include('Admin.bookingstatus_seat') --}}
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.seats', function () {
                let seat_id = $(this).data('id');
                console.log(seat_id);
                let status = 'operational';

                ajaxSeatInfo(seat_id, status);
            });

            $(document).on('click', '.booking_seats', function () {
                let seat_id = $(this).data('id');
                let status = '';
                if($(this).hasClass('Booked')){
                    status = 'Booked';
                } else if ($(this).hasClass('Available')){
                    status = 'Available';
                }
                ajaxSeatInfo(seat_id, status)
            });


            $(document).on('change', '#theater_id', function () {
                let theater_id = $('#theater_id').val();
                console.log(theater_id)
                $.ajax({
                    type: "POST",
                    url: "/ajaxTheater",
                    data: {
                        _token: "{{ csrf_token() }}",
                        theater_id:theater_id,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response.msg);
                        console.log(response.data);
                        const seats = response.data;

                        $('#std_seats').html('');
                        $('#exp_seats').html('');
                        

                        seats.forEach(seat => {
                        const seatHtml = `
                            <div>
                               <div class="w-7 h-8 mx-auto rounded-sm available_seat seats ${seat.seat_status === 'usable' ? 'bg-green-500' : 'bg-red-600'}"
                                   id="seat${seat.seat_id}" data-id="${seat.seat_id}">
                               </div>
                               <p class="text-center text-gray-50">${seat.seat_code}</p>
                           </div>
                       `;
                         
                       // Append to the appropriate container
                        if (seat.seat_type_id === 1 || seat.seat_type_id === 2) {
                            $('#std_seats').append(seatHtml);
                        } else if (seat.seat_type_id === 3 || seat.seat_type_id === 4) {
                            $('#exp_seats').append(seatHtml);
                        }
                        });

                    }
                });
            });
            
            // $('#showtime_date').change(function () { 
            //     let showtime_day = $('#showtime_date').val();
            //     $.ajax({
            //         type: "POST",
            //         url: "/admin/ajaxtheater_showtime",
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             showtime_day: showtime_day
            //         },
            //         dataType: "json",
            //         success: function (response) {
            //             // console.log(response.msg)
            //             // console.log(response.data)
            //             // console.log(response.showtime_id)

            //             $("#showtime_option").html('');
            //             let showtimes = response.showtimes
            //             // console.log(showtimes)

            //             showtimes.forEach(showtime => {
            //                 const optionHtml = `
            //                     <option value="${showtime.showtime_id}">
            //                         ${showtime.showtime_start}: &nbsp;${showtime.movie.movie_title}
            //                     </option>
            //                 `;
            //                 $('#showtime_option').append(optionHtml);

            //             });

            //             seats = response.seats;
            //             console.log(seats);
            //             unavailable_seats = response.unavailable_seats;

            //             $('#std_seats').html('');
            //             $('#exp_seats').html('');
            //             console.log(unavailable_seats);
            //             seats.forEach(seat => {
            //                 let seatHtml = ``;
            //                 if(unavailable_seats.length > 0 ){
            //                     unavailable_seats.forEach(unavailable_seat => {
            //                     seatHtml = `
            //                     <div>
            //                         <div class="w-7 h-8 mx-auto rounded-sm ${seat.seat_id === unavailable_seat.seat_id ? 'bg-[#B90000] booked' : 'bg-gray-50'}"
            //                             id="seat${seat.seat_id}" data-id="${seat.seat_id}">
            //                         </div>
            //                         <p class="text-center text-gray-50">${seat.seat_code}</p>
            //                     </div>
            //                     `;                            
            //                 }); 
            //                 } else {
            //                     seatHtml = `
            //                     <div>
            //                         <div class="w-7 h-8 mx-auto rounded-sm bg-gray-50"
            //                             id="seat${seat.seat_id}" data-id="${seat.seat_id}">
            //                         </div>
            //                         <p class="text-center text-gray-50">${seat.seat_code}</p>
            //                     </div>
            //                     `;
            //                 } 
            //             if (seat.seat_type_id === 1 || seat.seat_type_id === 2) {
            //                 $('#std_seats').append(seatHtml);
            //             } else if (seat.seat_type_id === 3 || seat.seat_type_id === 4) {
            //                 $('#exp_seats').append(seatHtml);
            //             }
            //             });


            //             let showtime = response.showtime;
            //             $('#theater_title').html('');
            //             console.log('theater', showtime.theater.theater_name)
            //             $('#theater_title').html(showtime.theater.theater_name);
            //         }
            //     });                
            // });

            // $('#showtime_option').change(function () { 
            //     let showtime_id = $('#showtime_option').val();
            //     console.log( 'Showtime_id' ,showtime_id);

            //     $.ajax({
            //         type: "POST",
            //         url: "/admin/showtimes_seats_ajax",
            //         data: {
            //             _token: "{{ csrf_token() }}",
            //             showtime_id: showtime_id,
            //         },
            //         dataType: "json",
            //         success: function (response) {
            //             console.log(response.msg)
            //             seats = response.seats;
            //             console.log(seats);
            //             unavailable_seats = response.unavailable_seats;

            //             $('#std_seats').html('');
            //             $('#exp_seats').html('');
            //             console.log(unavailable_seats);
            //             seats.forEach(seat => {
            //                 let seatHtml = ``;
            //                 if(unavailable_seats.length > 0 ){
            //                     unavailable_seats.forEach(unavailable_seat => {
            //                     seatHtml = `
            //                     <div>
            //                         <div class="w-7 h-8 mx-auto rounded-sm ${seat.seat_id === unavailable_seat.seat_id ? 'bg-[#B90000] booked' : 'bg-gray-50'}"
            //                             id="seat${seat.seat_id}" data-id="${seat.seat_id}">
            //                         </div>
            //                         <p class="text-center text-gray-50">${seat.seat_code}</p>
            //                     </div>
            //                     `;                            
            //                 }); 
            //                 } else {
            //                     seatHtml = `
            //                     <div>
            //                         <div class="w-7 h-8 mx-auto rounded-sm bg-gray-50"
            //                             id="seat${seat.seat_id}" data-id="${seat.seat_id}">
            //                         </div>
            //                         <p class="text-center text-gray-50">${seat.seat_code}</p>
            //                     </div>
            //                     `;
            //                 } 
            //             if (seat.seat_type_id === 1 || seat.seat_type_id === 2) {
            //                 $('#std_seats').append(seatHtml);
            //             } else if (seat.seat_type_id === 3 || seat.seat_type_id === 4) {
            //                 $('#exp_seats').append(seatHtml);
            //             }
            //             });
            //             let showtime = response.showtime;
            //             $('#theater_title').html('');
            //             console.log('theater is', showtime.theater.theater_name)
            //             $('#theater_title').html(showtime.theater.theater_name);
            //         }
            //     });
                
            // });

            $(document).on('change', '#showtime_date', function () {
                let showtime_day = $('#showtime_date').val();
                $.ajax({
                    type: "POST",
                    url: "/admin/ajaxtheater_showtime",
                    data: {
                        _token: '{{ csrf_token() }}',
                        showtime_day: showtime_day
                    },
                    dataType: "json",
                    success: function (response) {
                        // console.log(response.msg)
                        // console.log(response.data)
                        // console.log(response.showtime_id)

                        $("#showtime_option").html('');
                        let showtimes = response.showtimes
                        // console.log(showtimes)

                        showtimes.forEach(showtime => {
                            const optionHtml = `
                                <option value="${showtime.showtime_id}">
                                    ${showtime.showtime_start}: &nbsp;${showtime.movie.movie_title}
                                </option>
                            `;
                            $('#showtime_option').append(optionHtml);

                        });

                        seats = response.seats;
                        console.log(seats);
                        unavailable_seats = response.unavailable_seats;

                        $('#std_seats').html('');
                        $('#exp_seats').html('');
                        console.log(unavailable_seats);
                        seats.forEach(seat => {
                            let seatHtml = ``;
                            if(unavailable_seats.length > 0 ){
                                unavailable_seats.forEach(unavailable_seat => {
                                seatHtml = `
                                <div>
                                    <div class="w-7 h-8 mx-auto rounded-sm ${seat.seat_id === unavailable_seat.seat_id ? 'bg-[#B90000] booked' : 'bg-gray-50'}"
                                        id="seat${seat.seat_id}" data-id="${seat.seat_id}">
                                    </div>
                                    <p class="text-center text-gray-50">${seat.seat_code}</p>
                                </div>
                                `;                            
                            }); 
                            } else {
                                seatHtml = `
                                <div>
                                    <div class="w-7 h-8 mx-auto rounded-sm bg-gray-50"
                                        id="seat${seat.seat_id}" data-id="${seat.seat_id}">
                                    </div>
                                    <p class="text-center text-gray-50">${seat.seat_code}</p>
                                </div>
                                `;
                            } 
                        if (seat.seat_type_id === 1 || seat.seat_type_id === 2) {
                            $('#std_seats').append(seatHtml);
                        } else if (seat.seat_type_id === 3 || seat.seat_type_id === 4) {
                            $('#exp_seats').append(seatHtml);
                        }
                        });


                        let showtime = response.showtime;
                        $('#theater_title').html('');
                        console.log('theater', showtime.theater.theater_name)
                        $('#theater_title').html(showtime.theater.theater_name);
                    }
                }); 
            });

            $(document).on('change', '#showtime_option', function () {
                let showtime_id = $('#showtime_option').val();
                console.log( 'Showtime_id' ,showtime_id);

                $.ajax({
                    type: "POST",
                    url: "/admin/showtimes_seats_ajax",
                    data: {
                        _token: "{{ csrf_token() }}",
                        showtime_id: showtime_id,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response.msg)
                        seats = response.seats;
                        console.log(seats);
                        unavailable_seats = response.unavailable_seats;

                        $('#std_seats').html('');
                        $('#exp_seats').html('');
                        console.log(unavailable_seats);
                        seats.forEach(seat => {
                            let seatHtml = ``;
                            if(unavailable_seats.length > 0 ){
                                unavailable_seats.forEach(unavailable_seat => {
                                seatHtml = `
                                <div>
                                    <div class="w-7 h-8 mx-auto rounded-sm ${seat.seat_id === unavailable_seat.seat_id ? 'bg-[#B90000] booked' : 'bg-gray-50'}"
                                        id="seat${seat.seat_id}" data-id="${seat.seat_id}">
                                    </div>
                                    <p class="text-center text-gray-50">${seat.seat_code}</p>
                                </div>
                                `;                            
                            }); 
                            } else {
                                seatHtml = `
                                <div>
                                    <div class="w-7 h-8 mx-auto rounded-sm bg-gray-50"
                                        id="seat${seat.seat_id}" data-id="${seat.seat_id}">
                                    </div>
                                    <p class="text-center text-gray-50">${seat.seat_code}</p>
                                </div>
                                `;
                            } 
                        if (seat.seat_type_id === 1 || seat.seat_type_id === 2) {
                            $('#std_seats').append(seatHtml);
                        } else if (seat.seat_type_id === 3 || seat.seat_type_id === 4) {
                            $('#exp_seats').append(seatHtml);
                        }
                        });
                        let showtime = response.showtime;
                        $('#theater_title').html('');
                        console.log('theater is', showtime.theater.theater_name)
                        $('#theater_title').html(showtime.theater.theater_name);
                    }
                });
            });

            // $('#theater_id').change(function () { 
            //     let theater_id = $('#theater_id').val();
            //     console.log(theater_id)
            //     $.ajax({
            //         type: "POST",
            //         url: "/ajaxTheater",
            //         data: {
            //             _token: "{{ csrf_token() }}",
            //             theater_id:theater_id,
            //         },
            //         dataType: "json",
            //         success: function (response) {
            //             console.log(response.msg);
            //             console.log(response.data);
            //             const seats = response.data;

            //             const stdSeatsContainer = $('#std_seats');
            //             const expSeatsContainer = $('#exp_seats');

            //             stdSeatsContainer.html('');
            //             expSeatsContainer.html('');
                        

            //             seats.forEach(seat => {
            //             const seatHtml = `
            //                 <div>
            //                    <div class="w-7 h-8 mx-auto rounded-sm available_seat seats ${seat.seat_status === 'usable' ? 'bg-green-500' : 'bg-red-600'}"
            //                        id="seat${seat.seat_id}" data-id="${seat.seat_id}">
            //                    </div>
            //                    <p class="text-center text-gray-50">${seat.seat_code}</p>
            //                </div>
            //            `;
                         
            //            // Append to the appropriate container
            //             if (seat.seat_type_id === 1 || seat.seat_type_id === 2) {
            //                 stdSeatsContainer.append(seatHtml);
            //             } else if (seat.seat_type_id === 3 || seat.seat_type_id === 4) {
            //                 expSeatsContainer.append(seatHtml);
            //             }
            //        });

            //         }
            //     });
            // });

            // $('.seats').click(function () { 
            //     let seat_id = $(this).data('id');
            //     console.log(seat_id);
            //     $.ajax({
            //     type: "POST",
            //     url: "/ajax/seat_info",
            //     data: {
            //        _token: "{{ csrf_token() }}",
            //       id: seat_id,
            //     },
            //     dataType: "json",
            //     success: function (response) {
            //         console.log(response.message);
            //         console.log(response.seat);
            //         $('#seat_info').html(response.data);
            //         if (response.success) { // Assuming server returns a 'success' key
            //             $('.seat_p').remove();
            //         } 
            //     }   
            //     });

            // });

            $('.monitor_status').change(function () { 
                let monitor_status =$(this).val();
                console.log(monitor_status); 
                
                $.ajax({
                    type: "POST",
                    url: "/ajax/seat_monitor_status",
                    data: {
                        _token: "{{ csrf_token() }}",
                        monitor_status: monitor_status,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response.view)
                        console.log(response.data)
                        let seat_body = response.view;
                        $('#seat_management_body').html(seat_body);
                    }
                });
            });    
            
            function ajaxSeatInfo(seat_id, status){
                $.ajax({
                type: "POST",
                url: "/ajax/seat_info",
                data: {
                   _token: "{{ csrf_token() }}",
                  id: seat_id,
                  status: status,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response.message);
                    console.log(response.seat);
                    $('#seat_info').html(response.data);
                    if (response.success) { // Assuming server returns a 'success' key
                        $('.seat_p').remove();
                    } 
                }   
                });
            }
        });
    </script>

</x-app-layout>