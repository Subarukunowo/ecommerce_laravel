<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | RPL</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">RPL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product') }}">
                    <i class="fas fa-box"></i> <span>Produk</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/distributors*') ? 'active' : '' }}">
    <a href="{{ route('admin.distributors.index') }}">
        <i class="fas fa-truck"></i> 
        <span>Distributors</span>
    </a>
</li>
<li class="{{ Request::is('flashsale') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.flashsale') }}"><i class="fas fa-percentage"></i>
                    <span>Diskon</span></a>
            </li>

        </ul>
    </aside>
</div>
