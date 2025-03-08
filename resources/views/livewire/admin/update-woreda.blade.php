    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Update Woreda</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif

            <form wire:submit='updateWoreda' class="w-full md:w-1/2 flex flex-col gap-4">

                 <flux:field>
                    <flux:label>Zone</flux:label>
                    <flux:select wire:model.fill="zone_id" placeholder="Choose Region">
                        @foreach ($zones as $zone)
                            <flux:select.option value='{{ $zone->id }}'>{{ $zone->zone }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="zone_id" />
                </flux:field>

                <flux:field>
                    <flux:label>Woreda Name</flux:label>
                    <flux:input wire:model='woreda' placeholder="Update woreda" />
                    <flux:error name="woreda" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Update Woreda') }}</flux:button>

            </form>
        </div>
    </div>
