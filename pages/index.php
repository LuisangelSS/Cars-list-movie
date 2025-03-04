<?php
include '../config/db_config.php';

$personajes_list = $conn->query("SELECT * FROM personajes");

// Convierte el resultado en un arreglo asociativo
$personajes_array = $personajes_list->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes - Cars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fdf6e3; /* Fondo cálido y suave */
            color: #333;
        }
        .navbar-custom {
            background-color: #ffcc00; /* Color amarillo vibrante */
            padding: 15px;
        }
        .navbar-brand {
            font-family: 'Arial Black', sans-serif;
            font-size: 1.5em;
            color: #333;
        }
        .navbar-brand:hover {
            color: #555;
        }
        .navbar-nav .nav-link {
            font-size: 1.1em;
            color: #333;
            font-weight: bold;
        }
        .navbar-nav .nav-link:hover {
            color: #555;
        }
        .cars-header {
            background: linear-gradient(45deg, #ff4b2b, #ff416c); /* Degradado rojo y rosa */
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 15px;
        }
        .btn-custom {
            font-size: 1.1em;
            color: white;
            background-color: #e63946;
            border-color: #e63946;
            margin-right: 10px;
        }
        .btn-custom:hover {
            background-color: #a92832;
            border-color: #a92832;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 200px;
            object-fit: cover;
        }
        .btn-action {
            font-size: 0.8em;
        }
        .btn-warning {
            color: #333;
            background-color: #ffcc00;
            border-color: #ffcc00;
        }
        .btn-warning:hover {
            background-color: #e6b800;
            border-color: #e6b800;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cars 2006</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-custom" href="add.php">➕ Registrar Personaje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-custom" href="../vendor/install.php"> 🔌 Conectar BD</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="cars-header">
            <h1>Personajes Registrados</h1>
            <p>Inspirado en la película <strong>Cars</strong> (2006)</p>
        </div>

        <div class="row">
            <?php foreach ($personajes_array as $row): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <a href="detail.php?id=<?= $row['id'] ?>">
                            <img src="../assets/<?= $row['foto'] ?>" class="card-img-top" alt="<?= $row['nombre'] ?>">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['nombre'] ?></h5>
                            <p class="card-text"><strong>Color:</strong> <?= $row['color'] ?></p>
                            <p class="card-text"><strong>Tipo:</strong> <?= $row['tipo'] ?></p>
                            <p class="card-text"><strong>Nivel:</strong> <?= $row['nivel'] ?></p>
                            <div class="d-flex justify-content-center">
                                <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm btn-action me-2">👁‍🗨 Ver</a>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm btn-action me-2">✏️ Editar</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm btn-action me-2">🗑️ Borrar</a>
                                <a target="_blank" href="download_pdf.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm btn-action">📄 PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
