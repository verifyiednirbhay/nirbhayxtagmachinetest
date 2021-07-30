<x-app-layout>
    @push('style')
    <style>
        .dataTables_info{
            display: none;
        }
    </style>
    @endpush
    <x-slot name="header">
        <div style="display: flex;justify-content:space-between;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Users') }}
            </h2>
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{route('create-users.create')}}">
                {{-- {{route('createuser_create')}} --}}
                {{ __('Create') }}
            </a>
        </div>
    </x-slot>
    @if ($message = Session::get('success'))
    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{$message}}</p>
      </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered" id="UsersTable">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if($user->roles == '1') Admin @else User @endif</td>
                                <td>
                                    <div style="display: flex">
                                        <a class="btn btn-primary" href="{{route('create-users.edit',['create_user'=>$user->id])}}">Edit</a>
                                   
                                    @if($user->id != '1')    
                                    <form action="{{ route('create-users.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{-- {{print_r($users)}} --}}
                      
                    </table>
                
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function(){
           $('#UsersTable').DataTable({
                 "paging":   false,
           });
        })
    </script>
    @endpush
</x-app-layout>