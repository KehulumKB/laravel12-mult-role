    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Update Region</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif

            <form wire:submit='updateRegion' class="w-full md:w-1/2 flex flex-col gap-4">

                 <flux:field>
                    <flux:label>Country</flux:label>
                    <flux:select wire:model.fill="country_id" placeholder="Choose Country">
                        @foreach ($countries as $country)
                            <flux:select.option value='{{ $country->id }}'>{{ $country->country }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="country_id" />
                </flux:field>

                <flux:field>
                    <flux:label>Region Name</flux:label>
                    <flux:input wire:model='region' placeholder="Type region" />
                    <flux:error name="region" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Update Region') }}</flux:button>

            </form>
        </div>
    </div>
