# GuardianVision
Tienda virtual de venta de cámaras

Este proyecto ha sido desarrollado como parte de una asignatura de la Universidad de Granada (UGR). Junto con otros dos compañeros, hemos creado una tienda online con carrito de compra totalmente funcional.

---

⚙️ Instalación y Ejecución

Abrimos una terminal en la carpeta raíz del proyecto y ejecutamos:

1.- npm install

2.- composer install

3.- Durante la instalación de Composer, aceptar todas las opciones por defecto. Al final confirmar la creación del archivo .json.

4.- Añadir esto al archivo composer.json:

    "autoload": {
        "psr-4": {
            "MVC\\": "./",
            "Controllers\\": "./controllers",
            "Model\\": "./models"
        }
    }

5.- Ejecutar en terminal:

    composer dump-autoload
    composer install

6.- Con eso ya deberíamos poder ejecutarlo:

    - En una terminal:
        npm run dev

    - En otra terminal (antes cambiar de carpeta):
        cd public
        php -S localhost:3000

---

🗄️ Base de Datos (ejemplo inventado)

CREATE database guardianvision;

SHOW TABLES;

DROP database guardianvision;

USE guardianvision;

-- Tabla Almacen
CREATE TABLE IF NOT EXISTS Almacen (
  id_almacen INT NOT NULL PRIMARY KEY auto_increment,
  nombre VARCHAR(100) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  capacidad INT NOT NULL,
  capacidad_ocupada INT NOT NULL
);

-- Tabla Producto
CREATE TABLE IF NOT EXISTS Producto (
  cod_producto VARCHAR(20) NOT NULL PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  stock_actual INT NOT NULL,
  stock_minimo INT NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  descripcion varchar(200) not null,
  ubicacion INT NOT NULL,
  imagen varchar(50) not null
);

-- Tabla Carrito
CREATE TABLE IF NOT EXISTS Carrito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Cantidad FLOAT NOT NULL,
  idCliente INT NOT NULL,
  idProducto VARCHAR(20) NOT NULL,
  unique( idCliente ,idProducto,Cantidad ),
  FOREIGN KEY (idProducto) REFERENCES Producto(cod_producto),
  FOREIGN KEY (idCliente) REFERENCES Cliente(id)
);

-- Tabla Cliente
CREATE TABLE IF NOT EXISTS Cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(45) NOT NULL,
  Direccion VARCHAR(45) NOT NULL,
  Telefono VARCHAR(45) NOT NULL,
  Email VARCHAR(45) NOT NULL,
  contraseña varchar(45) not null
);

-- Ejemplo de datos inventados

INSERT INTO Almacen ( nombre, direccion, capacidad, capacidad_ocupada)
VALUES 
('Almacén Central', 'Calle Seguridad 123, Madrid', 1000, 350),
('Almacén Sevilla', 'Avenida Videovigilancia 45, Sevilla', 800, 400);

INSERT INTO Producto (cod_producto, nombre, stock_actual, stock_minimo, precio, descripcion, ubicacion, imagen)
VALUES 
('CAM123', 'Cámara IP Full HD', 150, 50, 89.99, 'Cámara de vigilancia con resolución Full HD y conexión IP', 1, 'CámaraIPFullHD'),
('SEN789', 'Sensor Movimiento WiFi', 200, 50, 29.90, 'Sensor inalámbrico de movimiento compatible con WiFi', 1, 'SensorMovimientoWiFi'),
('DVR001', 'Grabador DVR 8 canales con salida HDMI', 60, 15, 159.00, 'Grabador digital con soporte para 8 cámaras y salida HDMI', 2, 'GrabadorDVR8canalesconsalidaHDMI');

---

🛒 Funcionalidades principales

- Añadir productos al carrito y gestionar cantidades.
- Registro y login de clientes.
- Gestión de stock de productos.
- Visualización de productos con imágenes y descripciones.
- Interfaz responsiva con SCSS y JavaScript.

---

📚 Cosas que he aprendido

- Crear una tienda online completa en equipo utilizando PHP y MySQL.
- Gestionar rutas, controladores y vistas mediante MVC.
- Crear un carrito de compras funcional con relación entre clientes y productos.
- Aplicar JavaScript y SCSS para mejorar la interactividad y el estilo.
- Manejar datos de manera coherente y consistente en la base de datos.
