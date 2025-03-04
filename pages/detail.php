<?php
include '../config/db_config.php';

// Verifica si se recibió un id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtiene los datos del personaje
    $sql = "SELECT * FROM personajes WHERE id = $id";
    $result = $conn->query($sql);
    $personaje = $result->fetch_assoc();

    if (!$personaje) {
        echo "<script>alert('No se encontró el personaje.'); window.location.href = 'index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID no especificado.'); window.location.href = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Personaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fdf6e3; /* Fondo cálido y suave */
            color: #333;
        }
        .navbar-custom {
            background-color: #ffcc00; /* Fondo amarillo vibrante */
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
        .character-header {
            background: linear-gradient(45deg, #ff4b2b, #ff416c); /* Tonos vibrantes */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .character-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: white;
        }
        .character-card img {
            width: 100%;
            height: auto;
            border-bottom: 5px solid #ffcc00;
        }
        .character-info {
            padding: 20px;
        }
        .character-info h5 {
            font-size: 1.5rem;
            color: #ff4b2b;
        }
        .character-info p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .btn-custom {
            background-color: #e63946;
            color: white;
            border-color: #e63946;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #a92832;
            border-color: #a92832;
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
                        <a class="nav-link btn btn-custom" href="index.php">🔙 Volver al Listado</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="character-header">
            <h1>Perfil de <?= $personaje['nombre'] ?></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card character-card">
                    <img src="../assets/<?= $personaje['foto'] ?>" alt="<?= $personaje['nombre'] ?>">
                    <div class="character-info">
                        <h5>Detalles del Personaje</h5>
                        <p><strong>Color Representativo:</strong> <?= $personaje['color'] ?></p>
                        <p><strong>Tipo:</strong> <?= $personaje['tipo'] ?></p>
                        <p><strong>Nivel:</strong> <?= $personaje['nivel'] ?></p>
                        <div class="text-center">
                            <a href="edit.php?id=<?= $personaje['id'] ?>" class="btn btn-warning btn-action">✏️ Editar Personaje</a>
                            <a target="_blank" href="download_pdf.php?id=<?= $personaje['id'] ?>" class="btn btn-primary btn-action">📄 Descargar PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
