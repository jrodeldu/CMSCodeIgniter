
<?php

    function btn_edit($uri){
        return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
    }

    function btn_delete($uri){
        return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array(
            'onclick' => "return confirm('Seguro que desea borrar el elemento. No se puede recuperar una vez borrado.');"
        ));
    }