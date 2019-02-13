<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo 'dashboard' ?>" class="navbar-brand">
            {{ Session::get('brgyname') }}
          </a>


          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li id = "li1"><a href="<?php echo 'dashboard' ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home <span class="sr-only">(current)</span></a></li>
            <li id = "li2"><a href="<?php echo 'maintenanceMenu' ?>"> <i class="fa fa-cog"></i>&nbsp;&nbsp;Maintenance</a></li>
            <li id = "li3"><a href="<?php echo 'transactionMenu' ?>"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Transactions</a></li>
            <li id = "li4"><a href="<?php echo 'queriesController' ?>"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Queries</a></li>
            <li id = "li5"><a href="<?php echo 'reports' ?>"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;Reports</a></li>
            <li id = "li6"><a href="<?php echo 'utilitiesMenu' ?>"><i class="fa fa-cogs"></i>&nbsp;&nbsp;Utilities</a></li>
            
          </ul>
          
        </div>
              
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
          
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset ('bower_components/admin-lte/dist/images/') . '/' . Session::get('image')}} " class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Session::get('firstname') }} {{ Session::get('lastname') }}</span>


              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ asset ('bower_components/admin-lte/dist/images/') . '/' . Session::get('image')}} " class="img-circle" alt="User Image">

                  <p>
                   {{ Session::get('firstname') }} {{ Session::get('lastname') }} - {{ Session::get('admin') }}
                    <small>Barangay {{ Session::get('position') }}</small>
                  </p>
                </li>
        
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{URL::to('userProfile')}}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{URL::to('logout')}}" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
