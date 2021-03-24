<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-title">{{ trans('macyo_custom.stores_related') }}</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('subcategory') }}'><i class='nav-icon la la-th-list'></i> {{ trans('macyo_custom.subcategories') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('store') }}'><i class='nav-icon la la-map-marker'></i> {{ trans('macyo_custom.stores') }}</a></li>

<li class="nav-title">{{ trans('macyo_custom.users_related') }}</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-user'></i> {{ trans('macyo_custom.users') }}</a></li>


{{--<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-user"></i> Users</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-users'></i> All users</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user?role=1') }}'><i class='nav-icon la la-user'></i> Basic users</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user?role=2') }}'><i class='nav-icon la la-user'></i> Stores managers</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user?role=3') }}'><i class='nav-icon la la-user'></i> Moderators</a></li>
    </ul>
</li>--}}

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('rating') }}'><i class='nav-icon la la-star-o'></i> {{ trans('macyo_custom.ratings') }}</a></li>
