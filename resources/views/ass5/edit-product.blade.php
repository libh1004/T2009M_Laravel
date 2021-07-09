@extends("layout")
@section("page_title","Products")
@section("main")
    <h1 style="font-size: 20px">Edit product</h1>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>CategoryID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Apple watch</td>
                <td>4500</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
