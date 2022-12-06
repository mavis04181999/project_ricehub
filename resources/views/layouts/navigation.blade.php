<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
   <!-- Primary Navigation Menu -->
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
       <div class="flex justify-between h-16">
           <div class="flex">
               <!-- Logo -->
               <div class="shrink-0 flex items-center">
                   <a href="{{ route('enumerator.welcome') }}">
                       {{-- <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> --}}
                       <img src="{{asset('images/da-logo.png')}}" class="block h-10 w-auto fill-current text-gray-600" alt="Department of Agriculture Logo" />
                   </a>
               </div>

               <!-- Navigation Links -->
               <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (Auth::user()->role == "admin")
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="no-underline">
                            {{ __('User Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enumerator.dashboard')" :active="request()->routeIs('enumerator.dashboard')" class="no-underline">
                            {{ __('Farmer Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('stresspronearea.dashboard')" :active="request()->routeIs('stresspronearea.dashboard')" class="no-underline">
                            {{ __('SPA Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enumerator.map')" :active="request()->routeIs('enumerator.map')" class="no-underline">
                            {{ __('Map') }}
                        </x-nav-link>
                    @elseif (Auth::user()->role == "enumerator")
                        <x-nav-link :href="route('enumerator.welcome')" :active="request()->routeIs('enumerator.welcome')" class="no-underline">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enumerator.dashboard')" :active="request()->routeIs('enumerator.dashboard')" class="no-underline">
                            {{ __('Farmer Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('stresspronearea.dashboard')" :active="request()->routeIs('stresspronearea.dashboard')" class="no-underline">
                            {{ __('SPA Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enumerator.form')" :active="request()->routeIs('enumerator.form')" class="no-underline">
                            {{ __('Farmer Forms') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enumerator.form2')" :active="request()->routeIs('enumerator.form2')" class="no-underline">
                            {{ __('SPA Form') }}
                        </x-nav-link>
                        <x-nav-link :href="route('enumerator.map')" :active="request()->routeIs('enumerator.map')" class="no-underline">
                            {{ __('Map') }}
                        </x-nav-link>
                    @endif
               </div>
           </div>

           <!-- Settings Dropdown -->
           <div class="hidden sm:flex sm:items-center sm:ml-6">
               <x-dropdown align="right" width="48">
                   <x-slot name="trigger">
                       <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                           <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                           <div>{{ Auth::user()->lastName }}, {{ Auth::user()->firstName }} </div>

                           <div class="ml-1">
                               <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                   <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                               </svg>
                           </div>
                       </button>
                   </x-slot>

                   <x-slot name="content">
                        <x-dropdown-link :href="route('user.edit', ['user' => Auth::user()->id])" class="no-underline">
                                {{ __('Edit Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('farmer.archive')" class="no-underline">
                            {{ __('Farmers Archives') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('stresspronearea.archive')" class="no-underline">
                            {{ __('Stress Data Archives') }}
                        </x-dropdown-link>
                       <!-- Authentication -->
                       <form method="POST" action="{{ route('logout') }}" >
                           @csrf

                           <x-dropdown-link :href="route('logout')"
                                   onclick="event.preventDefault();
                                               this.closest('form').submit();" class="no-underline">
                               {{ __('Log Out') }}
                           </x-dropdown-link>
                       </form>
                   </x-slot>
               </x-dropdown>
           </div>

           <!-- Hamburger -->
           <div class="-mr-2 flex items-center sm:hidden">
               <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                   <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                       <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                       <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                   </svg>
               </button>
           </div>
       </div>
   </div>

   <!-- Responsive Navigation Menu -->
   <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
       <div class="pt-2 pb-3 space-y-1">
           <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
               {{ __('Dashboard') }}
           </x-responsive-nav-link>
       </div>

       <!-- Responsive Settings Options -->
       <div class="pt-4 pb-1 border-t border-gray-200">
           <div class="px-4">
               <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
               <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
           </div>

           <div class="mt-3 space-y-1">
               <!-- Authentication -->
               <form method="POST" action="{{ route('logout') }}">
                   @csrf

                   <x-responsive-nav-link :href="route('logout')"
                           onclick="event.preventDefault();
                                       this.closest('form').submit();">
                       {{ __('Log Out') }}
                   </x-responsive-nav-link>
               </form>
           </div>
       </div>
   </div>
</nav>
