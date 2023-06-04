@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Post Create') }}
    </div>

</div>
<form action={{ route('post.store') }} method="post" enctype="multipart/form-data">
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
                    <select class="form-select mb-3" id="specificSizeSelect" name="category_id">
                        <option selected="" value="0" selected>Choose Category...</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">
                            {{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <select class="js-example-basic-multiple mb-3 form-select" multiple="multiple"
                        id="specificSizeSelect" name="tags[]">
                        <option disabled>Choose Tag...</option>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlTextarea1">Short Description</label>
                        <textarea name="short_description" class="form-control" id="exampleFormControlTextarea1"
                            class="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <select name="division" class="form-select mb-3">
                        <option value="0">বিভাগ</option>
                        <option value="87">ঢাকা</option>
                        <option value="1698">চট্টগ্রাম</option>
                        <option value="1692">রাজশাহী</option>
                        <option value="1690">খুলনা</option>
                        <option value="1688">বরিশাল</option>
                        <option value="1684">সিলেট</option>
                        <option value="1682">রংপুর</option>
                        <option value="5821">ময়মনসিংহ</option>
                    </select><select name="zilla" class="form-select mb-3">
                        <option value="0">বিভাগ</option>
                        <option value="87">ঢাকা</option>
                        <option value="1698">চট্টগ্রাম</option>
                        <option value="1692">রাজশাহী</option>
                        <option value="1690">খুলনা</option>
                        <option value="1688">বরিশাল</option>
                        <option value="1684">সিলেট</option>
                        <option value="1682">রংপুর</option>
                        <option value="5821">ময়মনসিংহ</option>
                    </select><select name="upazilla" class="form-select mb-3">
                        <option value="0">বিভাগ</option>
                        <option value="87">ঢাকা</option>
                        <option value="1698">চট্টগ্রাম</option>
                        <option value="1692">রাজশাহী</option>
                        <option value="1690">খুলনা</option>
                        <option value="1688">বরিশাল</option>
                        <option value="1684">সিলেট</option>
                        <option value="1682">রংপুর</option>
                        <option value="5821">ময়মনসিংহ</option>
                    </select>
                </div>



            </div>

        </div>

        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Post Image</label>
                        <input class="form-control" id="formFile" type="file" name="image">
                    </div>
                    <select class="form-select mb-3" id="specificSizeSelect" name="post_type">
                        <option selected="" value="0" selected>Choose Post Type...</option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">
                            {{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                            <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name='status'>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Meta Title</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="meta_title"
                            placeholder="Title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlTextarea1">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="exampleFormControlTextarea1"
                            class="description" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="mb-3">  <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">reading given point</label>
                        <input class="form-control" id="exampleFormControlInput1" type="number" name="reading_given_point"
                            placeholder="point">
                    </div>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckChecked">premium content</label>
                            <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name='premium_content'>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">reading want point</label>
                        <input class="form-control" id="exampleFormControlInput1" type="number" name="reading_want_point"
                            placeholder="point">
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
    $(document).ready(function() {

    $(".js-example-basic-multiple").select2({
        'placeholder':"Select Tag"
    });
    })
</script>
@endpush
