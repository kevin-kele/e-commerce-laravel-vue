<x-app-layout>
    <x-slot name="header">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                    <div class="card">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form action="{{ url('/category/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="inputName">Category Name</label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{$categories->category_name}}" name="category_name" id="inputName">
                                        @error('category_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                 </div>
                                </div>
                                 <button type="submit" class="btn btn-primary mt-2">Edit category</button>
                            </form>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
