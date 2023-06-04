@extends('layouts.app')

@section('content')

<div class="card mb-4">
    <div class="card-header d-flex">
        <p class="mr-auto" style="margin-right: auto;">{{ __('All page') }}</p>
        <a href="{{ route('page.create') }}" class="btn btn-success" type="submit">Create</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Link</th>

                    <th scope="col">Image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->link }}</td>

                    <td style="height:100px;width:100px;"> <img class="img-fluid" src="{{ asset('/storage/'.$page->banner)}}" alt="">
                    </td>
                    <td>
                        <a href="{{ route('page.edit',$page->id) }}" class="btn btn-primary rounded-pill"
                            type="button">Edit</a>
                        <form method="page" class="d-inline" action="{{ route('page.destroy', $page->id) }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger rounded-pill" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="9" class="text-center">Please Make a page</th>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@endsection
