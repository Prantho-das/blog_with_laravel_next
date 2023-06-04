@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{ __('Users') }}
    </div>

    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>                    <th scope="col">Role</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $roles = DB::table('roles')
                ->where('name', '!=', 'admin')
                ->get();
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? 'N/A' }}</td>
                    @php
                        $roleNames=$user->getRoleNames();
                    @endphp
                    <td>{{ count($roleNames)  > 0 ?$roleNames[0]:"N/A" }} </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-coreui-toggle="dropdown" aria-expanded="false">

                                <svg class="nav-icon" style="height: 15px;width:15px;">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-applications') }}"></use>
                                </svg>



                            </button>
                            <ul class="dropdown-menu" style="">
                                <li>
                                    @foreach ($roles as $role )
                                    <form action="{{ route('role.assignRole',$user->id) }}" class="d-inline"
                                        method="POST">

                                        @csrf
                                        <input type="hidden" name="role" value="{{ $role->name }}">
                                        <button class="dropdown-item" type="submit">{{ $role->name }}</button>
                                    </form>
                                    @endforeach


                                </li>


                            </ul>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{-- <form …>
   
      </form> --}}
    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>
@endsection
