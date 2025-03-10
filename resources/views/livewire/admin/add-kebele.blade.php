    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Add New City</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif

            <form wire:submit='addKebele' class="w-full md:w-1/2 flex flex-col gap-4">

                <flux:field>
                    <flux:label>Woreda</flux:label>
                    <flux:select wire:model.lazy="selectedWoreda" id="woreda">
                        <flux:select.option value=''>--select woreda-- </flux:select.option>
                        @foreach ($woredas as $woreda)
                            <flux:select.option value='{{ $woreda->id }}'>{{ $woreda->woreda }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="selectedWoreda" />
                </flux:field>

                @if (!empty($cities))
                    <flux:field>
                        <flux:label>City</flux:label>
                        <flux:select wire:model.lazy="selectdCity" placeholder="Choose Woreda">
                            <flux:select.option value=''>--select city -- </flux:select.option>
                            @foreach ($cities as $city)
                                <flux:select.option value='{{ $city->id }}'>{{ $city->city }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <flux:error name="selectdCity" />
                    </flux:field>
                @endif

                @if (!empty($subCities))
                    <flux:field>
                        <flux:label>Sub City</flux:label>
                        <flux:select wire:model="sub_city_id" >
                            <flux:select.option value=''>-- select sub city-- </flux:select.option>
                            @foreach ($subCities as $subCity)
                                <flux:select.option value='{{ $subCity->id }}'>{{ $subCity->sub_city }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <flux:error name="sub_city_id" />
                    </flux:field>
                @endif

                <flux:field>
                    <flux:label>Kebele Name</flux:label>
                    <flux:input wire:model='kebele' placeholder="Type Kebele" />

                    <flux:error name="kebele" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Add Kebele') }}</flux:button>

            </form>
        </div>
    </div>
