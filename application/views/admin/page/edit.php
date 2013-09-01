<div class="modal-content col-lg-8 col-lg-offset-2">
    <div class="modal-header">
        <h2 class="modal-title"><?php echo empty($page->id) ? 'Añadir una nueva entrada' : 'Editar página ' . $page->title; ?></h2>
    </div>
    <div class="modal-body">

        <?php echo validation_errors(); ?>
        <?php echo form_open(); ?>

        <?php
        echo form_label('Título', 'title');
        echo form_input(array('name' => 'title', 'class' => 'form-control', 'placeholder' => '', 'value' => set_value('title', $page->title)));
        ?>

        <?php
        echo form_label('Slug', 'slug');
        echo form_input(array('name' => 'slug', 'class' => 'form-control', 'placeholder' => '', 'value' => set_value('email', $page->slug)));
        ?>

        <?php
        echo form_label('Cuerpo', 'body');
        echo form_textarea(array('name' => 'body', 'class' => 'form-control ckeditor', 'placeholder' => '', 'value' => set_value('email', $page->body)));
        ?>

        <?php
        echo form_label('Orden', 'order');
        echo form_input(array('name' => 'order', 'class' => 'form-control', 'placeholder' => '', 'value' => set_value('email', $page->order)));
        ?>

        <hr>
        <?php echo form_submit('submit', 'Guardar', 'class="btn btn-primary"') ?>
        <?php echo form_close(); ?>

    </div>
</div>