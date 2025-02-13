<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    const baseAssetUrl = "{{ asset('') }}"; 
</script>

<x-app-layout>
    <div id="test" class="h-10"></div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pt-10 flex justify-center items-center gap-4">
        <h2 class="text-3xl font-bold text-[#ffbf00]">Movie Library</h2>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10 px-1 flex justify-between items-center">
        <div class="border-[0.5px] border-gray-200 rounded-md p-[0.2rem] bg-gray-200">
            <button class="px-2 py-1 bg-white border-[0.5px] border-gray-100 rounded-md btn active"
                id="btnAllmovies">All
                Movies</button>
            <button class="px-2 py-1  rounded-md btn" id="btnShowing">Now Showing</button>
            <button class="px-2 py-1 rounded-md btn" id="btnComing">Upcoming</button>
        </div>
        <div class="flex items-center gap-x-1">
            <input type="text" placeholder="Search" id="searchbox" class=" w-50 h-10 rounded-md border-gray-300">
            <select name="" id="genre_id" class="h-10 rounded-md border-gray-300" onchange="search_function()">
                <option value="0">All Genres</option>
                @php
                $value=1;
                @endphp
                @foreach ($genres as $genre)
                <option value="{{$value}}">{{$genre->genre}}</option>
                @php
                $value++;
                @endphp
                @endforeach
            </select>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5" id="movie_container">

    </div>

    <script>
        function ajaxchanges(status, genre_id, search_value){
            if(search_value==undefined){
                search_value = null;
                // console.log("Search is null")
            }
            $.ajax({
                type: 'POST', 
                url: '/movies/ajax', 
                data: {
                    _token: "{{ csrf_token() }}", 
                    status: status,
                    genre_id: genre_id,
                    search_value: search_value 
                },
                dataType: 'json', 
                success: function(response){
                        $('#movie_container').html(response.data);
                        console.log(response.data)
                    }
            })
        }
    
        $('#btnAllmovies').click(function() {
            $('#searchbox').val('');
            $('#genre_id').prop('selectedIndex', 0);
            $('.btn').removeClass('active');
            $(this).addClass('active');  
            $('.btn').removeClass('bg-white border-[0.5px] border-gray-100');
            $(this).addClass('bg-white border-[0.5px] border-gray-100');  
            search_function();
        });

        $('#btnShowing').click(function(){ 
            $('#searchbox').val('');   
            $('#genre_id').prop('selectedIndex', 0);        
            $('.btn').removeClass('active');
            $(this).addClass('active');   
            $('.btn').removeClass('bg-white border-[0.5px] border-gray-100');
            $(this).addClass('bg-white border-[0.5px] border-gray-100');
            search_function();
        })

        $('#btnComing').click(function(){    
            $('#searchbox').val('');    
            $('#genre_id').prop('selectedIndex', 0);    
            $('.btn').removeClass('active');
            $(this).addClass('active');   
            $('.btn').removeClass('bg-white border-[0.5px] border-gray-100');
            $(this).addClass('bg-white border-[0.5px] border-gray-100');
            search_function();
        })
        

        function search_function(){
            $('#searchbox').off('input');
            let status=null;
            let genre_id = $('#genre_id').val();

            if($('#btnAllmovies').hasClass('active')){
                // console.log("All is active")
                ajaxchanges(status, genre_id);
                // if(genre_id!=0){
                //     // genre_id = "Exist";
                // }
                console.log('Genre_id:', genre_id)
                $('#searchbox').on('input',function(){
                    let search_value = $(this).val();
                    status = null
                    // console.log("All + Searching")
                    // console.log('Text changed to: ' + search_value);
                    ajaxchanges(status, genre_id,search_value);
                })
            }
            else if($('#btnShowing').hasClass('active')){
                // console.log("Showing is active")
                status = "Showing"
                ajaxchanges(status, genre_id);
                $('#searchbox').on('input',function(){
                    let search_value = $(this).val();
                    status = "Showing"
                    // console.log("Showing + Searching")
                    // console.log('Text changed to: ' + search_value);
                    ajaxchanges(status, genre_id,search_value);
                })
            }
            else if($('#btnComing').hasClass('active')){
               // console.log("Coming is active")
                status = "Upcoming"
                ajaxchanges(status, genre_id);
                $('#searchbox').on('input',function(){
                    let search_value = $(this).val();
                    status = "Upcoming"
                    // console.log("Upcoming + Searching")
                    // console.log('Text changed to: ' + search_value);
                    // console.log('Status:'+ status);
                    ajaxchanges(status, genre_id,search_value);
             })
         }
        }

        search_function();

        
        function ajaxchanges01(status, genre_id, search_value) {      
            // console.log("here status is", status) 
            if(search_value==undefined){
                search_value = null;
                // console.log("Search is null")
            }
            // console.log("SEARCH",search_value)
            $.ajax({
                type: 'POST', 
                url: '/movies/ajax', 
                data: {
                    _token: "{{ csrf_token() }}", 
                    status: status,
                    genre_id: genre_id,
                    search_value: search_value 
                },
                dataType: 'json', 
                success: function (data) {
                    // console.log(data.movies);
                    let movie_container = $('#movie_container');
                    movie_container.empty();
                    let movie_list ='';
                    let movies = data.movies;
                    console.log(movies);
                    movies.forEach(movie => {
                        const movieHTML = `
                        <div
            class="bg-[#242424] sm:rounded-lg min-h-[24rem] w-[17rem] flex flex-col items-center gap-x-3 px-3 pb-5 upmovie_blog">
            <div class="w-[100%] h-[15rem] bg-[#EBEBEB] rounded-lg overflow-hidden mt-3 upmovie_img">
                <!-- Image goes here -->
                <img class="w-full h-full" src="${baseAssetUrl}images/${movie.movie_image}" alt="${movie.movie_title}">
            </div>
            <div class="flex justify-center items-center flex-col px-1 text-[#DFDFDF] gap-3 upmovie_info">
                <div class="text-center">
                    <p class="text-base font-bold text-[#DEA60E]">${movie.movie_title}</p>
                    <div class="text-sm flex justify-center items-center pt-1 gap-2"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="12" height="12"
                            class="bi bi-calendar" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>${movie.release_date}</div>
                </div>
                <x-primary-button class="mx-auto mt-1" as="a" href="{{ route('home') }}">
                    More Info
                </x-primary-button>
            </div>
        </div>
                        `;
                        // console.log(movie.movie_title)
                        movie_list+=movieHTML

                    });
                    $('#movie_container').html(movie_list);
                },
                error: function (xhr, status, error) {
                    // console.error('Error:', error); 
                }
            });
        }
    </script>




</x-app-layout>