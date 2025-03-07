<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ciclismo</title>
        <link rel="stylesheet" href="estilos/style.css">
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
                <li id="sesion">
                    <a href="inicio sesion.php">INICIO SESION</a>
                    <a href="registro.php" class="button">REGISTRARSE</a>
                </li>
            </ul>
        </nav>
        <div class="slider">
            <ul style="margin-top: 100px;">
                <li><img src="assets/noticia1.jpg" alt="imagen 1"></li>
                <li><img src="assets/anuncio2.jpg" alt="imagen 2"></li>
                <li><img src="assets/reporte3.jpg" alt="imagen 3"></li>
                <li><img src="assets/reporte2.jpg" alt="imagen 4"></li>
            </ul>
        </div>
        <div class="content">
            <div id="noticias">
                <h1 class="titulos-decorados">ÚLTIMAS NOTICIAS</h1>
                <ul>
                    <li>
                        <img src="assets/noticia1.jpg" alt="noticia 1">
                        <div class="titulo-noticia">Nuevas Carreras</div>
                    </li>
                    <li>
                        <img src="assets/noticia2.jpg" alt="noticia 2">
                        <div class="titulo-noticia">Ultimos Accidentes</div>
                    </li>
                    <li>
                        <img src="assets/noticia3.jpg" alt="noticia 3">
                        <div class="titulo-noticia">Ultimos Ganadores</div>
                    </li>
                </ul>
                <div style="display: flex; width: 100%; justify-content: center; margin-top: 20px;">
                    <a href="noticias.php" class="button">NOTICIAS</a>
                </div>
            </div>
            <div id="equipo" style="margin-top: 50px;">
                <h1 class="titulos-decorados">EL EQUIPO</h1>
                <ul>
                    <li>
                        <img src="assets/inte1.jpg" alt="integrante 1">
                        <div class="nombre">Egan Bernal</div>
                    </li>
                    <li>
                        <img src="assets/inte2.jpg" alt="integrante 2">
                        <div class="nombre">Jonathan Castroviejo </div>
                    </li>
                    <li>
                        <img src="assets/inte3.jpg" alt="integrante 3">
                        <div class="nombre">Laurens de Plus</div>
                    </li>
                    <li>
                        <img src="assets/inte4.jpg" alt="integrante 4">
                        <div class="nombre">Pauline Ferrand-Prevot</div>
                    </li>
                </ul>
            </div>
        </div>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 20px;">
            <a href="equipo.php" class="button">EQUIPO</a>
        </div>
        <div id="historia">
            <h1 class="titulos-decorados">NUESTRA HISTORIA</h1>
            <img src="assets/historia.jpg" alt="historia">
            <a href="historia.php" class="button">HISTORIA</a>
        </div>
        <div id="contacto">
            <h1 class="titulos-decorados">CONTÁCTANOS</h1>
            <div class="formulario-contenedor">
                <form class="formulario">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tus nombres:" required>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tu apellido:" required>
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" placeholder="Tu correo:" required>
                    <label for="pais">País:</label>
                    <input type="text" id="pais" name="pais" placeholder="Tu país: " required>
                    <a class="button" type="submit" style="margin-top: 10px; align-self: center; width: 50%;">Enviar</a>
                </form>
                <div class="imagen-contacto">
                    <img src="assets/formulario.jpg" alt="Imagen de contacto">
                </div>
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
