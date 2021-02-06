# Host: localhost  (Version 8.0.18)
# Date: 2021-02-06 18:53:17
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (25,'Fabio Salame','Salame','Silva','$2y$10$nfgpF2RS8u0NWX9oPRlF8.P0LOIyhJHbn3OtfYLTSVcwSDXEFOmde','fabio@gmail.com','2021-02-06 16:51:08'),(26,'bladellano','Fernando','Sales','$2y$10$meU1y1qOEMxJTMLDNZz8VeHyA0QdG99d4RWlRuUlOb/ljMEjaN6UC','santos@gmail.com','2021-02-06 17:21:16'),(29,'Pedro','Pedro','Pedro','$2y$10$ZKxedj6TftbgODVIdP.W7uCYR6D/iTzQBnzmdn/PuJ7YanubIS8GO','pedro@gmail.com','2021-02-06 18:30:48'),(30,'Pedro','Pedro','Pedro','$2y$10$CT34G2tCE.TnK59gqMK8QOmcsvbOdmvjXa50XRGM.IPg4DbrcDlyO','pedro2@gmail.com','2021-02-06 18:30:56'),(31,'Flavio','Flavio','Flavio','$2y$10$H1djj3SCC5iShhx9UzaweOe0Spi5kYwZ7NDssu33I/ZkYZdh9NbO6','flavio@gmail.com','2021-02-06 18:32:10');
