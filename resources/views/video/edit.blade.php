@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('video Update') }}
        </div>
        <div class="card-body">
            <form action={{ route('video.update',$video->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="title"
                        value="{{ $video->title }}" placeholder="video Name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Youtube Link</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="youtube_embed_url"
                        value="{{ $video->youtube_embed_url }}" placeholder="video Name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">External Link</label>
                    <input class="form-control" id="exampleFormControlInput1" type="url" name="link"
                        value="{{ $video->link }}" placeholder="video Name">
                </div>
                <button class="btn btn-success" type="submit">Update</button>

            </form>
        </div>

    </div>
@endsection
