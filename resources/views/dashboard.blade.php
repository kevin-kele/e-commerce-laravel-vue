<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Bonjour {{Auth::user()->name}}
           <b style="float:right">
           Total Users
           <span class="badge bg-danger">
               {{ count($users) }}
           </span>

           </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">created</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                <tbody>
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
    </div>
</x-app-layout>
