<x-app-layout>
	<div class="flex min-h-screen bg-gray-100">
		<div class="mt-4 mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- BreadCrumbs --}}
            <nav class="flex my-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('stresspronearea.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Dashboard
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ route('stresspronearea.province', ['province' => $stressProneArea->province_id]) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Stress Prone Area - Province
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Stress Data</span>
                    </div>
                </li>
                </ol>
            </nav>

			<div class="hidden sm:block" aria-hidden="true">
				<div class="py-5">
					<div class="border-t border-gray-200"></div>
				</div>
			</div>
			
			@include('components.messages')

			<!-- Validation Errors -->
			<x-auth-validation-errors class="mb-4" :errors="$errors" />

			<div class="mt-10 sm:mt-0">
				<div class="md:grid md:grid-cols-4 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px-0">
							<h3 class="text-lg font-medium leading-6 text-gray-900">Stress Prone Area Information</h3>
							<p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
						</div>
					</div>
					<div class="mt-5 md:col-span-3 md:mt-0">
						<form action="{{ route('stresspronearea.update', ['stressProneArea' => $stressProneArea->id]) }}" method="POST">
							@csrf
							@method('patch')
							<div class="overflow-hidden shadow sm:rounded-md">
								<div class="bg-white px-4 py-5 sm:p-6">
									<div class="grid grid-cols-6 gap-6 mt-4">
										
										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_province" id="input_spa_province" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $stressProneArea->province ?? " - " }}" disabled/>
												<label for="label_spa_province" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Province</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_city" id="input_spa_city" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $stressProneArea->city ?? " - " }}" disabled/>
												<label for="label_spa_city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">City</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-3">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_municipality" id="input_spa_municipality" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $stressProneArea->municipality ?? " - "  }}" disabled/>
												<label for="label_spa_municipality" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Municipality</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_barangay" id="input_spa_barangay" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $stressProneArea->barangay ?? " - " }}" disabled/>
												<label for="label_spa_barangay" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Barangay</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<fieldset>
												<legend class="contents text-sm font-medium text-gray-900">Stress Ecosystem</legend>
												<p class="text-sm text-gray-500"></p>
												<div class="mt-4 space-y-4">
													<div class="flex">
														<div class="flex items-center mr-4">
															<input name="input_spa_stressecosystem[]" id="input_spa_stressecosystem_opt1" onclick="renderExtraPage(event)" type="checkbox" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_spa_stressecosystem', $stressProneArea->stressEcosystem)) ? '' : (in_array(0, old('input_spa_stressecosystem', $stressProneArea->stressEcosystem)) ? 'checked' : '')}} required>
															<label for="input_spa_stressecosystem_opt1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Flooded/Submerged</label>
														</div>
													</div>
													<div class="flex">
														<div class="flex items-center mr-4">
															<input name="input_spa_stressecosystem[]" id="input_spa_stressecosystem_opt2" onclick="renderExtraPage(event)" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_spa_stressecosystem', $stressProneArea->stressEcosystem)) ? '' : (in_array(1, old('input_spa_stressecosystem', $stressProneArea->stressEcosystem)) ? 'checked' : '')}}>
															<label for="input_spa_stressecosystem_opt2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saline</label>
														</div>
													</div>
													<div class="flex">
														<div class="flex items-center mr-4">
															<input name="input_spa_stressecosystem[]" id="input_spa_stressecosystem_opt3" onclick="renderExtraPage(event)" type="checkbox" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ empty(old('input_spa_stressecosystem', $stressProneArea->stressEcosystem)) ? '' : (in_array(2, old('input_spa_stressecosystem', $stressProneArea->stressEcosystem)) ? 'checked' : '')}}>
															<label for="input_spa_stressecosystem_opt3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drought</label>
														</div>
													</div>
												</div>
											</fieldset>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_totalfarmers" id="input_spa_totalfarmers" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_spa_totalfarmers', $stressProneArea->totalFarmers)}}" required/>
												<label for="label_spa_totalFarmers" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Farmers</label>
											</div>
										</div>

										<div class="col-span-6 sm:col-span-4">
											<div class="relative z-0 w-full mb-6 group">
												<input name="input_spa_totalstressarea" id="input_spa_totalstressarea" type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ old('input_spa_totalstressarea', $stressProneArea->totalStressArea)}}" step="any" required/>
												<label for="label_spa_totalstressarea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Stress Area</label>
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
									<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

