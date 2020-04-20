@extends('backend/layouts/app')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Edit</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Categories</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <form class="tile" method="POST" action="{{ route('admin.categories.update', $category->id)}}">
        @csrf
        @method('PUT')
        <div class="tile-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') ?? $category->name }}">
                        @error('name')
                        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <select name="products[]" autocomplete="off" size="20" multiple>
                            @foreach($products as $product)
                            <<option @if($selectedProducts->contains($product)) selected @endif
                                value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                        </select>
                        @error('name')
                        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" name="description">{{ old('description') ?? $category->description }}</textarea>
                        @error('description')
                        <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input class="form-control" type="text" name="price" value="{{ old('price') ?? $category->price }}">
                        @error('price')
                        <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">MSRP</label>
                        <input class="form-control" type="text" name="msrp" value="{{ old('msrp') ?? $category->msrp }}">
                        @error('msrp')
                        <p class="invalid-feedback">{{ $errors->first('msrp') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Stock</label>
                        <input class="form-control" type="text" name="stock" value="{{ old('stock') ?? $category->stock }}">
                        @error('stock')
                        <p class="invalid-feedback">{{ $errors->first('stock') }}</p>
                        @enderror
                    </div> -->
                </div>
                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <div class="form-control py-3">
                            <img class="w-100 mb-3" src="https://via.placeholder.com/150" />
                            <input type="file">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="tile-footer">
            <a class="btn btn-secondary" href=" {{ route('admin.categories.index') }}">Cancel</a>
            <button class=" btn btn-primary pull-right ml-2" type="submit">Save</button>
            <button onclick="deleteForm.submit(); return false;" class="btn btn-danger">
                Delete
            </button>
        </div>
    </form>
    <form id="deleteForm" method="POST" action="{{ route('admin.categories.destroy', $category) }}">
        @csrf
        @method('DELETE')
    </form>
</main>
@endsection