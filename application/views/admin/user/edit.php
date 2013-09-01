<div class="modal-content col-lg-8 col-lg-offset-2">
    <div class="modal-header">
        <h2 class="modal-title"><?php echo empty($user->id) ? 'Añadir un nuevo usuario' : 'Editar usuario ' . $user->name; ?></h2>
    </div>
    <div class="modal-body">

        <?php echo validation_errors(); ?>
        <?php echo form_open(); ?>

        <?php
        echo form_label('Nombre', 'nombre');
        echo form_input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => '', 'value' => set_value('name', $user->name)));
        ?>

        <?php
        echo form_label('Email', 'email');
        echo form_input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'direccion@correo.com', 'value' => set_value('email', $user->email)));
        ?>

        <?php
        echo form_label('Password', 'password');
        echo form_password(array('name' => 'password', 'class' => 'form-control', 'placeholder' => ''));
        ?>

        <?php
        echo form_label('Confirmar password', 'password_confirm');
        echo form_password(array('name' => 'password_confirm', 'class' => 'form-control', 'placeholder' => ''));
        ?>

        <?php echo form_submit('submit', 'Guardar', 'class="btn btn-lg btn-primary btn-block"') ?>
        <?php echo form_close(); ?>

    </div>
</div>