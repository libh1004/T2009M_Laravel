@extends("layout")
@section("page_title","Books")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-5">
                    <form action="{{url("/books")}}" method="get">
                        <input name="search" type="text" placeholder="Search"/>
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("books/create-book")}}">Add new book</a></li>
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
                            <th>AuthorId</th>
                            <th>Title</th>
                            <th>ISBN</th>
                            <th>Pub_year</th>
                            <th>Available</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$book->author_id}}</td>
                                <td>{{$book->title}}/></td>
                                <td>{{$book->isbn}}</td>
                                <td>{{$book->pub_year}}</td>
                                <td>{{$book->available}}</td>
                                <td>{{formatDate($book->created_at)}}</td>
                                <td>{{formatDate($book->updated_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $books->appends(request()->input())->links("vendor.pagination.default") !!}

                </div>
            </div>
        </div>
    </section>
@endsection
