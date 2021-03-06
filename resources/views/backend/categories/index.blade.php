@extends('backend/layouts/app')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Categories</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Categories</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="sampleTable_filter" class="dataTables_filter pt-2">
                                    Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} entries
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <!-- <th>Description</th>
                                            <th>Price</th>
                                            <th>MSRP</th>
                                            <th>Stock</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <!-- <td>{{ $category->description }}</td>
                                            <td>{{ $category->price }}€</td>
                                            <td>@if($category->msrp) {{ $category->msrp }}€ @endif</td>
                                            <td>{{ $category->stock }}</td> -->
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm w-100">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <div class="paging_simple_numbers">
                                    <ul class="pagination justify-content-center">
                                        <li class="paginate_button page-item previous disabled"><a href="#" aria-controls="sampleTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="sampleTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next"><a href="#" aria-controls="sampleTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="pagination justify-content-center">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection