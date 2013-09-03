<div class="modal-content col-lg-8 col-lg-offset-2">
    <div class="modal-header">
        <h2 class="modal-title"><?php echo empty($article->id) ? 'Añadir una nueva entrada' : 'Editar página ' . $article->title; ?></h2>
    </div>
    <div class="modal-body">

        <?php echo validation_errors(); ?>
        <?php echo form_open(); ?>

        <?php
        echo form_label('Fecha de publicación', 'pubdate');
        echo form_input(array('name' => 'pubdate', 'class' => 'datepicker form-control', 'placeholder' => '', 'value' => set_value('pubdate', $article->pubdate)));
        ?>

        <?php
        echo form_label('Título', 'title');
        echo form_input(array('name' => 'title', 'class' => 'form-control', 'placeholder' => '', 'value' => set_value('title', $article->title)));
        ?>

        <?php
        echo form_label('Slug', 'slug');
        echo form_input(array('name' => 'slug', 'class' => 'form-control', 'placeholder' => '', 'value' => set_value('email', $article->slug)));
        ?>

        <?php
        echo form_label('Cuerpo', 'body');
        echo form_textarea(array('name' => 'body', 'class' => 'form-control ckeditor', 'placeholder' => '', 'value' => set_value('email', $article->body)));
        ?>

        <hr>
        <?php echo form_submit('submit', 'Guardar', 'class="btn btn-primary"') ?>
        <?php echo form_close(); ?>

    </div>
</div>

<script>
$(function(){
    $('.datepicker').datepicker({ format: 'yyyy-mm-dd' });
});
</script>