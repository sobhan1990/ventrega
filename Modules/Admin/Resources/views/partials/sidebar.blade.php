<div class="page-container" style="min-height:360px">

<!-- Page content -->
<div class="page-content">

<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
<div class="sidebar-content">
<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
        <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="" data-original-title="admin"></i></li>
            <li class="active"><a href="{{url('admin')}}" class="legitRipple"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

             @foreach($menus as $key => $link)
            <li class="">
                <a href="{{$link}}" class="has-ul legitRipple"><i class="icon-stack2"></i> <span>{{ucfirst($key)}}</span>
                    <span class="legitRipple-ripple"></span></a>
                 
            </li>

            @endforeach



           <!--  <li class="">
                <a href="{{route('role')}}" class="has-ul legitRipple"><i class="icon-stack2"></i> <span>Roles</span>
                    <span class="legitRipple-ripple"></span></a>
                <ul class="hidden-ul" style="display: none;">
                <li><a href="{{route('role.create')}}" class="legitRipple">Create Role</a></li> 
                <li><a href="{{route('role')}}" class="legitRipple">View Roles</a></li> 
                </ul>
            </li>

           


             <li class="{{($viewPage=='Category')?'active':''}}">
                <a href="#" class="has-ul legitRipple"><i class="icon-stack2"></i> <span>Manage Categories</span>
                    <span class="legitRipple-ripple"></span></a>
                <ul class="hidden-ul" style="display: {{($viewPage=='Category')?'block':'none'}};">
                    <li><a href="{{route('category')}}" class="legitRipple">Category</a></li> 
                    <li><a href="{{route('sub-category')}}" class="legitRipple">Sub Category</a></li> 
                </ul>
            </li>

             <li class="">
                <a href="{{route('setting')}}" class="has-ul legitRipple"><i class="icon-stack2"></i> <span>Website Settings</span>
                    <span class="legitRipple-ripple"></span></a>
                <ul class="hidden-ul" style="display: none;">
                <li><a href="{{route('setting')}}" class="legitRipple">Settings</a></li>  
                </ul>
            </li>
 -->
           
        </ul>
    </div>
</div>
<!-- /main navigation -->               
</div>
</div>
 <div class="content-wrapper">


