DROP DATABASE IF EXISTS crm;
CREATE DATABASE crm;
USE crm;

CREATE TABLE User (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    nombre VARCHAR(50),
    apellido_paterno VARCHAR(50),
    apellido_materno VARCHAR(50),
    direccion VARCHAR(100),
    telefono VARCHAR(20),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES User(id)
);

CREATE TABLE Empleados (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    nombre VARCHAR(50),
    apellido_paterno VARCHAR(50),
    apellido_materno VARCHAR(50),
    telefono VARCHAR(20),
    rfc VARCHAR(20),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES User(id)
);


CREATE TABLE Empleados_Clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    id_cliente INT,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE,
    UNIQUE (id_empleado, id_cliente)
);

CREATE TABLE Categorias_Autos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_categoria VARCHAR(50),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Autos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    anio INT,
    color VARCHAR(20),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categoria) REFERENCES Categorias_Autos(id)
);

CREATE TABLE Inventario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_auto INT,
    cantidad_disponible INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_auto) REFERENCES Autos(id)
);

CREATE TABLE Mantenimientos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_auto INT,
    id_cliente INT,
    id_empleado INT,
    fecha_mantenimiento DATE NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    costo_mantenimiento DECIMAL(10, 2) NOT NULL,
    estado_mantenimiento ENUM('pendiente', 'en_proceso', 'completado', 'cancelado') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_auto) REFERENCES Autos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE
);

CREATE TABLE Ventas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_auto INT,
    id_cliente INT,
    id_empleado INT,
    id_mantenimiento INT,
    fecha_venta DATE,
    precio_venta DECIMAL(10, 2),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_auto) REFERENCES Autos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE,
    FOREIGN KEY (id_mantenimiento) REFERENCES Mantenimientos(id) ON DELETE CASCADE
);

CREATE TABLE Tareas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    descripcion_tarea VARCHAR(200) NOT NULL,
    fecha_asignacion DATE,
    estado_tarea ENUM('pendiente', 'en_proceso', 'completado', 'cancelado') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE
);

CREATE TABLE Comentarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_auto INT,
    id_empleado INT,
    fecha_comentario DATE NOT NULL,
    contenido_comentario VARCHAR(200) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_auto) REFERENCES Autos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE
);

CREATE TABLE Pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_auto INT,
    id_cliente INT,
    id_empleado INT,
    fecha_pedido DATE,
    fecha_entrega DATE,
    total DECIMAL(10, 2),
    estado_pedido ENUM('pendiente', 'en_proceso', 'completado', 'cancelado') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_auto) REFERENCES Autos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE
);

CREATE TABLE Empleados_Comentarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    id_comentario INT,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE,
    FOREIGN KEY (id_comentario) REFERENCES Comentarios(id) ON DELETE CASCADE,
    UNIQUE (id_empleado, id_comentario)
);

CREATE TABLE Autos_Categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_auto INT,
    id_categoria INT,
    FOREIGN KEY (id_auto) REFERENCES Autos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES Categorias_Autos(id) ON DELETE CASCADE,
    UNIQUE (id_auto, id_categoria)
);

CREATE TABLE Citas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    id_empleado INT,
    fecha_cita DATE,
    hora_cita TIME,
    tipo_cita ENUM('prueba_manejo', 'mantenimiento', 'entrega') NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    estado_cita ENUM('pendiente', 'confirmada', 'cancelada', 'completada') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE
);

CREATE TABLE Cotizaciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    id_empleado INT,
    id_auto INT,
    fecha_cotizacion DATE,
    descripcion VARCHAR(200) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    estado_cotizacion ENUM('pendiente', 'enviada', 'aceptada', 'rechazada') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id) ON DELETE CASCADE,
    FOREIGN KEY (id_auto) REFERENCES Autos(id) ON DELETE CASCADE
);
