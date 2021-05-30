<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('lessons*') ? 'active' : '' }}">
        Уроки
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('lessons.index') }}"
       class="nav-link {{ Request::is('lessons*') ? 'active' : '' }}">
        Редактирование
    </a>
</li>
