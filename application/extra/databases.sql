use 'werewolves';

/*用户表*/
DROP TABLE IF EXISTS werewolves_user;
CREATE TABLE werewolves_user(
`user_id` VARCHAR(36) COMMENT '用户id',
`user_name` VARCHAR(50) COMMENT '用户名',
`password` VARCHAR(255) COMMENT '用户密码,密文',
`phone` VARCHAR(11) COMMENT '手机号码',
`email` VARCHAR(36) COMMENT '电邮',
`create_time` INT(13) COMMENT '创建时间',
`last_login_ip` VARCHAR(25) COMMENT '上一次登陆ip',
`last_login_time` INT(13) COMMENT '上一次登陆时间',
`token` VARCHAR(36) COMMENT '登陆token',
PRIMARY KEY(`user_id`)
)COMMENT '用户表';

/*房间表*/
DROP TABLE IF EXISTS werewolves_room;
CREATE TABLE werewolves_room(
`room_id` INT(11) auto_increment COMMENT '',
`house_owner` VARCHAR(36) COMMENT '房主',
`max_people_num` TINYINT(1) DEFAULT 1 COMMENT '房间最大人数',
`status` TINYINT(1) DEFAULT 0 COMMENT '0新创建，1游戏中，2已解散',
`create_time` INT(11) COMMENT '创建时间',
PRIMARY KEY(`room_id`)
)COMMENT '房间表';

