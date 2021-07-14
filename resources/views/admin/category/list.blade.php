@extends("layout")
@section("page_title","Categories")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-5">
                    <form action="{{url("admin/categories")}}" method="get">
                        <input name="search" type="text" placeholder="Search"/>
                        <select class="form-control-sm">
                            <option value="0">Select brand</option>
                            @foreach($brands as $brand)
                                <option @if(app("request")->input("brand_id")==$brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("admin/categories/new")}}">New category</a></li>
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
                            <th>Brand</th>
                            <th>Product count</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->Brand['name']}}</td>
{{--                                <td>{{$category->Brand["name"]}}</td>--}}
                                <td>{{$category->products_count}}</td>
                                <td>{{formatDate($category->created_at)}}</td>
                                <td>{{formatDate($category->updated_at)}}</td>
                                <td><a href="{{url("admin/products/productsCate",["id"=>$category->id])}}">Details</a></td>
                                <td><a href="{{url("admin/categories/edit",["id"=>$category->id])}}">Edit</a> </td>
                                <td><a onclick="return confirm('Chac chan xoa loai {{$category->name}}?')" href="{{url("admin/categories/delete",["id"=>$category->id])}}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    {!! $categories->appends(request()->input())->links("vendor.pagination.default") !!}--}}
                </div>
            </div>
        </div>
    </section>
@endsection
