<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="admin.css">
    <script src="qrcode.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li>
                <div id="logo">
                    <h1><a href="index.php">CICLISMO</a></h1>
                </div>
            </li>
        </ul>
    </nav>
    <div id="contenido">
        <h1 class="titulos-decorados">REGISTRO DE CICLISTAS</h1>

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
                    <input type="email" id="correo" placeholder="Ingresa el correo" required>
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

                <button type="submit" class="registro-button">Registrar Ciclista</button>
            </form>
        </div>
    </div>

    <div id="codigo-qr">
        
    </div>

    <script>
document.getElementById('registro-ciclista').addEventListener('submit', function (event) {
    event.preventDefault();  // Evitar el envío del formulario tradicional

    // Recogemos los datos del formulario
    const data = {
        "nombres": document.getElementById('nombres').value,
        "apellidos": document.getElementById('apellidos').value,
        "correo": document.getElementById('correo').value,
        "telefono": document.getElementById('telefono').value,
        "fecha_nacimiento": document.getElementById('fecha_nacimiento').value,
        "pais_origen": document.getElementById('pais_origen').value,
        "referencia_cicla": document.getElementById('referencia_cicla').value,
        "tipo_carrera": document.getElementById('tipo_carrera').value,
        "nombre_carrera": document.getElementById('nombre_carrera').value,
        "pais_carrera": document.getElementById('pais_carrera').value
    };
    
    // Creamos el archivo JSON
    const blob = new Blob([JSON.stringify(data)], { type: 'application/json' });
    const fileURL = URL.createObjectURL(blob);
    
    // Creamos un enlace de descarga
    const a = document.createElement('a');
    a.href = fileURL;
    a.download = 'registro_ciclista.json';  // Nombre del archivo a descargar
    a.click();  // Ejecutamos el "clic" para que se descargue el archivo

        // Generamos los datos para el QR
        const datos = [
            document.getElementById('nombres').value,
            document.getElementById('apellidos').value,
            document.getElementById('correo').value,
            document.getElementById('telefono').value,
            document.getElementById('fecha_nacimiento').value,
            document.getElementById('pais_origen').value,
            document.getElementById('referencia_cicla').value,
            document.getElementById('tipo_carrera').value,
            document.getElementById('nombre_carrera').value,
            document.getElementById('pais_carrera').value
        ];
    
        // Generamos el código QR
        const codigoQRDiv = document.getElementById('codigo-qr');
        const codigoQR = new QRCode(codigoQRDiv, {
            text: JSON.stringify(datos),  // Usamos los datos completos en formato JSON para el QR
            width: 200,
            height: 200
        });
});
    </script>

</body>
</html>
