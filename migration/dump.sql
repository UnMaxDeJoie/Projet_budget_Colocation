SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `group_coloc`;
CREATE TABLE `group_coloc` (
                               `id_group_coloc` int(11) NOT NULL AUTO_INCREMENT,
                               `name` varchar(255) DEFAULT NULL,
                               `payment_id` int(11) NOT NULL,
                               `user_admin` int(11) NOT NULL,
                               PRIMARY KEY (`id_group_coloc`),
                               KEY `payment_id` (`payment_id`),
                               KEY `user_admin` (`user_admin`),
                               CONSTRAINT `group_coloc_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id_payment`),
                               CONSTRAINT `group_coloc_ibfk_2` FOREIGN KEY (`user_admin`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user` (
                              `id_user` int(11) NOT NULL,
                              `id_group` int(11) NOT NULL,
                              KEY `id_user` (`id_user`),
                              KEY `id_group` (`id_group`),
                              CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
                              CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `group_coloc` (`id_group_coloc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
                           `id_payment` int(11) NOT NULL AUTO_INCREMENT,
                           `prix` int(11) DEFAULT NULL,
                           `date` datetime DEFAULT NULL,
                           `description` text DEFAULT NULL,
                           `user_id` int(11) NOT NULL,
                           `group_id` int(11) NOT NULL,
                           PRIMARY KEY (`id_payment`),
                           KEY `user_id` (`user_id`),
                           KEY `group_id` (`group_id`),
                           CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
                           CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group_coloc` (`id_group_coloc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
                        `id_user` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(255) NOT NULL,
                        `password` varchar(20) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `firstName` varchar(255) DEFAULT NULL,
                        `lastName` varchar(255) DEFAULT NULL,
                        `group_coloc_id` int(11) NOT NULL,
                        PRIMARY KEY (`id_user`),
                        KEY `fk_group_coloc_user` (`group_coloc_id`),
                        CONSTRAINT `fk_group_coloc_user` FOREIGN KEY (`group_coloc_id`) REFERENCES `group_coloc` (`id_group_coloc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
