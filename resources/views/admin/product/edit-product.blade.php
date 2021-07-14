
@extends("layout")
@section("page_title","Products")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit product</li>
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
                    <form action="{{url("admin/products/update",["id"=>$product->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}"/>
                            @error("name")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-capitalize">Image</label>
                            <input type="text" name="image" class="form-control" value="{{$product->image}}"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{$product->description}}"/>
                        </div>
                        <div class="form-group">
                            <label class="text-capitalize">Price</label>
                            <input type="number" name="price" class="form-control" value="{{$product->price}}"/>
                            @error("price")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" name="qty" class="form-control" value="{{$product->qty}}"/>
                        </div>
                        <div class="form-group">
                            <label class="text-capitalize">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="0">Select a category</option>
                                @foreach($categories as $category)
                                    <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection








