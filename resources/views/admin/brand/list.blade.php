@extends("layout")
@section("page_title","Brands")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("admin/brands/new")}}">New brand</a></li>
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
                            <th>Logo</th>
                            <th>Color</th>
                            <th>Category count</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$brand->name}}</td>
                                <td><img height="50px" width="50px" src="{{$brand->getLogo()}}"/></td>
                                <td>{{$brand->color}}</td>
{{--                                // category_count lay tu dd(categories) // su dung withCount--}}
                                <td>{{$brand->categories_count}}</td>
                                <td>{{$brand->description}}</td>
                                <td>{{formatDate($brand->created_at)}}</td>
                                <td>{{formatDate($brand->updated_at)}}</td>
                                <td><a href="{{url("admin/categories/categoriesBrand",["id"=>$brand->id])}}">Details</a></td>
                                <td><a href="{{url("admin/brands/edit",["id"=>$brand->id])}}">Edit</a> </td>
                                <td><a onclick="return confirm('Chac chan xoa hang {{$brand->name}}?')" href="{{url("admin/brands/delete",["id"=>$brand->id])}}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $brands->appends(request()->input())->links("vendor.pagination.default") !!}
                </div>
            </div>
        </div>
    </section>
@endsection

