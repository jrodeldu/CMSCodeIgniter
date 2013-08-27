<?php $this->load->view('admin/includes/header'); ?>

<body style="background: #555555;">

    <div class="modal show">
        <div class="modal-dialog">

                <?php $this->load->view($subview); // Definido en el controlador. ?>

                <div class="modal-footer">
                    &copy; <?php echo $meta_title; ?>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



<?php $this->load->view('admin/includes/footer'); ?>