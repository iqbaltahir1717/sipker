    <body class="<?php echo $setting[0]->setting_layout; ?> sidebar-mini <?php echo $setting[0]->setting_color; ?> fontPoppins">
        <div class="preloader">
            <div class="loading text-center">
                <img src="<?php echo base_url(); ?>assets/core-images/load.gif" width="50">
                <br>
                <p><b class="fontPoppins">Harap Tunggu</b></p>
            </div>
        </div>
        <div class="wrapper" style="background: none !important">
            <header class="main-header">
                <a href="<?php echo site_url('admin/dashboard') ?>" class="logo">
                    <span class="logo-mini"><b><?php echo $setting[0]->setting_short_appname; ?></b></span>
                    <span class="logo-lg"><b><?php echo $setting[0]->setting_short_appname; ?></b></span>
                </a>

                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    if ($this->session->userdata('user_photo') == "") {
                                        echo '<img src="' . base_url() . 'upload/user/noimage.png" class="user-image" alt="User Image">';
                                    } else {
                                        echo '<img src="' . base_url() . 'upload/user/' . $this->session->userdata('user_photo') . '" class="user-image" alt="User Image">';
                                    }
                                    ?>
                                    <span class="hidden-xs"><?php echo $this->session->userdata('user_name'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <?php
                                        if ($this->session->userdata('user_photo') == "") {
                                            echo '<img src="' . base_url() . 'upload/user/noimage.png" class="img-circle" alt="User Image">';
                                        } else {
                                            echo '<img src="' . base_url() . 'upload/user/' . $this->session->userdata('user_photo') . '" class="img-circle" alt="User Image">';
                                        }
                                        ?>
                                        <p>
                                            <?php echo $this->session->userdata('user_fullname'); ?>
                                            <small>Member since<br><?php echo $this->session->userdata('user_createtime'); ?></small>
                                        </p>
                                    </li>

                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url('admin/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-google btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    <br>
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                            if ($this->session->userdata('user_photo') == "") {
                                echo '<img src="' . base_url() . 'upload/user/noimage.png" class="img-circle" alt="User Image">';
                            } else {
                                echo '<img src="' . base_url() . 'upload/user/' . $this->session->userdata('user_photo') . '" class="img-circle" alt="User Image">';
                            }
                            ?>
                        </div>
                        <div class="pull-left info">
                            <?php
                            if (strlen($this->session->userdata('user_fullname')) > 15) {
                                echo '<p>' . substr($this->session->userdata('user_fullname'), 0, 15) . '..</p>';
                            } else {
                                echo '<p>' . $this->session->userdata('user_fullname') . '</p>';
                            }
                            ?>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

                        </div>
                    </div>

                    <br><br>

                    <?php if ($this->session->userdata('user_group') == 1) { ?>
                        <!-- Administrator Menu -->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">Main Tools</li>
                            <li class="active"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li class=""><a href="<?php echo site_url('admin/kuisioner') ?>"><i class="fa fa-circle-o"></i> <span>Buat Kuisioner</span></a></li>
                            <li class=""><a href="<?php echo site_url('admin/result/') ?>"><i class="fa fa-list"></i> <span>Hasil Kuisioner</span></a></li>
                            <li class="header">System Setting</li>
                            <li><a href="<?php echo site_url('admin/group'); ?>"><i class="fa fa-circle-o"></i> Group</a></li>
                            <li><a href="<?php echo site_url('admin/user'); ?>"><i class="fa fa-circle-o"></i> User</a></li>
                            <li><a href="<?php echo site_url('admin/setting'); ?>"><i class="fa fa-circle-o"></i> Sistem</a></li>
                            <li><a href="<?php echo site_url('admin/about'); ?>"><i class="fa fa-circle-o"></i> Tentang Aplikasi</a></li>
                        </ul>

                    <?php } elseif ($this->session->userdata('user_group') == 2) { ?>

                        <!-- Inputer Menu -->
                        <!-- <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">Main Tools</li>
                            <li class="active"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li class=""><a href="<?php echo site_url('admin/kuisioner') ?>"><i class="fa fa-circle-o"></i> <span>Isi Kuisioner</span></a></li>
                            <li class=""><a href="<?php echo site_url('admin/kuisioner_apply') ?>"><i class="fa fa-list"></i> <span>Hasil Kuisioner</span></a></li>

                            <li class="header">System Setting</li>
                            <li><a href="<?php echo site_url('admin/user'); ?>"><i class="fa fa-circle-o"></i> Tentang Aplikasi</a></li>
                        </ul> -->

                    <?php } ?>
                </section>
            </aside>