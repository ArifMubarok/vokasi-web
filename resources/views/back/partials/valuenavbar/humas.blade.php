

<li class="nav-item">
  <a href="{{ route('dashboard') }}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p> Dashboard</p>
  </a>
</li>
<li class="nav-header">Validasi</li>
<li class="nav-item">
  <a href="{{ route('humas.validasi.index') }}" class="nav-link">
    <i class="nav-icon fas fa-circle"></i>
    <p> Pengabdian Masyarakat</p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Manajemen Berita
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('humas.manajemen-berita.berita.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Berita</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('humas.manajemen-berita.kategori.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Kategori</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('humas.manajemen-berita.info-penting.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Informasi Penting (PMB UNS)</p>
      </a>
    </li>
  </ul>
</li>

  {{-- <li class=" dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      <li><a href="#" class="dropdown-item">Some action </a></li>
      <li><a href="#" class="dropdown-item">Some other action</a></li>

      <li class="dropdown-divider"></li>

      <!-- Level two dropdown-->
      <li class="dropdown-submenu dropdown-hover">
        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
          <li>
            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
          </li>

          <!-- Level three dropdown-->
          <li class="dropdown-submenu">
            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">3rd level</a></li>
              <li><a href="#" class="dropdown-item">3rd level</a></li>
            </ul>
          </li>
          <!-- End Level three -->

          <li><a href="#" class="dropdown-item">level 2</a></li>
          <li><a href="#" class="dropdown-item">level 2</a></li>
        </ul>
      </li>
      <!-- End Level two -->
    </ul>
  </li> --}}