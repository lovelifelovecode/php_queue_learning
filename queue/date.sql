create table if not exists php_queue(
	id int unsigned not null auto_increment primary key comment 'id',
	order_id int not null,
	mobile varchar(20) not null comment 'tel',
	address varchar(100),
	created_at datetime not null default '0000-00-00 00:00:00' comment 'create time',
	updated_at datetime not null default '0000-00-00 00:00:00' comment 'update time',
	status tinyint(2) not null default '0' comment '未处理：０，已处理：１，处理中：２'
)engine InnoDB charset=utf8;

create table if not exists redis_queue(
	id int unsigned not null auto_increment primary key,
	uid int unsigned not null default '0',
	time_stamp varchar(24) not null
)engine InnoDB default charset=utf8;