DROP VIEW v_hotel_room_info;

CREATE
    /*[ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE}]
    [DEFINER = { user | CURRENT_USER }]
    [SQL SECURITY { DEFINER | INVOKER }]*/
    VIEW `gwc2014`.`v_hotel_room_info` 
    AS
(SELECT id,CONCAT(hotel_name,' - ' ,NAME) hotel_type,`sell_rate`,`hotel_name` FROM hotels s);
`v_hotel_room_info`