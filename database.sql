CREATE TABLE IF NOT EXISTS productos(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_id int(255) NOT NULL,
    categoria_id int(255),
    produccion varchar(255),
    descripcion TEXT,
    cantidad int(255),
    unidad_medida varchar(20),
    valor_unitario int(255),
    valor int(255),
    descuento int(255),
    proveedor_id int(255),
    direccion varchar(255),
    observacion TEXT,
    created_at datetime,
    updated_at datetime,

    CONSTRAINT productos_categorias FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    CONSTRAINT productos_tipo_costos FOREIGN KEY (item_id) REFERENCES tipo_costos(id),
    CONSTRAINT productos_clientes FOREIGN KEY (proveedor_id) REFERENCES clientes(id)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS clientes(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
    celular int(100),
    direccion_entrega varchar(255),
    created_at datetime,
    updated_at datetime,
    remember_token varchar(255)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS costos_totales(
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoria varchar(255),
    coste int(255),
    produccion int(255),
    costo_unitario int(255),
    precio_venta int(255),
    utilidad int(255),
    created_at datetime,
    updated_at datetime
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

CREATE TABLE IF NOT EXISTS ventas(
    factura bigint AUTO_INCREMENT PRIMARY KEY,
    cliente_id int(255),
    categoria_id int(255),
    cantidad int(255),
    precio int(255),
    fecha_venta time,
    tardanza_pago varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT ventas_clientes FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    CONSTRAINT ventas_categorias FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS pagos(
    factura bigint AUTO_INCREMENT PRIMARY KEY,
    fecha_pago date,
    pago_cliente int(255),
    tardanza TEXT,
    saldo bigint,
    created_at datetime,
    updated_at datetime
)Engine=InnoDb;

CREATE TABLE IF NOT EXISTS observaciones(
    id bigint AUTO_INCREMENT PRIMARY KEY,
    nota TEXT,
    created_at datetime,
    updated_at datetime
)Engine=InnoDb;