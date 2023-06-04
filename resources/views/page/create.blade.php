@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Page Create') }}
    </div>

</div>
<form action={{ route('page.store') }} method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Title</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="title"
                            placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Additional Link</label>
                        <input class="form-control" id="exampleFormControlInput1" type="url" name="link"
                            placeholder="Link">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Page Banner</label>
                        <input class="form-control" id="formFile" type="file" name="banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card my-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlTextarea1">Long Description</label>
                        <input id="x" type="hidden" name="description">
                        <trix-editor input="x"></trix-editor>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <button class="btn btn-success" type="submit">Save</button>
</form>
@endsection
@push('script')

<script>
    $(".js-example-theme-multiple").select2();
</script>
@endpush
