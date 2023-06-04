@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ $role->name }}.Assign Permission
        </div>
        <div class="card-body">
            <form action={{ route('permission.assignPermissionToRoleStore') }} method="post" enctype="multipart/form-data">
                @csrf
                <input class="form-control" id="exampleFormControlInput1" type="hidden" name="roleId"
                    placeholder="permission Name" value="{{ $role->id }}">
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($permissions as $permission)
                        <div class="form-check form-switch">
                            <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                value="{{ $permission->id }}" name="permissions[]" @if(in_array($permission->name,$hasPermissions)) checked @endif>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-success" type="submit">Save</button>

            </form>
        </div>

    </div>
@endsection
