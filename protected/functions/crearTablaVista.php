<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../config/dataConstants.php');

$conexion = new Conexion();
$prefijo=_db_prefijo;
$sql="CREATE TABLE ".$prefijo."vista (
  id_vista        int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre       varchar(50)   NOT NULL
  ,s_archivo      varchar(50)   NOT NULL UNIQUE
  ,descripcion    varchar(255)
  ,s_hash         varchar(32)   UNIQUE
  ,s_nombre_url   varchar(50)   UNIQUE
  ,id_modulo      int(11)
  ,s_vigencia     char(1)       NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_vista)
  ,CONSTRAINT `fk_vista_modulo`   FOREIGN KEY (id_modulo)  REFERENCES ".$prefijo."modulo(id_modulo)
)";

try {
  $conexion->open();
  $conexion->sql($sql);
  $conexion->close();
  echo 1;
} catch (Exception $e) {
  $e->isError=true;
  error_log($e->getMessage());
  echo $e;
}

