<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
        <i class="fas fa-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">CMS</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Blog
</div>

<!-- Nav Item - Posts Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-tasks fa-cog"></i>
        <span>Posts</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts Components:</h6>
            <a class="collapse-item" href="posts.php">View All Posts</a>
            <a class="collapse-item" href="posts.php?source=add_post">Add Posts</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="categories.php">
        <i class="fas fa-bars fa-chart-area"></i>
        <span>Categories</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="comments.php">
        <i class="fas fa-comments fa-chart-area"></i>
        <span>Comments</span></a>
</li>

<!-- Nav Item - Utilities Users Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-users "></i>
        <span>Users</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users Components:</h6>
            <a class="collapse-item" href="users.php">View All Users</a>
            <a class="collapse-item" href="users.php?source=add_user">Add User</a>
        </div>
    </div>
</li>
<!-- Profile -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profile"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
    <div id="profile" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users Components:</h6>
            <a class="collapse-item" href="profile.php">View Profile</a>
            <a class="collapse-item" href="profile.php?source=change_password">Change Password</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Portofolio
</div>

<!-- Nav Item -About -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about"
        aria-expanded="true" aria-controls="about">
        <i class="fas fa-folder fa-cog"></i>
        <span>About</span>
    </a>
    <div id="about" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">About Components:</h6>
            <a class="collapse-item" href="about_text.php">Text</a>
            <a class="collapse-item" href="about_photo.php">Photo</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="header_blog.php">
        <i class="fas fa-folder fa-chart-area"></i>
        <span>Header</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>