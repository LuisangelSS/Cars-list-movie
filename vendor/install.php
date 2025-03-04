<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalador - Cars Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fdf6e3; /* Fondo cálido */
        }
        .navbar-custom {
            background-color: #ffcc00; /* Amarillo vibrante inspirado en los detalles de Cars */
        }
        .navbar-brand {
            font-family: 'Arial Black', sans-serif;
            font-size: 1.5em;
            color: #333;
        }
        .navbar-brand:hover {
            color: #555;
        }
        .form-container {
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            background-color: white;
            padding: 30px;
            border: 2px solid #ffcc00; /* Borde amarillo */
        }
        .btn-primary {
            background-color: #ff0000; /* Botones rojos */
            border-color: #ff0000;
        }
        .btn-primary:hover {
            background-color: #cc0000; /* Tonalidad más oscura para hover */
        }
        .btn-warning {
            color: #333;
            font-weight: bold;
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
                        <a class="btn btn-danger nav-link" href="../pages/index.php">🏠 Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-container card">
                    <div class="card-header text-white text-center" style="background-color: #ff0000; border-radius: 15px 15px 0 0;">
                        <h2>Configuración de Base de Datos</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="host" class="form-label">Host</label>
                                <input type="text" class="form-control" id="host" name="host" placeholder="Host" required>
                            </div>
                            <div class="mb-3">
                                <label for="user" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
                            </div>
                            <div class="mb-3">
                                <label for="dbname" class="form-label">Nombre de la Base de Datos</label>
                                <input type="text" class="form-control" id="dbname" name="dbname" placeholder="Nombre BD" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Instalar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small style="color: #ff0000;">"Asegúrate de ingresar la información correcta."</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
