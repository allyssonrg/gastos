
-- Creación de la tabla departamentos
CREATE TABLE IF NOT EXISTS departamentos (
  idDepartamento INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(100) NOT NULL,
  activo TINYINT(1) NOT NULL DEFAULT 1,
  fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  idEmpActualiza INT NULL DEFAULT 1,
  PRIMARY KEY (idDepartamento))
ENGINE = InnoDB


--creacion tabla empleaado
CREATE TABLE IF NOT EXISTS mydb.empleados (
  idEmpleado INT NOT NULL AUTO_INCREMENT,
  nombre TEXT NOT NULL,
  primerApellido TEXT NOT NULL,
  segundoApellido TEXT NULL,
  email VARCHAR(100) NOT NULL,
  fechaEntrada DATETIME NOT NULL,
  fechaBaja DATETIME NULL,
  idDepartamento INT NOT NULL,
  idJefe INT NULL,
  esJefe TINYINT NULL DEFAULT 0,
  usr VARCHAR(100) NOT NULL,
  pwd VARCHAR(45) NOT NULL,
  foto VARCHAR(100) NULL,
  activo TINYINT NOT NULL DEFAULT '1',
  fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  idEmpActualiza INT NULL DEFAULT '1',
  PRIMARY KEY (idEmpleado),
  UNIQUE INDEX idEmpleado_UNIQUE (idEmpleado ASC) VISIBLE,
  INDEX fk_empleados_departamentos_idx (idDepartamento ASC) VISIBLE,
  CONSTRAINT fk_empleados_departamentos
    FOREIGN KEY (idDepartamento)
    REFERENCES mydb.departamentos (idDepartamento)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB