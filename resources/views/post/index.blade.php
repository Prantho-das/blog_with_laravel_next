@extends('layouts.app')

@section('content')

<div class="card mb-4">
    <div class="card-header d-flex">
        <p class="mr-auto" style="margin-right: auto;">{{ __('All Post') }}</p>
        <a href="{{ route('post.create') }}" class="btn btn-success" type="submit">Create</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Post Type</th>
                    <th scope="col">Approved</th>
                                        <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->status == 1 ? 'active' : 'inactive' }}</td>
                    <td>{{ $post->category->name ?? 'N/A' }}</td>
                    <td>{{ $post->user? $post->user->name:"N/A" }}</td>
                    <td>{{ $post->post_type }}</td>
                    <td>{{ $post->approved_at ?? "Not Approved" }}</td>

                    <td>
                        @if($post->approved_at==null)
                        <a href="{{ route('post.approve',['post'=>$post->id]) }}" class="btn btn-info rounded-pill"
                            type="button">Approve</a>
                        @endif
                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary rounded-pill"
                            type="button">Edit</a>
                        <form method="post" class="d-inline" action="{{ route('post.destroy', $post->id) }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger rounded-pill" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="9" class="text-center">Please Make a post</th>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@endsection
