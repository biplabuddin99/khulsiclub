

<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-gear-fill"></i>
            <span>{{__('Settings')}}</span>
        </a>
        <ul class="submenu">

            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Country')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.country.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.country.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Division')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.division.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.division.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('District')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.district.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.district.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Upazila')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.upazila.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.upazila.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Thana')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.thana.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.thana.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub">
                <a href="#" class='sidebar-link'> {{__('Unit')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.unit.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.unit.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item">
        <a href="{{route(currentUser().'.settings.index')}}"><i class="bi bi-gear-fill"></i> &nbsp;&nbsp;&nbsp;{{__('Manage Website')}}</a>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-person-fill"></i> <span>{{__('User')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.admin.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.admin.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-sliders"></i> <span>{{__('Slider')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.slider.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.slider.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i> <span>{{__('Our Members')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.ourMember.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.ourMember.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-bag-plus-fill"></i> <span>{{__('Benefits')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.benefit.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.benefit.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-card-image"></i> <span>{{__('Photo Gallery Category')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.pGalleryCat.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.pGalleryCat.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-card-image"></i> <span>{{__('Photo Gallery')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.pGallery.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.pGallery.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-tag-fill"></i> <span>{{__('Tags')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.tag.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.tag.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-bell-fill"></i> <span>{{__('Notice')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.notice.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.notice.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-bag-plus-fill"></i> <span>{{__('Facilities')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.facilities.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.facilities.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-collection-play-fill"></i> <span>{{__('Video Gallery Caption')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.vgallery.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.vgallery.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-collection-play-fill"></i> <span>{{__('Video Gallery Category')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.vgalleryCat.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.vgalleryCat.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-sticky-fill"></i> <span>{{__('Blog Category')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.blogcategory.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.blogcategory.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
    <li class="submenu-item sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-sticky-fill"></i> <span>{{__('Blog')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.blog.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.blog.create')}}">{{__('Add New')}}</a></li>
        </ul>
    </li>
</ul>
