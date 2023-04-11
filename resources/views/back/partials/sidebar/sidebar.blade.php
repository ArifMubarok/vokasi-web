<!-- Brand Logo -->
<a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{asset('assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
    <span class="brand-text font-weight-light">Vokasi CMS</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    @include('back.partials.sidebar.user')

    @include('back.partials.sidebar.search')

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @switch(auth()->user()->role_id)
              @case(1)
                @include('back.partials.valuenavbar.superadmin')
                  @break
              @case(2)
                @include('back.partials.valuenavbar.admin')
                  @break
              @case(3)
                @include('back.partials.valuenavbar.humas')
                  @break
              @case(4)
                @include('back.partials.valuenavbar.translator')
                  @break
              @default
                  @error(403)
                      
                  @enderror
          @endswitch
      </ul>
    </nav>
</div>

{{-- sidebar-custom --}}
<div class="sidebar-custom">
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger hide-on-collapse pos-left">Logout</button>
  </form>
</div>
<!-- /.sidebar-custom -->