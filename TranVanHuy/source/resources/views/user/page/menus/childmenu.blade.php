@if($item->menuChildren->count())
    {{-- <ul role="menu" class="sub-menu">
        @foreach ($item->menuChildren as $menuChildren)
            <li><a href="#">{{$menuChildren->name}}</a>
                @if($menuChildren->menuChildren->count())
                    @include('user.page.menus.childmenu', ['item' => $menuChildren])
                @endif
            </li>
        @endforeach
    </ul> --}}
    <div class="dropdown-menu" aria-labelledby="dropdown04">
        @foreach ($item->menuChildren as $menuChildren)
            {{-- <li> --}}
                <a class="dropdown-item"
                href="{{ route($menuChildren->slug) }}"
                >{{$menuChildren->name}}
                    @if($menuChildren->menuChildren->count())
                        @include('user.page.menus.childmenu', ['item' => $menuChildren])
                    @endif
                </a>
            {{-- </li> --}}
        @endforeach
    </div>
@endif
