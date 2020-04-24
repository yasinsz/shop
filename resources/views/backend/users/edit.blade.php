@extends('backend/layouts/app')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Edit</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <form class="tile" method="POST" action="{{ route('admin.users.update', $user->id)}}">
        @csrf
        @method('PUT')

        <div class="tile-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') ?? $user->name }}">
                        @error('name')
                        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') ?? $user->email }}">
                        @error('email')
                        <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                        @enderror
                    </div>
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
            <a class="btn btn-secondary" href=" {{ route('admin.users.index') }}">Cancel</a>
            <button class=" btn btn-primary pull-right ml-2" type="submit">Save</button>
            <button onclick="deleteForm.submit(); return false;" class="btn btn-danger">
                Delete
            </button>
        </div>
    </form>
    <form id="deleteForm" method="POST" action="{{ route('admin.users.destroy', $user) }}">
        @csrf
        @method('DELETE')
    </form>
</main>
@endsection