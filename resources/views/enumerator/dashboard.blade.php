<x-app-layout>

    <div class="flex min-h-screen bg-gray-50">
		<div class="my-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('components.messages')
            
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="px-2 sm:px-0">
                <h3 class="text-sm font-bold leading-6 text-gray-900">Farmer Dashboard</h3>
            </div>

            <hr class="my-8">

            <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Farmers</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $totalFarmers }}</div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>                              
                        </span>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Rice Area</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $totalRiceArea }} <small>Ha.</small></div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-green-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                            </svg>                              
                        </span>
                    </div>
                </div>

                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Stress Area</div>
                    <div class="flex items-center pt-1">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $totalStressArea }} <small>Ha.</small></div>
                        <span class="flex items-center px-2 py-0.5 mx-2 text-sm text-red-600 bg-white rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                            </svg>    
                        </span>
                    </div>
                </div>
                
            </div>

            {{-- <div class="my-8"></div> --}}

            <br class="my-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped w-full" style="width: 100%" id="dashboard">
                        <thead>
                            <tr>
                                <th class="text-sm"></th>
                                <th class="text-sm">First Name</th>
                                <th class="text-sm">Last Name</th>
                                <th class="text-sm">Age</th>
                                <th class="text-sm">Date of Birth</th>
                                <th class="text-sm">Street Address</th>
                                <th class="text-sm">Barangay</th>
                                <th class="text-sm">City</th>
                                <th class="text-sm">Municipality</th>
                                <th class="text-sm">RSBSA Registered</th>
                                <th class="text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($farmers)
                                @if ($farmers->count() > 0)
                                    @foreach ($farmers as $farmer)
                                    <tr>
                                        <td class="text-xs"><input onchange="selectFarmer(event)" type="checkbox" name="selectedFarmers[]" id="checkbox-export-farmer" class="checkbox-farmers" value="{{ $farmer->id }}"></td>
                                        <td class="text-xs">{{ $farmer->firstName }}</td>
                                        <td class="text-xs">{{ $farmer->lastName }}</td>
                                        <td class="text-xs">{{ $farmer->age }}</td>
                                        <td class="text-xs">{{ $farmer->dateOfBirth }}</td>
                                        <td class="text-xs">{{ Str::substr($farmer->streetAddress, 0, 20) }} ...</td>
                                        <td class="text-xs">{{ $farmer->barangay }}</td>
                                        <td class="text-xs">{{ $farmer->city }}</td>
                                        <td class="text-xs">{{ $farmer->municipality }}</td>
                                        <td class="text-xs">{{ ($farmer->rsbsaReg === 1) ? 'Registered': 'Not Registered' }}</td>
                                        <td class="text-xs">
                                            <!-- Using utilities: -->
                                            <div class="flex">
                                                <a href="{{ route('farmer.show', $farmer->id) }}" class="btn btn-sm btn-secondary mr-2">View</a>
                                                
                                                <form id="form-delete-farmer" action="{{ route('farmer.destroy', $farmer->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" onclick="event.preventDefault(); this.closest('form').submit();" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>   
                                    @endforeach 
                                @endif
                            @endisset
                        </tbody>
                    </table>
                </div> 
            </div>

            <section>
                <div class="flex justify-end flex-row py-4">
                    <div>
                        <button onclick="selectFarmers(event)" class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Check All</span>
                        </button>
                    </div>
                    <div>
                        <form action="{{ route('xlsx.export-selected-farmers') }}" method="post" id="form-selectedFarmers">
                            @csrf
                            <input type="hidden" name="selected-farmers" id="hidden-input-selectedFarmers">
                            <button type="submit" class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                <span>Export Selected Farmer(s)</span>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('xlsx.export-all-farmers') }}" method="get">
                            <button type="submit" class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                <span>Export All Farmers</span>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('survey.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <button type="submit" class="inline-flex py-2 px-4 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out items-center mr-2">
                                <svg class="fill-current w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Import
                            </button>

                            <div>
                                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
                                <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="input_file" name="input_file" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help" >XSLX, CSV, OR XLS .</p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </div>  
    </div>

    @section('scripts')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-5.2.0.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

        <script src="{{ asset('js/datatables.min.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.6.1.js') }}"></script>
        
    @endsection

    <script>
        var farmersSelected = [];

        function isFarmerExist(element){
            
            if (element.checked === true) {
                
                farmersSelected.push(element.value)
                
            } else {
                let index = farmersSelected.indexOf(element.value)

                if (index != -1) {

                    farmersSelected.splice(index, 1)
                }
            }
        }

        function selectFarmer(event)
        {
            
            isFarmerExist(event.target);

            document.querySelector('#hidden-input-selectedFarmers').value = farmersSelected;
        }

        function selectFarmers(event)
        {
            var count = 0;

            var selectedFarmers = [];

            var farmers = document.querySelectorAll('#dashboard .checkbox-farmers')


            farmers.forEach((element, index) => {

                if (element.checked === true) {
                    count++;
                }

            });


            if (count == 0) {

                farmers.forEach((element) => {

                    element.checked = true;

                    isFarmerExist(element);
                    
                })

            }
            else {
                farmers.forEach((element) => {
                    element.checked = false;

                    isFarmerExist(element);
                })
            }

            document.querySelector('#hidden-input-selectedFarmers').value = farmersSelected;

        }
    </script>
    
    <script>
        // $(document).ready(function () {
        //     $('#dashboard').DataTable();
        // });

        // var dashboard = new DataTable('#dashboard')

        // var dashboard = new DataTable('#dashboard')

        // document.addEventListener("DOMContentLoaded", function() {
        //     var dashboard = new DataTable('#dashboard', {
        //         scrollX: 300,
        //     });
        // });

        $(document).ready( function () {
            $('#dashboard').DataTable({
                scrollX: true,
            });
        } );




    </script>


</x-app-layout>
