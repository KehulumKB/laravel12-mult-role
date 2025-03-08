    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Add New Zone</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif

            <form wire:submit='addZone' class="w-full md:w-1/2 flex flex-col gap-4">
                  <flux:field>
                    <flux:label>Region</flux:label>
                    <flux:select wire:model.fill="region_id" placeholder="Choose Region">
                        @foreach ($regions as $region)
                            <flux:select.option value='{{ $region->id }}'>{{ $region->region }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="region_id" />
                </flux:field>

                <flux:field>
                    <flux:label>Zone NAme</flux:label>
                    <flux:input wire:model='zone' placeholder="Type zone" />

                    <flux:error name="zone" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Add Zone') }}</flux:button>

            </form>
        </div>
    </div>
