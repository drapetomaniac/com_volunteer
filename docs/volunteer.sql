INSERT INTO jos_components (name, link, admin_menu_link, admin_menu_alt, `option`, admin_menu_img, params)
VALUES (`Volunteer Match`, `option=com_volunteer`, `option=com_volunteer`, `Manage Volunteers`, `com_volunteer`, `js/ThemeOffice/component.png`, ``);



CREATE TABLE `jos_volunteer_person`
(
`id` int(11) NOT NULL auto_increment,
`user_id` int(11) NOT NULL ,
`name` varchar(255) NOT NULL,
`street1` varchar(100) NOT NULL,
`street2` varchar(100) NOT NULL,
`city` varchar(100) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(20) NOT NULL,
`phone` varchar(50) NOT NULL,
`email` varchar(50) NOT NULL,
`bio` text NOT NULL,
`portfolio` text NOT NULL,
`web` varchar(100) NOT NULL,
`created_date` datetime NOT NULL,
`published` tinyint(1) unsigned NOT NULL default 1,
PRIMARY KEY (`id`)
);

ALTER TABLE `jos_volunteer_person` ADD COLUMN `skills` TEXT AFTER `published`;


CREATE TABLE `jos_volunteer_ngo`
(
`id` int(11) NOT NULL auto_increment,
`user_id` int(11) NOT NULL ,
`name` varchar(255) NOT NULL,
`ein` varchar(100) NOT NULL,
`street1` varchar(100) NOT NULL,
`street2` varchar(100) NOT NULL,
`city` varchar(100) NOT NULL,
`state` varchar(50) NOT NULL,
`zip` varchar(20) NOT NULL,
`web` varchar(100) NOT NULL,
`phone` varchar(50) NOT NULL,
`email` varchar(50) NOT NULL,
`mission` text NOT NULL,
`taxstatus` tinyint(1) unsigned NOT NULL default 0,
`created_date` datetime NOT NULL,
`published` tinyint(1) unsigned NOT NULL default 1,
PRIMARY KEY (`id`)
);


CREATE TABLE `jos_volunteer_skills`
(
`id` int(11) NOT NULL auto_increment,
`skill` varchar(255) NOT NULL,
`published` tinyint(1) unsigned NOT NULL default 1,
PRIMARY KEY (`id`)
);



INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Editor',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Filmmaker',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Musician',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Sound Expert',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Story Board Artist',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Title Editor',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Visual FX Artist',1);
INSERT INTO jos_volunteer_skills (skill, published) VALUES ('Writer',1);


ALTER TABLE jos_volunteer_skills ADD INDEX newindex(`skill`, `published`);
ALTER TABLE jos_volunteer_person ADD INDEX peopleskills(`skills`(500), `published`);


CREATE TABLE `jos_volunteer_skills_ngos` (
  `ngo_id` INT,
  `skill_id` INT,
  INDEX skill(`skill_id`),
  INDEX ngo(`ngo_id`)
)
CHARACTER SET utf8;


CREATE TABLE  `jos_volunteer_skills_creatives` (
  `person_id` INT,
  `skill_id` INT,
  INDEX skill(`skill_id`),
  INDEX person(`person_id`)
)
CHARACTER SET utf8;


ALTER TABLE `lights`.`jos_volunteer_project` ADD COLUMN `completed` TINYINT NOT NULL DEFAULT 0  AFTER `comments` , CHANGE COLUMN `project_title` `title` VARCHAR(255) NOT NULL  ;
