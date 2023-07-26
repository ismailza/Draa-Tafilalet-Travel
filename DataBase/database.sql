
--
-- Database: `draa-tafilalet-travel`
--
CREATE DATABASE IF NOT EXISTS `draa-tafilalet-travel` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `draa-tafilalet-travel`;

-- --------------------------------------------------------
--
-- Table structure for table `admins`
--
DROP TABLE IF EXISTS admins;
CREATE TABLE IF NOT EXISTS admins (
  id_admin        INT PRIMARY KEY AUTO_INCREMENT,
  nom_admin       VARCHAR(20) NOT NULL,
  prenom_admin    VARCHAR(20) NOT NULL,
  image_admin     VARCHAR(100),
  email_admin     VARCHAR(60) NOT NULL UNIQUE,
  username_admin  VARCHAR(40) NOT NULL UNIQUE,
  password_admin  VARCHAR(80) NOT NULL,
  createdAt       DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt    DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `clients`
--
DROP TABLE IF EXISTS clients;
CREATE TABLE IF NOT EXISTS clients (
  id_client       INT PRIMARY KEY AUTO_INCREMENT,
  nom_client      VARCHAR(20) NOT NULL,
  prenom_client   VARCHAR(20) NOT NULL,
  email_client    VARCHAR(60) NOT NULL UNIQUE,
  username_client VARCHAR(40) NOT NULL UNIQUE,
  password_client VARCHAR(80) NOT NULL,
  createdAt       DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt    DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `password_recover`
--
DROP TABLE IF EXISTS password_recover;
CREATE TABLE IF NOT EXISTS password_recover (
  email     VARCHAR(60) NOT NULL UNIQUE,
  code      INT(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `destinations`
--
DROP TABLE IF EXISTS destinations;
CREATE TABLE IF NOT EXISTS destinations (
  id_destination            INT PRIMARY KEY AUTO_INCREMENT,
  nom_destination           VARCHAR(30) NOT NULL,
  ville_destination         VARCHAR(20) NOT NULL,
  province_destination      VARCHAR(20) NOT NULL,
  image_destination1        VARCHAR(255) NOT NULL,
  image_destination2        VARCHAR(255) NOT NULL,
  image_destination3        VARCHAR(255) NOT NULL,
  localisation_destination  VARCHAR(255) NOT NULL,
  carte_destination         TEXT NOT NULL,
  description_destination   TEXT NOT NULL,
  createdAt                 DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt              DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `restaurants`
--
DROP TABLE IF EXISTS restaurants;
CREATE TABLE IF NOT EXISTS restaurants (
  id_restaurant            INT PRIMARY KEY AUTO_INCREMENT,
  nom_restaurant           VARCHAR(30) NOT NULL,
  ville_restaurant         VARCHAR(20) NOT NULL,
  province_restaurant      VARCHAR(20) NOT NULL,
  image_restaurant1        VARCHAR(255) NOT NULL,
  image_restaurant2        VARCHAR(255) NOT NULL,
  image_restaurant3        VARCHAR(255) NOT NULL,
  localisation_restaurant  VARCHAR(255) NOT NULL,
  carte_restaurant         TEXT NOT NULL,
  description_restaurant   TEXT NOT NULL,
  createdAt                DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt             DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `hotels`
--
DROP TABLE IF EXISTS hotels;
CREATE TABLE IF NOT EXISTS hotels (
  id_hotel            INT PRIMARY KEY AUTO_INCREMENT,
  nom_hotel           VARCHAR(30) NOT NULL,
  ville_hotel         VARCHAR(20) NOT NULL,
  province_hotel      VARCHAR(20) NOT NULL,
  image_hotel1        VARCHAR(255) NOT NULL,
  image_hotel2        VARCHAR(255) NOT NULL,
  image_hotel3        VARCHAR(255) NOT NULL,
  localisation_hotel  VARCHAR(255) NOT NULL,
  carte_hotel         TEXT NOT NULL,
  nb_chambre          INT NOT NULL,
  classe_hotel        INT(1) NOT NULL,
  prix_hotel          DECIMAL(10,2),
  createdAt           DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt        DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `actualites`
--
DROP TABLE IF EXISTS actualites;
CREATE TABLE actualites (
  id_actualite    INT PRIMARY KEY AUTO_INCREMENT,
  id_circuit      INT NOT NULL,
  titre_actualite VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `circuits_voyage`
--
DROP TABLE IF EXISTS circuits_voyage;
CREATE TABLE circuits_voyage (
  id_circuit    INT PRIMARY KEY AUTO_INCREMENT,
  ville_depart  VARCHAR(30) NOT NULL,
  ville_arrivee VARCHAR(30) NOT NULL,
  trajet        TEXT NOT NULL,
  date_depart   DATETIME NOT NULL,
  duree         INT NOT NULL,
  image_cover   VARCHAR(255) NOT NULL,
  carte_trajet  TEXT NOT NULL,
  prix          DECIMAL(10,2) NOT NULL,
  fin_reservation DATE NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `moussems`
--
DROP TABLE IF EXISTS moussems;
CREATE TABLE moussems (
  id_moussem          INT PRIMARY KEY AUTO_INCREMENT,
  nom_moussem         VARCHAR(30) NOT NULL,
  ville_moussem       VARCHAR(20) NOT NULL,
  image_moussem1      VARCHAR(255) NOT NULL,
  image_moussem2      VARCHAR(255) NOT NULL,
  image_moussem3      VARCHAR(255) NOT NULL,
  description_moussem TEXT NOT NULL,
  createdAt           DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt        DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `materiels`
--
DROP TABLE IF EXISTS materiels;
CREATE TABLE materiels (
  id_materiel           INT PRIMARY KEY AUTO_INCREMENT,
  nom_materiel          VARCHAR(40) NOT NULL,
  image_materiel1       VARCHAR(255) NOT NULL,
  image_materiel2       VARCHAR(255) NOT NULL,
  image_materiel3       VARCHAR(255) NOT NULL,
  prix_materiel         DECIMAL(10,0) NOT NULL,
  description_materiel  TEXT NOT NULL,
  createdAt             DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt          DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `artisanats`
--
DROP TABLE IF EXISTS artisanats;
CREATE TABLE artisanats (
  id_artisanat    INT PRIMARY KEY AUTO_INCREMENT,
  nom_artisanat   VARCHAR(40) NOT NULL,
  image_artisanat VARCHAR(255) NOT NULL,
  createdAt       DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt    DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `plats`
--
DROP TABLE IF EXISTS plats;
CREATE TABLE plats (
  id_plat           INT NOT NULL,
  nom_plat          VARCHAR(30) NOT NULL,
  image_plat1       VARCHAR(255) NOT NULL,
  image_plat2       VARCHAR(255) NOT NULL,
  image_plat3       VARCHAR(255) NOT NULL,
  description_plat  TEXT NOT NULL,
  createdAt         DATETIME DEFAULT CURRENT_TIMESTAMP,
  lastUpdateAt      DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `reservations_hotel`
--
DROP TABLE IF EXISTS reservations_hotel;
CREATE TABLE reservations_hotel (
  id_reservation      INT PRIMARY KEY AUTO_INCREMENT,
  id_client           INT NOT NULL,
  id_hotel            INT NOT NULL,
  num_chambre         INT NOT NULL,
  tel_client          INT NOT NULL,
  nb_personnes        INT DEFAULT NULL,
  date_debut          DATE NOT NULL,
  date_fin            DATE NOT NULL,
  prix                DECIMAL(10,0) NOT NULL,
  type_paiement       ENUM ('Par carte', 'Espèces') NOT NULL,
  date_reservation    DATETIME NOT NULL,
  status              ENUM ('Acceptée', 'Refusée', 'En cours')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `reservations_materiel`
--
DROP TABLE IF EXISTS reservations_materiel;
CREATE TABLE reservations_materiel (
  id_reservation    INT PRIMARY KEY AUTO_INCREMENT,
  id_client         INT NOT NULL,
  id_materiel       INT NOT NULL,
  tel_client        INT NOT NULL,
  nb_personnes      INT NOT NULL,
  date_debut        DATE NOT NULL,
  date_fin          DATE NOT NULL,
  prix              DECIMAL(10,0) NOT NULL,
  type_paiement     ENUM ('Par carte', 'Espèces') NOT NULL,
  date_reservation  DATETIME NOT NULL,
  status            ENUM ('Acceptée', 'Refusée', 'En cours')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `reservations_voyage`
--
DROP TABLE IF EXISTS reservations_voyage;
CREATE TABLE reservations_voyage (
  id_reservation    INT PRIMARY KEY AUTO_INCREMENT,
  id_client         INT NOT NULL,
  id_circuit        INT NOT NULL,
  tel_client        INT NOT NULL,
  nb_personnes      INT NOT NULL,
  prix              DECIMAL(10,0) NOT NULL,
  type_paiement     ENUM ('Par carte', 'Espèces') NOT NULL,
  date_reservation  DATETIME NOT NULL,
  status            ENUM ('Acceptée', 'Refusée', 'En cours') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `chambres`
--
DROP TABLE IF EXISTS chambres;
CREATE TABLE chambres (
  num_chambre   INT NOT NULL,
  id_hotel      INT NOT NULL,
  type_chambre  VARCHAR(20) NOT NULL,
  prix_chambre  DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (num_chambre, id_hotel)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Table structure for table `messages`
--
DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
  id_messages     INT PRIMARY KEY AUTO_INCREMENT,
  nom_redacteur   VARCHAR(40) NOT NULL,
  email_redacteur VARCHAR(60) NOT NULL,
  sujet           VARCHAR(60) NOT NULL,
  message         VARCHAR(255) NOT NULL,
  createdAt       DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



ALTER TABLE actualites ADD CONSTRAINT fk_actualites_circuits FOREIGN KEY (id_circuit) REFERENCES circuits_voyage (id_circuit) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_hotel ADD CONSTRAINT fk_reservations_hotel_clients FOREIGN KEY (id_client) REFERENCES clients (id_client) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_hotel ADD CONSTRAINT fk_reservations_hotel_hotels FOREIGN KEY (id_hotel) REFERENCES hotels (id_hotel) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_hotel ADD CONSTRAINT fk_reservations_hotel_chambres FOREIGN KEY (num_chambre, id_hotel) REFERENCES chambres (num_chambre, id_hotel) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_materiel ADD CONSTRAINT fk_reservations_materiel_clients FOREIGN KEY (id_client) REFERENCES clients (id_client) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_materiel ADD CONSTRAINT fk_reservations_materiel_materiels FOREIGN KEY (id_materiel) REFERENCES materiels (id_materiel) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_voyage ADD CONSTRAINT fk_reservations_voyage_clients FOREIGN KEY (id_client) REFERENCES clients (id_client) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reservations_voyage ADD CONSTRAINT fk_reservations_voyage_circuits FOREIGN KEY (id_circuit) REFERENCES circuits_voyage (id_circuit) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE chambres ADD CONSTRAINT fk_chambres_hotels FOREIGN KEY (id_hotel) REFERENCES hotels (id_hotel) ON UPDATE CASCADE ON DELETE CASCADE;

