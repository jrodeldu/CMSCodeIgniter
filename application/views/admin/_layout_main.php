<?php $this->load->view('admin/includes/header'); ?>

<body>
    <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a></li>
                <li><?php echo anchor('admin/pages', 'Páginas') ?></li>
                <li><?php echo anchor('admin/user', 'Usuarios') ?></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <div class="container">
        <div class="row">
            <!-- Panel principal -->
            <div class="col-lg-9">
                <?php $this->load->view($subview); ?>
            </div>
            <!-- Panel lateral -->
            <div class="col-lg-3">
                <section>
                    <i class="glyphicon glyphicon-user"></i><?php echo mailto($this->session->userdata('email'), ' '.$this->session->userdata('email')); ?><br>
                    <i class="glyphicon glyphicon-off"></i><?php echo anchor('admin/user/logout', ' logout'); ?>
                </section>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/includes/footer'); ?>