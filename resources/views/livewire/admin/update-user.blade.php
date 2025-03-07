    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4 text-center">Update User</h1>
        <hr>

        <div class=" pt-4 flex flex-col items-center">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <livewire:components.error-alert :message="session('error')" />
                </div>
            @endif
{{-- {{ $user->name }} --}}
            <form wire:submit='updateUser' class="w-full md:w-1/2 flex flex-col gap-4">
                <flux:field>
                    <flux:label>Username</flux:label>
                    <flux:input wire:model='username' placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:field>
                    <flux:label>Email</flux:label>
                    <flux:input wire:model='email' type="email" placeholder="Type email" />

                    <flux:error name="email" />
                </flux:field>

                <flux:field>
                    <flux:label>Role</flux:label>
                    <flux:select wire:model.fill="role" placeholder="Choose Role">
                        {{-- <flux:select.option></flux:select.option> --}}
                        @foreach ($roles as $role)
                            <flux:select.option value='{{ $role->id }}'>{{ $role->role }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="role" />
                </flux:field>

                <flux:field>
                    {{-- <flux:label>Status</flux:label> --}}
                    <flux:radio.group wire:model="status" label="Select account status">
                        <flux:radio value="active" label="active" checked />
                        <flux:radio value="deactive" label="deactive" />
                    </flux:radio.group>

                    {{-- <flux:error name="status" /> --}}
                </flux:field>

                <flux:field>
                    <flux:label>Password</flux:label>
                    <flux:input wire:model='password' type="password" placeholder="Type password" />

                    <flux:error name="password" />
                </flux:field>

                <flux:field>
                    <flux:label>Confirm Password</flux:label>
                    <flux:input type='password' wire:model='password_confirmation' placeholder="Type password confirmation" />

                    <flux:error name="password_confirmation" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Update User') }}</flux:button>

            </form>
        </div>
    </div>
