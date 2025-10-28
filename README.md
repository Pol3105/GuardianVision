# GuardianVision
Online Camera Store

This project was developed as part of a course at the University of Granada (UGR). Together with two other classmates, we created a fully functional online store with a shopping cart.

---

⚙️ Installation & Execution

Open a terminal in the root folder of the project and run:

1.- npm install

2.- composer install

3.- During Composer installation, accept all default options. At the end, confirm the creation of the .json file.

4.- Add the following to `composer.json`:

    "autoload": {
        "psr-4": {
            "MVC\\": "./",
            "Controllers\\": "./controllers",
            "Model\\": "./models"
        }
    }

5.- Execute in terminal:

    composer dump-autoload
    composer install

6.- After that, you should be able to run the project:

    - In one terminal:
        npm run dev

    - In another terminal (change folder first):
        cd public
        php -S localhost:3000

---

🗄️ Database (example data)

```sql
CREATE DATABASE guardianvision;

SHOW TABLES;

DROP DATABASE guardianvision;

USE guardianvision;

-- Warehouse Table
CREATE TABLE IF NOT EXISTS Almacen (
  id_almacen INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  capacidad INT NOT NULL,
  capacidad_ocupada INT NOT NULL
);

-- Product Table
CREATE TABLE IF NOT EXISTS Producto (
  cod_producto VARCHAR(20) NOT NULL PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  stock_actual INT NOT NULL,
  stock_minimo INT NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  descripcion VARCHAR(200) NOT NULL,
  ubicacion INT NOT NULL,
  imagen VARCHAR(50) NOT NULL
);

-- Cart Table
CREATE TABLE IF NOT EXISTS Carrito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Cantidad FLOAT NOT NULL,
  idCliente INT NOT NULL,
  idProducto VARCHAR(20) NOT NULL,
  UNIQUE(idCliente, idProducto, Cantidad),
  FOREIGN KEY (idProducto) REFERENCES Producto(cod_producto),
  FOREIGN KEY (idCliente) REFERENCES Cliente(id)
);

-- Client Table
CREATE TABLE IF NOT EXISTS Cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(45) NOT NULL,
  Direccion VARCHAR(45) NOT NULL,
  Telefono VARCHAR(45) NOT NULL,
  Email VARCHAR(45) NOT NULL,
  contraseña VARCHAR(45) NOT NULL
);

-- Example Data
INSERT INTO Almacen (nombre, direccion, capacidad, capacidad_ocupada)
VALUES 
('Central Warehouse', 'Calle Seguridad 123, Madrid', 1000, 350),
('Seville Warehouse', 'Avenida Videovigilancia 45, Sevilla', 800, 400);

INSERT INTO Producto (cod_producto, nombre, stock_actual, stock_minimo, precio, descripcion, ubicacion, imagen)
VALUES 
('CAM123', 'Full HD IP Camera', 150, 50, 89.99, 'Surveillance camera with Full HD resolution and IP connection', 1, 'FullHDIPCamera'),
('SEN789', 'WiFi Motion Sensor', 200, 50, 29.90, 'Wireless motion sensor compatible with WiFi', 1, 'WiFiMotionSensor'),
('DVR001', '8-Channel DVR with HDMI output', 60, 15, 159.00, 'Digital recorder supporting 8 cameras with HDMI output', 2, 'DVR8ChannelHDMI');
```
---

🛒 Main Features

- Add products to the cart and manage quantities.  
- Client registration and login.  
- Product stock management.  
- Display products with images and descriptions.  
- Responsive interface using SCSS and JavaScript.

---

📚 What I Learned

- Building a complete online store as a team using PHP and MySQL.  
- Managing routes, controllers, and views following the MVC pattern.  
- Creating a functional shopping cart linking clients and products.  
- Applying JavaScript and SCSS to enhance interactivity and styling.  
- Handling data consistently and coherently in the database.

