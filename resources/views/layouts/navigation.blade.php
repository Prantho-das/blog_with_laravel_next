<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-list
                ') }}"></use>
            </svg>
            {{ __('Category') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tag.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-tag

                ') }}"></use>
            </svg>
            {{ __('Tag') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post.index') }}">
            <svg class="nav-icon">

                <use xlink:href="{{ asset('icons/coreui.svg#cil-newspaper


                ') }}"></use>
            </svg>
            {{ __('Post') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('page.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-find-in-page

                ') }}"></use>
            </svg>
            {{ __('Page') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('video.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-video

                ') }}"></use>
            </svg>
        {{ __('Video') }}
        </a>
    </li>
    @can('role')
    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            Role & Permission
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>

                    {{ __('Users') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('role.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>

                    {{ __('Roles') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('permission.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>

                    {{ __('Permission') }}
                </a>
            </li>
        </ul>
    </li>
    @endcan
    @can('settings')
    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-settings') }}"></use>
            </svg>
            Setting
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route("setting.website") }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>

                    {{ __('WebSite Setup') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("setting.social") }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>

                    {{ __('Social Setup') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("setting.referer") }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>

                    {{ __('referer Setup') }}
                </a>
            </li>
        </ul>
    </li>
    @endcan
</ul>
