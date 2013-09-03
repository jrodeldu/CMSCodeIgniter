<section>
    <h2>Artículos</h2>
    <i class="glyphicon glyphicon-plus"></i><?php echo anchor('admin/article/edit', ' Añadir nueva página.'); ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Fecha pub</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($articles)): ?>
            <?php foreach($articles as $article): ?>
                <tr>
                    <td><?php echo anchor('admin/article/edit/' . $article->id, $article->title); ?></td>
                    <td><?php echo $article->pubdate; ?></td>
                    <td><?php echo btn_edit('admin/article/edit/' . $article->id); ?></td>
                    <td><?php echo btn_delete('admin/article/delete/' . $article->id); ?></td>
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