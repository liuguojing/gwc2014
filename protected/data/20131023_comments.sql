ALTER TABLE users  MODIFY COLUMN first_name VARCHAR(50);
ALTER TABLE users  MODIFY COLUMN last_name VARCHAR(50);
ALTER TABLE users  MODIFY COLUMN department VARCHAR(100);

ALTER TABLE users ADD flight_price VARCHAR(100) AFTER hotel;
ALTER TABLE users ADD employeeid VARCHAR(100) AFTER flight_price;
ALTER TABLE users ADD payrollnumber VARCHAR(100) AFTER employeeid;