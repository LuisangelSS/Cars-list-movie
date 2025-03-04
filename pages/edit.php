<?php
include '../config/db_config.php';

// Verifica si se recibió un id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtén los datos del personaje
    $sql = "SELECT * FROM personajes WHERE id = $id";
    $result = $conn->query($sql);
    $personaje = $result->fetch_assoc();
} else {
    echo "<script>alert('No se encontró el personaje.'); window.location.href = 'index.php';</script>";
}

// Actualiza los datos si el formulario se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];

    // Manejo de la foto (opcional)
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $ruta = "../assets/" . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

        // Actualización con nueva foto
        $sql = "UPDATE personajes SET nombre = '$nombre', color = '$color', tipo = '$tipo', nivel = '$nivel', foto = '$foto' WHERE id = $id";
    } else {
        // Actualización sin nueva foto
        $sql = "UPDATE personajes SET nombre = '$nombre', color = '$color', tipo = '$tipo', nivel = '$nivel' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Personaje actualizado con éxito!'); window.location.href = 'index.php';</script>";
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
    <title>Editar Personaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
        .character-header {
            background: linear-gradient(45deg, #ff4b2b, #ff416c); /* Degradado rojo y rosa */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .form-container {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
        }
        .form-label {
            font-weight: bold;
            color: #ff4b2b;
        }
        .btn-primary {
            background-color: #ff4b2b;
            border-color: #ff4b2b;
        }
        .btn-secondary {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #333;
        }
        .btn-primary:hover, .btn-secondary:hover {
            opacity: 0.9;
        }
        .card {
        border-radius: 20px; 
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
    <div class="character-header">
        <h1>Editar Personaje: <?= $personaje['nombre'] ?></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10"> <!-- Ajuste en las columnas para mayor tamaño -->
            <div class="card rounded-4" style="padding: 2rem;"> <!-- Agregada mayor separación interna -->
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title text-center">Formulario de Edición</h3>
                </div>
                <div class="card-body">
                    <form action="edit.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $personaje['nombre'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color Representativo</label>
                            <input type="text" class="form-control" id="color" name="color" value="<?= $personaje['color'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $personaje['tipo'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nivel" class="form-label">Nivel</label>
                            <input type="number" class="form-control" id="nivel" name="nivel" value="<?= $personaje['nivel'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto (opcional)</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            <p class="mt-2">Foto actual:</p>
                            <img src="../assets/<?= $personaje['foto'] ?>" alt="Foto del personaje" width="100">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-secondary">🏠 Volver al Listado</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>




