ALTER TABLE users ADD COLUMN has_checkin TINYINT (4) NOT NULL DEFAULT 0;
ALTER TABLE users ADD COLUMN headset VARCHAR (255) DEFAULT '';
ALTER TABLE guests ADD COLUMN has_checkin TINYINT (4) NOT NULL DEFAULT 0;
ALTER TABLE guests ADD COLUMN headset VARCHAR (255) DEFAULT '';

ALTER TABLE users ADD COLUMN has_gift TINYINT (4) NOT NULL DEFAULT 0;
ALTER TABLE guests ADD COLUMN has_gift TINYINT (4) NOT NULL DEFAULT 0;

ALTER TABLE users ADD COLUMN has_ipad TINYINT (4) NOT NULL DEFAULT 0;
ALTER TABLE users ADD COLUMN amount varchar(255) ;


ALTER TABLE users ADD COLUMN checkin_at datetime ;
ALTER TABLE users ADD COLUMN gift_at datetime ;
ALTER TABLE users ADD COLUMN ipad_at datetime ;

ALTER TABLE guests ADD COLUMN checkin_at datetime ;
ALTER TABLE guests ADD COLUMN gift_at datetime ;

ALTER table users add column travel_ticket tinyint(1) not null default 0;
alter table users add column coupon tinyint(1) not null default 0;


