<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ (request()->is('admin/')) ? 'active' : '' }}" href="{{ url('/admin') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        <li>
            <a class="app-menu__item {{ (request()->is('admin/products*')) ? 'active' : '' }}" href="{{ url('/admin/products') }}"><i class="app-menu__icon fa fa-cube"></i><span class="app-menu__label">Products</span></a>
        </li>
        <li>
            <a class="app-menu__item {{ (request()->is('admin/categories*')) ? 'active' : '' }}" href="{{ url('/admin/categories') }}"><i class="app-menu__icon fa fa-files-o"></i><span class="app-menu__label">Categories</span></a>
        </li>
        <li>
            <a class="app-menu__item {{ (request()->is('admin/orders*')) ? 'active' : '' }}" href="{{ url('/admin/orders') }}"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Orders</span></a>
        </li>
        <li>
            <a class="app-menu__item {{ (request()->is('admin/users*')) ? 'active' : '' }}" href="{{ url('/admin/users') }}"><i class="app-menu__icon fa fa-user-o"></i><span class="app-menu__label">Users</span></a>
        </li>
    </ul>
</aside>