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
                <label class="form-label" for="exampleFormControlInput1">Facebook </label>
                <input class="form-control" id="exampleFormControlInput1" type="text" name="facebook"
                    placeholder="facebook" value="{{ get_setting('facebook') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Google</label>
                <input class="form-control" id="exampleFormControlInput1" type="text" name="google"
                    placeholder="google" value="{{ get_setting('google') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">youtube </label>
                <input class="form-control" id="exampleFormControlInput1" type="text" name="youtube"
                    placeholder="youtube" value="{{ get_setting('youtube') }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">twitter</label>
                <input class="form-control" id="exampleFormControlInput1" type="text" name="twitter"
                    placeholder="twitter" value="{{ get_setting('twitter') }}">
            </div>
            <button class="btn btn-primary rounded" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
