-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 dec 2016 om 21:10
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdracht-crud-cms`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` int(11) NOT NULL,
  `titel` text NOT NULL,
  `artikel` text NOT NULL,
  `kernwoorden` text NOT NULL,
  `datum` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_archived` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `artikels`
--

INSERT INTO `artikels` (`id`, `titel`, `artikel`, `kernwoorden`, `datum`, `is_active`, `is_archived`) VALUES
(13, 'ab', 'aaaaaa aaaa', 'ggr,ffff', '2018-12-11', 1, 0),
(14, 'jaja', 'hottentottententententoonstelling', 'ofzo', '1988-01-01', 0, 1),
(15, 'testje', 'enzovoort hmkay?', 'jaja', '2017-05-22', 1, 0),
(16, 'hallo', 'test123', 'geen enkele', '2016-12-13', 0, 0),
(17, 'aaa', 'b', '', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `last_login_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `salt`, `hashed_password`, `last_login_time`) VALUES
(1, 'sander.borret@hotmail.com', '66677615358496090a631d3.80309990', '5cf22a86697325b2dda301300a601e47ded0a9cdb1ff8bba58200afa4ca2283ea3ca92b1283ecd29c6b6739c9250f117c2f1ccd6733ce9baae0c89daf531bd82', '2016-12-08'),
(3, 'sddfdd@zz.com', '114127433358496419a97856.11071877', 'c874f1fefad608063b6e51de8617e5b10de880d16f2159b49fc9c3b1306f9fb2b5378ff620227add96f15b0aa29a6545f5c394cd66f7a1a0ed43b950de3c5d09', '2016-12-08'),
(4, 'aaa@eee.com', '487856460584970f923ef33.13084611', '54fe178c7f4f801604f180984ab25b164a6aae1242422a1a0f4b0ff9e32595134391f91924be403bb53ecaebe47933eaf6f91f3819d4376afe9e16382546a968', '2016-12-08'),
(5, 'rzer@ff.com', '896960575849738da21527.40942798', '1a1b508e794bb5cb0d171d55d7c38e362cbcaa56d8d6e182b6c967e780036f0ae29cd18320d1e9050618b15f9d36d526b0eeffade68ead2bd7eb3bb8644ca957', '2016-12-08'),
(6, 'dsegdg@ff.com', '5020992335849756082a104.70987562', '4dcda9f1f8809f13d1540171dd3feee066662d56c2cbadf7d5e13985ed205fc522446dcb0be1d51af41f058a4ee6f0941b20b1d0c365dfac8ec18dd985da1cd4', '2016-12-08'),
(7, 'ddffdfd@ff.com', '225132026584975804980d3.12184421', 'a725a588ede1c7a5fcafc14273241f2dbb1d9eb1c9461809b96675b53acaaf7f247f587cd4779b55a49a433f298b589f4e1f4743ffc09f174643a1c8cd426cf1', '2016-12-08'),
(8, 'aza@ee.com', '358830295584976e5d1bd32.96929553', '3e3f06504be21c8839cb654db524533a6f2f12ae306ecdadcc810f5a94e79a74d958ed6cb80fc8b980e8b8b9f5fbc54a9bf56b27fb40c2fcd2551cadd52727b3', '2016-12-08'),
(9, 'hhdf@gg.com', '4445346095849772f418af0.52527903', '13f1e75a5a6d0dc0c5c4767b6cea35cd5c463cb6513588c344e2c43753cf6f928615f7a5a34c8b45c08d40ce3629f8c96f405a2724d8fc5f3015f7863c388181', '2016-12-08'),
(10, 'feefe@dffd.com', '43731683058497776c266f0.14569307', '7e2bb8fe0bad2334efaa7011c4dd9210e9622008616fe5be5ea1805890cd05f8888f6fd2b7ddc22dd55db313a421d6013039237c862bdc42f7e8eb0b7aab12cc', '2016-12-08'),
(11, 'efeffe@ff.com', '549505206584977e40b7519.80814899', '2e1a8019dc06171b09b61e9033fb7711f8344f7bf88a49bb5fbd0ec26390a9f1431a0a851e1c0539ecfa1e27a91e595ae754812e62a7278cdee00bc53e162d9a', '2016-12-08'),
(12, 'gsetg@feg.com', '129991335858497862cb5715.18962899', 'c061c0f42c4fff75513f5498e444fcf95834f65f1f7942efb8bd7a59144ee87771a43323b251f8986863c50570e124a78574ed714137c52f591404182f114ac2', '2016-12-08'),
(13, 'aaa@eeez.com', '138803237958497a419c9456.83937088', 'c15731e58c03ed44eeaaae5d63fd57ed6f03c1c4912fb195e13b6cc57c9122c15d8f965fcdc5dd8f034ba9e9d20949833169f2f71714266e2d4a143b182f16e9', '2016-12-08'),
(14, 'aaaa@aaaaaa.com', '209834230658497b51bfe599.54949378', '2f821be7086200fb6e5274fde23aece4ad5c0a2ac647cd69279d374d581882eed17dc843ba3ae81dbe79b5aef091ba8ed04d7ebdd4be7cd04ce6f0dd6c3e214b', '2016-12-08'),
(15, 'aaa@eeeeeee.com', '192755229758498fb0d16dc2.87855008', 'f8de65a74584d5ad8fc5c5d003566629849322b8db086e39769f39409677fe5c8a5dddf32ee9938eb422f3702b3ad48cfd7d601f11d9636de78b2c6a743ef72e', '2016-12-08'),
(16, 's@a.com', '668849103584991c61b3b09.68062161', '830f5c21deb9399e1da6507835d3c853022a8dec64e82889aa7a2ac77be8c4e9577e9cc31b70b101937f81ec49e14a15d92682aeaa2035507fd6659dbb0daa0a', '2016-12-08'),
(17, 'xx@a.com', '23289857658499798801cc4.61750045', 'e2b7a42c92f4f3ac5cd52ff53105a70349b48227d220b79ae9352cd43f2b5db364c08550146448ed41cfd1cdaf0fc5058b97f7b4f72f443183dbda3eca505242', '2016-12-08'),
(18, 'b@r.com', '1013447056584998cb16aaa0.69284020', '5b8f0aff1f6a64247fa38bd0531731ed054bde761fae788316e4006ba998562236ff4ab5b7d8471210bed54dbdafe4fcd800861b260316999f3812935a15b908', '2016-12-08'),
(19, 'a@a.com', '1271845239584998e2d0ed53.27943202', '8beaa4896067f038c90f9e5b5d7a68268ffe3d4ab10626d7332200eb02d351e51194f49258bd9026451384f59a591f431be107aabce80bd236d2719e95bc97df', '2016-12-08'),
(20, 'ee@d.com', '93576160458499b8c4f8ce5.20465209', 'b26913ed4aa22d19f52ce570979529d040a05adad2964321bd10c5048d5a0951e271db598e1f325d44a66d955131a8f87573b8b8b245f80563721855aa1e6b25', '2016-12-08'),
(21, 'z@z.com', '1545064770585022bdb858b9.15515168', '94fe14c2790ea16e8c39f0a0ee3f747f527b5699382dc2b1dbe392b84dfe18dd453eec831ec205b0212e7340311492d5fdb55424a633e8fbe5b0a000f5053909', '2016-12-13'),
(22, 's@s.s', '120586768758502770861438.30503412', '15ef699cecca028e0eaf867cf4b34462780bc8ee71147b0fa63c8525a3a684a3284dba34fc653634903ffefa7de92c3eac56c920310fe8e5199492b1169f98eb', '2016-12-13'),
(23, 'b@a.z', '698291898585049bc697210.86286188', 'f1d2ba258075212080b0827cf8db95d6903c709000fbc9d4840943f693689e420d4a438587b2ccd093fb4d4e1a0a3bb346d014b9533f42c8c395bbe7ed65935c', '2016-12-13'),
(24, 'a@x.c', '14796177405852e4b032be60.00799407', '39c3392e3949f8ad04de44abeb18138048fd7e6406c949ea0a1bdc87dd650e45d57efd8241d4536714d0203ead85103f86dcbf89d4fff3ce8bb854eb9beb141f', '2016-12-15');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
