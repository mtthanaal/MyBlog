<header class="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      
      <div class="navbar-header">
        <!-- Navbar Header -->
        <a href="index.html" class="navbar-brand">
          <div class="brand-text brand-big visible text-uppercase">
            <strong class="text-primary">Thanaal</strong><strong>Admin</strong>
          </div>
          <div class="brand-text brand-sm">
            <strong class="text-primary">D</strong><strong>A</strong>
          </div>
        </a>
        <!-- Sidebar Toggle Button -->
        <button class="sidebar-toggle">
          <i class="fa fa-long-arrow-left"></i>
        </button>
      </div>

      <!-- Log out -->
      <div class="list-inline-item logout">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();">
            <p>{{ __('Log Out') }}</p>
          </x-dropdown-link>
        </form>
      </div>

    </div>
  </nav>
</header>
