alter table `users` add column travel_comment text,
add column travel_comment_status text,
add column dietary_commnet text,
add column billing_instruction text,
add column visa_status text;
alter table `guests` add visa_status text;
ALTER TABLE `users` CHANGE COLUMN `qualified` `qualified` char(10) NOT NULL DEFAULT 'Qualified';
alter table `users` add column permanent_home_address text,
add column place_of_birth text;
alter table `guests` add column permanent_home_address text,
add column place_of_birth text;

alter table `hotels` add column `hotel_name` varchar(255) not null default '';
alter table admins add column email varchar(255) not null default '';