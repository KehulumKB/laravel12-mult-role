<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            <livewire:components.success-message :message="session('message')" />
        </div>
    @elseif (session()->has('error'))
        <livewire:components.error-alert :message="session('error')" />
    @endif

    <div class="md:mt-2 md:mb-4 flex justify-between">
        <h1>Manage Users Page</h1>
        <div>
            <a href="{{ route('admin.add-new-user') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                wire:navigate>Add New User</a>
        </div>
    </div>

    <div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span class="">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td scope="row" class="px-6 py-4">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->role->role ?? null }}
                            </td>
                            @if ($user->status === 'active')
                                <td class="px-6 py-4 text-green-500 font-bold">
                                    {{ $user->status }}
                                </td>
                            @else
                                <td class="px-6 py-4 text-red-500 font-bold">
                                    {{ $user->status }}
                                </td>
                            @endif
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.update-user', ['id'=>$user->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline" wire:navigate>Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
