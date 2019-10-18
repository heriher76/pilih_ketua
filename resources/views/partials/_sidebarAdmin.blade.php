<ul class="sidebar navbar-nav">
  <li class="nav-item  active">
    <a class="nav-link" href="{{ url('/admin') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link " href="{{ url('/admin/pemilih') }}">
       <i class="fas fa-fw fa-users"></i>
      <span>Pemilih</span>
    </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link " href="{{ url('/admin/calon') }}">
       <i class="fas fa-fw fa-user"></i>
      <span>Calon</span>
    </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link " href="{{ url('/admin/administrator') }}">
       <i class="fas fa-fw fa-edit"></i>
      <span>Administrator</span>
    </a>
  </li>

</ul>