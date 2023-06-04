@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-12">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('All video') }}
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">video</th>
                            <th scope="col">link</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($videos as $video)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->youtube_embed_url }}</td>
                            <td>{{ $video->link }}</td>

                            <td>
                                <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary rounded-pill"
                                    type="button">Edit</a>
                                <form method="post" class="d-inline" action="{{ route('video.destroy', $video->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger rounded-pill" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row" colspan="6" class="text-center">Please Make a video</th>
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
                {{ __('video Insert') }}
            </div>
            <div class="card-body">
                <form action={{ route('video.store') }} method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Name</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="title"
                            placeholder="video title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Name</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="youtube_embed_url"
                            placeholder="video youtube link">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">External Link</label>
                        <input class="form-control" id="exampleFormControlInput1" type="url" name="link"
                            placeholder="Link">
                    </div>
                    <button class="btn btn-success" type="submit">Save</button>

                </form>
            </div>

        </div>

    </div>
</div>
@endsection
