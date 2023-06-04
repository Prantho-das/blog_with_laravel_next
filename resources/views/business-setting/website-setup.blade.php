@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Website Setup') }}
    </div>
    <div class="card-body">
        <form action="{{ route('setting.website-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Sute Name</label>
                <input class="form-control" id="exampleFormControlInput1" type="text" name="site_name"
                    placeholder="Title" value="{{ get_setting('site_name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="formFile">Logo</label>
                <input class="form-control" id="formFile" type="file" name="logo">
                @php
                $logo=get_setting('logo');
                @endphp
                @if($logo)
                <img src="{{ asset('/storage/'.$logo) }}" style="height:200px;widht:200px;" class="img-fluild mt-3"
                    alt="">
                @endif
            </div> <div class="mb-3">
                <label class="form-label" for="formFile">Fab Icon</label>
                <input class="form-control" id="formFile" type="file" name="fab_icon">
                @php
                $logo=get_setting('fab_icon');
                @endphp
                @if($logo)
                <img src="{{ asset('/storage/'.$logo) }}" style="height:200px;widht:200px;" class="img-fluild mt-3"
                    alt="">
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1">Long Description</label>
                <input id="x" type="hidden" name="description" value="{{ get_setting('description') }}">
                <trix-editor input="x"></trix-editor>
            </div>
            <button class="btn btn-primary rounded" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
