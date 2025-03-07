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

         {{-- <flux:navlist.item icon="home" :href="route('projects')"
                    :current="request()->routeIs('projects')" wire:navigate>{{ __('Projects') }}
                </flux:navlist.item> --}}
     </flux:navlist.group>

     <flux:navlist.group expandable heading="Manage Addresses" class="expandable lg:grid">
         <div class="" id="items">
             <flux:navlist.item icon="users" :href="route('admin.manage-region')"
                 :current="request()->routeIs('admin.manage-region')" wire:navigate>{{ __('Manage Region') }}
             </flux:navlist.item>

             <flux:navlist.item icon="users" :href="route('admin.manage-zone')"
                 :current="request()->routeIs('admin.manage-zone')" wire:navigate>{{ __('Manage Zone') }}
             </flux:navlist.item>

             <flux:navlist.item href="#">Manage Woredas</flux:navlist.item>
             <flux:navlist.item href="#">Manage Cities</flux:navlist.item>
             <flux:navlist.item href="#">Manage Sub Cities</flux:navlist.item>
             <flux:navlist.item href="#">Manage Kebeles</flux:navlist.item>
         </div>
     </flux:navlist.group>

 </flux:navlist>
