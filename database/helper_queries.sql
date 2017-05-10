SET FOREIGN_KEY_CHECKS=0;

SET FOREIGN_KEY_CHECKS=0; 
truncate clients; 
truncate products; 
truncate orders; 
truncate orders_has_products;

select * from clients;
select * from products;
select * from orders;
select * from orders_has_products;

delete from clients where id = 1;

select * from products;

