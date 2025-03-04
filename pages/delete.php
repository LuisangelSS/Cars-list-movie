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

// Maneja la eliminación si se confirma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM personajes WHERE id = $id";

    // Borra la foto del directorio si existe
    if (file_exists("../assets/" . $personaje['foto'])) {
        unlink("../assets/" . $personaje['foto']);
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Personaje eliminado con éxito!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Personaje</title>
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
        .delete-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
        }
        .delete-header {
            background: linear-gradient(45deg, #e63946, #f77f00); /* Rojo y naranja para advertencia */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }
        .btn-delete {
            background-color: #e63946;
            border-color: #e63946;
        }
        .btn-delete:hover {
            background-color: #a92832;
        }
        .btn-cancel {
            background-color: #ccc;
            border-color: #ccc;
            color: #333;
        }
        .btn-cancel:hover {
            background-color: #aaa;
        }
        .character-img {
            border-radius: 10px;
            margin-top: 15px;
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
                        <a class="nav-link btn btn-danger" href="index.php">🔙 Volver al Listado</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card delete-card">
                    <div class="delete-header">
                        <h3>¿Estás seguro de eliminar este personaje?</h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="../assets/<?= $personaje['foto'] ?>" alt="<?= $personaje['nombre'] ?>" class="character-img" width="150">
                        <h5 class="mt-3"><?= $personaje['nombre'] ?></h5>
                        <p class="mb-4"><strong>Color:</strong> <?= $personaje['color'] ?> | <strong>Tipo:</strong> <?= $personaje['tipo'] ?> | <strong>Nivel:</strong> <?= $personaje['nivel'] ?></p>
                        <form action="delete.php?id=<?= $id ?>" method="POST">
                            <button type="submit" class="btn btn-delete btn-lg me-2">🗑️ Eliminar</button>
                            <a href="index.php" class="btn btn-cancel btn-lg">❌ Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
