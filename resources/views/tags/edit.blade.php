@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('tag Update') }}
        </div>
        <div class="card-body">
            <form action={{ route('tag.update',$tag->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name"
                        value="{{ $tag->name }}" placeholder="tag Name">
                </div>
                <button class="btn btn-success" type="submit">Update</button>

            </form>
        </div>

    </div>
@endsection
