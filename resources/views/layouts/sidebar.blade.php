<div class="sidebar" data-color="purple" data-image="{{ asset('img/sidebar-5.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text">Back Office</a>
        </div>

        <ul class="nav">
            <li id="dashboard">
                <a href="{{ route('home') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li id="users-management">
                <a href="{{ route('users.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Users Management</p>
                </a>
            </li>
        </ul>
    </div>
</div>