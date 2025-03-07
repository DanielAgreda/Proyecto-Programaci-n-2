<?php

include("conexion/conexion.php");
include("login_y_registro/registro_usuario.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclismo - Registro</title>
    <link rel="stylesheet" href="estilos/registro.css">
</head>
<body>
    <nav>
        <ul>
            <li>
                <div id="logo">
                    <h1>CICLISMO</h1>
                </div>
            </li>
            <li id="secciones">
                <a href="index.php">INICIO</a>
                <a href="carreras.php">CARRERAS</a>
                <a href="equipo.php">EQUIPO</a>
                <a href="noticias.php">NOTICIAS</a>
                <a href="historia.php">HISTORIA</a>
                <a href="contacto.php">CONTACTO</a>
            </li>
        </ul>
    </nav>

    <div class="registro-container">
        <h1>Registro</h1>
        <form id="registro-usuario" method="POST">
            <div class="input-group">
                <label for="cargo">Cargo en el Equipo</label>
                <select name="cargo" id="cargo">
                    <option value="">Selecciona tu cargo</option>
                    <option value="administrador">Administrador</option>
                    <option value="gerente">Gerente</option>
                    <option value="miembro">Miembro</option>
                </select>
            </div>

            <div class="input-group">
                <label for="equipo">Equipo</label>
                <input type="text" id="equipo" name="equipo" placeholder="Ingresa tu equipo" required>
            </div>

            <div class="input-group">
                <label for="nombres">Nombres</label>
                <input type="text" id="nombres" name="nombres" placeholder="Ingresa tus nombres" required>
            </div>

            <div class="input-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
            </div>

            <div class="input-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="input-group">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="">Seleccione sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </div>

            <div class="input-group">
                <label for="telefono">Telefono Contacto</label>
                <input type="number" id="telefono" name="telefono" placeholder="Ingresa telefono contacto" required>
            </div>

            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Ingresa tu correo" required>
            </div>

            <div class="input-group">
                <label for="pais">País</label>
                <select id="pais" name="pais" required>
                    <option value="">Selecciona tu país</option>
                    <option value="Alemania">Alemania</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Belgica">Bélgica</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="Chile">Chile</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Croacia">Croacia</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Estados Unidos">Estados Unidos</option>
                    <option value="Espana">España</option>
                    <option value="Francia">Francia</option>
                    <option value="Italia">Italia</option>
                    <option value="Mexico">México</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Rusia">Rusia</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Venezuela">Venezuela</option>
                </select>
            </div>

            <div class="input-group">
                <label for="ciudad">Ciudad</label>
                <select id="ciudad" name="ciudad" required>
                    <option value="">Selecciona tu ciudad</option>
                    <option value="Asuncion">Asuncion</option>
                    <option value="Berlin">Berlin</option>
                    <option value="Bogota">Bogotá</option>
                    <option value="Brasilia">Brasilia</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Caracas">Caracas</option>
                    <option value="Lima">Lima</option>
                    <option value="Madrid">Madrid</option>
                    <option value="Montevideo">Montevideo</option>
                    <option value="Moscu">Moscu</option>
                    <option value="Ottawa">Ottawa</option>
                    <option value="Paris">Paris</option>
                    <option value="Pekin">Pekin</option>
                    <option value="Quito">Quito</option>
                    <option value="Roma">Roma</option>
                    <option value="Santiago de Chile">Santiago de Chile</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Washington D.C">Washington D.C</option>
                </select>
            </div>
            
            <div class="input-group">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu direccion" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Ingresa la contraseña" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="terminos" name="terminos" required>
                <label for="terminos">Acepto los <a href="#">términos y condiciones</a></label>
            </div>
            <div>
                <button type="submit" class="registro-button" name="registro">Registrarse</button>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Ciclismo. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
