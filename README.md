# GuardianVision
Tienda virtual de venta de cámaras


Abrimos una terminal en la capeta raiz del proyecto y ejecutamos

1.- npm install

2.- composer istall

3.- le damos a todo enter y al final en la confirmacion le damos a que si por lo que se nos ha creado un documento .json

4.- Añadir esto al archivo composer.json:

    "autoload": {
        "psr-4": {
            "MVC\\": "./",
            "Controllers\\": "./controllers",
            "Model\\": "./models"
        }
    },

5.- Tras hacer esto en una terminal ponemos:

    composer dump-autoload

    composer install

5- Con eso ya deberiamos poder ejecutarlo 

    - En una terminal poner => npm run dev 


    - En otra terminal poner=>
    Pero antes IMP tienes que cambiar de caperta =>

    cd public
    php -S localhost:3000

CREATE database guardianvision;

SHOW TABLES;

Drop database guardianvision;

USE guardianvision;

-- -----------------------------------------------------
-- Table `mydb`.`Almacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Almacen (
  id_almacen INT NOT NULL PRIMARY KEY auto_increment,
  nombre VARCHAR(100) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  capacidad INT NOT NULL,
  capacidad_ocupada INT NOT NULL
);

describe Almacen;

drop table Almacen;

-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
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

describe producto;

drop table producto;


drop table Carrito;
CREATE TABLE IF NOT EXISTS Carrito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Cantidad FLOAT NOT NULL,
  idCliente INT NOT NULL,
  idProducto VARCHAR(20) NOT NULL,
  unique( idCliente ,idProducto,Cantidad ),
  FOREIGN KEY (idProducto) REFERENCES Producto(cod_producto)
	ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (idCliente) REFERENCES Cliente(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);	

select * from Carrito;
describe Carrito;
describe Carrito;



-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------

drop table Cliente;
CREATE TABLE IF NOT EXISTS Cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(45) NOT NULL,
  Direccion VARCHAR(45) NOT NULL,
  Telefono VARCHAR(45) NOT NULL,
  Email VARCHAR(45) NOT NULL,
  contraseña varchar(45) not null
  );
  
  select * from Cliente;


INSERT INTO Almacen ( nombre, direccion, capacidad, capacidad_ocupada)
VALUES 
('Almacén Central', 'Calle Seguridad 123, Madrid', 1000, 350),
('Almacén Sevilla', 'Avenida Videovigilancia 45, Sevilla', 800, 400);

drop table Producto;

INSERT INTO Producto (cod_producto, nombre, stock_actual, stock_minimo, precio, descripcion, ubicacion, imagen)
VALUES 
('CAM123', 'Cámara IP Full HD', 150, 50, 89.99, 'Cámara de vigilancia con resolución Full HD y conexión IP', 1, 'CámaraIPFullHD'),
('SEN789', 'Sensor Movimiento WiFi', 200, 50, 29.90, 'Sensor inalámbrico de movimiento compatible con WiFi', 1, 'SensorMovimientoWiFi'),
('DVR001', 'Grabador DVR 8 canales con salida HDMI', 60, 15, 159.00, 'Grabador digital con soporte para 8 cámaras y salida HDMI', 2, 'GrabadorDVR8canalesconsalidaHDMI'),
('DISK01', 'Disco Duro 2TB para Videovigilancia', 100, 20, 89.50, 'Disco duro de 2TB optimizado para sistemas de videovigilancia', 1, 'DiscoDuro2TBparaVideovigilancia'),
('CAM126', 'Cámara PTZ Motorizada Full HD', 50, 10, 199.99, 'Cámara motorizada PTZ con zoom y resolución Full HD', 1, 'CámaraPTZMotorizadaFullHD'),
('KIT458', 'Kit de instalación universal', 200, 50, 24.95, 'Kit con herramientas y accesorios para instalación de cámaras', 2, 'Kitdeinstalaciónuniversal'),
('SEN791', 'Sensor de humo inalámbrico', 120, 30, 34.95, 'Detector de humo con conectividad inalámbrica y alerta temprana', 1, 'Sensordehumoinalámbrico');



