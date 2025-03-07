 <flux:navlist variant="outline">
            <flux:navlist.group heading="Platform" class="grid">

               <div class="flex flex-col gap-2">
                 <flux:navlist.item icon="home" :href="route('admin.dashboard')"
                    :current="request()->routeIs('share-admin.dashboard')" wire:navigate>{{ __('Dashboard') }}
                </flux:navlist.item>

                <flux:navlist.item icon="users" :href="route('admin.manage-users')"
                    :current="request()->routeIs('admin.manage-users')" wire:navigate>{{ __('Manage Users') }}
                </flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('admin.add-zone')"
                    :current="request()->routeIs('admin.add-zone')" wire:navigate>{{ __('Add Zone') }}
                </flux:navlist.item>

               </div>
                 {{-- <flux:navlist.item icon="home" :href="route('projects')"
                    :current="request()->routeIs('projects')" wire:navigate>{{ __('Projects') }}
                </flux:navlist.item> --}}
            </flux:navlist.group>
        </flux:navlist>
