<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($password) ? 'Edit Password' : 'Add New Password' }} </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-md">
                    <div class="container mx-auto px-4 py-8">
                        <h2 class="text-2xl font-bold mb-6">{{ isset($password) ? 'Edit Password' : 'Add New Password' }}</h2>
                        <form action="{{ isset($password) ? route('passwords.update', $password) : route('passwords.store') }}" method="POST" class="space-y-6 ">
                            @csrf
                            @if (isset($password))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                                <input type="text" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="site_name" name="site_name" value="{{ old('site_name', $password->site_name ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="site_url" class="block text-sm font-medium text-gray-700">Site URL</label>
                                <input type="text" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="site_url" name="site_url" value="{{ old('site_url', $password->site_url ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="email" name="email" value="{{ old('email', $password->email ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="text" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="password" name="password" value="{{ old('password', $password->password ?? '') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md">{{ isset($password) ? 'Update Password' : 'Save Password' }}</button>
                        </form>
                    </div>
                </div>
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
