<x-app-layout>
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
                                    <th scope="col">Action</th>
                                    </tr>
                                    </thead>

                                @foreach($categories as $categorie)
                                <tbody>
                                    <tr>
                                    <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                    <td>{{$categorie->category_name}} </td>
                                    <td>{{$categorie->user->name}} </td>
                                    <td>{{$categorie->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ url('category/edit/'.$categorie->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('/category/'.$categorie->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
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
    <div class="py-2">
        <div class="container">
         <div class="row">
             <div class="col-md-8">
                    <div class="card">
                    @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{session('error')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Category delete</div>
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Category name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Deleted</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                    </thead>

                                @foreach($trachCat as $trach)
                                <tbody>
                                    <tr>
                                    <th scope="row">{{$trachCat->firstItem()+$loop->index}}</th>
                                    <td>{{$trach->category_name}} </td>
                                    <td>{{$trach->user->name}} </td>
                                    <td>{{$trach->deleted_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('/category/restore/'.$trach->id) }}" class="btn btn-info">restore</a>

                                        <a href="{{url('/category/forceddelete/'.$trach->id)}}" class="btn btn-danger">supprimer</a>
                                    </td>
                                    </tr>
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>


        </div>
         </div>

     </div>
  </x-app-layout>

