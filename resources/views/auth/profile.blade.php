@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('My profile') }}
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="height: 100px;
        width: 100px;
        overflow: hidden;
        background-position: center;" class="rounded-circle mx-auto my-3">
            <img class="img-fluid" src="{{ asset('storage/'.auth()->user()->avatar) }}" />
        </div>

        <div class="card-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif

            <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-camera') }}"></use>
                    </svg></span>
                <input class="form-control" id="formFile" type="file" name="avatar">

                @error('name')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                <input class="form-control" type="text" name="name" placeholder="{{ __('Name') }}"
                    value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                <input class="form-control" type="text" name="email" placeholder="{{ __('Email') }}"
                    value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-phone
                                                  ') }}">
                        </use>
                    </svg></span>
                <input class="form-control" type="tel" value="{{ old('phone', auth()->user()->phone) }}" name="phone"
                    placeholder="{{ __('Phone') }}" required autocomplete="phone">
                @error('phone')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="{{ __('New password') }}" required>
                @error('password')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                    name="password_confirmation" placeholder="{{ __('New password confirmation') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                <textarea value="{{ old('address',auth()->user()->address) }}" name="address" class="form-control"
                    id="exampleFormControlTextarea1" class="description"
                    rows="3">{{ auth()->user()->address }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit">{{ __('Submit') }}</button>
        </div>

    </form>

</div>
@endsection
