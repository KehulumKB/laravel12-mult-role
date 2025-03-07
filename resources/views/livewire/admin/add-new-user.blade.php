    <div class="md:mt-2 md:mb-4">
        <h1 class="font-bold py-4">Add New User</h1>
        <hr>
        <div class=" pt-4 flex flex-col items-center">
            <form wire:submit='addUser' class="w-full md:w-1/2 flex flex-col gap-4">
                <flux:field>
                    <flux:label>Username</flux:label>
                    <flux:input placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:field>
                    <flux:label>Email</flux:label>
                    <flux:input placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:field>
                    <flux:label>Role</flux:label>
                    <flux:input placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:field>
                    <flux:label>Status</flux:label>
                    <flux:input placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:field>
                    <flux:label>Password</flux:label>
                    <flux:input placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:field>
                    <flux:label>Confirm Password</flux:label>
                    <flux:input placeholder="Type username" />

                    <flux:error name="username" />
                </flux:field>

                <flux:button variant="primary" type="submit" class="">{{ __('Add User') }}</flux:button>

            </form>
        </div>
    </div>
