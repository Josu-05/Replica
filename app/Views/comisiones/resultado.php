<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Comisiones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">Resultado de Comisiones</h1>

    <table class="table table-bordered table-hover">

        <thead class="table-primary">

            <tr>
                <th>Vendedor</th>
                <th>Comisión</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach($resultado as $nombre => $total): ?>

                <tr>

                    <td><?= $nombre ?></td>

                    <td>
                        $<?= number_format($total, 2) ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

      
   
    
    <a href="<?=base_url('/')?>" 
    class="btn btn-secondary">
        Volver
    </a>

</div>

</body>
</html>