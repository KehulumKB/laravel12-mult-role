 <flux:navlist variant="outline">
     <flux:navlist.group heading="Platform" class="grid">

         <div class="flex flex-col gap-2">
             <flux:navlist.item icon="home" :href="route('admin.dashboard')"
                 :current="request()->routeIs('share-admin.dashboard')" wire:navigate>{{ __('Dashboard') }}
             </flux:navlist.item>

             <flux:navlist.item icon="users" :href="route('admin.manage-users')"
                 :current="request()->routeIs('admin.manage-users')" wire:navigate>{{ __('Manage Users') }}
             </flux:navlist.item>
         </div>
     </flux:navlist.group>

     <flux:navlist.group expandable heading="Manage Addresses" class="expandable lg:grid">
         <div class="" id="items">
            <flux:navlist.item icon="users" :href="route('admin.manage-region')"
                 :current="request()->routeIs('admin.manage-region')" wire:navigate>{{ __('Manage Region') }}
            </flux:navlist.item>

            <flux:navlist.item icon="users" :href="route('admin.manage-zone')"
                 :current="request()->routeIs('admin.manage-zone')" wire:navigate>{{ __('Manage Zone') }}
            </flux:navlist.item>

            <flux:navlist.item icon="users" :href="route('admin.manage-woreda')"
                 :current="request()->routeIs('admin.manage-woreda')" wire:navigate>{{ __('Manage Woreda') }}
            </flux:navlist.item>

            <flux:navlist.item icon="users" :href="route('admin.manage-city')"
                 :current="request()->routeIs('admin.manage-city')" wire:navigate>{{ __('Manage City') }}
            </flux:navlist.item>

            <flux:navlist.item icon="users" :href="route('admin.manage-sub-city')"
                 :current="request()->routeIs('admin.manage-sub-city')" wire:navigate>{{ __('Manage Sub City') }}
            </flux:navlist.item>

            <flux:navlist.item icon="users" :href="route('admin.manage-kebele')"
                 :current="request()->routeIs('admin.manage-kebele')" wire:navigate>{{ __('Manage Kebele') }}
            </flux:navlist.item>
         </div>
     </flux:navlist.group>

 </flux:navlist>
