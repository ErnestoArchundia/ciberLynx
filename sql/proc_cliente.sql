DROP PROCEDURE IF EXISTS proc_mos_cliente_2;

DELIMITER //

CREATE PROCEDURE proc_mos_cliente_2()
BEGIN 
    SELECT
        Persona.Id_Persona,
        Cliente.Clv_Cliente,
        Persona.Nombre,
        Persona.Apellido_Paterno,
        Persona.Apellido_Materno
    FROM 
        Persona 
        INNER JOIN Cliente ON Persona.Id_Persona = Cliente.Id_Persona WHERE ;
END //

DELIMITER ;

CALL proc_mos_cliente_2;
