<nav class="navbar navbar-default">
    <div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-bar-chart"></i> Clinic MG</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa fa-comments"></i> 0</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-title-bar">
                            Notification ( 0 )
                        </li>
                        <li class="message">
                            No new notification
                        </li>
                    </ul>
                </li>
                <li class="dropdown notification-alert">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-exclamation-circle"></i> 3</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-title-bar">
                            Notification ( 3 )
                        </li>
                        <li>
                            <ul class="notification-list">
                                <li>
                                    <a href="#">
                                        <div class="noti-icon noti-alert">
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        </div>
                                        <div class="noti-message">1 new registration</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="noti-icon noti-success">
                                            <i class="fa fa-check fa-2x"></i>
                                        </div>
                                        <div class="noti-message">3 new orders</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="noti-icon noti-primary">
                                            <i class="fa fa-comments fa-2x"></i>
                                        </div>
                                        <div class="noti-message">2 customers messages</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nurse Emily <span class="caret"></span></a>
                    <ul class="dropdown-menu user-info">
                        <li class="dropdown-title-bar">
                            <img src="images/profile.jpg" class="profile-img">
                        </li>
                        <li>
                            <div class="navbar-login">
                                <h4 class="user-name">Emily Hart</h4>
                                <p>emily_hart@email.com</p>
                                <div class="btn-group margin-bottom-2x" role="group">
                                    <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
                                    <a href="<?=base_url()?>/logout" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
