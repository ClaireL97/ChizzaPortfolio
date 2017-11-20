-- CREATE TABLE <name> (
--   id int(11) unsigned not null,

--   PRIMARY KEY (id)
-- );

# varchar(###)[ABSOLUTE picture paths to files]
# datetime
# tinyint(#)
# decimal(##, 2) #good for dollar amounts
# text # near unlimited storage -- good for notes and such
# password #(i think)
DROP DATABASE ChizzaPortfolio;
CREATE DATABASE ChizzaPortfolio;
USE ChizzaPortfolio;

CREATE TABLE user
(
id int(11) unsigned AUTO_INCREMENT,
name varchar(64),
password varchar(41),
email varchar(64),
PRIMARY KEY (id)
);

CREATE TABLE art
(
id int(11) unsigned AUTO_INCREMENT,
user_id int(11) unsigned,
file varchar(255),
title varchar(255),
caption varchar(255),
PRIMARY KEY(id)
);

CREATE TABLE writing
(
id int(11) unsigned AUTO_INCREMENT,
user_id int(11) unsigned,
file varchar(255),
description varchar(255),
PRIMARY KEY(id)
);

CREATE TABLE tag
(
id int(11) unsigned AUTO_INCREMENT,
name varchar(64),
PRIMARY KEY(id)
);

CREATE TABLE art_tag
(
art_id int(11) unsigned,
tag_id int(11) unsigned,
PRIMARY KEY(art_id, tag_id)
);

CREATE TABLE note
(
id int(11) unsigned AUTO_INCREMENT,
user_id int(11) unsigned,
public tinyint(1) DEFAULT 0,
note text,
object_type varchar(64),
object_id int(11) unsigned,
PRIMARY KEY(id)
);

CREATE TABLE user_info
(
id int(11) unsigned AUTO_INCREMENT,
user_id int(11) unsigned,
f_name varchar(32),
l_name varchar(32),
about_me text,
synopsis text,
profile_pic varchar(255),
resume varchar(255),
email varchar(320),
phone varchar(32),
PRIMARY KEY(id)
);

CREATE TABLE social_media
(
id int(11) unsigned AUTO_INCREMENT,
user_id int(11) unsigned,
name varchar(64),
url varchar(128),
description text,
PRIMARY KEY(id)
);

CREATE TABLE gallery
(
id int(11) unsigned AUTO_INCREMENT,
title varchar(64),
PRIMARY KEY(id)
);

CREATE TABLE gallery_tags
(
gallery_id int(11) unsigned,
tag_id int(11) unsigned,
PRIMARY KEY(gallery_id, tag_id)
);

CREATE TABLE affiliation
(
id int(11) unsigned AUTO_INCREMENT,
user_id int(11) unsigned,
name varchar(255),
url varchar(255),
description text,
PRIMARY KEY(id)
);