create table courses(id serial primary key,course_name varchar(50),
course_code varchar(5),course_fees int,duration int, 
duration_type char(1),added_date timestamp default current_timestamp,
modified_date timestamp null,status boolean);

insert into courses(course_name,course_code,course_fees,duration,duration_type,status)
values('Core Java','CJV',15000,6,'W',true);
insert into courses(course_name,course_code,course_fees,duration,duration_type,status)
values('Advanced Java','AJV',20000,8,'W',true);
insert into courses(course_name,course_code,course_fees,duration,duration_type,status)
values('Combo Java','CMJ',25000,10,'W',true);

create table enquiries(id serial primary key,first_name varchar(50),last_name varchar(50),
email varchar(100),contact_no varchar(20),course_id bigint,
enquiry_date timestamp default current_timestamp,modified_date timestamp null,
status boolean);

--alter table enquiries add foreign key(course_id) references courses(id);

alter table enquiries add timing int;
alter table enquiries add message text;