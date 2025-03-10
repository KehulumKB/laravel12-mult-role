    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Add New Sub City</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif

            <form wire:submit='addSubCity' class="w-full md:w-1/2 flex flex-col gap-4">

                 <flux:field>
                    <flux:label>Woreda</flux:label>
                    <flux:select wire:model.fill="city_id" placeholder="Choose City">
                        @foreach ($cities as $city)
                            <flux:select.option value='{{ $city->id }}'>{{ $city->city }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="city_id" />
                </flux:field>

                <flux:field>
                    <flux:label>Sub City Name</flux:label>
                    <flux:input wire:model='sub_city' placeholder="Type City" />

                    <flux:error name="sub_city" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Add Sub-City') }}</flux:button>

            </form>
        </div>
    </div>
