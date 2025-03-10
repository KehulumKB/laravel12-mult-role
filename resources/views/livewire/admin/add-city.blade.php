    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Add New City</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif

            <form wire:submit='addCity' class="w-full md:w-1/2 flex flex-col gap-4">

                 <flux:field>
                    <flux:label>Woreda</flux:label>
                    <flux:select wire:model.fill="woreda_id" placeholder="Choose Woreda">
                        @foreach ($woredas as $woreda)
                            <flux:select.option value='{{ $woreda->id }}'>{{ $woreda->woreda }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="woreda_id" />
                </flux:field>

                <flux:field>
                    <flux:label>City Name</flux:label>
                    <flux:input wire:model='city' placeholder="Type City" />

                    <flux:error name="city" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Add City') }}</flux:button>

            </form>
        </div>
    </div>
