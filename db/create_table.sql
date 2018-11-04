CREATE TABLE php_board.board(
id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
thread int(11) UNSIGNED NOT NULL,
depth int(11) UNSIGNED NOT NULL DEFAULT '0',
writer varchar(20) NOT NULL,
pwd varchar(10) NOT NULL,
title varchar(80) NOT NULL,
content text NOT NULL,
wdate datetime NOT NULL,
views int(11) NOT NULL DEFAULT '0',
PRIMARY KEY (id)
);

select * from php_board.board;