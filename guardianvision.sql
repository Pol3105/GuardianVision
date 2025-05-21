--
--            Base de datos: guardianvision
-- 
-- -----------------------------------------------------
-- Schema guardianvision
-- -----------------------------------------------------
Drop database guardianvision;

CREATE database guardianvision;

USE guardianvision;

-- -----------------------------------------------------
-- Table `guardianvision`.`Almacen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Almacen;
CREATE TABLE IF NOT EXISTS Almacen (
  id_almacen INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  capacidad INT NOT NULL,
  capacidad_ocupada INT NOT NULL
);
DESCRIBE Almacen;
SELECT * FROM Almacen;

-- -----------------------------------------------------
-- Table `guardianvision`.`Producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Producto;
CREATE TABLE IF NOT EXISTS Producto (
  cod_producto VARCHAR(20) NOT NULL PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  stock_actual INT NOT NULL,
  stock_minimo INT NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  ubicacion INT NOT NULL,
  descripcion VARCHAR(200) NOT NULL,
  imagen VARCHAR(50) NOT NULL,
  FOREIGN KEY (ubicacion) REFERENCES Almacen(id_almacen)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
DESCRIBE Producto;
SELECT * FROM Producto;

-- -----------------------------------------------------
-- Table `guardianvision`.`Movimiento_Almacen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Movimiento_Almacen;
CREATE TABLE IF NOT EXISTS Movimiento_Almacen (
  id_movimiento INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  tipo ENUM('entrada', 'salida') NOT NULL,
  fecha DATE NOT NULL,
  producto_id VARCHAR(20) NOT NULL,
  cantidad INT NOT NULL,
  almacen_id INT NOT NULL,
  origen_operacion ENUM('compra', 'venta') NOT NULL,
  FOREIGN KEY (producto_id) REFERENCES Producto(cod_producto),
  FOREIGN KEY (almacen_id) REFERENCES Almacen(id_almacen)
);
DESCRIBE Movimiento_Almacen;
SELECT * FROM Movimiento_Almacen;

-- -----------------------------------------------------
-- Table `guardianvision`.`Proveedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Proveedor;
CREATE TABLE IF NOT EXISTS Proveedor (
  cod_proveedor VARCHAR(20) NOT NULL PRIMARY KEY,
  razon_social VARCHAR(15) NOT NULL,
  direccion VARCHAR(100) NOT NULL,
  telefono VARCHAR(15) NOT NULL,
  email VARCHAR(34) NOT NULL
);
DESCRIBE Proveedor;
SELECT * FROM Proveedor;

-- -----------------------------------------------------
-- Table `guardianvision`.`Materia_Prima`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Materia_Prima;
CREATE TABLE IF NOT EXISTS Materia_Prima (
  cod_mp VARCHAR(20) NOT NULL PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  unidad_medida VARCHAR(20),
  stock_actuall INT NOT NULL,
  stock_minimo INT NOT NULL,
  proveedor VARCHAR(100),
  ubicacion INT NOT NULL,
  FOREIGN KEY (proveedor) REFERENCES Proveedor(cod_proveedor),
  FOREIGN KEY (ubicacion) REFERENCES Almacen(id_almacen)
);
DESCRIBE Materia_Prima;
SELECT * FROM Materia_Prima;

-- -----------------------------------------------------
-- Table `guardianvision`.`Empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Empresa;
CREATE TABLE IF NOT EXISTS Empresa (
  razon_social VARCHAR(100) NOT NULL,
  nif VARCHAR(15) NOT NULL PRIMARY KEY,
  direccion VARCHAR(200) NOT NULL,
  telefono VARCHAR(15) NOT NULL,
  email VARCHAR(100) NOT NULL
);
DESCRIBE Empresa;
SELECT * FROM Empresa;

-- -----------------------------------------------------
-- Table `guardianvision`.`Configuracion_General`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Configuracion_General;
CREATE TABLE IF NOT EXISTS Configuracion_General (
  moneda VARCHAR(10) NOT NULL,
  idioma VARCHAR(20) NOT NULL,
  pais VARCHAR(50) NOT NULL
);
DESCRIBE Configuracion_General;
SELECT * FROM Configuracion_General;

-- -----------------------------------------------------
-- Table `guardianvision`.`Configuracion_IVA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Configuracion_IVA;
CREATE TABLE IF NOT EXISTS Configuracion_IVA (
  porcentaje_iva DECIMAL(4,2) NOT NULL,
  fecha_ini_iva DATE NOT NULL PRIMARY KEY,
  fecha_fin_iva DATE
);
DESCRIBE Configuracion_IVA;
SELECT * FROM Configuracion_IVA;

-- -----------------------------------------------------
-- Table `guardianvision`.`Detalles_Venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Detalles_Venta;
CREATE TABLE IF NOT EXISTS Detalles_Venta (
  idDetallesVenta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Cantidad FLOAT NOT NULL,
  idProducto VARCHAR(20) NOT NULL,
  idVenta INT NOT NULL,
  FOREIGN KEY (idProducto) REFERENCES Producto(cod_producto)
);
DESCRIBE Detalles_Venta;
SELECT * FROM Detalles_Venta;

-- -----------------------------------------------------
-- Table `guardianvision`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Cliente;
CREATE TABLE IF NOT EXISTS Cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(45) NOT NULL,
  Direccion VARCHAR(45) NOT NULL,
  Telefono VARCHAR(45) NOT NULL,
  Email VARCHAR(45) NOT NULL,
  contraseña VARCHAR(45) NOT NULL
);
DESCRIBE Cliente;
SELECT * FROM Cliente;

-- -----------------------------------------------------
-- Table `guardianvision`.`Carrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Carrito;
CREATE TABLE IF NOT EXISTS Carrito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Cantidad FLOAT NOT NULL,
  idCliente INT NOT NULL,
  idProducto VARCHAR(20) NOT NULL,
  UNIQUE(idCliente, idProducto, Cantidad),
  FOREIGN KEY (idProducto) REFERENCES Producto(cod_producto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  FOREIGN KEY (idCliente) REFERENCES Cliente(id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
DESCRIBE Carrito;
SELECT * FROM Carrito;

-- -----------------------------------------------------
-- Table `guardianvision`.`Envio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Envio;
CREATE TABLE IF NOT EXISTS Envio (
  idEnvio INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Fecha_inicio VARCHAR(45) NOT NULL,
  Fecha_entrega VARCHAR(45) NOT NULL,
  Emprresa_envio VARCHAR(45) NOT NULL,
  Estado VARCHAR(45) NOT NULL
);
DESCRIBE Envio;
SELECT * FROM Envio;

-- -----------------------------------------------------
-- Table `guardianvision`.`Instalacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Instalacion;
CREATE TABLE IF NOT EXISTS Instalacion (
  idIntalacion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Fecha DATE NOT NULL,
  Direccion VARCHAR(45) NOT NULL,
  Precio FLOAT NOT NULL
);
DESCRIBE Instalacion;
SELECT * FROM Instalacion;

-- -----------------------------------------------------
-- Table `guardianvision`.`Venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Venta;
CREATE TABLE IF NOT EXISTS Venta (
  idVenta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Fecha DATE NOT NULL,
  pago_total FLOAT NOT NULL,
  forma_pago VARCHAR(45) NOT NULL,
  tipo_envio VARCHAR(45) NOT NULL,
  idIntalacion INT,
  idEnvio INT,
  idDetallesVenta INT NOT NULL,
  idCliente INT NOT NULL,
  idProducto VARCHAR(20) NOT NULL,
  FOREIGN KEY (idIntalacion) REFERENCES Instalacion(idIntalacion),
  FOREIGN KEY (idEnvio) REFERENCES Envio(idEnvio),
  FOREIGN KEY (idDetallesVenta) REFERENCES Detalles_Venta(idDetallesVenta),
  FOREIGN KEY (idCliente) REFERENCES Cliente(id),
  FOREIGN KEY (idProducto) REFERENCES Producto(cod_producto)
);
DESCRIBE Venta;
SELECT * FROM Venta;

-- -----------------------------------------------------
-- Table `guardianvision`.`Pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Pedido;
CREATE TABLE IF NOT EXISTS Pedido (
  cod_pedido VARCHAR(45) NOT NULL PRIMARY KEY,
  fecha_pedido VARCHAR(45) NOT NULL,
  cod_proveedor VARCHAR(45) NOT NULL,
  estado ENUM('pendiente', 'recibido', 'cancelado') NOT NULL,
  FOREIGN KEY (cod_proveedor) REFERENCES Proveedor(cod_proveedor)
);
DESCRIBE Pedido;
SELECT * FROM Pedido;

-- -----------------------------------------------------
-- Table `guardianvision`.`Detalle_Pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Detalle_Pedido;
CREATE TABLE IF NOT EXISTS Detalle_Pedido (
  cod_pedido VARCHAR(45) NOT NULL,
  cod_producto VARCHAR(45) NOT NULL,
  cantidad INT NOT NULL,
  precio_unitario DECIMAL NOT NULL,
  PRIMARY KEY (cod_pedido, cod_producto),
  FOREIGN KEY (cod_pedido) REFERENCES Pedido(cod_pedido)
);
DESCRIBE Detalle_Pedido;
SELECT * FROM Detalle_Pedido;

-- -----------------------------------------------------
-- Table `guardianvision`.`Albaran`
-- -----------------------------------------------------
DROP TABLE IF EXISTS Albaran;
CREATE TABLE IF NOT EXISTS Albaran (
  cod_albaran VARCHAR(30) NOT NULL PRIMARY KEY,
  fecha_recepcion DATE NOT NULL,
  cod_pedido VARCHAR(45) NOT NULL,
  estado_recepcion ENUM('pendiente', 'completo') NOT NULL,
  observaciones TEXT NOT NULL,
  FOREIGN KEY (cod_pedido) REFERENCES Pedido(cod_pedido)
);
DESCRIBE Albaran;
SELECT * FROM Albaran;
 


INSERT INTO Almacen ( nombre, direccion, capacidad, capacidad_ocupada)
VALUES 
('Almacén Central', 'Calle Seguridad 123, Madrid', 1000, 350),
('Almacén Sevilla', 'Avenida Videovigilancia 45, Sevilla', 800, 400);


INSERT INTO Producto (cod_producto, nombre, stock_actual, stock_minimo, precio, ubicacion, descripcion, imagen)
VALUES 
('CAM123', 'Cámara IP Full HD', 150, 50, 89.99, 1, 'Cámara de vigilancia con resolución Full HD y visión nocturna', 'CámaraIPFullHD'),
('SEN789', 'Sensor Movimiento WiFi', 200, 50, 29.90, 1, 'Sensor de movimiento WiFi para interiores', 'SensorMovimientoWiFi'),
('DVR001', 'Grabador DVR 8 canales con salida HDMI', 60, 15, 159.00, 2, 'Grabador de video digital para 8 cámaras, salida HDMI', 'GrabadorDVR8canalesconsalidaHDMI'),
('DISK01', 'Disco Duro 2TB para Videovigilancia', 100, 20, 89.50, 1, 'Disco duro de 2TB optimizado para grabación continua', 'DiscoDuro2TBparaVideovigilancia'),
('CAM126', 'Cámara PTZ Motorizada Full HD', 50, 10, 199.99, 1, 'Cámara motorizada PTZ con control remoto y zoom', 'CámaraPTZMotorizadaFullHD'),
('KIT458', 'Kit de instalación universal', 200, 50, 24.95, 2, 'Kit de instalación universal', 'Kitdeinstalaciónuniversal'),
('SEN791', 'Sensor de humo inalámbrico', 120, 30, 34.95, 1, 'Sensor de humo inalámbrico', 'Sensordehumoinalámbrico');

select * from Producto;

INSERT INTO proveedor (cod_proveedor, razon_social, direccion, telefono, email)
VALUES 
('PRO001', 'SegurTech S.A.', 'Pol. Ind. Norte, Barcelona', '912345678', 'contacto@segurtech.com'),
('PRO002', 'VisionMax Ltd.', 'C/ Lentes 33, Valencia', '934567891', 'ventas@visionmax.com');


INSERT INTO Materia_Prima (cod_mp, nombre, unidad_medida, stock_actuall, stock_minimo, proveedor, ubicacion)
VALUES 
('MP001', 'Placa base cámara IP', 'unidad', 500, 100, 'PRO001', 1),
('MP002', 'Lente angular 90°', 'unidad', 300, 80, 'PRO002', 2);


/*
INSERT INTO Cliente (Nombre, Direccion, Telefono, Email)
VALUES 
('Ana López', 'Calle Vigilancia 3, Málaga', '654123456', 'ana.lopez@gmail.com'),
('Carlos Ruiz', 'Av. Seguridad 22, Madrid', '622334455', 'carlos.ruiz@hotmail.com');
*/

INSERT INTO `Detalles_Venta` (Cantidad, idProducto, idVenta)
VALUES 
(2, 'CAM123', 1),
(1, 'KIT456', 1);

INSERT INTO Venta (idVenta, Fecha, pago_total, forma_pago, tipo_envio, idDetallesVenta, idCliente, idProducto)
VALUES 
(1, '2025-05-10', 479.93, 'Tarjeta', 'Estándar', 1, 1, 'CAM123');


INSERT INTO pedido (cod_pedido, fecha_pedido, cod_proveedor, estado)
VALUES 
('PED001', '2025-05-05', 'PRO001', 'pendiente');

INSERT INTO detalle_pedido (cod_pedido, cod_producto, cantidad, precio_unitario)
VALUES 
('PED001', 'CAM123', 100, 60.00);


INSERT INTO Albaran (cod_albaran, fecha_recepcion, cod_pedido, estado_recepcion, observaciones)
VALUES 
('ALB001', '2025-05-08', 'PED001', 'pendiente', 'Revisar embalaje al recibir');

SHOW TABLES;

SELECT * FROM venta;