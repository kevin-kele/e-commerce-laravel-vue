<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category
           <b style="float:right">

           <span class="badge bg-danger">

           </span>

           </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Category</div>
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Category name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created</th>
                                    </tr>
                                    </thead>

                                @foreach($categories as $categorie)
                                <tbody>
                                    <tr>
                                    <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                    <td>{{$categorie->category_name}} </td>
                                    <td>{{$categorie->user->name}} </td>
                                    <td>{{$categorie->created_at->diffForHumans()}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="inputName">Category Name</label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" name="category_name" id="inputName" placeholder="">
                                        @error('category_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <button type="submit" class="btn btn-primary mt-2">Add category</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
