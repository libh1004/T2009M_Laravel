@extends("layout")
@section("page_title","Products")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->

                <div class="col-sm-5">
                    <form action="{{url("admin/products")}}" method="get">
                        <input type="text" name="search" placeholder="Search"/>
                        <select name="category_id" class="form-control-sm">
                            <option value="0">Select category</option>
                            @foreach($categories as $category)
                                <option @if(app("request")->input("category_id")==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("admin/products/new")}}">New product</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Add to cart</th>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->qty}}</td>
{{--                            <td>{{$product->category_name}} (Su dung join table</td>--}}
{{--                            name cua category--}}
                            <td>{{$product->Category->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{formatDate($product->created_at)}}</td>
                            <td>{{formatDate($product->updated_at)}}</td>
                            <td><a href="{{url("admin/products/edit",["id"=>$product->id])}}">Edit</a></td>
                            <td>
                                <a onclick="return confirm('Chắc chắn xóa sản phẩm {{$product->name}}?')" href="{{url("admin/products/delete",["id"=>$product->id])}}">Delete</a>
                            </td>
                            <td>
                                <a href="{{url("/add-to-cart/".$product->id)}}">Add to cart</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    {!! $products->appends(request()->input())->links("vendor.pagination.default") !!}--}}
                </div>
            </div>
        </div>
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
@endsection

