CREATE TABLE IF NOT EXISTS clientes(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    celular int(10),
    direccion_entrega varchar(255),
    tipoCliente varchar(20),
    numeroDocumento varchar(40),
    tipoDocumento varchar(40),
    telefono int(8),
    created_at datetime,
    updated_at datetime,
    remember_token varchar(255)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS tipo_costos(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    created_at datetime,
    updated_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS categorias(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    created_at datetime,
    updated_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS productos(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_id int(255) NOT NULL,
    categoria_id int(255) NOT NULL,
    produccion varchar(255),
    descripcion TEXT,
    cantidad int(255) NOT NULL,
    unidad_medida varchar(20),
    valor_unitario int(255) NOT NULL,
    cliente int(255) NOT NULL,
    descuento int(255),
    proveedor_id int(255) NOT NULL,
    direccion varchar(255) NOT NULL,
    fecha date NOT NULL,
    observacion TEXT,
    created_at datetime,
    updated_at datetime,

    CONSTRAINT productos_categorias FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    CONSTRAINT productos_tipo_costos FOREIGN KEY (item_id) REFERENCES tipo_costos(id),
    CONSTRAINT productos_proveedores FOREIGN KEY (proveedor_id) REFERENCES clientes(id),
    CONSTRAINT productos_clientes FOREIGN KEY (cliente) REFERENCES clientes(id)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS ventas(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    factura bigint,
    cliente_id int(255),
    categoria_id int(255),
    cantidad int(255),
    precio int(255),
    fecha_venta date,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT ventas_clientes FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    CONSTRAINT ventas_categorias FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS pagos(
    factura bigint PRIMARY KEY,
    fecha_pago date,
    pago_cliente int(255),
    created_at datetime,
    updated_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS observaciones(
    factura bigint PRIMARY KEY,
    nota TEXT,
    created_at datetime,
    updated_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS generales(
    iva int(4),
    telefono int(10),
    indicativoPais varchar(10),
    direccion varchar(100)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS equipo_trabajos(
    id int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(255),
    apellido varchar(255),
    telefono int(20),
    fecha_nacimiento date,
    mes_cumpleaños varchar(100),
    dia_cumpleaños int(10),
    inicio_labores date,
    updated_at datetime,
    created_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS carteras(
    id int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cliente_id int(255),
    compra bigint,
    pago bigint,
    estado varchar(255),
    updated_at datetime,
    created_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS tiempos(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    operacion varchar(255),
    operaria varchar(255),
    t1 float,
    t2 float,
    t3 float,
    t4 float,
    t5 float,
    updated_at datetime,
    created_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS operaciones(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    updated_at datetime,
    created_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS diseños(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    stock int(255),
    descripcion TEXT,
    precio int(255),
    talla varchar(10),
    image_path LONGTEXT,
    updated_at datetime,
    created_at datetime
);

CREATE TABLE IF NOT EXISTS tallas(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    updated_at datetime,
    created_at datetime
);