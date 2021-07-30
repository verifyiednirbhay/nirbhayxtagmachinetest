<x-app-layout>
    <x-slot name="header">
        <div style="display: flex;justify-content:space-between;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Users') }}
            </h2>
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('register') }}">
                {{ __('Create') }}
            </a>
        </div>
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="cell-border compact stripe" id="userstable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Intro to CSS</td>
                            <td>Adam</td>
                            <td>858</td>
                            <td>dfas</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
       $(document).ready(function(){
            $('#userstable').DataTable();
       });
    </script>
    @endpush

</x-app-layout>

