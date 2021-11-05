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
                        <div class="card-header">All brand</div>
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Brand name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    source ~/.profile

                                @foreach($brands as $brand)
                                <tbody>
                                    <tr>
                                    <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                    <td>{{$brand->brand_name}} </td>
                                    <td> <img src="{{asset($brand->brand_image)}}" style="height: 40px; width:70px"></td>
                                    <td>{{$brand->created_at->diffForHumans()}}</td>
                                    <td>
                                    <td>
                                        <a href="{{ url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('/brand/'.$brand->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                    </td>
                                    </tr>
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add brand</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group ">

                                    <div class="col-sm-1-12 m-2">
                                    <label for="inputName">brand Name</label>
                                        <input type="text" class="form-control" name="brand_name">
                                        @error('brand_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-1-12 m-2">
                                    <label for="inputName">brand Image</label>
                                        <input type="file" class="form-control" name="brand_image">
                                        @error('brand_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <button type="submit" class="btn btn-primary mt-2">Add brand</button>
                            </form>
                        </div>

                    </div>
                </div>

        </div>
         </div>

     </div>

</x-app-layout>
