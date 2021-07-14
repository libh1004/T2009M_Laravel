
@extends("layout")
@section("page_title","Products")
@section("main")

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <form action="{{url("admin/products/save")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{old("name")}}"/>
                            @error("name")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{old("price")}}"/>
                            @error("price")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" value="{{old("image")}}"/>
                            @error("price")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Qty</label>
                            <input type="number" name="qty" class="form-control" value="{{old("qty")}}"/>
                            @error("qty")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="text-capitalize">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="0">Select a category</option>
                                @foreach($categories as $item)
                                    <option @if(old("category_id") == $item->id)  selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{old("description")}}"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection








