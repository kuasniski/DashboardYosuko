CREATE DATABASE IF NOT EXISTS yosuko;

USE yosuko;

CREATE TABLE IF NOT EXISTS usuarios(

id                      int(255) auto_increment not null,
nombre                  varchar(40),
apellido                varchar(60),
email                   varchar(100),
password                varchar(255),
direccion               varchar(100),
dni                     int(10),
telefono                varchar(100),
fecha_nacimiento        date,
imagen_path             varchar(255),
fecha_alta              datetime,
usu_alta                int(255),
fecha_modificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)

)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null,'admin','admin','admin@admin.com','',null,null,null,'1990-02-16',null,curdate(),1,null,null);

CREATE TABLE IF NOT EXISTS empleados(

id                      int(255) auto_increment not null,
usuario_id              int(255) not null,
carga_horaria           int(10),
cargo                   varchar(150),
sueldo                  decimal(6,2),
fecha_ingreso           date,
condicion               varchar(150),
cuil                    int(15),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_empleados PRIMARY KEY(id),
CONSTRAINT fk_empleados_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
CONSTRAINT uq_cuil UNIQUE(cuil)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS productos(

id                      int(255) auto_increment not null,
descripcion             varchar(150) not null,
costo                   float not null,
precio_venta            float not null,
cantidad                int(10),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_productos PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS caja(

id                      int(255) auto_increment not null,
fecha_apertura          date not null,
hora_apertura           time not null,
monto_apertura          float not null,
ingreso                 float,
egreso                  float,
fecha_cierre            date,
hora_cierre             time,
monto_cierre            float,
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_caja PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS facturas_cabeceras(

id                      int(255) auto_increment not null,
caja_id                 int(255) not null,
numero_factura          varchar(200),
tipo_factura            varchar(100),
fecha                   date,
neto                    decimal(8,2),
iva                     decimal(8,2),
total                   decimal(8,2),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_facturas_cabeceras PRIMARY KEY(id),
CONSTRAINT fk_facturas_cabeceras_caja FOREIGN KEY(caja_id) REFERENCES caja(id),
CONSTRAINT fk_facturas_cabeceras_tipo_factura FOREIGN KEY(tipo_factura_id) REFERENCES tipo_facturas
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS facturas_detalles(

id                      int(255) auto_increment not null,
factura_cabecera_id     int(255) not null,
cantidad                int(5),
detalle                 varchar(100),
precio_unitario         decimal(6,2),
subtotal                decimal(6,2),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_facturas_detalles PRIMARY KEY(id),
CONSTRAINT fk_facturas_detalles_facturas_cabeceras FOREIGN KEY(factura_cabecera_id) REFERENCES facturas_cabeceras(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS tipo_facturas(
id                      int(255) auto_increment not null,
tipo_factura            varchar(100),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_tipo_facturas PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS pedidos_productos(

id                      int(255) auto_increment not null,
usuario_id              int(255) not null,
producto_id             int(255) not null,
factura_cabecera_id     int(255) not null,
cantidad                int(10),
fecha                   date,
hora                    time,
forma_pago              varchar(100),
estado                  varchar(60),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_pedidos_productos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_productos_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_pedidos_productos_productos FOREIGN KEY(producto_id) REFERENCES productos(id),
CONSTRAINT fk_pedidos_productos_facturas_cabeceras FOREIGN KEY(factura_cabecera_id) REFERENCES facturas_cabeceras(id)
   
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS producciones(

id                      int(255) auto_increment not null,
producto_id             int(255) not null,
empleado_id             int(255) not null,
fecha_elavoracion       date,
fecha_vencimiento       date,
cantidad                int(255),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_producciones PRIMARY KEY(id),
CONSTRAINT fk_producciones_productos FOREIGN KEY(producto_id) REFERENCES productos(id),
CONSTRAINT fk_producciones_empleados FOREIGN KEY(empleado_id) REFERENCES empleados(id)

)ENGINE=InnoDb;





CREATE TABLE IF NOT EXISTS proveedores(

id                      int(255) auto_increment not null,
nombre                  varchar(150),
cuit                    int(15),
direccion               varchar(100),
telefono                varchar(100),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_proveedores PRIMARY KEY(id),
CONSTRAINT uq_cuit UNIQUE(cuit)

)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS insumos(

id                      int(255) auto_increment not null,
proveedor_id            int(255) not null,
nombre                  varchar(100),
costo                   decimal(5,2),
cantidad                int(10),
unidad_medida           varchar(10),
fecha_vencimiento       date,
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_insumos PRIMARY KEY(id),
CONSTRAINT fk_insumos_proveedores FOREIGN KEY(proveedor_id) REFERENCES proveedores(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS pedidos_insumos(
id                      int(255) auto_increment not null,
proveedor_id            int(255) not null,
insumo_id               int(255) not null,
detalle_insumo          varchar(150),
cantidad                int(10),
estado                  varchar(50),
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_pedidos_insumos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_insumos_proveedores FOREIGN KEY(proveedor_id) REFERENCES proveedores(id),
CONSTRAINT fk_pedidos_insumos_insumos FOREIGN KEY(insumo_id) REFERENCES insumos(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS recetas(

id                      int(255) auto_increment not null,
insumo_id               int(255) not null,
producto_id             int(255) not null,
fecha_alta              datetime,
usu_alta                int(255),
fecha_midificado        datetime,
usu_modifico            int(255),
CONSTRAINT pk_recetas PRIMARY KEY(id),
CONSTRAINT fk_recetas_insumos FOREIGN KEY(insumo_id) REFERENCES insumos(id),
CONSTRAINT fk_recetas_productos FOREIGN KEY(producto_id) REFERENCES productos(id)

)ENGINE=InnoDb;