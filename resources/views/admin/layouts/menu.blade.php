<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('categories','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-align-left"></i>
        <span class="title">{{trans('admin.categories')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('categories','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('categories','active open')}}  ">
            <a href="{{aurl('categories')}}" class="nav-link ">
                <i class="fa fa-align-left"></i>
                <span class="title">{{trans('admin.categories')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('categories/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('article','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-align-left"></i>
        <span class="title">{{trans('admin.article')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('article','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('article','active open')}}  ">
            <a href="{{aurl('article')}}" class="nav-link ">
                <i class="fa fa-align-left"></i>
                <span class="title">{{trans('admin.article')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('article/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item start {{active_link('settings','active open')}}  ">
    <a href="{{aurl('settings')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.settings')}}</span>
        <span class="selected"></span>
    </a>
</li>
