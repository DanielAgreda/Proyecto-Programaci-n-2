import qrcode
import json
import os

# Función para generar el código QR a partir de un archivo JSON
def generar_qr_desde_json(ruta_json, ruta_qr):
    # Leer los datos desde el archivo JSON
    with open(ruta_json, 'r') as file:
        datos = json.load(file)
    
    # Convertir los datos a una cadena de texto
    datos_json = json.dumps(datos)
    
    # Crear el objeto QRCode
    qr = qrcode.QRCode(
        version=1,  # Tamaño del QR (1 es el más pequeño)
        error_correction=qrcode.constants.ERROR_CORRECT_L,  # Nivel de corrección de errores
        box_size=10,  # Tamaño de cada caja en el código QR
        border=4,  # Tamaño del borde
    )
    
    # Añadir los datos al objeto QRCode
    qr.add_data(datos_json)
    qr.make(fit=True)
    
    # Crear una imagen del código QR
    img = qr.make_image(fill='black', back_color='white')
    
    # Guardar la imagen del código QR en un archivo
    img.save(ruta_qr)

# Obtener la ruta del directorio donde se encuentra el script
directorio_actual = os.path.dirname(os.path.abspath(__file__))

# Crear la ruta completa para guardar el archivo QR en la misma carpeta
ruta_qr = os.path.join(directorio_actual, 'assets/codigo_qr.png')

# Ruta del archivo JSON (puedes usar el método anterior para definir la ruta)
ruta_json = r'C:\Users\nicol\Downloads\registro_ciclista.json'

# Generar el código QR
generar_qr_desde_json(ruta_json, ruta_qr)
print("Código QR generado y guardado en", ruta_qr)
