<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            Hi, <?php
                if (strlen($this->session->userdata('user_fullname')) > 15) {
                    echo  substr($this->session->userdata('user_fullname'), 0, 15);
                } else {
                    echo $this->session->userdata('user_fullname');
                }
                ?><br>
            Selamat Datang 👋
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
        </ol>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $widget_kuisioner; ?></h3>
                                <p>Total Kuisioner</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-gavel"></i>
                            </div>
                            <a href="<?php echo site_url('admin/kuisioner'); ?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $widget_answer; ?></h3>
                                <p>Total Mahasiswa Mengisi Kuisioner</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-gavel"></i>
                            </div>
                            <a href="<?php echo site_url('admin/answer'); ?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $widget_user; ?></h3>
                                <p>Total Mahasiswa Terdaftar</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-gavel"></i>
                            </div>
                            <a href="<?php echo site_url('admin/user'); ?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                </div>
            </div>
    </section>
</div>