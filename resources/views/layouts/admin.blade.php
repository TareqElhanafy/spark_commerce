
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Dashboard</title>

    <!-- vendor css -->
    <link href="{{ asset('board/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/medium-editor/default.css') }}" rel="stylesheet">
    <link href="{{ asset('board/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('board/css/starlight.css') }}">
            <!-- toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('frontpage') }}" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
              <span class="menu-item-label">Home</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
        <a href="{{ route('admin.categories') }}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-thumb-tack" aria-hidden="true"></i>
            <span class="menu-item-label">Categories</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('admin.subcategories') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <span class="menu-item-label">Sub Categories</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="{{ route('admin.brands') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-apple" aria-hidden="true"></i>
                <span class="menu-item-label">Brands</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="{{ route('admin.coupons') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-money" aria-hidden="true"></i>
                <span class="menu-item-label">Coupons</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
        <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                <span class="menu-item-label">Products</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.products.create') }}" class="nav-link">Add Product</a></li>
            <li class="nav-item"><a href="{{ route('admin.products') }}" class="nav-link">All Products</a></li>
          </ul>
          <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                <span class="menu-item-label">Orders</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.orders.new') }}" class="nav-link">New Orders</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.canceled') }}" class="nav-link">Canceled Orders</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.accepted') }}" class="nav-link">Payment Accepted Orders</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.progressed') }}" class="nav-link">Delievery In progress Orders</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders.delievered') }}" class="nav-link">Delieverd Orders</a></li>
          </ul>
          <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-file" aria-hidden="true"></i>
                <span class="menu-item-label">Reports</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.reports.search') }}" class="nav-link"> Search Reports</a></li>
            <li class="nav-item"><a href="{{ route('admin.reports.today.orders') }}" class="nav-link">Today's Orders</a></li>
            <li class="nav-item"><a href="{{ route('admin.reports.today.delievery') }}" class="nav-link">Today's delievry</a></li>
          </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-rss" aria-hidden="true"></i>
                <span class="menu-item-label">Blog</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.blog.categories') }}" class="nav-link"> Blog Categories</a></li>
            <li class="nav-item"><a href="{{ route('admin.blog.posts.create') }}" class="nav-link">Add Post</a></li>
            <li class="nav-item"><a href="{{ route('admin.blog.posts') }}" class="nav-link">All Posts</a></li>
          </ul>
          <a href="{{ route('admin.users') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <span class="menu-item-label">Users</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="{{ route('admin.settings') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-wrench" aria-hidden="true"></i>
                <span class="menu-item-label">Site Settings</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Return Orders</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.return.request') }}" class="nav-link">Return orders requests</a></li>
            <li class="nav-item"><a href="{{ route('admin.return.orders') }}" class="nav-link">All returned orders</a></li>
          </ul>
          <a href="{{ route('admin.stock') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-arrow" aria-hidden="true"></i>
                <span class="menu-item-label">Stock</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="{{ route('admin.messages') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-envelope-open" aria-hidden="true"></i>
                <span class="menu-item-label">Contact Messages</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
        <a href="{{ route('admin.newsletters') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-envelope-open" aria-hidden="true"></i>
                <span class="menu-item-label">Newsletters</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="{{ route('admin.seo') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="fa fa-google" aria-hidden="true"></i>
                <span class="menu-item-label">SEO</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ Auth::user()->name }}</span>
              <img src="{{ asset('board/img/img3.jpg') }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('admin.password.page') }}"><i class="icon ion-ios-gear-outline"></i> Change Password</a></li>
                <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative notifi-link">
            <i class="icon ion-ios-bell-outline notifi-icon-number" data-count="0"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link notf" data-toggle="tab"  role="tab" href="#notifications">Notifications <span class="notifi-count" data-count="0">(0)</span> </a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list notifi-block">
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
 @yield('content')

    <script src="{{ asset('board/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('board/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('board/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('board/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('board/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('board/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('board/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('board/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('board/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('board/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('board/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('board/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('board/lib/flot-spline/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('board/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('board/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('board/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('board/lib/select2/js/select2.min.js') }}"></script>
    <!-- text editor -->
    <script src="{{ asset('board/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('board/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function(){
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

         // Summernote editor
            $('#summernote').summernote({
              height: 150,
              tooltip: false
            })
          });
     </script>
         <script>
            $(function(){
                'use strict';

                // Inline editor
                var editor = new MediumEditor('.editable');

             // Summernote editor
                $('#summernote1').summernote({
                  height: 150,
                  tooltip: false
                })
              });
         </script>
    <!-- -->

    <script src="{{ asset('board/js/starlight.js') }}"></script>
    <script src="{{ asset('board/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('board/js/dashboard.js') }}"></script>
   <!-- toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <!--  toaster -->
         <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}")
                    break;
                    case 'success':
                    toastr.success("{{ Session::get('message') }}")
                    break;
                    case 'error':
                    toastr.error("{{ Session::get('message') }}")
                    break;
                    case 'warning':
                    toastr.info("{{ Session::get('message') }}")
                    break;
                default:
                    break;
            }
            @endif
        </script>


          <script>
            $(function(){
              'use strict';

              $('#datatable1').DataTable({
                responsive: true,
                language: {
                  searchPlaceholder: 'Search...',
                  sSearch: '',
                  lengthMenu: '_MENU_ items/page',
                }
              });

              $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
              });

              // Select2
              $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            });
          </script>

        <!-- sweet alert -->
          <script>
              $(document).on("click", "#delete",function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                   })
               .then((willDelete) => {
                if (willDelete) {
                      window.location.href = link;
            } else {
            swal("Safe Data");
                  }
            });
              });

          </script>
<!--preventing two double submit -->
          <script>
              $('.prevent-multiple-submits').on('submit', function(){
                  $('.button-prevent-multiple-submits').attr('disabled','true')
                  $('.spinner').show();
              });
          </script>
<!--clearing the modal from cached data -->
          <script>
          $(".modal").on("hidden.bs.modal", function(){
               $(".modal-body input").val("");
              });
          </script>
              <!-- pusher -->
              <a id="btnRightMenu" href="" class="pos-relative notifi-link">
                <i class="icon ion-ios-bell-outline notifi-icon-number" data-count="0"></i>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('b5b73e7ac46c4cd37215', {
          cluster: 'eu'
        });
        var channel = pusher.subscribe('new-notification');
        channel.bind('App\\Events\\NewPurchase', function(data) {
            var newNotification= `<a href="{{ URL('admin/orders/show/`+data.order_id+`') }}" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">New Order!</strong> `+data.product_name+` is purchased, Check it Out.</p>
                  <span class="tx-12"></span>
                </div>
              </div><!-- media -->
            </a>`
         var notificationsBlock= $('.notifi-block')
         var notificationLink = $('.notifi-link')
         var notificationIconNumber = notificationLink.find('i[data-count]')
         var notificationsBellCount = parseInt(notificationIconNumber.data('count'));
         var existingNotifications = notificationsBlock.html()
         var notificationsCount = $('.notifi-count')
            notificationsBellCount +=1
            notificationIconNumber.attr('data-count', notificationsBellCount)
            notificationsCount.text(notificationsBellCount)
            notificationsBlock.html(newNotification + existingNotifications )
        });
    </script>

  </body>
</html>
