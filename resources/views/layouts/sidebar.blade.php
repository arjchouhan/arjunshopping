  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('user.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user.userlist')}}">
              <i class="bi bi-circle"></i><span>All User</span>
            </a>
          </li>
          <li>
            <a href="{{route('user.adduser')}}">
              <i class="bi bi-circle"></i><span>Add User</span>
            </a>
          </li>

        </ul>
      </li><!-- End Users Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('product.productlist')}}">
              <i class="bi bi-circle"></i><span>All Product</span>
            </a>
          </li>
          <li>
            <a href="{{route('product.addproduct')}}">
              <i class="bi bi-circle"></i><span>Add Product</span>
            </a>
          </li>

        </ul>
      </li><!-- End products Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('cart.cartlist')}}">
          <i class="bi bi-cart-plus"></i>
          <span>Cart</span>
        </a>
      </li><!-- End Cart Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('order.orderlist')}}">
          <i class="bi bi-book"></i>
          <span>Order</span>
        </a>
      </li><!-- End order Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
