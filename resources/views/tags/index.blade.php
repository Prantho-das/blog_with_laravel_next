@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7 col-12">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('All Tag') }}
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>
                                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary rounded-pill"
                                            type="button">Edit</a>
                                        <form method="post" class="d-inline" action="{{ route('tag.destroy', $tag->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger rounded-pill" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="6" class="text-center">Please Make a tag</th>
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
                    {{ __('tag Insert') }}
                </div>
                <div class="card-body">
                    <form action={{ route('tag.store') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Name</label>
                            <input class="form-control" id="exampleFormControlInput1" type="text" name="name"
                                placeholder="tag Name">
                        </div>
                        <button class="btn btn-success" type="submit">Save</button>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
