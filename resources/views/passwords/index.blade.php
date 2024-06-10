<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Password') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <div class="container">
                        <a href="{{ route('passwords.create') }}" class="btn btn-primary">Add New Password</a>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>Site Name</th>
                                    <th>Site URL</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($passwords as $password)
                                    <tr>
                                        <td>{{ $password->site_name }}</td>
                                        <td><a href="{{ $password->site_url }}" target="_blank">{{ $password->site_url }}</a></td>
                                        <td>{{ $password->email }}</td>
                                        <td>{{ $password->password }}</td>
                                        <td class="actions">
                                            <a href="{{ route('passwords.edit', $password) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('passwords.destroy', $password) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>


</x-app-layout>
