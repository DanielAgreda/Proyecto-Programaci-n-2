<?php

include("conexion/conexion.php");
include("login_y_registro/ingreso.php")

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imgresar Miembros</title>
        <link rel="stylesheet" href="estilos/ingresar_miembros.css">
    </head>
    <body>
        <div class="barra-navegacion">
            <nav>
                <ul>
                    <li>
                        <div id="logo">
                            <h1><a href="usuario.php">CICLISMO</a></h1>
                        </div>
                    </li>
                    <li id="secciones">
                        <a href="update.php">Update</a>
                        <a href="ingresar_miembros.php">Ingresar Miembros</a>
                        <a href="mostrar_equipo.php">Mostrar Equipo</a>
                        <a href="ticket.php">Ticket</a>
                    </li>
                    <li id="sesion">
                        <a href="index.php" class="button">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="contenido">
            <div class="registro-container">
                <h1>Formulario de Registro</h1>
                <form id="registro-ciclista" method="POST">
                    <div class="input-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" id="nombres" name="nombres" placeholder="Ingresa los nombres" required>
                    </div>
    
                    <div class="input-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa los apellidos" required>
                    </div>

                    <div class="input-group">
                        <label for="correo">Correo Ciclista</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingresa el correo" required>
                    </div>

                    <div class="input-group">
                        <label for="telefono">Telefono Contacto</label>
                        <input type="number" id="telefono" name="telefono" placeholder="Ingresa telefono contacto" required>
                    </div>

                    <div class="input-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
    
                    <div class="input-group">
                        <label for="pais_origen">País de Origen</label>
                        <select id="pais_origen" name="pais_origen" required>
                            <option value="">Selecciona el país de origen</option>
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
                        <label for="referencia_cicla">Referencia de la Cicla</label>
                        <input type="text" id="referencia_cicla" name="referencia_cicla" placeholder="Ingresa la referencia de la cicla" required>
                    </div>
                    <div class="input-group">
                        <label for="tipo_carrera">Tipo de Carrera</label>
                        <select id="tipo_carrera" name="tipo_carrera" required>
                            <option value="">Selecciona el tipo de carrera</option>
                            <option value="camino">Camino</option>
                            <option value="ciclocross">Ciclocross</option>
                            <option value="montana">Montaña</option>
                            <option value="pavimento">Pavimento</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="nombre_carrera">Nombre de la Carrera</label>
                        <input type="text" id="nombre_carrera" name="nombre_carrera" placeholder="Ingresa el nombre de la carrera" required>
                    </div>

                    <div class="input-group">
                        <label for="pais_carrera">País de la Carrera</label>
                        <select id="pais_carrera" name="pais_carrera" required>
                            <option value="">Selecciona el país de la carrera</option>
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
                        <label for="">Imagen del ciclista</label>
                        <input type="file" id="imagen-ciclista" name="imagen-ciclista" required>
                    </div>
                    <button type="submit" class="registro-button" name="registrar-ciclista">Registrar Ciclista</button>
                </form>
            </div>
        </div>
        <footer>
            <div class="footer-contenido">
                <div class="footer-seccion">
                    <a href="carreras.php"><h3>CARRERAS</h3></a>
                    <ul>
                        <li>Reportes Carreras</li>
                        <li>Fotos</li>
                        <li>Videos</li>
                        <li>Calendario Carreras</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="equipo.php"><h3>EQUIPO</h3></a>
                    <ul>
                        <li>Ciclistas</li>
                        <li>Staff</li>
                        <li>Patrocinadores</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="noticias.php"><h3>NOTICIAS</h3></a>
                    <ul>
                        <li>Noticias</li>
                        <li>Calendario</li>
                        <li>Galeria</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="historia.php"><h3>HISTORIA</h3></a>
                    <ul>
                        <li>INEOS</li>
                        <li>The Grenadier</li>
                        <li>Camino</li>
                    </ul>
                </div>
                <div class="footer-seccion">
                    <a href="contacto.php"><h3>CONTACTO</h3></a>
                    <ul>
                        <li>Contactos</li>
                        <li>Seguirnos</li>
                        <li>Visita Más</li>
                    </ul>
                </div>
            </div>
            <p>&copy; 2024 Ciclismo. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>