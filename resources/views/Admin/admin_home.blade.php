@section('header-link')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" href="{{ asset('CSS/barchart.css') }}">
@endsection
<x-app-layout>
    <div class="w-full bg-gray-100 py-10">
        <div class="w-[80%] m-auto min-h-screen">
            <h1 class="text-3xl text-gray-700 font-bold">Admin Dashboard</h1>
            <div class="dashboard grid grid-cols-4 gap-x-6 gap-y-7 px-1 py-3">
                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00] tracking-wide">Movies</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $movies->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Theater</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $theaters->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Seats</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $seats->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Bookings</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $bookings->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Seat Types</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $seat_types->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Customers</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $customers->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Admins</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $admins->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white min-h-32 flex flex-col border border-gray-200 rounded-lg overflow-hidden">
                    <div class="h-[40%] w-[100%] bg-red-600 flex items-center px-2">
                        <p class="text-xl font-semibold text-[#FFDE00]">Messages</p>
                    </div>
                    <div class="h-[60%] w-[100%] flex items-center px-3">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $messages->count() }}
                        </p>
                    </div>
                </div>

            </div>

            <div class="charts flex justify-center items-center gap-x-4 mt-4">
                <div id="container" class="w-[50%]"></div>
                <div id="revenue_container" class="w-[50%]"></div>
            </div>
        </div>
    </div>

    <script>
        const popular_movies = @json($popular_movies);
        const weekdates = @json($weekDates);
        const weekrevenue = @json($weekRevenue);

        console.log(weekdates);
        console.log(weekrevenue);

        let movie_title_lst = [];
        let total_booking_list = [];
        let weekDays = [];
        let revenues = [];

        $.map(weekdates, function (date) {
            weekDays.push(date.day)
        });
        $.map(weekrevenue, function (revenue) {
            revenues.push(revenue)
        });
        console.log(revenues[2])

        $.map(popular_movies, function (movie) {
            movie_title_lst.push(movie.movie_title);
        });

        $.map(popular_movies, function (movie) {
            total_booking_list.push(movie.total_booking_seats);
        });

        Highcharts.chart('revenue_container', {
            title: {
                text: 'Revenues of Each Week in 2025'
            },
        
            accessibility: {
                point: {
                    valueDescriptionFormat:
                        '{xDescription}{separator}{value} kyat(s)'
                }
            },
        
            xAxis: {
                title: {
                    text: 'Week Days'
                },
                categories: weekDays
            },
        
            yAxis: {
                type: 'logarithmic',
                title: {
                    text: 'Total income of each week day (in kyats)'
                }
            },
        
            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: '{point.y} kyat(s)'
            },
        
            series: [{
                name: 'Total Income',
                keys: ['y', 'color'],
                data: [
                    [parseInt(revenues[0]), '#0000ff'],
                    [parseInt(revenues[1]), '#8d0073'],
                    [parseInt(revenues[2]), '#ba0046'],
                    [parseInt(revenues[3]), '#d60028'],
                    [parseInt(revenues[4]), '#eb0014'],
                    [parseInt(revenues[5]), '#fb0004'],
                    [parseInt(revenues[6]), '#ff0000']
                ],
                color: {
                    linearGradient: {
                        x1: 0,
                        x2: 0,
                        y1: 1,
                        y2: 0
                    },
                    stops: [
                        [0, '#0000ff'],
                        [1, '#ff0000']
                    ]
                }
            }]
        });



        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Porpular Movies in 2025'
            },
            xAxis: {
                categories: movie_title_lst,
                crosshair: true,
                accessibility: {
                    description: 'Movies'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Booking Seats'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Total Booking Seats',
                    data: total_booking_list
                }
            ]
        });

    </script>
</x-app-layout>