</x-app-layout>

<script>
	function selectPage1Province(event)
    {
        // console.log(event.target);
        var value = event.target.value;
        console.log(value);

        var defaultValue = document.querySelector('#option_page1_province_default').value;
        console.log(defaultValue)

        document.querySelector('#input_spa_city').disabled = true;

        document.querySelector('#input_spa_municipality').disabled = true;
        
        document.querySelector('#input_spa_barangay').disabled = true;

        document.querySelector('#option_page1_city_default').selected = "selected";

        document.querySelector('#option_page1_municipality_default').selected = "selected";

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        if (value !== defaultValue) 
        {
            document.querySelector('#input_spa_city').disabled = false;
               
            document.querySelector('#input_spa_municipality').disabled = false;

            var selectPage1Municipality = document.querySelector('#input_spa_municipality').options;

            var selectPage1City = document.querySelector('#input_spa_city').options; 

            for (let i = 0; i < selectPage1Municipality.length; i++)
            {

                selectPage1Municipality[i].parentElement.hidden = false;
                selectPage1Municipality[i].parentElement.disabled = false;
                selectPage1Municipality[i].hidden = false;
                selectPage1Municipality[i].disabled = false;

                if (i > 0 && selectPage1Municipality[i].parentElement.id !== "province-"+value) {

                    selectPage1Municipality[i].parentElement.hidden = true;
                    selectPage1Municipality[i].parentElement.disabled = true;
                    selectPage1Municipality[i].hidden = true;
                    selectPage1Municipality[i].disabled = true;
                    
                }
            }

            for (let i = 0; i < selectPage1City.length; i++)
            {
                selectPage1City[i].parentElement.hidden = false;
                selectPage1City[i].parentElement.disabled = false;
                selectPage1City[i].hidden = false;
                selectPage1City[i].disabled = false;

                if (i > 0 && selectPage1City[i].parentElement.id !== "province-"+value) {
                    // console.log(selectPage1City[i]);
                    // console.log(selectPage1City[1].parentElement);
                    selectPage1City[i].parentElement.hidden = true;
                    selectPage1City[i].parentElement.disabled = true;
                    selectPage1City[i].hidden = true;
                    selectPage1City[i].disabled = true;
                    
                }
            }
        }
        
    }

    function selectPage1City(event)
    {
        var value = event.target.value;
        console.log("City-"+ value)

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        document.querySelector('#input_spa_municipality').disabled = true;

        if(value == "default")
        {
            document.querySelector('#input_spa_municipality').disabled = false;

        }

        document.querySelector('#input_spa_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_spa_barangay').options; 

        for (let i = 0; i < selectPage1Barangay.length; i++)
        {
            selectPage1Barangay[i].parentElement.hidden = false;
            selectPage1Barangay[i].parentElement.disabled = false;
            selectPage1Barangay[i].hidden = false;
            selectPage1Barangay[i].disabled = false;

            if (i > 0 && selectPage1Barangay[i].parentElement.id !== "city-"+value) {
                selectPage1Barangay[i].parentElement.hidden = true;
                selectPage1Barangay[i].parentElement.disabled = true;
                selectPage1Barangay[i].hidden = true;
                selectPage1Barangay[i].disabled = true;
                
            }
        }

        
    }

    function selectPage1Municipality(event)
    {
        var value = event.target.value;
        console.log("Municipality-"+ value)

        document.querySelector('#option_page1_barangay_default').selected = "selected";

        document.querySelector('#input_spa_city').disabled = true;

        if(value == "default")
        {
            document.querySelector('#input_spa_city').disabled = false;
        }

        document.querySelector('#input_spa_barangay').disabled = false;

        var selectPage1Barangay = document.querySelector('#input_spa_barangay').options; 

        for (let i = 0; i < selectPage1Barangay.length; i++)
        {
            selectPage1Barangay[i].parentElement.hidden = false;
            selectPage1Barangay[i].parentElement.disabled = false;
            selectPage1Barangay[i].hidden = false;
            selectPage1Barangay[i].disabled = false;

            if (i > 0 && selectPage1Barangay[i].parentElement.id !== "municipality-"+value) {
                selectPage1Barangay[i].parentElement.hidden = true;
                selectPage1Barangay[i].parentElement.disabled = true;
                selectPage1Barangay[i].hidden = true;
                selectPage1Barangay[i].disabled = true;
                
            }
        }
        
    }

</script>
