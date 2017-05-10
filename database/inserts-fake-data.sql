SET FOREIGN_KEY_CHECKS=0; 
truncate clients; 
truncate products; 
truncate orders; 
truncate orders_has_products;

#all the clients and products are already in our database
insert into clients values(1, "Thiago", NOW(), NOW());
insert into clients values(2, "Alex", NOW(), NOW());
insert into clients values(3, "Zé", NOW(), NOW());

insert into products values(1, "Mobile", now(), now());
insert into products values(2, "iPad", now(), now());
insert into products values(3, "HD", now(), now());
insert into products values(4, "Mouse", now(), now());
insert into products values(5, "keyboard", now(), now());

#new orders will bring info about client
insert into orders values(1, NOW(), NOW(), 1); #User = 1 Thiago
insert into orders values(2, NOW(), NOW(), 1);
insert into orders values(3, NOW(), NOW(), 1);

insert into orders values(4, NOW(), NOW(), 2); #User = 2 Alex

insert into orders values(5, NOW(), NOW(), 3); #User = 3 Ze
insert into orders values(6, NOW(), NOW(), 3);

#and every order will have N products
#user = 1 Thiago
insert into orders_has_products values(1,1); #Product = 1 Mobile
insert into orders_has_products values(2,2); #Product = 2 iPad
insert into orders_has_products values(3,3); #Product = 3 HD
insert into orders_has_products values(3,4); #Product = 4 Mouse
insert into orders_has_products values(3,5); #Product = 5 Keyboard

#user = 2 Alex
insert into orders_has_products values(4,1); #Product = 1 Mobile
insert into orders_has_products values(5,2); #Product = 2 iPad

#user = 3 Ze
insert into orders_has_products values(6,3); #Product = 3 HD
insert into orders_has_products values(6,4); #Product = 4 Mouse

SET FOREIGN_KEY_CHECKS=1;