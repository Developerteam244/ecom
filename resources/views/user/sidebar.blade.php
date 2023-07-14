<div class="account__left--sidebar">
    <h2 class="account__content--title mb-20">My Profile</h2>
    <div class="profile_image">
        <img src="{{asset('storage/user_image/nawaul-edit.jpg')}}" alt="">
    </div>
    <ul class="account__menu">
        <li class="account__menu--list"><a href="{{url('user/manage_profile')}}">Manage Profile</a></li>
        <li class="account__menu--list active"><a href="{{url('user/dashboard')}}">Dashboard</a></li>
        <li class="account__menu--list"><a href="wishlist.html">Wishlist</a></li>
        <li class="account__menu--list"><a href="{{asset('logout')}}">Log Out</a></li>
    </ul>
</div>
