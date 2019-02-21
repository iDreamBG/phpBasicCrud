-- we don't know how to generate schema exam_prep (class Schema) :(
create table categories
(
	id int auto_increment
		primary key,
	name varchar(50) default '0' not null
)
;

create table users
(
	id int auto_increment
		primary key,
	username varchar(255) not null,
	password varchar(255) not null,
	first_name varchar(255) null,
	location varchar(255) null,
	phone varchar(255) not null,
	constraint username
		unique (username)
)
;

create table tasks
(
	id int auto_increment
		primary key,
	title varchar(255) not null,
	price decimal(50) null,
	description text null,
	user_id int not null,
	category_id int not null,
	image varchar(255) not null,
	constraint fk_tasks_users
		foreign key (user_id) references users (id),
	constraint fk_tasks_categories
		foreign key (category_id) references categories (id)
)
;

create index fk_tasks_categories
	on tasks (category_id)
;

create index fk_tasks_users
	on tasks (user_id)
;

