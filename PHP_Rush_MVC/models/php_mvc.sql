-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Avril 2020 à 14:50
-- Version du serveur :  10.1.44-MariaDB-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `date`) VALUES
(1, 'bb king', 'Personne aujourd\'hui n\'incarne mieux le blues que B. B. King. Le conducteur de tracteur d\'une plantation du Mississippi est devenu disc-jockey à Memphis avant de s\'imposer comme le plus grand chanteur et guitariste de blues (impossible de dissocier l\'un de l\'autre). S\'il a d\'abord su toucher sa communauté, il a réussi un incroyable crossover à la fin des années 1960, se faisant d\'abord reconnaître par le public rock, puis par ce qu\'on a coutume d\'appeler le \"grand public\". Et cette reconnaissance a été acquise sans la moindre compromission. Au même titre que Louis Armstrong, Duke Ellington ou Ray Charles, B. B. King fait partie de ces génies que nous a donnés l\'art afro-américain. ', ' john d.', '2020-03-11'),
(2, 'Eric clapton', 'Depuis 1963 et ses débuts auprès des Yardbirds, Eric Clapton fait partie de cette poignée de musiciens qui ont révolutionné la guitare électrique et porté la musique rock à maturité. Surnommé Slowhand, puis God au sein des Bluesbreakers, Clapton a gravé des solos devenus culte, popularisé la wahwah et les sons saturés avec Cream. Il a respiré le flower power et côtoyé les plus grands (des Beatles à Jimi Hendrix, des Rolling Stones à Bob Dylan), mais aussi épousé les excès de son époque. Alcoolique, héroïnomane, il a survécu comme par miracle aux années 70, \" crachant sans cesse au visage de la mort \". Fruit d\'une enquête minutieuse et d\'un travail d\'archives exceptionnel, ce livre redessine l\'histoire du blues et du rock des sixties à nos jours. S\'appuyant sur des interviews exclusives avec des musiciens, managers et amis du guitar hero, il fourmille de détails et d\'anecdotes inédites sur ses enregistrements et ses tournées. Cet ouvrage offre enfin le récit passionnant du destin chaotique d\'un homme né d\'une mère mineure célibataire, et hanté par un père dont il ne retrouva la trace qu\'après sa mort. ', 'michel l', '2020-03-20'),
(3, 'Johnny Cash', 'Depuis ses enregistrements légendaires chez Sun Records dans les années 1950 jusqu\'à ses derniers albums devenus des classiques, Johnny Cash a toujours été LA voix country du rock. L\'histoire fascinante de cette icône américaine commence avec Carl Perkins, Jerry Lee Lewis et Elvis Presley, pour aboutir à des collaborations avec Bob Dylan, Nick Cave et Kris Kristofferson, pour ne citer qu\'eux. En passant par les cases drogue, prison, cinéma, succès écrasant et périodes de ténèbres. Stephen Miller a retracé ce parcours hors normes et en a collecté toutes les anecdotes et tous les témoignages éclairant d\'un jour inédit la carrière de \" l\'homme en noir \", auteur de chansons atemporelles, haut placées dans le panthéon de la musique contemporaine. ', 'jean money', '2020-04-15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `accountStatus` int(11) NOT NULL,
  `creationDate` date NOT NULL,
  `lastModification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `group`, `userStatus`, `accountStatus`, `creationDate`, `lastModification`) VALUES
(1, 'jean', 'jeanjean', 'jean@jean.com', 1, 0, 1, '2020-04-21', '2020-04-28'),
(2, 'oner', 'oneroner', 'oner@oner.com', 0, 0, 0, '0000-00-00', '0000-00-00'),
(3, 'guillaume', 'guillaume', 'guillaume@guillaume.com', 0, 0, 0, '0000-00-00', '0000-00-00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
