<link rel="stylesheet" href="{{ asset('CSS/navigation.css') }}">

<nav x-data="{ open: false }" class="border-b border-gray-100 nav_bars 
    {{ auth()->check() && auth()->user()->u_type === 'admin' ? 'bg-[#cd1f30]' : 'bg-[#333333]' }}">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 ">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="log_nav">
                        {{--
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                        <div class="hidden space-x-8 sm:-my-px md:ms-0 lg:ms-5 sm:flex" id="logo_container">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        </div>
                        <p class="logo_title">Eclipse</p>
                    </a>
                </div>

                <!-- Navigation Links -->
                {{-- Nav for after auth --}}
                @if(auth()->check())
                {{-- Nav for customer --}}
                @if(auth()->user()->u_type==="customer")
                <div class="hidden sm:space-x-6 md:space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="nav_links">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('movies')" :active="request()->routeIs('movies')" class="nav_links">
                        {{ __('Movies') }}
                    </x-nav-link>
                    <x-nav-link :href="route('showtimes')" :active="request()->routeIs('showtimes')" class="nav_links">
                        {{ __('Showtimes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')" class="nav_links">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')" class="nav_links">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>
                {{-- Nav for admin --}}
                @elseif(auth()->user()->u_type==="admin")
                <div class="hidden xl:space-x-8 xl:-my-px xl:ms-10 xl:flex">
                    <x-nav-link :href="route('admin_home')" :active="request()->routeIs('admin_home')"
                        class="nav_links">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_movie')" :active="request()->routeIs('admin_movie')"
                        class="nav_links">
                        {{ __('Movies') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_theater')" :active="request()->routeIs('admin_theater')"
                        class="nav_links">
                        {{ __('Theaters') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_showtime')" :active="request()->routeIs('admin_showtime')"
                        class="nav_links">
                        {{ __('Showtimes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_booking')" :active="request()->routeIs('admin_booking')"
                        class="nav_links">
                        {{ __('Bookings') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_genre')" :active="request()->routeIs('admin_genre')"
                        class="nav_links">
                        {{ __('Genres') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_seats')" :active="request()->routeIs('admin_seats')"
                        class="nav_links">
                        {{ __('Seats') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_seat_type')" :active="request()->routeIs('admin_seat_type')"
                        class="nav_links">
                        {{ __('Seat Types') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_contact')" :active="request()->routeIs('admin_contact')"
                        class="nav_links">
                        {{ __('Messages') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin_users')" :active="request()->routeIs('admin_users')"
                        class="nav_links">
                        {{ __('Users') }}
                    </x-nav-link>
                </div>
                @endif
                @else
                {{-- Nav for before login --}}
                <div class="hidden sm:space-x-6 md:space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('beforelogin')" :active="request()->routeIs('beforelogin')"
                        class="nav_links">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('movies')" :active="request()->routeIs('movies')" class="nav_links">
                        {{ __('Movies') }}
                    </x-nav-link>
                    <x-nav-link :href="route('showtimes')" :active="request()->routeIs('showtimes')" class="nav_links">
                        {{ __('Showtimes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')" class="nav_links">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')" class="nav_links">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>
                @endif
            </div>


            <!-- Settings Dropdown -->
            @auth
            {{-- dropdown for after login --}}
            {{-- @else --}}
            <div class="flex justify-center">
                @if (auth()->user()->u_type=='customer')
                <div class="booking_history flex items-center">
                    <a href="{{route('bookingrecord')}}"><svg xmlns="http://www.w3.org/2000/svg" fill="white"
                            class="bi bi-journal-bookmark-fill w-7" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                        </svg></a>
                </div>
                <div class="hidden md:flex md:items-center md:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button id="dropdown_btn"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->acc_name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="dropdown_content">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown_content">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="-me-2 flex items-center md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                @elseif(auth()->user()->u_type==="admin")
                <div class="hidden xl:flex xl:items-center xl:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button id="dropdown_btn"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->acc_name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="dropdown_content">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown_content">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="-me-2 flex items-center xl:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                @endif
            </div>
            {{-- @endif --}}
            @endauth

            {{-- dropdown before login --}}
            @guest
            <div class="hidden sm:flex sm:items-center sm:ms-6 auth_btn">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button id="dropdown_btn"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>Get Started</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if (Route::has('login'))
                        <x-dropdown-link :href="route('login')" class="dropdown_content">
                            {{ __('Login') }}
                        </x-dropdown-link>
                        @endif

                        @if (Route::has('register'))
                        <x-dropdown-link :href="route('register')" class="dropdown_content">
                            {{ __('Register') }}
                        </x-dropdown-link>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endguest


            <!-- Hamburger -->
            {{-- <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}

        </div>
    </div>

    {{-- @if(auth()->check()) --}}
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden xl:hidden">
        @if(auth()->check())
        @if(auth()->user()->u_type==="customer")
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="responsive_links">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('movies')" :active="request()->routeIs('movies')"
                class="responsive_links">
                {{ __('Movies') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('showtimes')" :active="request()->routeIs('showtimes')"
                class="responsive_links">
                {{ __('Showtimes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')"
                class="responsive_links">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
        </div>
        @elseif(auth()->user()->u_type==="admin")
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin_home')" :active="request()->routeIs('admin_home')"
                class="responsive_links">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_movie')" :active="request()->routeIs('admin_movie')"
                class="responsive_links">
                {{ __('Movies') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_theater')" :active="request()->routeIs('admin_theater')"
                class="responsive_links">
                {{ __('Theaters') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_showtime')" :active="request()->routeIs('admin_showtime')"
                class="responsive_links">
                {{ __('Showtimes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_booking')" :active="request()->routeIs('admin_booking')"
                class="responsive_links">
                {{ __('Bookings') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_genre')" :active="request()->routeIs('admin_genre')"
                class="responsive_links">
                {{ __('Genres') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_seats')" :active="request()->routeIs('admin_seats')"
                class="responsive_links">
                {{ __('Seats') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_seat_type')" :active="request()->routeIs('admin_seat_type')"
                class="responsive_links">
                {{ __('Seat Types') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_contact')" :active="request()->routeIs('admin_contact')"
                class="responsive_links">
                {{ __('Messages') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin_users')" :active="request()->routeIs('admin_users')"
                class="responsive_links">
                {{ __('Users') }}
            </x-responsive-nav-link>
        </div>

        @endif
        @else
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="responsive_links">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('movies')" :active="request()->routeIs('movies')"
                class="responsive_links">
                {{ __('Movies') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('showtimes')" :active="request()->routeIs('showtimes')"
                class="responsive_links">
                {{ __('Showtimes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contactus')" :active="request()->routeIs('contactus')"
                class="responsive_links">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
        </div>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->u_name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            @endauth

            <div class="mt-3 space-y-1">
                @auth
                <x-responsive-nav-link :href="route('profile.edit')" class="responsive_links">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="responsive_links">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                @endauth

                @guest
                <x-responsive-nav-link :href="route('login')" class="responsive_links">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="responsive_links">
                    {{ __('Register') }}
                </x-responsive-nav-link>
                @endguest
            </div>
        </div>
    </div>
    {{-- @endif --}}

</nav>