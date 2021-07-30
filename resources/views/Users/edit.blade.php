<x-app-layout>
    <x-slot name="header">
        <div style="display: flex;justify-content:space-between;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Users / Update') }}
            </h2>
           
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                      <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
       {{-- {{$datas}} --}}
        <form method="POST" action="{{ route('create-users.update',['create_user'=>$datas->id]) }}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$datas->name}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                {{-- <input type="text" class="block mt-1 w-full" type="email" name="email" value="{{$datas->email}}" required > --}}
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$datas->email}}" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="role" :value="__('User Role')" />
                <select name="role" id="" required>
                    <option value="@if($datas->roles == '1') 1 @else 2 @endif">@if($datas->roles == '1') Admin @else User @endif</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>


            <div class="flex items-center justify-end mt-4">
              
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>