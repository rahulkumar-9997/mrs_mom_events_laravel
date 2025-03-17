<div class="page-sidebar ">
   <!-- MAIN MENU - START -->
   <div class="page-sidebar-wrapper" id="main-menu-wrapper">
      <!-- USER INFO - START -->
      <div class="profile-info row">
         <div class="profile-image col-md-4 col-sm-4 col-xs-4">
            <a href="{{route('manage-profile')}}">
            @if(Auth::user()->profile_img)
               <img src="{{ asset('profile-img/' . Auth::user()->profile_img) }}" class="img-responsive img-circle database">
            @else
               <img src="{{asset('backend/assets/images/profile-hospital.jpg')}}" class="img-responsive img-circle not">
            @endif
            </a>
         </div>
         <div class="profile-details col-md-8 col-sm-8 col-xs-8">
            <h3>
               <a href="{{route('manage-profile')}}">{{Auth::user()->name}}</a>
              
            </h3>
            <p class="profile-title">{{Auth::user()->email}}</p>
         </div>
      </div>
      <!-- USER INFO - END -->
      <ul class='wraplist'>
         <li class="{{ request()->is('dashboard') ? 'open' : ''}}"> 
            <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i>
            <span class="title">Dashboard</span>
            </a>
         </li>
         <li class="{{ request()->is('manage-testimonials') ? 'open' : ''}} {{ request()->is('manage-testimonials/add') ? 'open' : ''}}">
            <a href="javascript:;">
            <i class="fa fa-user"></i>
            <span class="title">Manage User</span>
            </a>
            <ul class="sub-menu" >
               <li>
                  <a class="" href="{{ route('users') }}"> User</a>
               </li>
               <li>
                  <a class="" href="{{ route('roles.index') }}">Roles</a>
               </li>
               <li>
                  <a class="" href="{{ route('permissions.index') }}">Permissions</a>
               </li>
               
            </ul>
         </li>
         <li class="{{ request()->is('manage-feature-logo') ? 'open' : ''}}"> 
            <a href="{{route('manage-feature-logo')}}">
            <i class="fa fa-th-list"></i>
            <span class="title">Proud Associates</span>
            </a>
         </li>
         <li class="{{ request()->is('manage-testimonials') ? 'open' : ''}} {{ request()->is('manage-testimonials/add') ? 'open' : ''}}">
            <a href="javascript:;">
            <i class="fa fa-suitcase"></i>
            <span class="title">Manage Testimonials</span>
            </a>
            <ul class="sub-menu" >
               <li>
                  <a class="" href="{{route('manage-testimonials')}}"> Testimonials</a>
               </li>
               <li>
                  <a class="" href="{{route('manage-testimonials.add')}}">Add Testimonials</a>
               </li>
               
            </ul>
         </li>
         <!--<li class="{{ request()->is('manage-our-work') ? 'open' : ''}} {{ request()->is('manage-our-work/add') ? 'open' : ''}}">
            <a href="javascript:;">
            <i class="fa fa-external-link"></i>
            <span class="title">Manage Our Works</span>
            </a>
            <ul class="sub-menu" >
               <li>
                  <a class="" href="{{route('manage-our-work')}}"> Our Work</a>
               </li>
               <li>
                  <a class="" href="{{route('manage-our-work.add')}}">Add Our Work</a>
               </li>
               
            </ul>
         </li>-->
         <li class="{{ request()->is('manage-media') ? 'open' : ''}} {{ request()->is('manage-media/add') ? 'open' : ''}}">
            <a href="javascript:;">
            <i class="fa fa-cloud-download"></i>
            <span class="title">Manage Media</span>
            </a>
            <ul class="sub-menu" >
               <li>
                  <a class="" href="{{route('manage-media')}}">Media</a>
               </li>
               <li>
                  <a class="" href="{{route('manage-media.add')}}">Add Media Images</a>
               </li>
               
            </ul>
         </li>
         <li class="{{ request()->is('manage-blog') ? 'open' : ''}} {{ request()->is('manage-blog/add') ? 'open' : ''}}">
            <a href="javascript:;">
            <i class="fa fa-clipboard"></i>
            <span class="title">Manage Blog</span>
            </a>
            <ul class="sub-menu" >
               <li>
                  <a class="" href="{{route('manage-blog')}}">Blog</a>
               </li>
               <li>
                  <a class="" href="{{route('manage-blog.add')}}">Add new blog</a>
               </li>
               
            </ul>
         </li>
         <!--<li class="{{ request()->is('manage-ibucare') ? 'open' : ''}} {{ request()->is('manage-ibucare/add') ? 'open' : ''}}">
            <a href="javascript:;">
            <i class="fa fa-hospital-o"></i>
            <span class="title">Manage IBU Care</span>
            </a>
            <ul class="sub-menu" >
               <li>
                  <a class="" href="{{route('manage-ibucare')}}">Ibucare</a>
               </li>
               <li>
                  <a class="" href="{{route('manage-ibucare.add')}}">Add new ibucare</a>
               </li>
               
            </ul>
         </li>-->
         <li class="{{ request()->is('foundation-category*') ? 'open' : ''}} {{ request()->is('foundation-image*') ? 'open' : ''}}">
            <a href="javascript:;">
               <i class="fa fa-folder-open"></i>
               <span class="title">Manage Gallery</span>
            </a>
            <ul class="sub-menu">
               <li>
                     <a class="" href="{{ route('gallery-category.index') }}">Gallery Category</a>
               </li>
               
            </ul>
         </li>
         <li class="{{ request()->is('foundation-category*') ? 'open' : ''}} {{ request()->is('foundation-image*') ? 'open' : ''}}">
            <a href="javascript:;">
               <i class="fa fa-folder-open"></i>
               <span class="title">Manage Home</span>
            </a>
            <ul class="sub-menu">
               <li>
                     <a class="" href="{{ route('home-slider') }}">Home Slider</a>
               </li>
            </ul>
         </li>
      </ul>
   </div>
   <div class="project-info">
      <div class="block1">
         <div class="data">
         <div class="clock">
            <div id="Date"></div>
            <ul>
               <li id="hours"></li>
               <li id="point">:</li>
               <li id="min"></li>
               <li id="point">:</li>
               <li id="sec"></li>
            </ul>
         </div>
      </div>
   </div>
   </div>
</div>