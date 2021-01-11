<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href={{ route('home-admin') }}>Admin</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Table</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('table-dataUsers')}}">Data User</a></li>
            </ul>
          </li>
      </ul>
    </aside>
</div>