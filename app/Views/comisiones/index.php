<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Comisiones</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

<h1 class="text-center mb-4">
    Calculadora de Comisiones
</h1>

<form action = "<?= base_url('calcular') ?>" method="post">

    <div class="row">

        <div class="col-md-4">
            <label class="form-label">Fecha Inicio</label>

            <input
                type="date"
                name="fecha_inicio"
                class="form-control">
        </div>

        <div class="col-md-4">
            <label class="form-label">Fecha Fin</label>

            <input
                type="date"
                name="fecha_fin"
                class="form-control">
        </div>

    </div>

    <br>

    <button type="submit" class="btn btn-primary">
        Calcular Comisiones
    </button>

</form>

<h2 class="mt-5">Vendedores</h2>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($vendedores as $v): ?>

            <tr>
                <td><?= $v['nombre'] ?></td>
                <td><?= $v['email'] ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<h2 class="mt-5">Reglas de Comisión</h2>

<table class="table table-bordered">

    <thead class="table-success">

        <tr>
            <th>Umbral</th>
            <th>Porcentaje</th>
        </tr>

    </thead>

    <tbody>

        <?php foreach ($reglas as $r): ?>

            <tr>
                <td>$<?= $r['umbral_monto'] ?></td>
                <td><?= $r['porcentaje'] * 100 ?>%</td>
            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

</div>

</body>
</html>