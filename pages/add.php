<?php
include '../config/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];

    // Manejo de la foto
    $foto = $_FILES['foto']['name'];
    $ruta = "../assets/" . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

    // Inserción en la base de datos
    $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto) 
            VALUES ('$nombre', '$color', '$tipo', '$nivel', '$foto')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Personaje agregado con éxito!'); window.location.href = 'index.php';</script>";
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
    <title>Registrar Personaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fdf6e3; /* Fondo cálido y suave */
            color: #333;
        }
        .form-header {
            background: linear-gradient(45deg, #e63946, #f77f00); /* Rojo y naranja */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            margin-bottom: 20px;
        }
        .form-container {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
        }
        .btn-primary {
            background-color: #e63946;
            border-color: #e63946;
        }
        .btn-primary:hover {
            background-color: #a92832;
        }
        .btn-secondary {
            background-color: #ccc;
            border-color: #ccc;
            color: #333;
        }
        .btn-secondary:hover {
            background-color: #aaa;
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
                        <a class="nav-link btn btn-danger" href="index.php">🏠 Volver al Listado</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-header">
                    <h1>Registrar Personaje</h1>
                </div>
                <div class="form-container">
                    <form action="add.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color Representativo</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" required>
                        </div>
                        <div class="mb-3">
                            <label for="nivel" class="form-label">Nivel</label>
                            <input type="number" class="form-control" id="nivel" name="nivel" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>
                    <a href="index.php" class="btn btn-secondary w-100 mt-3">Volver al Listado</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
