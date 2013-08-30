<section>
    <h2>Usuarios</h2>
    <i class="glyphicon glyphicon-plus"></i><?php echo anchor('admin/user/edit', ' Añadir nuevo usuario'); ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($users)): ?>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
                    <td><?php echo btn_edit('admin/user/edit/' . $user->id); ?></td>
                    <td><?php echo btn_delete('admin/user/delete/' . $user->id); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontraron usuarios.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>