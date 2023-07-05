@if($item->menuChildren->count())
    <ul role="menu" class="sub-menu">
        @foreach ($item->menuChildren as $menuChildren)
            <li><a href="#">{{$menuChildren->name}}</a>
                @if($menuChildren->menuChildren->count())
                    @include('users.menus.childmenu', ['item' => $menuChildren])
                @endif
            </li>
        @endforeach
    </ul>
@endif