<section>
    <h2>Páginas</h2>
    <i class="glyphicon glyphicon-plus"></i><?php echo anchor('admin/page/edit', ' Añadir nueva página.'); ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($pages)): ?>
            <?php foreach($pages as $page): ?>
                <tr>
                    <td><?php echo anchor('admin/page/edit/' . $page->id, $page->title); ?></td>
                    <td><?php echo btn_edit('admin/page/edit/' . $page->id); ?></td>
                    <td><?php echo btn_delete('admin/page/delete/' . $page->id); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontró ningún elemento.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>