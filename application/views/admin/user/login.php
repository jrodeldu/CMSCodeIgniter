<div class="modal-content col-lg-8 col-lg-offset-2">
    <div class="modal-header">
        <h2 class="modal-title">Log in</h2>
        <p>Por favor, identifíquese con sus credenciales</p>
    </div>
    <div class="modal-body">

        <?php echo '<pre>' . print_r($this->session->userdata, TRUE) . '</pre>' ?>
        <?php echo validation_errors(); ?>
        <?php echo form_open(); ?>

        <?php
            echo form_label('Email', 'email');
            echo form_input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'direccion@correo.com'));
        ?>

        <?php
            echo form_label('Password', 'password');
            echo form_password(array('name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password'));
        ?>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Recordarme
        </label>
        <?php echo form_submit('submit', 'Entrar', 'class="btn btn-lg btn-primary btn-block"') ?>
        <?php echo form_close(); ?>

    </div>
