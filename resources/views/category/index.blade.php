@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('All Category') }}
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->status == 1 ? 'active' : 'inactive' }}</td>
                                    <td>{{ $category->order }}</td>
                                    <td>
                                        @can('category edit')
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary rounded-pill" type="button">Edit</a>
                                        @endcan
                                        @can('category delete')
                                        <form method="post" class="d-inline"
                                            action="{{ route('category.destroy', $category->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger rounded-pill" type="submit">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="6" class="text-center">Please Make a Category</th>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Category Insert') }}
                </div>
                <div class="card-body">
                    <form action={{ route('category.store') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Name</label>
                            <input class="form-control" id="exampleFormControlInput1" type="text" name="name"
                                placeholder="Category Name">
                        </div>
                        <input class="form-control" id="exampleFormControlInput1" type="hidden"
                            value="{{ $categories->max('order') + 1 ?? 1 }}" name="order" />

                        <div class="mb-3">
                            <label class="form-label" for="formFile">Category Image</label>
                            <input class="form-control" id="formFile" type="file" name="image">
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name='status'
                                    checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                            </div>
                        </div>
                        <select class="form-select" id="specificSizeSelect" name="parent_id">
                            <option selected="" value="0" selected>Choose Parent...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" class="description" rows="3"></textarea>
                        </div>
                        <button class="btn btn-success" type="submit">Save</button>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
