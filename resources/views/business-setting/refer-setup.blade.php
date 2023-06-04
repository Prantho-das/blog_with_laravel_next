@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Refer Setup') }}
</div>
    <div class="card-body">
        <form action="{{ route('setting.website-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Refer Point </label>
                <input class="form-control" id="exampleFormControlInput1" type="number" name="refer_point"
                    placeholder="Refer Point" value="{{ get_setting('refer_point') }}">
            </div>
            <button class="btn btn-primary rounded" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
