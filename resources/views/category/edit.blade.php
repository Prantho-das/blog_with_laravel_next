@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Category Update') }}
        </div>
        <div class="card-body">
            <form action={{ route('category.update',$category->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Name</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="name"
                        value="{{ $category->name }}" placeholder="Category Name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlInput1">Order</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" min="{{ $category->order }}"
                        value="{{ $category->order }}" name="order" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="formFile">Category Image</label>
                    <input class="form-control" id="formFile" type="file" name="image">
                    <div class="my-3" style=" height: 200px; width:200px;position:relative">
                        <img class="img-fluid w-100 h-100" src="{{ asset('storage/'.$category->image) }}" alt="">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name='status'
                             @if ($category->status == 1) checked @endif>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                    </div>
                </div>
                <select class="form-select" id="specificSizeSelect" name="parent_id">
                    <option selected="" value="0" selected>Choose Parent...</option>
                    @foreach (App\Models\Category::whereNot('id',$category->id)->get() as $cat)
                        <option value="{{ $cat->id }}" @if ($category->parent_id == $cat->id) selected @endif>
                            {{ $cat->name }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                    <textarea value="{{ $category->description }}" name="description" class="form-control" id="exampleFormControlTextarea1"
                        class="description" rows="3">{{ $category->description }}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Update</button>

            </form>
        </div>

    </div>
@endsection
