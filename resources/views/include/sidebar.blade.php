{{-- resources/views/include/sidebar.blade.php --}}
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
  <div class="h-100" data-simplebar>
    <!-- User box -->
    <div class="user-box text-center">
      <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md" />
      <p class="text-muted mt-2">Admin Head</p>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <ul id="side-menu">

        <li>
          <a href="{{ route('dashboard') }}">
            <i data-feather="home"></i>
            <span> Dashboard </span>
          </a>
        </li>

        <li>
          <a href="#sidebarParties" data-toggle="collapse">
            <i data-feather="users"></i>
            <span> Parties </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="sidebarParties">
            <ul class="nav-second-level">
              <li>
                <a href="{{route('add-party')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Add New</a>
              </li>
              <li>
                <a href="{{route('manage-parties')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage Parties</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#sidebarInvoices" data-toggle="collapse">
            <i data-feather="edit"></i>
            <span> VAT Invoicing </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="sidebarInvoices">
            <ul class="nav-second-level">
              <li>
                <a href="{{ route('add-vat-invoice') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Create Invoice</a>
              </li>
              <li>
                <a href="{{ route('manage-vat-invoices') }}"><i data-feather="list" class="pr-0 mr-1"></i>Manage Invoices</a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->