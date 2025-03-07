<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclismo - Noticias</title>
    <link rel="stylesheet" href="estilos/noticias.css">
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
                <a href="inicio sesion.php">INICIO SESIÓN</a>
                <a href="registro.php" class="button">REGISTRARSE</a>
            </li>
        </ul>
    </nav>

    <div id="noticias" style="margin-top: 50px;">
        <h1 class="titulos-decorados">NOTICIAS</h1>

        <div class="filtros">
            <button onclick="filtrarNoticias('todas')">Todas</button>
            <button onclick="filtrarNoticias('reportes')">Reportes Carreras</button>
            <button onclick="filtrarNoticias('anuncios')">Anuncios</button>
            <button onclick="filtrarNoticias('noticias')">Noticias</button>
        </div>

        <ul class="noticias-lista">
            <li class="noticia-item reportes">
                <img src="assets/reporte1.jpg" alt="Reporte 1">
                <div class="nombre">Reporte Carrera: Tour de Francia</div>
                <div class="fecha">27 Oct 2024</div>
            </li>
            <li class="noticia-item anuncios">
                <img src="assets/anuncio1.jpg" alt="Anuncio 1">
                <div class="nombre">Anuncio: Nuevo Patrocinador</div>
                <div class="fecha">20 Oct 2024</div>
            </li>
            <li class="noticia-item noticias">
                <img src="assets/noticia1.jpg" alt="Noticia 1">
                <div class="nombre">Noticias: Novedades del equipo</div>
                <div class="fecha">15 Oct 2024</div>
            </li>
            <li class="noticia-item reportes">
                <img src="assets/reporte2.jpg" alt="Reporte 2">
                <div class="nombre">Reporte Carrera: Giro de Italia</div>
                <div class="fecha">12 Oct 2024</div>
            </li>
            <li class="noticia-item anuncios">
                <img src="assets/anuncio2.jpg" alt="Anuncio 2">
                <div class="nombre">Anuncio: Cambios en el Staff</div>
                <div class="fecha">05 Oct 2024</div>
            </li>
            <li class="noticia-item noticias">
                <img src="assets/noticia2.jpg" alt="Noticia 2">
                <div class="nombre">Noticias: Nueva Temporada</div>
                <div class="fecha">01 Oct 2024</div>
            </li>
            <li class="noticia-item reportes">
                <img src="assets/reporte3.jpg" alt="Reporte 2">
                <div class="nombre">Reporte Carrera: Vuelta España</div>
                <div class="fecha">30 Sep 24</div>
            </li>
            <li class="noticia-item anuncios">
                <img src="assets/anuncio3.jpg" alt="Anuncio 2">
                <div class="nombre">Anuncio: Nuevos Equipamientos</div>
                <div class="fecha">05 Sep 2024</div>
            </li>
            <li class="noticia-item noticias">
                <img src="assets/noticia3.jpg" alt="Noticia 2">
                <div class="nombre">Noticias: Ciclistas Lesionados</div>
                <div class="fecha">01 Nov 2024</div>
            </li>
        </ul>
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

    <script src="script.js"></script>
</body>
</html>
