-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 20/06/2014 às 01:12
-- Versão do servidor: 5.5.36-cll
-- Versão do PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `tkdsmu_banco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`login`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Fazendo dump de dados para tabela `adminusers`
--

INSERT INTO `adminusers` (`id`, `nome`, `login`, `senha`, `email`, `nivel`, `ativo`) VALUES
(1, 'Pontes Junior', 'pontes', '30274c47903bd1bac7633bbf09743149ebab805f', 'pontes@pontesti.com.br', 1, 1),
(2, 'Administrador', 'admin', '7c222fb2927d828af22f592134e8932480637c0d', 'contato@academiatkdsmu.com.br', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `evento` text NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns`
--

CREATE TABLE IF NOT EXISTS `albuns` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Fazendo dump de dados para tabela `albuns`
--

INSERT INTO `albuns` (`album_id`, `album_name`) VALUES
(1, 'Treino na Praia'),
(2, 'Treino em Casa'),
(3, 'Turmas de Taekwondo'),
(4, 'Exame de Faixa Taekwondo em dia 15/12/2012'),
(5, 'Copa Karata maric&aacute; 2012'),
(6, 'Entrega de Faixa Dojan Maric&aacute;'),
(7, 'Dojan do Meste'),
(8, 'Dojan Tijuca'),
(9, 'Treino ao ar Livre em Maric&aacute;'),
(10, 'Hapkido'),
(11, 'MMA Maric&aacute; 2013'),
(12, 'Curso de Tonfa'),
(13, 'Copa de Karate Maric&aacute; 2013'),
(14, 'Exame e Entrega de Faixa junho 2013'),
(16, '3&ordf; mostra de Artes Marciais em Maric&aacute;');

-- --------------------------------------------------------

--
-- Estrutura para tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `texto` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Fazendo dump de dados para tabela `banner`
--

INSERT INTO `banner` (`id`, `link`, `texto`, `foto`) VALUES
(1, 'https://www.facebook.com/AcademiaTaekwondoSMU', 'Siga-nos no facebook', '470acf560e628c56a7ae995d2747ed4a.jpg'),
(2, '#', 'ACADEMIA SMU', '11f22236f313d4c16eec2076cce5445b.jpg'),
(3, '#', 'Evento de MMA em maric&aacute; 2013', 'd7048fbc984ae6173f8536988d5c5024.jpg'),
(4, '#', 'Copa Maric&aacute; de Karate em Maric&aacute;', '8ba9ec3deaf4a93e71e40ff6361d2b76.jpg'),
(5, '#', 'Exame de faixas pretas e coloridas', 'eb54f9ff1f1c7c87feea2f15f7089f87.jpg'),
(6, '', 'Exame e entrega de Faixa', '0f74b1925d94aca8b13975db153a37d6.jpg'),
(10, 'http://www.academiatkdsmu.com.br/eventos/4o-rio-open-de-hapkido', '4&ordm; Rio Open de Hapkido', '38f2a5ad8985839654ec6d9cb5625bd4.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_url` varchar(200) DEFAULT NULL,
  `foto_caption` varchar(100) DEFAULT NULL,
  `foto_data` date DEFAULT NULL,
  `foto_album` int(11) DEFAULT NULL,
  `foto_pos` int(11) DEFAULT '0',
  `foto_info` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`foto_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=334 ;

--
-- Fazendo dump de dados para tabela `fotos`
--

INSERT INTO `fotos` (`foto_id`, `foto_url`, `foto_caption`, `foto_data`, `foto_album`, `foto_pos`, `foto_info`) VALUES
(1, 'a325c5ba348bb93e20360edb51020b9f.jpg', NULL, '2013-06-21', 1, 1, NULL),
(2, '64797064b25114cc1ae7df529b90f587.jpg', NULL, '2013-06-21', 1, 0, NULL),
(3, '6e872d8b570f65b3e1b38107cc4df56b.jpg', NULL, '2013-06-21', 1, 1, NULL),
(4, '8e9732feeddb821186e6382bc8c03381.jpg', NULL, '2013-06-21', 1, 1, NULL),
(5, '65de93086ec1546347c7e0e5fe1769db.jpg', NULL, '2013-06-21', 1, 1, NULL),
(6, '5f87a8ae1ea87390689cbe468f1171cc.jpg', '', '2013-06-21', 2, 8, ''),
(7, '179ee6f84c4c4d71afe7c9b38f380695.jpg', '', '2013-06-21', 2, 16, ''),
(8, '623d3bfb2c810155d3d44a7efbbdfa3c.jpg', '', '2013-06-21', 2, 15, ''),
(9, '3e1cd1b9ffce0ff8c7df575f85478e68.jpg', '', '2013-06-21', 2, 14, ''),
(10, 'd1e2805d0adc77bd00580ac90bb9eea2.jpg', '', '2013-06-21', 2, 4, ''),
(11, '319a77e2d5975bea069d77a2eeb6f764.jpg', '', '2013-06-21', 2, 13, ''),
(12, '20cbdd55071146abea3b27db1bac5e4d.jpg', '', '2013-06-21', 2, 12, ''),
(13, '3c4e9c3e6e161791d86fb4c30bb251f5.jpg', '', '2013-06-21', 2, 0, ''),
(14, '6b0c931599ff729695360a66d60fdcad.jpg', '', '2013-06-21', 2, 11, ''),
(15, 'bf9355d60579e740db635f9291b30574.jpg', '', '2013-06-21', 2, 10, ''),
(16, '12775970b74c60d4aa722fda42632eeb.jpg', '', '2013-06-21', 2, 9, ''),
(17, 'cb8f1c7e57d0af33d899f62dc84885fb.jpg', '', '2013-06-21', 2, 2, ''),
(18, 'a76ef17366110dc0c694ed6237586588.jpg', '', '2013-06-21', 3, 0, ''),
(19, '8aa092a42b46919c2db538498e143cf7.jpg', '', '2013-06-21', 3, 1, ''),
(20, 'e71532355ada0ca36b35d61f9f45db78.jpg', '', '2013-06-21', 3, 1, ''),
(21, '1b5812b385d2273546ea5370cac800fc.jpg', '', '2013-06-21', 3, 1, ''),
(22, 'ea0e121acc24909b6ab16966002c8ef8.jpg', '', '2013-06-21', 3, 1, ''),
(23, 'db34257bf6666fbcb36550406a318afc.jpg', '', '2013-06-21', 3, 1, ''),
(24, 'b0ca1e1f0a0eb9863ed2030d831af7b0.jpg', '', '2013-06-21', 4, 1, ''),
(25, 'faee9200050e0c45e19927c7ee820b20.jpg', '', '2013-06-21', 4, 8, ''),
(26, 'e37a7d01fd51ac633ef2ad6c308941dd.jpg', '', '2013-06-21', 4, 9, ''),
(27, 'f720ba93b27b2195398023556e904c3e.jpg', '', '2013-06-21', 4, 10, ''),
(28, 'd60c27b23d6f43d9b57fff82ad743f4b.jpg', '', '2013-06-21', 4, 11, ''),
(29, 'dd152e592bc5d5831e8e47edb9af85c5.jpg', '', '2013-06-21', 4, 12, ''),
(30, 'fe36cf97f9ebc6c878235ed1b04d7d7f.jpg', '', '2013-06-21', 4, 7, ''),
(32, '3ad1daf6da33e35dbe7b4418e31d5f72.jpg', '', '2013-06-21', 4, 6, ''),
(33, '7fa63f4f32ba82e79ac7dfa8ff7cef8c.jpg', '', '2013-06-21', 4, 5, ''),
(34, '0f67f9d431dd0d6a8508d9080e101c41.jpg', '', '2013-06-21', 4, 4, ''),
(35, 'f8ad3ae4bafda13ddb624468cebcbc14.jpg', '', '2013-06-21', 4, 3, ''),
(36, '8d1b56f6839d1c55fecb82e80808db42.jpg', '', '2013-06-21', 4, 2, ''),
(37, '9ad587eaf765ef8858420e6febae4b2b.jpg', '', '2013-06-21', 4, 0, ''),
(38, '2c4dfbb83f90e983657e1e8118580b8c.jpg', '', '2013-06-21', 4, 58, ''),
(39, '723183885970a5c741b081d2af3b283f.jpg', '', '2013-06-21', 4, 46, ''),
(40, 'cd630c7d87efc7ac306e8fa268852c75.jpg', '', '2013-06-21', 4, 45, ''),
(41, '85a3403fd6dd722026aec0c7270d38bf.jpg', '', '2013-06-21', 4, 44, ''),
(42, '15ee9dda395a0ddd4b0cd6e4f298148c.jpg', '', '2013-06-21', 4, 43, ''),
(43, '30de27d80862d310fcaf9ae1649e53d1.jpg', '', '2013-06-21', 4, 42, ''),
(44, '056fe606ce9ed894ba18603db7075e1e.jpg', '', '2013-06-21', 4, 41, ''),
(45, 'e0916d61b609249b9b8b7852bd7ec1bd.jpg', '', '2013-06-21', 4, 40, ''),
(46, '8fdb0aa991745f564b1908fa1e6fd6de.jpg', '', '2013-06-21', 4, 39, ''),
(47, '3fd8aa341576b38f98048291b6c2074a.jpg', '', '2013-06-21', 4, 38, ''),
(48, '4835afa2fe66a3f642254baf7fe24e11.jpg', '', '2013-06-21', 4, 47, ''),
(49, '5bbaaea60d5be64597a28e1f0262bfad.jpg', '', '2013-06-21', 4, 48, ''),
(50, '13da6c221d34286dd57bcda4a95618c0.jpg', '', '2013-06-21', 4, 49, ''),
(51, '14bbcd90a3ff92b2333075046d61f767.jpg', '', '2013-06-21', 4, 57, ''),
(52, 'c52d5c4f7e420acd445812be6ded9ffc.jpg', '', '2013-06-21', 4, 56, ''),
(53, '20476bb02ead0811ddd82dfe9e4b68a8.jpg', '', '2013-06-21', 4, 64, ''),
(54, 'd2cc0c30e9b1f27bd3be679fbaadaa26.jpg', '', '2013-06-21', 4, 55, ''),
(55, 'da3c91cec344b13100c9eba6507eb35f.jpg', '', '2013-06-21', 4, 54, ''),
(56, 'acca98ebfcf8ca1d33979d49158af1f1.jpg', '', '2013-06-21', 4, 53, ''),
(57, '8a727f46a70295236834acbb226087a4.jpg', '', '2013-06-21', 4, 52, ''),
(58, 'b9e016d43279ae19e00201f86084b808.jpg', '', '2013-06-21', 4, 51, ''),
(59, '4c9a0aaac2e9ec5d4a6788e4bc10c005.jpg', '', '2013-06-21', 4, 50, ''),
(60, '205ebba6fd8115a9e0757150d6d18476.jpg', '', '2013-06-21', 4, 37, ''),
(61, '0bd6095ef5604ae5477cf476ef2e6573.jpg', '', '2013-06-21', 4, 36, ''),
(62, '17bf68299390e14896f5e1ed17132674.jpg', '', '2013-06-21', 4, 35, ''),
(63, '34e3ae605f8ef07a3dd737a043381a04.jpg', '', '2013-06-21', 4, 22, ''),
(64, 'd39779a4976b0ced48bb2cb278451ee3.jpg', '', '2013-06-21', 4, 21, ''),
(65, '8b1741ca79a9f71a20b391c1181a0db4.jpg', '', '2013-06-21', 4, 20, ''),
(66, '44309b166d27c8636eeca421b2204315.jpg', '', '2013-06-21', 4, 19, ''),
(67, 'd741a6629428d3c9d54ac30abd41a409.jpg', '', '2013-06-21', 4, 18, ''),
(68, 'dd8773cebbc1bae3af513e459b634704.jpg', '', '2013-06-21', 4, 17, ''),
(69, 'ff5d5e66ceb4f52425cea7f97281bf31.jpg', '', '2013-06-21', 4, 16, ''),
(70, 'e60dcc53b4ed34e8cb6c1817e84335a3.jpg', '', '2013-06-21', 4, 15, ''),
(71, 'bbedd74908a08b35152082f5bdbcf477.jpg', '', '2013-06-21', 4, 14, ''),
(72, '4ef7f4f76d3ce858227f2c5cbbb162bb.jpg', '', '2013-06-21', 4, 13, ''),
(73, 'd16e1397eec86ae6fdf4af39e50c0b38.jpg', '', '2013-06-21', 4, 23, ''),
(74, 'de77f646a8f4a4b7119bfef7fbc8c211.jpg', '', '2013-06-21', 4, 24, ''),
(75, '026ae2573a5ae26b49f9b716a1ad9aa8.jpg', '', '2013-06-21', 4, 34, ''),
(76, '436f5aad984a8d47db8ee6bffed77cae.jpg', '', '2013-06-21', 4, 33, ''),
(77, 'a82a1e6447434ca3cf5cd2fea1691427.jpg', '', '2013-06-21', 4, 32, ''),
(78, '60c2fb326970e142f9cd8e96ad2c359e.jpg', '', '2013-06-21', 4, 31, ''),
(79, '8d30209cf9b890f27142cf700fc395d5.jpg', '', '2013-06-21', 4, 30, ''),
(80, '315f356c397bcb3b970a704a001ef6cf.jpg', '', '2013-06-21', 4, 29, ''),
(81, '13137b62aa4cce4a925249f4ab6b5602.jpg', '', '2013-06-21', 4, 28, ''),
(82, 'a9bca938279b84ed3b9e853b5008e960.jpg', '', '2013-06-21', 4, 27, ''),
(83, 'c7ae57d275998dfeb27444592ffab25e.jpg', '', '2013-06-21', 4, 26, ''),
(84, '65967c88f5d7468edd5d4933973a5822.jpg', '', '2013-06-21', 4, 25, ''),
(85, '268cd491779b0ac9eea6dfd5f2c18aa1.jpg', '', '2013-06-21', 4, 59, ''),
(86, '9dc9763a3f072ca7b1e72bf54e0de7b2.jpg', '', '2013-06-21', 4, 66, ''),
(87, '76aa286a478d3278351261bea899d4a0.jpg', '', '2013-06-21', 4, 60, ''),
(88, 'a84ac3f2e90e07a5b37c688a08e30729.jpg', '', '2013-06-21', 4, 61, ''),
(89, '41fc8a4b41212176f09ed16ee9c1a8b5.jpg', '', '2013-06-21', 4, 62, ''),
(90, '6104bfddaaf8e4e0fff0e06a79367f73.jpg', '', '2013-06-21', 2, 1, ''),
(92, '1eb4aa87b5f28ba7a823f1d7d9c490fc.jpg', '', '2013-06-21', 2, 3, ''),
(93, '5b7af679bde917b7f3ddb83092ac84ea.jpg', '', '2013-06-21', 2, 7, ''),
(94, '2d7bbed16d3af5740dc7cd99015d711c.jpg', '', '2013-06-21', 2, 6, ''),
(95, '5fed99cef48b439d9b71ff55ae8afca0.jpg', '', '2013-06-21', 2, 5, ''),
(96, 'dedf90d40281a97722a1c317369f4352.jpg', '', '2013-06-21', 5, 0, ''),
(97, 'be33c451c81f8d6bfb34806dea6bb33b.jpg', '', '2013-06-21', 5, 1, ''),
(98, 'eb3b006fb1615da0131a9903f1c62336.jpg', '', '2013-06-22', 5, 1, ''),
(99, '17a74af6eea2cf74222baf774770c309.jpg', '', '2013-06-22', 5, 1, ''),
(100, 'a3e1bf811433e64c532915ed9cf5f315.jpg', '', '2013-06-22', 5, 1, ''),
(101, '5d72137378d8ff4fd3b790a9559f1022.jpg', NULL, '2013-06-22', 4, 63, NULL),
(102, '82bf4f78bf77c2d21891b6dd4f153363.jpg', NULL, '2013-06-22', 4, 65, NULL),
(103, 'fa15089713711e7a4d029699bf5aa936.jpg', NULL, '2013-06-22', 6, 1, NULL),
(104, '795aa16552ea4dc13418f194f3f0cc0b.jpg', NULL, '2013-06-22', 6, 1, NULL),
(105, 'f478af4d877b509bd5323e5d03d11e17.jpg', NULL, '2013-06-22', 6, 0, NULL),
(106, 'b69a79937057c0e31c5801fa22c1b5e9.jpg', NULL, '2013-06-22', 6, 1, NULL),
(107, '8233b40bd0cb18d487e20ce3d9858819.jpg', '', '2013-06-22', 7, 0, ''),
(108, 'be09b6f8e4c60b3e2d9ab23cc1c09e49.jpg', '', '2013-06-22', 7, 18, ''),
(109, 'ddae5ca641bad70d156f2f73de30ccf5.jpg', '', '2013-06-22', 7, 19, ''),
(110, '86edce7847afcff3854283570563ceae.jpg', '', '2013-06-22', 7, 9, ''),
(111, 'e14e373902b70481614e2b76450a623c.jpg', '', '2013-06-22', 7, 20, ''),
(112, 'ad00edf3edbae346f1bfa8e4a5fad979.jpg', '', '2013-06-22', 7, 21, ''),
(113, 'a69f4e4b04bf18bcb2c93c068f5e341f.jpg', '', '2013-06-22', 7, 22, ''),
(114, '6f315b4e5c63ed5e0b044ddbd0158496.jpg', '', '2013-06-22', 7, 23, ''),
(115, '26c752188ab705f5c414eadcebf28b8a.jpg', '', '2013-06-22', 7, 25, ''),
(116, '6863bdaf507dc091e2f6dc2a0e4a6287.jpg', '', '2013-06-22', 7, 26, ''),
(117, 'c8921335d127c3373582b4c3391867eb.jpg', '', '2013-06-22', 7, 24, ''),
(118, '4c236bfef7d022a534241910bb25728f.jpg', '', '2013-06-22', 7, 27, ''),
(119, '4156bb7f24ab49cbf41bc5ae2726c0a8.jpg', '', '2013-06-22', 7, 28, ''),
(120, '797a5551fd9a8b6d56a28e0b3c47566d.jpg', '', '2013-06-22', 7, 29, ''),
(121, '5c818735325976760462e1bb3941b450.jpg', '', '2013-06-22', 7, 30, ''),
(122, '8d8802c39fa2aee1919b97ade632ca59.jpg', '', '2013-06-22', 7, 17, ''),
(123, 'a36cfaab572a83b52e7a3e81c0a0615e.jpg', '', '2013-06-22', 7, 8, ''),
(124, '78f67babf0351bbe52163c1bba26820a.jpg', '', '2013-06-22', 7, 3, ''),
(125, 'b4b191e1d8480c172238748f159ddc28.jpg', '', '2013-06-22', 7, 10, ''),
(126, 'da4411234118097c9cdedb3203aecf9f.jpg', '', '2013-06-22', 7, 11, ''),
(127, 'e561f984fa8c1d6f5ea7cb8eaf6ad66e.jpg', '', '2013-06-22', 7, 1, ''),
(128, 'a71f03d742139125537d0bc5ed2932f6.jpg', '', '2013-06-22', 7, 12, ''),
(129, '47677473d4dccca635589d19587a7a5b.jpg', '', '2013-06-22', 7, 13, ''),
(130, 'ba092c14e013797d12bbfd319678bc0c.jpg', '', '2013-06-22', 7, 14, ''),
(131, '089f0db5b55aa7d0f2f98fc4dd13eef5.jpg', '', '2013-06-22', 7, 2, ''),
(132, 'fadf87a708b902cae122faf625b4c05c.jpg', '', '2013-06-22', 7, 15, ''),
(133, 'bf1e30273f15a69e24a47d5a72cb97eb.jpg', '', '2013-06-22', 7, 5, ''),
(134, 'e62883fd1802f1f3d94c85d081437559.jpg', '', '2013-06-22', 7, 6, ''),
(135, '4e0ab59c8b8847816b3f062ed30831a1.jpg', '', '2013-06-22', 7, 7, ''),
(136, 'd7f16aa5b06a51c598522528f38cda47.jpg', '', '2013-06-22', 7, 4, ''),
(137, '729b3000af072ba137a752f98ebc08eb.jpg', '', '2013-06-22', 7, 16, ''),
(138, '28fccd467b0a76aefef98d0d5bb771aa.jpg', '', '2013-06-22', 7, 31, ''),
(139, '191e883ab6ad1a1a9668a8effa947c24.jpg', NULL, '2013-06-22', 8, 1, NULL),
(140, '4fe8faff6d6d3d223dec7d85c830269f.jpg', NULL, '2013-06-22', 8, 0, NULL),
(141, 'dffcab09006e1923a6b561fbcd59a5d7.jpg', '', '2013-06-22', 9, 1, ''),
(142, 'ba83b4c8decc9899791c3dd2f5ebbfd6.jpg', '', '2013-06-22', 9, 1, ''),
(143, '43f68b140f980ca373f4cecb3899358a.jpg', '', '2013-06-22', 9, 1, ''),
(144, 'c150e5842999bdfd3e523e6a327bbc5c.jpg', '', '2013-06-22', 9, 0, ''),
(145, '562313e4b215eb69d7883fbaec44f2cd.jpg', NULL, '2013-06-22', 8, 999, NULL),
(146, '3a137fdc85b49f883af886ca9862f843.jpg', NULL, '2013-06-22', 8, 999, NULL),
(147, 'a87760902a9d3739a373b2951f4ac143.jpg', '', '2013-06-22', 10, 0, ''),
(148, 'c92665aa089bc3eb16af776c30ccc0f8.jpg', '', '2013-06-22', 10, 1, ''),
(149, 'e18569fda59233ad38c568b62986f73b.jpg', '', '2013-06-22', 10, 1, ''),
(150, '64318d00bd2a2342a7969e2143518f2d.jpg', '', '2013-06-22', 10, 1, ''),
(151, '39c9b1a2f01a21e1e1fefeecf38d2a13.jpg', '', '2013-06-22', 10, 1, ''),
(152, '1703d3a413f0aaa6b5e8e2483a4e224c.jpg', '', '2013-06-22', 10, 1, ''),
(153, 'aa98c6c697d57b65e5d7f2a042fc9453.jpg', '', '2013-06-22', 10, 1, ''),
(154, 'e653b97a9e0f1f22a7ad67a674e4dd82.jpg', '', '2013-06-22', 10, 1, ''),
(155, 'cea9dc1bd90f36f22e812c368f52927a.jpg', '', '2013-06-22', 10, 1, ''),
(156, '5a07bcbe444c8e0a3df310008c654960.jpg', '', '2013-06-22', 10, 1, ''),
(157, '58d31f7c809040fe5508ed681eef42b5.jpg', '', '2013-06-22', 10, 1, ''),
(158, '3c219e73bd532dadf3a2c7078554af2a.jpg', '', '2013-06-22', 11, 0, ''),
(159, 'e8c3c75ee09b84487193955ec8bdd484.jpg', '', '2013-06-22', 11, 7, ''),
(160, '150b82593e7e37c44aaaad7e8b450d4d.jpg', '', '2013-06-22', 11, 4, ''),
(161, '92a4abea44d52351d8241bc5501a5113.jpg', '', '2013-06-22', 11, 6, ''),
(162, '4510fd54683db907abfca6823baa9c05.jpg', '', '2013-06-22', 11, 2, ''),
(163, '37dbf32bf85879a561a799ea6f7a1337.jpg', '', '2013-06-22', 11, 3, ''),
(164, '5a6888b067ba9ddcc2b4e9c95cc47632.jpg', '', '2013-06-22', 11, 1, ''),
(165, '216da8f623a7e08825244dce7e319c3f.jpg', '', '2013-06-22', 11, 5, ''),
(166, '7cd0203ee2c90d0244313f61e5e1a535.jpg', '', '2013-06-22', 11, 8, ''),
(167, '69343bc608a87229e303cc19dddd1d4d.jpg', NULL, '2013-06-22', 12, 1, NULL),
(168, 'eeda6357e56548fca6bc86f1d774386f.jpg', NULL, '2013-06-22', 12, 0, NULL),
(169, 'ce20b9d81d148638cef5e42dda9f99bc.jpg', NULL, '2013-06-22', 13, 1, NULL),
(170, '57721017489257060146b1f3f2f2df80.jpg', NULL, '2013-06-22', 13, 1, NULL),
(171, '35d9f3ce2335725582e87f5f206998c4.jpg', NULL, '2013-06-22', 13, 1, NULL),
(172, '558bd21223b65dc09f571f9dab9e1c6f.jpg', NULL, '2013-06-22', 13, 1, NULL),
(173, 'ab405d8568c4720eaa1800d0adbb579c.jpg', NULL, '2013-06-22', 13, 0, NULL),
(174, 'ed9eb75d032014b623f1fbf83d39e035.jpg', NULL, '2013-06-22', 13, 1, NULL),
(175, 'e79bccbf3b8b6900a4338a492f015998.jpg', NULL, '2013-06-22', 13, 1, NULL),
(176, 'c17a11e46c33228c800604acba3918ce.jpg', NULL, '2013-06-22', 13, 1, NULL),
(177, '3d916022d43429d8925d93db17b65c1a.jpg', NULL, '2013-06-22', 13, 1, NULL),
(178, '43ca85319887b4560c2b73490ee03955.jpg', NULL, '2013-06-22', 13, 1, NULL),
(179, '45698ad1eb2ec944c6d57125e4ab6cab.jpg', NULL, '2013-06-22', 13, 1, NULL),
(180, '69ec72f18f20ffd2813afbc084a2b6dd.jpg', NULL, '2013-06-22', 13, 1, NULL),
(181, '4fd9c8b1dc310e3c965abcc028bea79f.jpg', NULL, '2013-06-22', 13, 1, NULL),
(182, '10f12f946f3d91051693213fc959dffc.jpg', NULL, '2013-06-22', 13, 1, NULL),
(183, '5ed0cd5a3f158a130b0edc52e6de978b.jpg', NULL, '2013-06-22', 13, 1, NULL),
(184, 'c313752dc3966a7605b060e9e260664d.jpg', NULL, '2013-06-22', 13, 1, NULL),
(185, '9060385ab10465d9c6347d02fa69dc68.jpg', NULL, '2013-06-22', 13, 1, NULL),
(186, '4b200cbd1bc85087c9b7ee6f73cde748.jpg', NULL, '2013-06-22', 13, 1, NULL),
(187, 'b8f70b4954085c9fb2e5798d2b63d8ca.jpg', NULL, '2013-06-22', 13, 1, NULL),
(188, '83dc0e1131dd12c385e58f576d70e757.jpg', NULL, '2013-06-22', 13, 1, NULL),
(189, 'aa4f4c6ba1090db979871551344f4ef0.jpg', NULL, '2013-06-22', 13, 1, NULL),
(190, '1bf0a19caf3707788027aec309deeed0.jpg', NULL, '2013-06-22', 13, 1, NULL),
(191, '53ffabfda8bf32222d3e4175b4174650.jpg', NULL, '2013-06-22', 13, 1, NULL),
(192, '7a280dea49d912bd24cf0e233a069ef7.jpg', NULL, '2013-06-22', 13, 1, NULL),
(193, '9d68a616c799a405f33e4729d61b5136.jpg', NULL, '2013-06-22', 13, 1, NULL),
(194, '0f952b9be6c9f490a6c53f0a8c0f9f43.jpg', NULL, '2013-06-22', 13, 1, NULL),
(195, '99a39e7215125c2d3cffc19412b262c6.jpg', NULL, '2013-06-22', 13, 1, NULL),
(196, '887393bec49ce285233b33146844049f.jpg', NULL, '2013-06-22', 13, 1, NULL),
(197, 'cc272bc56621e625f55ec6469851b0f2.jpg', NULL, '2013-06-22', 13, 1, NULL),
(198, '7d14bbed2c0f8c47b78b8b74b7202b05.jpg', NULL, '2013-06-22', 13, 1, NULL),
(199, '63e9d004b2cd34639abee06577583bbd.jpg', NULL, '2013-06-22', 13, 1, NULL),
(200, 'cdacf9163365c0345d7595bcaf71d4ac.jpg', NULL, '2013-06-22', 13, 1, NULL),
(201, '2f87d21281136ca60f2c91499414c2eb.jpg', NULL, '2013-06-22', 13, 1, NULL),
(202, '48563130338956f3cf33623de97960e7.jpg', NULL, '2013-06-22', 13, 1, NULL),
(203, 'b2c30a7d7094af4bfa15f821643c189a.jpg', NULL, '2013-06-22', 13, 1, NULL),
(204, '9a28223e5021afab9626cafd93a3257f.jpg', NULL, '2013-06-22', 13, 1, NULL),
(205, '9136092dc90f37b81257ec067e79ea34.jpg', NULL, '2013-06-22', 13, 1, NULL),
(206, '391f3caf8970a2359464d090b44b71ca.jpg', NULL, '2013-06-22', 13, 1, NULL),
(207, '4de5582cc672a080ef5f23c3377204d9.jpg', NULL, '2013-06-22', 13, 1, NULL),
(208, '8b8be5b26deb2659588eb97d57994300.jpg', NULL, '2013-06-22', 13, 1, NULL),
(209, '6e4a19576dd13e986a18660b2542268c.jpg', NULL, '2013-06-22', 13, 1, NULL),
(210, 'bd9f73b44d9c8d880db760f4a53ea270.jpg', NULL, '2013-06-22', 13, 1, NULL),
(211, '3394e01b60be2c99e3bcfd438b55b9e7.jpg', NULL, '2013-06-22', 13, 1, NULL),
(212, 'cc6c7d27c968d3ca0e54aad31d2a1665.jpg', NULL, '2013-06-22', 13, 1, NULL),
(213, '73791d19b79fec48c63a014fe1c4dcda.jpg', NULL, '2013-06-22', 13, 1, NULL),
(214, '63923210d603444250642f48c74f294b.jpg', NULL, '2013-06-22', 13, 1, NULL),
(215, '5a6ba0351d4b546d25571d96d20246a3.jpg', NULL, '2013-06-22', 13, 1, NULL),
(216, '6b43cbb790f43eb2588fc5c028dc1a94.jpg', NULL, '2013-06-22', 13, 1, NULL),
(217, 'cc57137d47ea7e278b034afe40211b93.jpg', 'MaÃ­ra e Mestre Antonio', '2013-07-28', 14, 1, ''),
(218, 'f3c6616ef246cbc8c19a26e1f8664224.jpg', 'Exame de Sebon, com Renan e Brendon', '2013-07-28', 14, 1, ''),
(220, '664f94547d2fd74cf0807762a241e3a3.jpg', '', '2013-07-28', 14, 1, ''),
(221, 'a01b5f1a0ebebfbd4dd54c935db373b9.jpg', 'Exame de Dubon dos Faixas vermelhas Claudio e Uellington', '2013-07-28', 14, 1, ''),
(222, '042b459bf70848aa65c17a0a2def9469.jpg', '', '2013-07-28', 14, 1, ''),
(223, '90ea82981061433a942b95b1089cf07a.jpg', '', '2013-07-28', 14, 0, ''),
(224, '7290d50870cc019dcf5d39d9824f1e6e.jpg', '', '2013-07-28', 14, 1, ''),
(225, '918a90bc4dba848dcceac3f3cb2d0d26.jpg', '', '2013-07-28', 14, 1, ''),
(226, '9f7534bd41a72e6be3655f7268a2211c.jpg', 'Professores Wyllian e Walter SMU', '2013-07-28', 14, 1, ''),
(227, 'd6cb4b06137b964c4d3f491fc76e02c9.jpg', '', '2013-07-28', 14, 1, ''),
(228, '5d34219fa0f6137f7e0e0f3e14581a78.jpg', 'Exames dos Faixas Amarelas', '2013-07-28', 14, 1, ''),
(229, 'cccb5732759b34002162ced938ed3166.jpg', 'Exame de Kyorugui dos verdes ponta azul, Uellington e Pontes ', '2013-07-28', 14, 1, ''),
(232, '0b636dccfdbe21dea8136dcfaf71ca87.jpg', 'Final do Exame em SÃ£o GonÃ§alo', '2013-07-28', 14, 1, ''),
(233, 'a1e82866e5e1fab971dd527c4a6d534c.jpg', '', '2013-07-28', 14, 1, ''),
(234, '08801068ae51f91941152644aebdf596.jpg', '', '2013-07-28', 14, 1, ''),
(235, '38e858a5d67230fc965fa709dbfcf32c.jpg', '', '2013-07-28', 14, 1, ''),
(236, '9552e6f593b2c44daf9dce8723653957.jpg', '', '2013-07-28', 14, 1, ''),
(238, '9be02142d10ee644a75f2fa2dabf0bcc.jpg', '', '2013-07-28', 14, 1, ''),
(239, '6b5f56759091fbf3aa4798573dbcf1c1.jpg', '', '2013-07-28', 14, 1, ''),
(287, '3520e8ebafb51aece2cfb869767b4c91.jpg', 'Preparados para mais uma apresentaÃ§Ã£o', '2013-09-10', 16, 1, ''),
(288, '8b632940f0815f8915659a1bcd793a83.jpg', NULL, '2013-09-10', 16, 1, NULL),
(289, '1fcd385d363698454d83cc24bb489958.jpg', NULL, '2013-09-10', 16, 1, NULL),
(290, '217eb896cccef6f038a0b26a62e9ce3d.jpg', NULL, '2013-09-10', 16, 1, NULL),
(291, '9ffd5f76573aef221cf3ed8805a0882c.jpg', NULL, '2013-09-10', 16, 1, NULL),
(292, 'af6ad330387ae2d6c464919da28c8e39.jpg', NULL, '2013-09-10', 16, 0, NULL),
(293, '02507328e1936bc5574aee7a1aa3ae83.jpg', NULL, '2013-09-10', 16, 1, NULL),
(294, '14f590e32f36665144a5a3148fb81d16.jpg', NULL, '2013-09-10', 16, 999, NULL),
(295, '751075e742b628a315bd6ba45d359909.jpg', NULL, '2013-09-10', 16, 999, NULL),
(296, 'c6db7d7e0d2d73671d081fe9a26e8e92.jpg', NULL, '2013-09-10', 16, 999, NULL),
(297, '897851e51e1d966bb3b09501295d1574.jpg', NULL, '2013-09-10', 16, 999, NULL),
(298, '74108897dd0c890dea73e65404a483e7.jpg', NULL, '2013-09-10', 16, 999, NULL),
(299, 'e0a443118356e4affd27370815ebe6a7.jpg', NULL, '2013-09-10', 16, 999, NULL),
(300, '331334f58ef6735543b324d0b51be66b.jpg', NULL, '2013-09-10', 16, 999, NULL),
(301, 'a0076325704810506607e099330d0cb8.jpg', NULL, '2013-09-10', 16, 999, NULL),
(302, '976d72fed8afda44cd71fcdc82bed108.jpg', NULL, '2013-09-10', 16, 999, NULL),
(303, '51d0ba31d455a7d7277109c665acf331.jpg', NULL, '2013-09-10', 16, 999, NULL),
(304, '4d811c12823fc3dd2843dcf6abdd5469.jpg', NULL, '2013-09-10', 16, 999, NULL),
(305, 'f2f82592e276c5c732b0417cd3d23bbb.jpg', NULL, '2013-09-10', 16, 999, NULL),
(306, '23312386921a28b36ce95e3e3407f67f.jpg', NULL, '2013-09-10', 16, 999, NULL),
(307, '7887e03cfa91bd6a5c3e5a8fc8d2d827.jpg', NULL, '2013-09-10', 16, 999, NULL),
(308, '89121be1788e7aba82aaedda22c26e3d.jpg', NULL, '2013-09-10', 16, 999, NULL),
(309, '92a951c269325efdb4fd5935a8308f09.jpg', NULL, '2013-09-10', 16, 999, NULL),
(310, '9c43c5fc86c778c9ebbd92afc7e45ca3.jpg', NULL, '2013-09-10', 16, 999, NULL),
(311, '652356a412693a1b3b8a5fd9a4706082.jpg', NULL, '2013-09-10', 16, 999, NULL),
(312, 'ebef4f750c79bf47825e5fcad0c5b501.jpg', NULL, '2013-09-10', 16, 999, NULL),
(313, '729e50865f047cef52a843b8feab249d.jpg', NULL, '2013-09-10', 16, 999, NULL),
(314, 'f60c72057afe3502c36c84980bc00a10.jpg', NULL, '2013-09-10', 16, 999, NULL),
(315, 'f554e264e258cc511152ecd0dff8dc4e.jpg', NULL, '2013-09-10', 16, 999, NULL),
(316, 'c10e2aec7bd12b3dac85f49f0a7fb1c3.jpg', NULL, '2013-09-10', 16, 999, NULL),
(317, '5138241833187f88f4f07bb99c0d0a94.jpg', NULL, '2013-09-10', 16, 999, NULL),
(318, 'f93ffbf70568e613a51c1cd050b56ea3.jpg', NULL, '2013-09-10', 16, 999, NULL),
(319, '6dd9b9a3dc28d2c754b601e00abbf955.jpg', NULL, '2013-09-10', 16, 999, NULL),
(320, 'c4bb667b51d55982e27cec5448f47257.jpg', NULL, '2013-09-10', 16, 999, NULL),
(321, 'd7aa4f78a120aa7ebfcbe4f21ac19e8b.jpg', NULL, '2013-09-10', 16, 999, NULL),
(322, '797eb4abdc672e1e5dc17faa043fce12.jpg', NULL, '2013-09-10', 16, 999, NULL),
(323, '5b58493b9769fa1049d0416b2af7fa2f.jpg', NULL, '2013-09-10', 16, 999, NULL),
(324, '33cd4182bb65d499fb01f224f9e758a0.jpg', NULL, '2013-09-10', 16, 999, NULL),
(325, '8aeaf8eabafadb29d45a7cc044e58a47.jpg', NULL, '2013-09-10', 16, 999, NULL),
(326, '8eacd053bd1cf2a30b05fe6fd812f22d.jpg', NULL, '2013-09-10', 16, 999, NULL),
(327, '35dc992308f87869ac74b73b6da00432.jpg', NULL, '2013-09-10', 16, 999, NULL),
(328, '04fd9c87e7ec887ef68871ddffb7b8a2.jpg', NULL, '2013-09-10', 16, 999, NULL),
(329, '5e7a8270d6ad295c6a3c177e4f3b8aa0.jpg', NULL, '2013-09-10', 16, 999, NULL),
(330, 'f60ca95afe804cf4d940b0a323567c77.jpg', NULL, '2013-09-10', 16, 999, NULL),
(331, '9df67e3fdea026a82b05701fd5745021.jpg', NULL, '2013-09-10', 16, 999, NULL),
(332, 'd66041ffd9607c8eee7e87a10df0b19f.jpg', NULL, '2013-09-10', 16, 999, NULL),
(333, '08d546a2886f3691132c2d9438ceef56.jpg', NULL, '2013-09-10', 16, 999, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordenar` int(2) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `sub_menu` int(1) NOT NULL,
  `arquivo` int(1) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `formato` varchar(40) NOT NULL,
  `coluna_lateral` int(1) NOT NULL,
  `colunas` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Fazendo dump de dados para tabela `menu`
--

INSERT INTO `menu` (`id`, `ordenar`, `id_menu`, `texto`, `url`, `sub_menu`, `arquivo`, `tipo`, `formato`, `coluna_lateral`, `colunas`) VALUES
(1, 1, 0, 'SMU', 'smu', 1, 1, '0', '1', 0, 1),
(2, 1, 1, 'QUEM &Eacute; MESTRE ANTONIO ALVES', 'quem-e-mestre-antonio-alves', 0, 1, '0', '0', 1, 1),
(3, 3, 1, 'PROFESSORES', 'professores', 0, 1, '0', '1', 0, 1),
(6, 7, 0, 'NOT&Iacute;CIAS', 'noticias', 0, 1, '0', '1', 0, 1),
(9, 5, 0, ' FOTOS', 'fotos', 0, 1, '1', '1', 0, 1),
(11, 6, 0, 'V&Iacute;DEOS', 'videos', 1, 1, '2', '1', 0, 1),
(12, 2, 1, 'PALAVRA DO MESTRE', 'palavra-do-mestre', 0, 1, '0', '2', 1, 0),
(14, 2, 0, 'TAEKWONDO', 'taekwondo', 1, 1, '0', '1', 0, 1),
(15, 4, 0, 'KRAV-MAG&Aacute;', 'krav-maga', 1, 1, '0', '1', 0, 1),
(21, 0, 14, 'HIST&Oacute;RIA', 'historia', 0, 1, '0', '1', 1, 0),
(22, 0, 14, 'JURAMENTO', 'juramento', 0, 1, '0', '1', 1, 0),
(23, 0, 14, 'GRADUA&Ccedil;&Atilde;O', 'graduacao', 0, 1, '0', '1', 0, 1),
(37, 0, 11, 'POOMSES', 'poomses', 0, 1, '2', '2', 1, 0),
(38, 0, 11, 'APRESENTA&Ccedil;&Atilde;O', 'apresentacao', 0, 1, '2', '2', 1, 1),
(40, 0, 11, 'SEBON', 'sebon', 0, 1, '2', '2', 1, 1),
(41, 0, 14, 'VOCABUL&Aacute;RIO', 'vocabulario', 0, 1, '0', '2', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `codigo` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `noticia` longtext COLLATE latin1_general_ci NOT NULL,
  `data` date NOT NULL,
  `categoria` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `subcategoria` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fotonot` int(1) NOT NULL,
  `lead` text COLLATE latin1_general_ci NOT NULL,
  `dtagenda` date NOT NULL,
  `url_seo` text COLLATE latin1_general_ci NOT NULL,
  `legenda` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `url_categoria` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `url_subcategoria` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `metas` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=42 ;

--
-- Fazendo dump de dados para tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `noticia`, `data`, `categoria`, `subcategoria`, `tipo`, `foto`, `fotonot`, `lead`, `dtagenda`, `url_seo`, `legenda`, `user`, `status`, `url_categoria`, `url_subcategoria`, `metas`) VALUES
(1, 'QUEM &Eacute; MESTRE ANTONIO ALVES', '<p>\r\n	Mestre Antonio Alves nasceu em 1978 no Rio de Janeiro, desde pequeno sempre foi fascinado por artes marciais, ainda crian&ccedil;a treinava sozinho sem ter nenhum conhecimento, inspirado pelos filmes de Bruce Lee.</p>\r\n<p>\r\n	Em 1988 come&ccedil;ou a praticar o Taekwondo com o professor Ivanildo Marques, que hoje &eacute; mestre, foi na academia Leon na tijuca que Mestre Antonio Alves se identificou com o Taekwondo WTF, tamb&eacute;m treinou o estilo Chang Moo Kwan, com quinze anos ja era faixa preta 1&deg;dan de Taekwondo,aos dezoito anos foi servir ao exercito na 21&deg; Bateria de Artilharia Anti A&eacute;rea, foi quando Mestre Antonio Alves se tornou cabo e obteve conhecimentos de guerrilha na selva e urbano, recebendo honra ao m&eacute;rito por suas atividades.</p>\r\n<p>\r\n	Em 1998 introduziu o Taekwondo em In&otilde;a, na cidade de Maric&aacute;, em 2004 teve seu primeiro contato com o Hapkido com o Gr&atilde;o Mestre Kang ,em 2006 formou-se em terapia corporal se especializando em Massagem Indiana, Ayurv&eacute;dica Abhianga, em 2007 formou-se em Instrutor de defesa pessoal urbano pela ABRAPAM, foi da&iacute; que come&ccedil;ou as pesquisas profundas por defesa pessoal at&eacute; chegar ao SMU, (Sistema Marcial Urbano).</p>\r\n<p>\r\n	EM 2010 alcan&ccedil;ou a faixa preta de Hapkido com a supervis&atilde;o do Gr&atilde;o Mestre Dayvison estilo SUNGJAKWAN, o antigo SUNGJADO.</p>\r\n<p>\r\n	Mestre Antonio Alves hoje &eacute; faixa preta 6&deg;dan de Taekwondo , 1&deg; dan de Hapkido e Instrutor de defesa pessoal urbano e criador do SMU.</p>\r\n<p>\r\n	Como atleta, Mestre Antonio Alves consagrou-se Campe&atilde;o estadual TKD 1993 e 1994,Penta campe&atilde;o copa Campos, era o maior evento de TKD em Campos 1991,1992,1993,1994 e 1995, Vice Campe&atilde;o Brasileiro TKD 1991, Vice campe&atilde;o estadual 1992, Campe&atilde;o em poomse copa Princeps, Campe&atilde;o em poomse Copa Integra&ccedil;&atilde;o 2010, Campe&atilde;o no open Hapkido 2012, Campe&atilde;o absoluto TKD 1992.Com in&uacute;meros cursos de artes marciais, defesa pessoal,seguran&ccedil;a privada e terapia corporal, Mestre Antonio Alves tem uma miss&atilde;o ardua, em divulgar a essencia da verdadeira arte guerreira e seus princ&iacute;pios a todas as pessoas que pretendem buscar este dif&iacute;cil e maravilhoso mundo das artes marciais. &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '2013-06-17', 'SMU', 'QUEM &Eacute; MESTRE ANTONIO', 'P&uacute;blico', 'e2aa9af08fc2e397eb6ef974a10dc26e.jpg', 1, 'Mestre Antonio Alves nasceu em 1978 no Rio de Janeiro, desde pequeno sempre foi fascinado por artes marciais, ainda crian&ccedil;a treinava sozinho sem ter nenhum conhecimento, inspirado pelos filmes de Bruce Lee.\r\nHoje 6&ordm; Dan de Taekwondo e 1&ordm; Dan de Hapkido e Criador do Sistema Marcial Urbano', '2013-06-17', 'quem-e-mestre-antonio-alves', '', '', 'publicar', 'smu', 'quem-e-mestre-antonio', ''),
(3, 'Religiosidade nos Dojans.', '<p>\r\n	Uma grande pol&ecirc;mica que acontece nos Dojans,dojos etc, &eacute; o assunto de religiosidade, n&oacute;s sabemos que a maioria das artes marciais orientais, tem tra&ccedil;os religiosos como o Budismo,Taoismo etc,mas devemos conhecer a arte, sua hist&oacute;ria o professor que ministra a aula naquele local, enfim no meu Dojan, por exemplo, procuro ser bem claro que o que ensinamos, &eacute; uma arte marcial, um esporte, uma defesa pessoal e filosofia que independente se for oriental ou ocidental vamos buscar a integra&ccedil;&atilde;o e a uni&atilde;o de todos aqueles que querem aprender a arte,n&atilde;o exclu&iacute;mos nenhuma pessoa.</p>\r\n<p>\r\n	J&aacute; tive alunos que se recusavam a fazer cumprimentos por motivos religiosos, &eacute; l&oacute;gico que expliquei que nossa sauda&ccedil;&atilde;o &eacute; como se n&oacute;s apert&aacute;ssemos a m&atilde;o um do outro, mas n&atilde;o devemos obrigar o aluno a fazer algo que ele n&atilde;o se sinta bem, ao inv&eacute;s disso devemos mostrar que a arte marcial foi criada para unir seres humanos, por mais que nossos treinamentos sejam milenares da guerra, buscamos um mundo mais pacifico, unindo credos e ra&ccedil;as e classes sociais em um grupo, onde se um cresce, os outros tamb&eacute;m crescem.</p>\r\n<p>\r\n	Cada professor e mestre devem ter sabedoria para lidar com esse assunto, n&atilde;o com o medo de perder um aluno ou mensalidade, mas a de passar a verdadeira ess&ecirc;ncia das arte marciais, a de servir ao pr&oacute;ximo e de derrubar todas as barreiras que possa impedir uma pessoa de ser feliz.</p>\r\n<p>\r\n	Obs: Na vida temos que ter regras, em nossa bandeira temos um exemplo <span style="color:#f00;"><strong><em>&quot;Ordem e progresso&quot; </em></strong></span>se n&atilde;o tivermos ordem, n&atilde;o teremos progresso, respeitar as regras de uma arte, esporte ou qualquer institui&ccedil;&atilde;o, nos dar a oportunidade de mostrarmos o quanto aprendemos bem, tudo aquilo que foi ensinado.</p>\r\n', '2013-06-17', 'SMU', 'PALAVRA DO MESTRE', 'P&uacute;blico', 'db0b68be4c7b057fef9c027a36af7690.jpg', 0, 'N&oacute;s sabemos que a maioria das artes marciais orientais, tem tra&ccedil;os religiosos como o Budismo,Taoismo etc,mas devemos conhecer a arte, sua hist&oacute;ria o professor que ministra a aula naquele local, enfim no meu Dojan por exemplo procuro ser bem claro que o que ensinamos, &eacute; uma arte marcial, um esporte...', '2013-06-17', 'religiosidade-nos-dojans', 'Mestre Ant&ocirc;nio Alves 6&ordm; Dan de Taekwondo, 1&ordm; Dan de Hapkido, e Criador do Sistema Marcial Urbano', 'Pontes Junior', 'publicar', 'smu', 'palavra-do-mestre', ''),
(4, 'Meu Testemunho', '<p>\r\n	Durante anos da minha vida competi no Taekwondo. Entre vit&oacute;rias e derrotas, enfrentei advers&aacute;rios perigosos e por muito pouco n&atilde;o fui nocauteado pelos golpes dos mesmos, fiz treinamentos em matas, em altas pedras, na &eacute;poca que estive no ex&eacute;rcito fiz miss&otilde;es que coloquei minha vida exposta.</p>\r\n<p>\r\n	Fazendo treinamento de demonstra&ccedil;&otilde;es, me machuquei in&uacute;meras vezes mas sempre superando-as.</p>\r\n<p>\r\n	Tive minha primeira queda de moto, na qual um &ocirc;nibus me derrubou, e eu pude fazer um rolamento no asfalto e cair em p&eacute;, quando cai pela segunda vez, fiz uma queda lateral, queda esta que treinamos no Hapkido e no Judo, reagi a um assalto e sai ileso, j&aacute; perdi um &ocirc;nibus e horas depois quando peguei outro, constatei que o primeiro havia sido assaltado, no meu trabalho, constantemente lido com pessoas mau intencionadas,bandidos etc. Pessoas que n&atilde;o posso confiar, mas confio nos meus instintos, todos os dias &eacute; uma hist&oacute;ria com cara de filme de a&ccedil;&atilde;o.</p>\r\n<p>\r\n	Bem n&atilde;o estou aqui contando este testemunho, para me colocar l&aacute; em cima, muito menos dizer que sou o cara ou o melhor, &eacute; porque alguns anos atras, eu aceitei Deus em minha vida e fui batizado nas &aacute;guas por gratid&atilde;o por tudo que ele me fez antes de eu lhe aceitar e pelas coisa que ele me faz, e com certeza vai sempre fazer. Obrigado pelas vit&oacute;rias e derrotas e por estar sempre ao meu lado!</p>\r\n<p>\r\n	<strong><span style="color:#f00;"><em>&quot;O senhor &eacute; meu pastor e nada me faltara&quot; :<br />\r\n	Salmo 23.<br />\r\n	</em></span></strong></p>\r\n<p>\r\n	Mestre Antonio Alves.</p>\r\n', '2013-06-17', 'SMU', 'PALAVRA DO MESTRE', 'P&uacute;blico', 'cd398dccd55db6be6109bf3ab3fc7abf.jpg', 0, 'Durante anos da minha vida competi no Taekwondo, entre vit&oacute;rias e derrotas enfrentei advers&aacute;rios perigosos e por muito pouco n&atilde;o fui nocauteado pelos golpes dos mesmos,fiz treinamentos em matas em altas pedras na &eacute;poca que estive no ex&eacute;rcito fiz miss&otilde;es que coloquei minha vida exposta...', '2013-06-17', 'meu-testemunho', 'Mestre Ant&ocirc;nio Alves 6&ordm; Dan de Taekwondo, 1&ordm; Dan de Hapkido e Criador do Sistema Marcial Urbano', 'Pontes Junior', 'publicar', 'smu', 'palavra-do-mestre', ''),
(5, 'Avisos', '<p>\r\n	<span style="color: rgb(55, 64, 78); font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;">Aviso a todos do SMU: Senhores alunos informo que segundo informa&ccedil;&otilde;es, sexta feira dia 21/06/2013, ter&aacute; manifesta&ccedil;&atilde;o no centro de Maric&aacute;, como todas as informa&ccedil;&otilde;es ou boatos est&atilde;o se concretizando, n&atilde;o haver&aacute; aula em nosso Dojan, at&eacute; mesmo&nbsp;</span><span class="text_exposed_show" style="display: inline; color: rgb(55, 64, 78); font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;">porque o Dojan se encontra na rua da C&acirc;mara Municipal espero que todos compreendam pois temos como lema que &quot;seguran&ccedil;a &eacute; preven&ccedil;&atilde;o&quot; ent&atilde;o estaremos no s&aacute;bado firme e forte para treinarmos para o nosso exame.grande abra&ccedil;o! Mes. Antonio Alves</span></p>\r\n', '2013-06-19', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '33b3af8c724d5e369042e6c16efe0a34.jpg', 0, 'Aviso a todos do SMU: Senhores alunos informo que segundo informa&ccedil;&otilde;es, sexta feira dia 21/06/2013, ter&aacute; manifesta&ccedil;&atilde;o no centro de Maric&aacute;, como todas as informa&ccedil;&otilde;es ou boatos est&atilde;o se concretizando, n&atilde;o haver&aacute; aula em nosso Dojan...', '2013-06-19', 'avisos', 'Mestre Antonio Alves 6&ordm; Dan de Taekwondo, 1&ordm; Dan de Hapkido e Criador do Sistema Marcial Urbano', 'Pontes Junior', 'publicar', 'noticias', 'urlSubCategoria', ''),
(6, 'WTF - R&uacute;ssia ser&aacute; a sede do Mundial de 2015', '<p>\r\n	Al&eacute;m disso, tamb&eacute;m foi decidido que Costa do Marfim ser&aacute; a sede da Copa do Mundo por Equipes que ocorrer&aacute; na cidade de Aidjan, de 28 &agrave; 30 de novembro do corrente ano. Gr&atilde;-Bretanha ir&aacute; inaugurar o primeiro Grand-Prix da WTF em meados do pr&oacute;ximo m&ecirc;s de dezembro. Azerbaij&atilde;o ir&aacute; ser sede do Primeiro Campeonato Mundial de Cadetes em 2014.</p>\r\n<p>\r\n	Outros eventos confirmados tamb&eacute;m foi o 9o. Campeonato Mundial de Poosae que ocorrer&aacute; em Queretaro, M&eacute;xico em 2014, e a edi&ccedil;&atilde;o de 2015 do mesmo evento ser na cidade de Ho Chi Minh, Vietn&atilde;.</p>\r\n<p>\r\n	Fonte: WTF</p>\r\n', '2013-07-29', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '09f3047a01f108c10e527a148721fdf6.jpg', 0, 'A Chelyabinsk ser&aacute; a sede do Campeonato Mundial WTF de 2015, onde a cidade Russa desbancou o nosso Brasil e o Vietn&atilde; para conseguir esse direito. A decis&atilde;o foi tomara em 7 de junho, durante realiza&ccedil;&atilde;o de uma Assembleia no Quartel General do COI.', '2013-07-29', 'wtf-russia-sera-a-sede-do-mundial-de-2015', 'Na Assembleia, todos os presidentes dos pa&iacute;ses que disputavam a sede, estavam presentes. A Federa&ccedil;&atilde;o Russa de Taekwondo disse que programa o evento para realizar entre 16 e 23 de setembro.', 'Pontes Junior', 'publicar', 'noticias', '', 'mundia, 2015, taekwondo, wtf'),
(7, 'Campe&atilde;o de taekwondo ministra oficina de chute em Campos, RJ', '<p>\r\n	Competi&ccedil;&atilde;o infanto-juvenil de Taekwondo do Sesi, em Campos dos Goytacazes, no Norte Fluminense, recebe neste domingo (21), o campe&atilde;o panamericano Diogo Silva. A visita tem o objetivo de integrar crian&ccedil;as e adolescentes ao esporte.<br />\r\n	Em 2007, no panamericano do Rio de Janeiro, Diogo conquistou a medalha de ouro em sua categoria. Na decis&atilde;o, venceu o peruano Peter L&oacute;pez. Foi a primeira medalha de ouro do Brasil no esporte.</p>\r\n<p>\r\n	Diogo vai ministrar uma oficina de chute e participar de uma luta demonstra&ccedil;&atilde;o, antes do in&iacute;cio da competi&ccedil;&atilde;o. De acordo com a organiza&ccedil;&atilde;o do evento cerca de 500 crian&ccedil;as participam e a estimativa de p&uacute;blico &eacute; de 1300 pessoas.</p>\r\n<p>\r\n	O Sesc Campos fica na avenida Alberto Torres, 397, no Centro.</p>\r\n<p>\r\n	Fonte: G1.globo.com</p>\r\n', '2013-07-29', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '9118c6bf606f26f401f3d32453e1c7a9.jpg', 0, 'A visita tem o objetivo de integrar crian&ccedil;as e adolescentes ao esporte.\r\nO Sesc Campos fica na avenida Alberto Torres, 397, no Centro.', '2013-07-29', 'campeao-de-taekwondo-ministra-oficina-de-chute-em-campos-rj', 'Diogo Silva em Campos. (Foto: Reprodu&ccedil;&atilde;o/Internet)', 'Pontes Junior', 'publicar', 'noticias', '', 'taekwondo, campe&atilde;o, campos, rj, chutes, oficina'),
(9, 'Idosos usam o taekwondo para se livras das dores', '<p>\r\n	De maneira inusitada, um grupo de idosos de Pinhais est&aacute; dando um passo &agrave; frente em dire&ccedil;&atilde;o &agrave; qualidade de vida e ao bem-estar durante a melhor idade. Ao inv&eacute;s de exerc&iacute;cios leves, alongamentos e caminhadas, a turma preferiu adotar os golpes do taekwondo como parte do seu dia a dia. &ldquo;Pode parecer estranho para uma pessoa da minha idade, mas &eacute; muito bom fazer essa arte marcial. Minha vida tem melhorado depois que comecei a praticar. Sou outra pessoa&rdquo;, afirma a aposentada Alda Martins, de 73 anos.<br />\r\n	<br />\r\n	Ela faz parte da turma de 75 alunos que pratica semanalmente o taekwondo durante as aulas oferecidas h&aacute; cerca de dois anos no Centro de Conviv&ecirc;ncia do Idoso de Pinhais, administrado pela Secretaria Municipal de Assist&ecirc;ncia Social. No local, o grupo pratica tr&ecirc;s vezes por semana a arte marcial. Dona Alda &eacute; adepta da luta h&aacute; dois anos. Ela conta que seu cotidiano mudou completamente desde que come&ccedil;ou a aprender o esporte.</p>\r\n<p>\r\n	&ldquo;Antes eu vivia com dores no corpo por causa do reumatismo. Tamb&eacute;m n&atilde;o tinha elasticidade nenhuma. Vivia parada, s&oacute; fazendo os afazeres de casa. Depois que comecei tudo mudou. Hoje durmo melhor, minhas dores sumiram e estou mais disposta, com vontade de fazer tudo ao mesmo tempo. Al&eacute;m disso, aprendi a dar uns golpes caso algum ladr&atilde;ozinho tente roubar minha bolsa na rua&rdquo;, observa Dona Alda. &ldquo;Quando acaba uma aula, j&aacute; come&ccedil;o a contar as horas para a pr&oacute;xima. &Eacute; um esporte muito bom de se praticar e que me fez melhorar de sa&uacute;de. Quero praticar cada vez mais, que assim chego f&aacute;cil aos 100 anos&rdquo;, brinca.</p>\r\n<p>\r\n	<strong><br />\r\n	Estreia</strong><br />\r\n	<br />\r\n	A tamb&eacute;m aposentada Helena Silva, de 84 anos, participou ontem da aula pela primeira vez. Ela veio a convite das amigas que j&aacute; praticam o esporte. &ldquo;Vim porque, pelo que elas me falaram, vale a pena. E pelo o que eu vi at&eacute; agora vale mesmo. A turma &eacute; divertida, os professores s&atilde;o &oacute;timos e as aulas s&atilde;o boas para o meu corpo. Me senti muito bem durante as aulas&rdquo;, comenta.<br />\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Resultados excelentes</strong><br />\r\n	<br />\r\n	As aulas s&atilde;o ministradas por tr&ecirc;s professores e os exerc&iacute;cios s&atilde;o especialmente preparados para a faixa et&aacute;ria dos alunos, que t&ecirc;m entre 60 e 85 anos. &ldquo;Nosso objetivo aqui &eacute; oferecer a essas pessoas uma atividade f&iacute;sica e o taekwondo &eacute; um esporte que oferece exerc&iacute;cios de coordena&ccedil;&atilde;o motora e fortalecimento muscular. Mas o mais importante &eacute; a motiva&ccedil;&atilde;o dessas pessoas. Eles s&atilde;o muito motivados e isso inspira a todos&rdquo;, explica o instrutor C&iacute;cero de Paula.</p>\r\n<p>\r\n	Fonte: <a href="http://www.parana-online.com.br/editoria/cidades/news/685430/?noticia=IDOSOS+USAM+O+TAEKWONDO+PARA+SE+LIVRAR+DAS+DORES" target="_blank">Par&aacute; Online</a></p>', '2013-08-05', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '0e511601757c34e63efcdf5c9cff7c6b.jpg', 0, 'De maneira inusitada, um grupo de idosos de Pinhais est&aacute; dando um passo &agrave; frente em dire&ccedil;&atilde;o &agrave; qualidade de vida e ao bem-estar durante a melhor idade. Ao inv&eacute;s de exerc&iacute;cios leves, alongamentos e caminhadas, a turma preferiu adotar os golpes do taekwondo como parte do seu dia a dia.', '2013-08-05', 'idosos-usam-o-taekwondo-para-se-livras-das-dores', 'Pr&aacute;tica esportiva resulta em melhoria da qualidade de vida para os Idosos', 'Pontes Junior', 'publicar', 'noticias', '', 'taekwondo, idosos, dores'),
(10, 'Taekwondo pode aderir a uniformes mais sensuais a partir de dezembro', '<p>\r\n	Seguindo as tend&ecirc;ncias de outros esportes, a Federa&ccedil;&atilde;o de Taekwondo de Andorra apresentou um projeto, durante o &uacute;ltimo Mundial da modalidade, que pretende deixar os uniformes dos atletlas mais sensuais. Com o objetivo de popularizar o esporte, as novas vestimentas devem ser produzidas com tecidos que aderem ao corpo e revelam um pouco mais as formas dos lutadores.</p>\r\n<p>\r\n	O Taekwondo deve seguir os moldes de esportes como o v&ocirc;lei de praia, que diminuiu e tornou mais justos os uniformes, e o boxe, que durante os Jogos Ol&iacute;mpicos de Londres deu &agrave;s lutadoras a op&ccedil;&atilde;o de competirem usando shorts ou saia.</p>\r\n<p>\r\n	Juanjo Padr&oacute;s, diretor da federa&ccedil;&atilde;o de Taekwondo de Andorra e idealizador do projeto, afirma que a novidade pode facilitar a movimenta&ccedil;&atilde;o dos atletas e melhorar a imagem da modalidade na televis&atilde;o e imprensa. Caso seja aprovado, o uso dos uniformes deve ser testado em dezembro deste ano em etapas do Grand Prix.</p>\r\n<p>\r\n	Fonte: <a href="http://globoesporte.globo.com/outros-esportes/noticia/2013/08/taekwondo-pode-aderir-uniformes-mais-sensuais-partir-de-dezembro.html?keepThis=true&amp;TB_iframe=true&amp;height=650&amp;width=850&amp;caption=globoesporte.com" target="_blank">Globoesporte.com</a></p>\r\n', '2013-08-21', 'NOTÃCIAS', '', 'P&uacute;blico', '56330c43e3e65a372a8371ea5e4cb14e.jpg', 1, 'Por mais visibilidade, federa&ccedil;&atilde;o apresenta projeto de novos quimonos femininos e masculinos e novidade pode ser testada no fim do ano', '2013-08-21', 'taekwondo-pode-aderir-a-uniformes-mais-sensuais-a-partir-de-dezembro', 'Taekwondo pode adotar uniformes mais sensuais (Foto: Reprodu&ccedil;&atilde;o / Site www.mastaekwondo.com)', 'Pontes Junior', 'publicar', 'noticias', '', 'taekwondo, wtf, dobok'),
(28, 'RAFAEL LIMA', '', '2013-11-15', 'SMU', 'PROFESSORES', 'P&uacute;blico', 'd136a4f4a09c812a3ac5161163ca3dcc.jpg', 1, 'Professor Rafael Lima 3&ordm; Dan de Taekwondo', '2013-11-15', 'rafael-lima', 'Professor Rafael a Direita com o Gr&atilde;o Mestre Silva', 'Pontes Junior', 'publicar', 'smu', 'professores', 'professor, taekwondo, smu, maric&aacute;, rio de janeiro, defesa pessoal'),
(27, 'VANDA ALVES', '', '2013-11-15', 'SMU', 'PROFESSORES', 'P&uacute;blico', 'bd1e2ada0a4acff01328c1b9c6e186da.jpg', 1, 'Professora Vanda Alves 3&ordm; Dan de Taekwondo', '2013-11-15', 'vanda-alves', 'Professora Vanda Alves', 'Pontes Junior', 'publicar', 'smu', 'professores', 'professora, taekwondo, smu, maric&aacute;'),
(29, 'WYLLIAN OLIVEIRA', '', '2013-11-15', 'SMU', 'PROFESSORES', 'P&uacute;blico', 'ecbd640fad5f4abe362478fe353b19ee.jpg', 1, 'Professor Wyllian Oliveira, 2&ordm; de Taekwondo', '2013-11-15', 'wyllian-oliveira', '', 'Pontes Junior', 'publicar', 'smu', 'professores', 'professor, taekwondo, smu, defesa pessoal, hapkido, maric&aacute;, ino&atilde;, rio de janeiro'),
(30, 'WALTER SILVA', '', '2013-11-15', 'SMU', 'PROFESSORES', 'P&uacute;blico', 'f7f99d30955d5c054f3da994b6685d72.jpg', 1, 'Professor Walter Silva, 2&ordm; Dan de Taekwondo e 1&ordm; Dan de Hapkido', '2013-11-15', 'walter-silva', 'Professor Walter ( &agrave; direita)  Executando um Yop Tchagui com o professor Wyllian Oliveira', 'Pontes Junior', 'publicar', 'smu', 'professores', 'taekwondo, hapkido, professor, smu, defesa pessoal, maric&aacute;, ino&atilde;, rio de janeiro'),
(31, 'ANDERSON SILVA', '', '2013-11-16', 'SMU', 'PROFESSORES', 'P&uacute;blico', '0c9621ef58e3d0a50d386970d14e9508.jpg', 1, 'Professor Anderson Silva, 1&ordm; Dan de Taekwondo', '2013-11-16', 'anderson-silva', 'Professor Anderson Silva &agrave; direita ', 'Pontes Junior', 'publicar', 'smu', 'professores', 'professor, taekwondo, smu, ino&atilde;, maric&aacute;, rio de janeiro'),
(32, 'UELLINGTON', '', '2013-11-16', 'SMU', 'PROFESSORES', 'P&uacute;blico', '0197566cc2e9c193f1a5256fc6e4814d.jpg', 1, 'Professor Uellington 1&ordm; Hapkido e 1&ordm; Gub de Taekwondo', '2013-11-16', 'uellington', '', 'Pontes Junior', 'publicar', 'smu', 'professores', 'professor, taekwondo, hapkido, smu, maric&aacute;, rio de janeiro'),
(33, 'HIST&Oacute;RIA', '<div id="cxfotonot">\r\n	<img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/taekwondoAntigo.jpg" style="width: 615px; height: 253px; float: left;" /></div>\r\n<p>\r\n	Existem v&aacute;rias teorias a respeito de qual foi o pa&iacute;s em que se originou o sistema de lutas sem armas que atualmente se manifesta de v&aacute;rias formas segundo o lugar de onde se pratica.</p>\r\n<p>\r\n	Fala-se de um monge indiano, Bodhidharma, que desenvolveu o primeiro m&eacute;todo cient&iacute;fico de defesa pessoal, h&aacute; 3000 anos, de sua viagem para a china e seu estabelecimento num templo e a propaga&ccedil;&atilde;o de seu sistema de exerc&iacute;cios f&iacute;sicos e mentais que sem d&uacute;vida permitiram a forma&ccedil;&atilde;o de excelentes. Insinua-se que seu m&eacute;todo, KWONBOP, foi propagado posteriormente por monges budistas atrav&eacute;s da Cor&eacute;ia, Jap&atilde;o e Okinawa, sendo a forma prim&aacute;ria da qual surgiram todas as outras artes marciais.</p>\r\n<p>\r\n	No entanto a torre de Kyong Ju antecede em cinco s&eacute;culos a viagem de Bodhidharma pela China. Nas tumbas de Koguryo, outro reino coreano, tamb&eacute;m existem pinturas de homens exercitando-se em formas de luta. A constru&ccedil;&atilde;o de tais tumbas data do per&iacute;odo entre os anos 3 e 427 D.C., o que indica tamb&eacute;m a anterioridade a introdu&ccedil;&atilde;o de sistemas chineses de luta. Tamb&eacute;m n&atilde;o h&aacute; ind&iacute;cios de quando o Karat&ecirc; se iniciou no Jap&atilde;o ainda que pare&ccedil;a certo se seja derivado do Okinawa-t&ecirc;.</p>\r\n<p>\r\n	Em &ldquo;O LIVRO HIST&Oacute;RICO DE CHOSON&rdquo;, se evidencia o la&ccedil;o comercial que existia entre Choson (antigo nome da Cor&eacute;ia) e as ilhas RyuKyu (Okinawa), e que os jogos e costumes nativos da Cor&eacute;ia puderam se transmitidos a Okinawa por via dos mercadores que ali viajavam.</p>\r\n<p>\r\n	Contudo, &eacute; l&oacute;gico pensar que a luta de m&atilde;os vazias (sem armas) n&atilde;o se originou somente num pa&iacute;s, sen&atilde;o que se desenvolveu naturalmente em distintos lugares, adaptada por v&aacute;rios povos para se defenderem dos riscos do ambiente, e tamb&eacute;m &eacute; l&oacute;gico que os estilos influenciaram todos entre si, devido a contatos comerciais e pol&iacute;ticos entre as diferentes na&ccedil;&otilde;es, tanto na paz como na guerra.</p>\r\n<p>\r\n	O m&eacute;todo primitivo de defesa pessoal na Cor&eacute;ia denomina-se SOOBAK, muito popular e t&atilde;o antigo quanto a na&ccedil;&atilde;o.</p>\r\n<p>\r\n	H&aacute; 1300 anos, durante a dinastia Silla, os jovens aristocratas integraram um grupo de oficiais guerreiros, aos que denominaram HWARANG&nbsp; DO, unidos por fins patri&oacute;ticos e com estrito c&oacute;digo &eacute;tico como ideal. Foram at&eacute; as montanhas estudar as formas de luta dos animais selvagens e descobrir os tipos de posi&ccedil;&otilde;es ofensivas e defensivas que lhes dariam maior vantagem. A partir de suas observa&ccedil;&otilde;es combinaram o conhecimento adquirido com o sistema tradicional e incorporaram rigorosos exerc&iacute;cios de treinamento, assim como a concentra&ccedil;&atilde;o das disciplinas budistas.</p>\r\n<p>\r\n	Este harmonioso sistema chamou-se SOO-BAK DO&nbsp; e TAEKYON. Mantiveram sua popularidade atrav&eacute;s da dinastia Silla e Koguryo e alcan&ccedil;ou seu ponto culminante na dinastia Koryo, desde 935 at&eacute; o s&eacute;culo XIV.</p>\r\n<p>\r\n	Foi neste per&iacute;odo que a pen&iacute;nsula passou a se chamar Cor&eacute;ia. Chegados tempos mais pac&iacute;ficos, na dinastia Yi, o SOO-BAK passou a ser menos praticado. Desde a Guerra entre a China e o Jap&atilde;o, em 1894, e durante a 2&ordf; Guerra Mundial, a Cor&eacute;ia esteve envolvida em cont&iacute;nuos conflitos militares.</p>\r\n<p>\r\n	Os Estilos estrangeiros influenciaram na arte coreana tradicional e o SOO-BAK chegou a chamar-se TANG SOO DO, quer dizer, a &ldquo;A ARTE DA M&Atilde;O CHINESA&rdquo;.</p>\r\n<p>\r\n	Ap&oacute;s a libera&ccedil;&atilde;o da Cor&eacute;ia em 1945, um grupo de mestre revitalizou esta arte, e em 1955, o Gr&atilde;o Mestre General CHOI HONG HI organizou esta arte, unificando todas as escolas e criando uma arte marcial a qual denominou <strong>TAEKWONDO</strong>.</p>\r\n<p>\r\n	<strong>TAE</strong>- significa saltar, voar, esmagar com os p&eacute;s;</p>\r\n<p>\r\n	<strong>KWON </strong>-&nbsp;significa bater ou destruir com as m&atilde;os;</p>\r\n<p>\r\n	<strong>DO</strong>- significa o caminho, a arte, o m&eacute;todo, a filosofia</p>\r\n<p>\r\n	O Caminho dos p&eacute;s e das m&atilde;os, TAEKWONDO. Gr&atilde;o Mestre Kun Mo&nbsp;Bang ainda sugere um outro significado, baseado na ess&ecirc;ncia desta arte&nbsp;marcial: Tae-kwon-do a arte que treina a mente atrav&eacute;s do corpo em busca&nbsp;da perfei&ccedil;&atilde;o!</p>\r\n', '2013-11-22', 'TAEKWONDO', 'HISTÃ“RIA', 'P&uacute;blico', '312b2537b38c9926e0053f44430e51c2.jpg', 0, 'Existem v&aacute;rias teorias a respeito de qual foi o pa&iacute;s em que se originou o sistema de lutas sem armas que atualmente se manifesta de v&aacute;rias formas segundo o lugar de onde se pratica. Vamos descobrir como surgiu o TAEKWONDO', '2013-11-22', 'historia', '', 'Pontes Junior', 'publicar', 'taekwondo', 'historia', 'historia, taekwondo, smu, taekyon'),
(34, 'JURAMENTO', '<div id="cxfotonot">\r\n	<img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/juramento.jpg" style="width: 615px;" /></div>\r\n<h1 class="tituloInterno">\r\n	JURAMENTO DO ALUNO</h1>\r\n<p>\r\n	<strong>Eu prometo:</strong></p>\r\n<p>\r\n	1) Observar as regras do Tae-kwon-do;</p>\r\n<p>\r\n	2) Respeitar o Instrutor e meus Superiores;</p>\r\n<p>\r\n	3) Nunca fazer mau uso do Tae-kwon-do;</p>\r\n<p>\r\n	4) Construir um mundo mais pac&iacute;fico;</p>\r\n<p>\r\n	5) Ser campe&atilde;o da Liberdade e da Justi&ccedil;a.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h1 class="tituloInterno">\r\n	JURAMENTO DO DOJAN (SMU)</h1>\r\n<p>\r\n	<strong>Eu tenho:</strong></p>\r\n<p>\r\n	1) Determina&ccedil;&atilde;o;</p>\r\n<p>\r\n	2) Dedica&ccedil;&atilde;o;</p>\r\n<p>\r\n	3) Coragem;</p>\r\n<p>\r\n	4) For&ccedil;a;</p>\r\n<p>\r\n	5) F&eacute;.</p>\r\n<h1>\r\n	&nbsp;<strong>CONDUTA NO LOCAL DE TREINAMENTO (DOJAN)</strong></h1>\r\n<p>\r\n	1)&nbsp;&nbsp;&nbsp; Somente entrar no dojan com autoriza&ccedil;&atilde;o do instrutor (desde que ele esteja presente) aguardando em posi&ccedil;&atilde;o de sentido do lado de fora do mesmo.</p>\r\n<p>\r\n	2)&nbsp;&nbsp;&nbsp; Manter o dobok sempre limpo e apresent&aacute;vel, e s&oacute; entrar no dojan completamente uniformizado (incluindo a faixa).</p>\r\n<p>\r\n	3)&nbsp;&nbsp;&nbsp; Saudar o instrutor ao entrar no dojan.</p>\r\n<p>\r\n	4)&nbsp;&nbsp;&nbsp; Pedir a autoriza&ccedil;&atilde;o do instrutor sempre que por motivo de extrema necessidade tiver que se retirar do dojan durante o hor&aacute;rio de treinamento (aula).</p>\r\n<p>\r\n	5)&nbsp;&nbsp;&nbsp; Comportar-se com seriedade dentro do dojan, mantendo todo e qualquer tipo de comportamento inadequado (&quot;brincadeiras&quot;) do lado de fora do dojan, pois no tae-kwon-do, qualquer tipo de comportamento leviano por parte do praticante, &eacute; considerado perigoso, podendo acarretar acidentes graves e at&eacute; mesmo fatais.</p>\r\n<p>\r\n	6)&nbsp;&nbsp;&nbsp; Respeitar e acatar a todas as determina&ccedil;&otilde;es do instrutor, sem questiona-las.&nbsp;</p>\r\n<p>\r\n	7)&nbsp;&nbsp;&nbsp; Sentar-se&nbsp;(uma vez autorizado) apenas no ch&atilde;o do dojan, sendo terminantemente proibido ao aluno sentar-se em cadeiras, bancos ou bancadas trajando o dobok.</p>\r\n<p>\r\n	8)&nbsp;&nbsp;&nbsp; Deve cumprimentar o instrutor antes de se retirar do dojan, despedindo-se do mesmo quando estiver indo embora.</p>\r\n<p>\r\n	9)&nbsp;&nbsp;&nbsp; Treinar sempre, mesmo fora do hor&aacute;rio de aula, pois para este prop&oacute;sito existe o dojan. Tempos livres antes e depois da aula devem ser preenchidos com o treinamento de chutes, saltos, step, exerc&iacute;cios de flexibilidade, kibondojak, poomse, etc.. No entanto o treinamento de kirigui (luta) entre duas ou mais pessoas, s&oacute; poder&aacute; ser executado com a presen&ccedil;a ou autoriza&ccedil;&atilde;o do instrutor.</p>\r\n<p>\r\n	10)&nbsp;Zelar para que todos cumpram estas determina&ccedil;&otilde;es, pois elas existem para seu pr&oacute;prio beneficio.</p>\r\n', '2013-11-22', 'TAEKWONDO', 'JURAMENTO', 'P&uacute;blico', '6faa4e856a06e83fc209199a55ece068.jpg', 0, 'Aprenda o juramento do Taekwondo, do aluno e do Dojan SMU', '2013-11-22', 'juramento', '', 'Pontes Junior', 'publicar', 'taekwondo', 'juramento', 'juramento, taekwondo, smu, sistema marcial urbano, maric&aacute;, rio de janeiro, marica');
INSERT INTO `noticias` (`id`, `titulo`, `noticia`, `data`, `categoria`, `subcategoria`, `tipo`, `foto`, `fotonot`, `lead`, `dtagenda`, `url_seo`, `legenda`, `user`, `status`, `url_categoria`, `url_subcategoria`, `metas`) VALUES
(35, '10&ordm; GUB - FAIXA BRANCA', '<p>\r\n	&quot;Inicio-Pureza&quot; &Eacute; o in&iacute;cio de uma jornada e &eacute; comparada com as primeiras horas do dia. Com tempo o praticante ir&aacute; crescendo e dar&aacute; os seus primeiros passos na escola das artes marciais</p>\r\n<p>\r\n	O aluno nessa fase inicial deve obter os primeiros conhecimentos de vocabul&aacute;rio e t&eacute;cnicas.</p>\r\n<table align="left" border="0" cellpadding="1" cellspacing="1" style="width: 100%;">\r\n	<tbody>\r\n		<tr>\r\n			<td valign="middle">\r\n				<a href="http://www.academiatkdsmu.com.br/pdf/apostila_10_gub.pdf" target="_blank"><img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/pdf/pdf.png" style="width: 25px; height: 32px; margin: 4px; float: left;" /></a>Apostila 10&ordm; Gub.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n<h1 class="tituloInterno">\r\n	JURAMENTO DO ALUNO</h1>\r\n<p>\r\n	<strong>Eu prometo:</strong></p>\r\n<p>\r\n	1)&nbsp;&nbsp;&nbsp; Observar as regras do Tae-kwon-do;<br />\r\n	2)&nbsp;&nbsp;&nbsp; Respeitar o Instrutor e meus Superiores;<br />\r\n	3)&nbsp;&nbsp;&nbsp; Nunca fazer mau uso do Tae-kwon-do;<br />\r\n	4)&nbsp;&nbsp;&nbsp; Construir um mundo mais pac&iacute;fico;<br />\r\n	5)&nbsp;&nbsp;&nbsp; Ser campe&atilde;o da Liberdade e da Justi&ccedil;a.</p>\r\n<h1 class="tituloInterno">\r\n	JURAMENTO DO DOJAN (SMU)</h1>\r\n<p>\r\n	Eu tenho:</p>\r\n<p>\r\n	1) Determina&ccedil;&atilde;o;<br />\r\n	2) Dedica&ccedil;&atilde;o;<br />\r\n	3) Coragem;<br />\r\n	4) For&ccedil;a;<br />\r\n	5) F&eacute;.<br />\r\n	&nbsp;</p>\r\n<h2>\r\n	DIVIS&Otilde;ES DO CORPO</h2>\r\n<p>\r\n	<br />\r\n	O TAEKWONDO &eacute; uma luta solta em que n&atilde;o se agarra o advers&aacute;rio para ataque ou defesa. O corpo humano possui muitos pontos vitais (Kubso) que podem ser atingidos pelos golpes de chutes e socos. &Eacute; muito dif&iacute;cil citar cada nome de ponto vital, por isso, dividimos o corpo humano em tr&ecirc;s partes para simplificar o ensino ou dar melhor as instru&ccedil;&otilde;es t&eacute;cnicas durante o combate. Elas s&atilde;o:</p>\r\n<p>\r\n	<br />\r\n	<strong>1) OLGUL:</strong> acima do pesco&ccedil;o, especificando melhor, centro do maxilar superior.</p>\r\n<p>\r\n	<strong>2) MONTON:</strong> regi&atilde;o entre o ombro e o umbigo ou no plexo solar.</p>\r\n<p>\r\n	<strong>3) ARE:</strong> abaixo do umbigo ou na regi&atilde;o genital.<br />\r\n	&nbsp;</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/divisoesdocorpo.jpg" style="width: 615px; height: 483px;" /></div>\r\n<h2>\r\n	BASE : SAGUI</h2>\r\n<p>\r\n	1) <strong>MOA SAGU</strong>I: p&eacute;s juntos;</p>\r\n<p>\r\n	2) <strong>NARANI SAGU</strong>I: p&eacute;s paralelos, abertura lateral na largura de 1 p&eacute;;</p>\r\n<p>\r\n	3) <strong>JUNTCHUM SAGUI</strong>: p&eacute;s paralelos, abertura lateral na largura de 2 p&eacute;s, joelhos flexionados;</p>\r\n<p>\r\n	4) <strong>AP SAGUI</strong>: base frontal, comprimento de um passo normal;</p>\r\n<p>\r\n	5) <strong>AP KUBI</strong>: base frontal, comprimento de 2 passos, joelho da frente flexionado;</p>\r\n<p>\r\n	6) <strong>DUIT KUBI</strong>: base de lado, comprimento de 1 passo, o p&eacute; da frente forma um &acirc;ngulo de 90o com o calcanhar do p&eacute; de tr&aacute;s;</p>\r\n<p>\r\n	7) <strong>PYONI SAGUI</strong>: base a vontade, semelhante ao Narani Sagui, por&eacute;m a ponta dos p&eacute;s ficam convertidos para fora em um &acirc;ngulo de 22,5&ordm; .</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/base_sagui.jpg" style="width: 615px; height: 278px; margin-top: 10px; margin-bottom: 10px;" /></div>\r\n<h2>\r\n	POSI&Ccedil;&Otilde;ES INICIAIS: JUMBI</h2>\r\n<p>\r\n	1) <strong>TCHARIOT, JUMBI</strong>: posi&ccedil;&atilde;o inicial;</p>\r\n<p>\r\n	2) <strong>TCHARIOT, NARANI ARE RETCHIO MAKI, JUMBI:</strong> na base Narani Sagui, cruza os bra&ccedil;os na altura do peito e abre os mesmos para baixo, punhos fechados;</p>\r\n<p>\r\n	3) <strong>TCHARIOT, AP KUBI ARE RETCHIO MAKI, JUMBI OU BAL TCHAGUI, JUMBI:</strong> preparar para t&eacute;cnica de chutes; idem item anterior, por&eacute;m na base Ap Kubi;</p>\r\n<p>\r\n	4) <strong>TCHARIOT, KYORUGUI, JUMBI:</strong> preparar para luta, posi&ccedil;&atilde;o de luta.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	POSI&Ccedil;&Otilde;ES B&Aacute;SICAS DE ATAQUE (KON KIOK) E DE DEFESA (MAKI): KIBON DONJAK</h2>\r\n<p>\r\n	<strong>OBS: </strong>Trabalhar as bases &ldquo;Ap Kubi&rdquo; e &ldquo;Ap Sagui&rdquo;.</p>\r\n<p>\r\n	<strong>ORUN: </strong>direito.</p>\r\n<p>\r\n	<strong>UEN: </strong>esquerdo.</p>\r\n<p>\r\n	<strong>BAND&Ecirc;: </strong>mesmo bra&ccedil;o, mesma perna.</p>\r\n<p>\r\n	<strong>BARO: </strong>bra&ccedil;o contr&aacute;rio da perna.</p>\r\n<p>\r\n	<strong>ARE: </strong>regi&atilde;o abaixo da cintura.</p>\r\n<p>\r\n	<strong>MONTONG: </strong>regi&atilde;o entre a cintura e ombros.</p>\r\n<p>\r\n	<strong>OLGUL: </strong>regi&atilde;o acima do pesco&ccedil;o.</p>\r\n<p>\r\n	<strong>BAKAT PALMOK: </strong>lado externo do antebra&ccedil;o.</p>\r\n<p>\r\n	<strong>1) ARE MAKI: </strong>defesa abaixo da cintura;</p>\r\n<p>\r\n	<strong>2) OLGUL MAKI: </strong>defesa acima da cabe&ccedil;a;</p>\r\n<p>\r\n	<strong>3) MONTONG MAKI: </strong>defesa no meio do corpo, de fora para dentro;</p>\r\n<p>\r\n	<strong>4) OLGUL BAKAT MAKI: </strong>defesa no rosto, de dentro para fora;</p>\r\n<p>\r\n	<strong>5) MONTONG BAKAT MAKI: </strong>defesa no meio, de dentro para fora;</p>\r\n<p>\r\n	<strong>6) MONTONG RETCHIO MAKI: </strong>defesa no meio, cruza os punhos no peito e abre os bra&ccedil;os at&eacute; a dist&acirc;ncia dos ombros;</p>\r\n<p>\r\n	<strong>7) ARE RETCHIO MAKI: </strong>defesa abaixo da faixa, cruza os punhos no peito e abre os bra&ccedil;os 45 graus lateralmente;</p>\r\n<p>\r\n	<strong>8) OLGUL RETCHIO MAKI: </strong>defesa na altura do rosto, cruza os punhos no peito e abre os bra&ccedil;os at&eacute; a dist&acirc;ncia dos ombros;</p>\r\n<p>\r\n	<strong><em><u>AN PALMOK: </u></em></strong><em><u>lado interno do antebra&ccedil;o</u></em></p>\r\n<p>\r\n	<strong>9) AN PALMOK MONTONG BAKAT MAKI: </strong>defesa no meio, de dentro para fora (Monton Maki)<strong>;</strong></p>\r\n<p>\r\n	<strong>10) AN PALMOK OLGUL BAkAT MAKI: </strong>defesa no rosto, de dentro para fora (Olgul Maki);</p>\r\n<p>\r\n	<strong>11) AN PALMOK MONTONG RETCHIO MAKI: </strong>defesa no meio, cruza os punhos no peito e abre os bra&ccedil;os at&eacute; a dist&acirc;ncia dos ombros;</p>\r\n<p>\r\n	<strong><em><u>RAN SONNAL: </u></em></strong><em><u>faca da m&atilde;o</u></em></p>\r\n<p>\r\n	<strong>12) RAN SONNAL ARE MAKI:</strong>defesa com a faca da m&atilde;o abaixo da cintura;</p>\r\n<p>\r\n	<strong>13) RAN SONNAL OLGUL MAKI: </strong>defesa com a faca da m&atilde;o acima da cabe&ccedil;a;</p>\r\n<p>\r\n	<strong>14) RAN SONNAL MONTONG MAKI: </strong>defesa com a faca da m&atilde;o no meio do corpo de for a para dentro;</p>\r\n<p>\r\n	<strong>15) RAN SONNAL OLGUL BAKAT MAKI: </strong>defesa com a faca da m&atilde;o na altura do rosto, de dentro para fora;</p>\r\n<p>\r\n	<strong>16) RAN SONNAL MONTONG BAKAT MAKI: </strong>defesa com a faca da m&atilde;o altura do plexo, de dentro para fora;</p>\r\n<p>\r\n	<strong><em><u>JUMOK: </u></em></strong><em><u>punho fechado.</u></em></p>\r\n<p>\r\n	<strong>17) JUMOK MONTON BAND&Ecirc; DIRIGUI: </strong>socar na altura do plexo; mesmo bra&ccedil;o, mesma perna;</p>\r\n<p>\r\n	<strong>18) JUMOK OLGUL BAND&Ecirc; DIRIGUI: </strong>socar na altura do rosto; mesmo bra&ccedil;o, mesma perna;</p>\r\n<p>\r\n	<strong>19) JUMOK ARE BAND&Ecirc; DIRIGUI: </strong>socar abaixo da cintura; mesmo bra&ccedil;o, mesma perna;</p>\r\n<p>\r\n	<strong>20) JUMOK NERIO BAND&Ecirc; DIRIGUI: </strong>socar para baixo; mesmo bra&ccedil;o, mesma perna.</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="" id="cxfotonot" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/kibondondjak_10gub.jpg" style="width: 608px; height: 456px;" /></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<h2>\r\n	T&Eacute;CNICA DE P&Eacute;S: BAL KI SUL</h2>\r\n<p>\r\n	1) <strong>AP TCHA OLIGUI</strong>: levantar a perna esticada para frente, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="AP TCHA OLIGUI" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/aptchaoligui.jpg" style="width: 357px; height: 250px;" /></div>\r\n<p>\r\n	&nbsp;2) <strong>YOP TCHA OLIGUI</strong>: levantar a perna esticada lateralmente, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="yop tcha oligui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/yop_tcha_oligui.jpg" style="width: 433px; height: 250px;" /></div>\r\n<p>\r\n	&nbsp;3) <strong>AP TCHAGUI</strong>: chute frontal, flexionando a perna, utilizando a parte da sola do p&eacute;, pr&oacute;xima dos dedos (AP TCHUNK) ou a ponta dos <u>dedos</u> (BAL KUT), ou o peito do p&eacute; (BAL DUNG), veja a figura abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="ap tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/aptchagui1.jpg" style="width: 615px; height: 319px;" /></div>\r\n<p>\r\n	&nbsp;4) <strong>YOP TCHAGUI</strong>: chute lateral com o calcanhar ou faca do p&eacute;, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="yop tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/yoptchagui1.jpg" style="width: 615px; height: 233px;" /></div>\r\n<p>\r\n	5) <strong>BANDAL TCHAGUI OU AP DOLIO TCHAGUI</strong>: chute em diagonal para dentro com a perna da frente, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="bandal tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/bandaltchagui1.jpg" style="width: 615px; height: 299px;" /></div>\r\n<p>\r\n	&nbsp;6) <strong>AN TCHAGUI</strong>: chute de fora para dentro, com a perna de tr&aacute;s e com a borda interna do p&eacute;, utilizando a parte interna do p&eacute;, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="an tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/antchagui.jpg" style="width: 560px; height: 274px;" /></div>\r\n<p>\r\n	&nbsp;7) <strong>BAkAT TCHAGUI</strong>: chute de dentro para fora, com a perna de tr&aacute;s, levantar a perna esticada com movimento circular, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="bakat tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/bakta_tchagui.jpg" style="width: 607px; height: 332px;" /></div>\r\n<p>\r\n	8) <strong>DOLIO TCHAGUI</strong>: chute circular, com a perna de tr&aacute;s, flexionando a perna, executando o chute em volta (corpo de lado), veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="dolio tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/doliotchagui.jpg" style="width: 615px; height: 208px;" /></div>\r\n<p>\r\n	9) <strong>MIR&Ocirc; TCHAGUI</strong>: chute empurrando, com a perna de tr&aacute;s, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="miro tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/mirotchagui.jpg" style="width: 615px; height: 236px;" /></div>\r\n<p>\r\n	10) <strong>NERIO TCHAGUI</strong>: chute descendo, veja abaixo:</p>\r\n<div id="cxfotoInterna">\r\n	<img alt="nerio tchagui" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/neiotchagui.jpg" style="width: 615px; height: 311px;" /></div>\r\n<h1>\r\n	&nbsp;POOMSES</h1>\r\n<h2>\r\n	SAJU AP TCHAGUI</h2>\r\n<p>\r\n	Posi&ccedil;&atilde;o Inicial Jumbi (Narani Sagui).</p>\r\n<p>\r\n	Obs: Levantar as m&atilde;os fechadas at&eacute; a altura da base do queixo e continuar com as m&atilde;os fechadas nessa posi&ccedil;&atilde;o at&eacute; o comando Final (Kuman, que significa cessar). Durante o Poomse, os chutes come&ccedil;ar&atilde;o com o p&eacute; esquerdo e depois direito, ser&atilde;o executados r&aacute;pidos e com um comando apenas.</p>\r\n<p>\r\n	1&ordf; SEQUENCIA - AP TCHAGUI no mesmo lugar chutar com o p&eacute; esquerdo, e depois com o direito, na altura do plexo (MONTONG).</p>\r\n<p>\r\n	2&ordf; SEQUENCIA &ndash; virar para o lado direito e chutar o AP TCHAGUI com o p&eacute; esquerdo, depois o direito na altura do plexo.</p>\r\n<p>\r\n	3&ordf; SEQUENCIA - virar para o lado direito e chutar o AP TCHAGUI com o p&eacute; esquerdo, depois o direito na altura do plexo.</p>\r\n<p>\r\n	4&ordf; SEQUENCIA - virar para o lado direito e chutar o AP TCHAGUI com o p&eacute; esquerdo, depois o direito na altura do plexo.</p>\r\n<p>\r\n	5&ordf; SEQUENCIA - virar para o lado direito e chutar o AP TCHAGUI com o p&eacute; esquerdo, depois o direito com KIHAP (grito, usando a for&ccedil;a do ventre) na altura do plexo.</p>\r\n<p>\r\n	Aguardar o comando de cessar (KUMAN), as m&atilde;os voltam para a posi&ccedil;&atilde;o de JUMBI (Narani sagui).</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	SAJU TIRIGUI</h2>\r\n<p>\r\n	Posi&ccedil;&atilde;o Inicial: JUMBI (Narani sagui)</p>\r\n<p>\r\n	ORUM AP KUBI ARE MAKI &ndash; recuar o p&eacute; esquerdo<br />\r\n	UEN AP KUBI MONTONG TIRIGUI &ndash; avan&ccedil;ar com o p&eacute; esquerdo</p>\r\n<p>\r\n	Virar para o lado direito<br />\r\n	ORUM AP KUBI ARE MAKI<br />\r\n	UEN AP KUBI MONTONG TIRIGUI</p>\r\n<p>\r\n	Virar para o lado direito<br />\r\n	ORUM AP KUBI ARE MAKI<br />\r\n	UEN AP KUBI MONTONG TIRIGUI</p>\r\n<p>\r\n	Virar para o lado direito<br />\r\n	ORUM AP KUBI ARE MAKI<br />\r\n	UEN AP KUBI MONTONG TIRIGUI</p>\r\n<p>\r\n	Virar para o lado direito<br />\r\n	ORUM AP KUBI ARE MAKI<br />\r\n	UEN AP KUBI MONTONG TIRIGUI</p>\r\n<p>\r\n	<em>ORUM AP KUBI ARE MAKI<br />\r\n	</em><em>UEN AP KUBI MONTONG TIRIGUI<br />\r\n	</em><em>ORUM AP KUBI ARE MAKI &ndash; com KIHAP</em></p>\r\n<p>\r\n	Virar para o lado esquerdo<br />\r\n	UEN AP KUBI MONTONG TIRIGUI<br />\r\n	ORUM AP KUBI ARE MAKI</p>\r\n<p>\r\n	Virar para o lado esquerdo<br />\r\n	UEN AP KUBI MONTONG TIRIGUI<br />\r\n	ORUM AP KUBI ARE MAKI</p>\r\n<p>\r\n	Virar para o lado esquerdo<br />\r\n	UEN AP KUBI MONTONG TIRIGUI<br />\r\n	ORUM AP KUBI ARE MAKI</p>\r\n<p>\r\n	Virar para o lado esquerdo<br />\r\n	UEN AP KUBI MONTONG TIRIGUI<br />\r\n	ORUM AP KUBI ARE MAKI</p>\r\n<p>\r\n	KUMAN (CESSAR), puxar o p&eacute; esquerdo. Voltar &agrave; posi&ccedil;&atilde;o inicial de JUMBI (NARANI SAGUI).</p>\r\n<p>\r\n	&nbsp;</p>\r\n<h1>\r\n	CONHECIMENTOS GERAIS</h1>\r\n<p>\r\n	1)&nbsp;&nbsp;&nbsp; O que &eacute; Taekwondo?</p>\r\n<p style="margin-left:21.3pt;">\r\n	<em>Resp. &ndash; Arte de ataque e defesa com os p&eacute;s e os punhos</em></p>\r\n<p>\r\n	2)&nbsp;&nbsp;&nbsp; Onde Surgiu? Quando?</p>\r\n<p style="margin-left:21.3pt;">\r\n	<em>Resp. &ndash; Na Cor&eacute;ia, em Sarobol de Silla. Surgiu aproximadamente h&aacute; 1300 anos (ano 670 D.C.), o que pode ser comprovado atrav&eacute;s de documentos escritos (pergaminhos). No entanto estudos a respeito de gravuras encontradas nas paredes de antigos t&uacute;mulos e cavernas, afirmam datar o TAEKWONDO de cerca de 2000 anos atr&aacute;s.</em></p>\r\n<p>\r\n	3) Qual o antigo nome do TAEKWONDO?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. - TAEKYON (Significa: chuta pulando).</em></p>\r\n<p>\r\n	4) Quem mudou o nome de TAEKYON para TAEKWONDO? Quando?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; General CHOI HONG HI, em 1955.</em></p>\r\n<p>\r\n	5) Quais s&atilde;o as duas organiza&ccedil;&otilde;es que dirigem o TAEKWONDO no mundo?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; WORLD TAEKWONDO FEDERATION (WTF)</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; INTERNATIONAL TAEKWONDO FEDERATION (ITF)</em></p>\r\n<p>\r\n	6) Quem &eacute; o presidente da WTF? Onde se localiza?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; Dr. UM YONG KIM &ndash; 10&ordm; Dan, se localiza em Seul, na Cor&eacute;ia do Sul</em></p>\r\n<p>\r\n	7) Quem &eacute; o presidente da ITF? Onde se localiza?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; General CHOI HONG HI, 9&ordm; Dan (Gradua&ccedil;&atilde;o M&aacute;xima no estilo ITF). Localiza-se na &Aacute;ustria, localizava-se anteriormente no Canad&aacute;.</em></p>\r\n<p>\r\n	8) O que &eacute; KUK KI WON?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; &Eacute; o nome da sede do WORLD TAEKWONDO FEDERATION. Tamb&eacute;m &eacute; o nome do estilo WTF. OBS: O Estilo ITF denomina-se CHANG HUN.</em></p>\r\n<p>\r\n	9) O que &eacute; HWA-RANG DO? (l&ecirc;-se RA-RAN D&Ocirc;)</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; Foi um grupo de guerreiros que realizou sob o comando do general KIM YU SHIN (considerado o fundador do TAEKWONDO), &aacute;rduo treinamento f&iacute;sico e espiritual com o objetivo de unificar a Cor&eacute;ia.</em></p>\r\n<p>\r\n	10) Quem trouxe o TAEKWONDO para o brasil? Onde e quando?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; Mestre SANG MIN CHO &ndash; 8&ordm; Dan trouxe para a academia Liberdade, em S&atilde;o Paulo, em julho de 1970.</em></p>\r\n<p>\r\n	11) Quem trouxe o TAEKWONDO para o Rio de Janeiro? Quando e para onde?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; Mestre WOO JAE LEE &ndash; 8&ordm; Dan, trouxe para a escola Americana, em mar&ccedil;o de 1972.</em></p>\r\n<p>\r\n	12) Qual &eacute; o espirito (princ&iacute;pio) do Taekwondo?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; 1) Cortesia</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 2) Integridade</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 3) Perseveran&ccedil;a</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 4) Auto Controle</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 5) Esp&iacute;rito Indom&aacute;vel</em></p>\r\n<p>\r\n	13) Qual &eacute; o Esp&iacute;rito do HWA RANG DO? ( ou C&oacute;digo de Honra)</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; 1) Obedi&ecirc;ncia ao Rei</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 2) Respeito aos pais</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 3) Lealdade para com os amigos</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 4) Nunca recuar ante o Inimigo</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 5) S&oacute; matar quando n&atilde;o houver alternativa</em></p>\r\n<p>\r\n	14) Qual o juramento do TAEKWONDO?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; 1) Eu Prometo Observar as regras do TAEKWOND</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 2) Respeitar meus Instrutor e superiores</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 3) Nunca fazer maus uso do TAEKWONDO</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 4) Construir um mundo mais pac&iacute;fico</em></p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 5) Ser campe&atilde;o da liberdade e justi&ccedil;a</em></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	15) Qual o nome do seu mestre?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; Mestre Antonio Alves, Faixa Preta 6&ordm; Dan de Taekwondo.</em></p>\r\n<p>\r\n	16) Qual o nome do seu Gr&atilde;o Mestre?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. &ndash; Mestre ___________________________ Faixa Preta ____Dan de Taekwondo.</em></p>\r\n<p>\r\n	17) Quais as diferen&ccedil;as entre TAEKWONDO e KARAT&Ecirc;?</p>\r\n<p style="margin-left:35.4pt;">\r\n	<em>Resp. </em></p>\r\n<p style="margin-left:71.4pt;">\r\n	<em>a)&nbsp;&nbsp;&nbsp; </em><em>Origens: Taekwondo &eacute; coreano e Karat&ecirc; japon&ecirc;s.</em></p>\r\n<p style="margin-left:71.4pt;">\r\n	<em>b)&nbsp;&nbsp;&nbsp; </em><em>Regulamentos: Taekwondo &eacute; dirigido pela WORLD TAEKWONDO FEDERATION e INTERNATIONAL TAEKWONDO FEDERATION.</em></p>\r\n<p style="margin-left:71.4pt;">\r\n	<em>c)&nbsp;&nbsp;&nbsp; </em><em>Ordem de faixas e nomenclaturas: Taekwondo usa nomes coreanos, Karat&ecirc; usa nomes japonoses.</em></p>\r\n', '2013-11-23', 'TAEKWONDO', 'GRADUA&Ccedil;&Atilde;O', 'P&uacute;blico', 'c9a4955c2ac10febad678c57504f729b.jpg', 0, '&quot;Inicio-Pureza&quot; &Eacute; o in&iacute;cio de uma jornada e &eacute; comparada com as primeiras horas do dia. Com tempo o praticante ir&aacute; crescendo e dar&aacute; os seus primeiros passos na escola das artes marciais', '2013-11-23', '10o-gub-faixa-branca', '', 'Pontes Junior', 'publicar', 'taekwondo', 'graduacao', '10, gub, faixa branca, taekwondo, smu, sistema marcial urbano, marica, academia'),
(36, 'VOCABUL&Aacute;RIO', '<table border="1" cellpadding="0" cellspacing="0" class="tabela" style="width: 610px;">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				TCHARIOT</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Posi&ccedil;&atilde;o de sentido</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				KIUNNE</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Fazer sauda&ccedil;&atilde;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				JUMBI</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Preparar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				KUKI IUKEDAIO KIUNNE</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sauda&ccedil;&atilde;o &agrave;s Bandeiras</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				PAR&Ocirc;</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sentido e cessar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				KWANJANIM KIUNNE</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sauda&ccedil;&atilde;o ao gr&atilde;o Mestre (acima de 6&ordm; Dan)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				SABOMINIM KIUNNE</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sauda&ccedil;&atilde;o aos mestres (4&ordm; e 6&ordm; Dan)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				KYOSANIM KIUNNE</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sauda&ccedil;&atilde;o aos professores (1&ordm; ao 3&ordm; Dan)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				JOKIONIM KIUNNE</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sauda&ccedil;&atilde;o aos instrutores (1&ordm; Gub)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				ANDJA</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Sentar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				IROSO</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Levantar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				TIRO TORA</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Meia volta</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				SHI&Ocirc;</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Descansar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				MORUB KUR&Ocirc;</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Ajoelhar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				SHIJA</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Come&ccedil;ar</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				KUMAN</td>\r\n			<td style="width: 234px; border-color: rgb(255, 255, 255);">\r\n				Cessar</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2013-11-23', 'TAEKWONDO', 'VOCABUL&Aacute;RIO', 'P&uacute;blico', 'fe94379f7a08056f4052f220053b539e.jpg', 0, 'O vocabul&aacute;rio &eacute; muito importante para os alunos, para o conhecimento das t&eacute;cnicas empregadas dentro do dojan', '2013-11-23', 'vocabulario', '', 'Pontes Junior', 'publicar', 'taekwondo', 'vocabulario', 'vocabulario, taekwondo, iron, conhecimento, smu, marica, rio de janeiro, academia, sistema marcial urbano'),
(39, '2013 WTF World Cup Team Championships - ao vivo', '<div id="cxfotonot">\r\n	<a href="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/1467330_698241606866943_1220072274_n.jpg" id="imagembox"><img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/1467330_698241606866943_1220072274_n.jpg" style="width: 615px; height: 293px;" /></a></div>\r\n<p>\r\n	Acontecendo agora a copa do mundo de Taekwondo por equipe &nbsp;em na Costa do Marfim, &agrave;s 15:30h ao vivo Brasil x Costa do Marfim, o Brasil j&aacute; venceu a Nig&eacute;ria por 10x9.</p>\r\n<p>\r\n	Vamos nessa torcida segue o link para ver ao vivo</p>\r\n<p>\r\n	<a href="https://www.youtube.com/watch?v=e7r1wWyIQDA" target="_blank">https://www.youtube.com/watch?v=e7r1wWyIQDA</a></p>\r\n', '2013-11-29', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '1c28a32a563ffbd1869217b67569976b.jpg', 0, 'Acontecendo agora a copa do mundo de Taekwondo por equipe  em na costa do marfim', '2013-11-29', '2013-wtf-world-cup-team-championships-ao-vivo', '', 'Pontes Junior', 'publicar', 'noticias', '', 'wtf, team, championships, smu, taekwondo, 2013, world cup, copa do mundo'),
(40, 'WTF - WORLD TAEKWONDO GRANP PRIX 2013', '<div id="cxfotonot">\r\n	<p>\r\n		<a href="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/copy-taekwondobanner-1-1.jpg" id="imagembox"><img alt="" src="http://www.academiatkdsmu.com.br/fotos/images/taekwondo/copy-taekwondobanner-1-1.jpg" style="width: 615px; height: 178px;" /><br />\r\n		</a></p>\r\n</div>\r\n<p>\r\n	Acompanhe WTF - WORLD TAEKWONDO GRANP PRIX 2013 AO VIVO</p>\r\n<div id="cxfotonot">\r\n	<iframe allowfullscreen="" frameborder="0" height="315" src="//www.youtube.com/embed/VMo7eEuia7o" width="560"></iframe></div>\r\n<p>\r\n	<br />\r\n	&nbsp;</p>\r\n<div id="cxfotonot">\r\n	<iframe allowfullscreen="" frameborder="0" height="315" src="//www.youtube.com/embed/XLsI9WoeMLU" width="560"></iframe></div>\r\n<p>\r\n	<br />\r\n	&nbsp;</p>\r\n<div id="cxfotonot">\r\n	<iframe allowfullscreen="" frameborder="0" height="315" src="//www.youtube.com/embed/LNTGaTJrVbs" width="560"></iframe></div>\r\n<p>\r\n	<br />\r\n	&nbsp;</p>\r\n<div id="cxfotonot">\r\n	<iframe allowfullscreen="" frameborder="0" height="315" src="//www.youtube.com/embed/vhwTn9CfZmQ" width="560"></iframe></div>\r\n', '2013-12-13', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '106d71cb80a2df8eee394c5041e789ef.jpg', 0, 'Acompanhe WTF - WORLD TAEKWONDO GRANP PRIX 2013 AO VIVO', '2013-12-13', 'wtf-world-taekwondo-granp-prix-2013', '', 'Pontes Junior', 'publicar', 'noticias', '', 'wtf, taekwondo, grand prix, 2013'),
(41, '9&ordm; TORNEIO INTERNACIONAL DE PARIS DE TAEKWONDO', '<iframe width="560" height="340" src="http://cdn.livestream.com/embed/wtftaekwondotv?layout=4&amp;height=340&amp;width=560&amp;autoplay=false" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe><div style="font-size: 11px;padding-top:10px;text-align:center;width:560px">Watch <a href="http://www.livestream.com/?utm_source=lsplayer&amp;utm_medium=embed&amp;utm_campaign=footerlinks" title="live streaming video">live streaming video</a> from <a href="http://www.livestream.com/wtftaekwondotv?utm_source=lsplayer&amp;utm_medium=embed&amp;utm_campaign=footerlinks" title="Watch wtftaekwondotv at livestream.com">wtftaekwondotv</a> at livestream.com</div>', '2013-12-21', 'NOT&Iacute;CIAS', '', 'P&uacute;blico', '4c35c8a73eb516ff67db878474ae6459.jpg', 0, 'Voc&ecirc; pode assistir o Aberto da Fran&ccedil;a em transmiss&atilde;o ao vivo nos dias 21 e 22 de dezembro', '2013-12-21', '9o-torneio-internacional-de-paris-de-taekwondo', '', 'Pontes Junior', 'publicar', 'noticias', '', 'wtf, taekwondo, torneio, paris, livestream');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url_seo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `datacad` date NOT NULL,
  `lead` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url_categoria` varchar(150) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `metas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Fazendo dump de dados para tabela `videos`
--

INSERT INTO `videos` (`id`, `video`, `titulo`, `url_seo`, `texto`, `datacad`, `lead`, `status`, `tipo`, `categoria`, `url_categoria`, `foto`, `metas`) VALUES
(1, '<iframe width="310" height="233" src="http://www.youtube.com/embed/GDk2Wn_WqUM" frameborder="0" allowfullscreen></iframe>', 'Bast&atilde;o Curto', '', '', '2013-06-22', 'Mestre Ant&ocirc;nio Alves manuseando o bast&atilde;o curto', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(2, '<iframe width="310" height="233" src="http://www.youtube.com/embed/PuDHatf3H8Q" frameborder="0" allowfullscreen></iframe>', 'Rolamento de Hapkido', '', '', '2013-06-22', 'Mestre Antonio demonstrando um rolamento', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(3, '<iframe width="310" height="233" src="http://www.youtube.com/embed/44k70COOA6Q" frameborder="0" allowfullscreen></iframe>', 'Queda Lateral', '', '', '2013-06-22', 'Mestre Antonio demonstrando queda lateral', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(4, '<iframe width="310" height="233" src="http://www.youtube.com/embed/1QIpLN_ffMw" frameborder="0" allowfullscreen></iframe>', 'Queda Frontal', '', '', '2013-06-23', 'Mestre Antonio demonstrando uma queda frontal', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(5, '<iframe width="310" height="233" src="http://www.youtube.com/embed/7TZ8sWOxhKc" frameborder="0" allowfullscreen></iframe>', 'Queda Lateral', '', '', '2013-06-23', 'Mestre Antonio demonstrando uma queda lateral', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(6, '<iframe width="310" height="233" src="http://www.youtube.com/embed/-F2YVx-7GlE" frameborder="0" allowfullscreen></iframe>', 'Rolamento de Costas', '', '', '2013-06-23', 'Mestre Antonio Alves SMU demonstrando rolamento de costas', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(7, '<iframe width="310" height="233" src="http://www.youtube.com/embed/bMIwBbhJVQ4" frameborder="0" allowfullscreen></iframe>', 'Queda com Rolamento de Costas', '', '', '2013-06-23', 'Mestre Antonio Alves SMU demonstrando queda com rolamento de costas', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(8, '<iframe width="310" height="233" src="http://www.youtube.com/embed/aInxkMSHxHE" frameborder="0" allowfullscreen></iframe>', 'Rolamento  lateral em p&eacute;', '', '', '2013-06-23', 'Mestre Antonio Alves SMU demonstrando rolamento lateral em p&eacute;', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(9, '<iframe width="310" height="233" src="http://www.youtube.com/embed/sPjx8NBIGmY" frameborder="0" allowfullscreen></iframe>', 'Rolamento Lateral Invertido em p&eacute;', '', '', '2013-06-23', 'Mestre Antonio Alves SMU - Rolamento Lateral Invertido em p&eacute;', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(10, '<iframe width="310" height="233" src="http://www.youtube.com/embed/gmG1veD6dlc" frameborder="0" allowfullscreen></iframe>', 'Demonstra&ccedil;&atilde;o com dois I YON BOM', '', '', '2013-06-23', 'Mestre Antonio Alves SMU demonstrando suas habiliades com dois I YON BOM', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(11, '<iframe width="310" height="233" src="http://www.youtube.com/embed/3OK6LpAcgfo" frameborder="0" allowfullscreen></iframe>', 'Demonstra&ccedil;&atilde;o com bast&atilde;o longo', '', '', '2013-06-23', 'Mestre Antonio Alves SMU demonstra sua habilidade com bast&atilde;o longo', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(12, '<iframe width="310" height="233" src="//www.youtube.com/embed/0QlCPjvTcSk" frameborder="0" allowfullscreen></iframe>', 'Demonstra&ccedil;&atilde;o com bast&atilde;o curto', '', '', '2013-06-28', 'Mestre Antonio Alves demostrando o uso com bast&atilde;o curto', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(13, '<iframe width="310" height="233" src="//www.youtube.com/embed/Pdpu5un0EzY" frameborder="0" allowfullscreen></iframe>', 'Demonstra&ccedil;&atilde;o de I YON BOM', '', '', '2013-06-28', 'Mestre Antonio Alves demonstrando sua habilidade com I YON BOM', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(14, '<iframe width="310" height="233" src="//www.youtube.com/embed/eQm2uuuJoPg" frameborder="0" allowfullscreen></iframe>', 'Sebon Kyorugui n&deg;10', '', '', '2013-06-28', 'Mestre Antonio Alves e Professor Rafael, demonstram a execu&ccedil;&atilde;o do sebon kyorugui n&deg;10', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(15, '<iframe width="310" height="233" src="//www.youtube.com/embed/seVlmYa-0A0" frameborder="0" allowfullscreen></iframe>', 'Sebon Kyorugui n&deg; 09', '', '', '2013-06-28', 'Mestre Antonio Avles e Professor Rafael , demonstram o sebon n&deg; 09', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(16, '<iframe width="310" height="233" src="//www.youtube.com/embed/x3VPcY3cFBU" frameborder="0" allowfullscreen></iframe>', 'Sebon Kyorugui n&deg; 08', '', '', '2013-06-28', 'Mestre Antonio Alves e Professor Rafael, desmonstram o sebon kyorugui n&deg; 08', 'publicar', 'P&uacute;blico', 'apresenta&ccedil;&atilde;o', '', '', ''),
(17, '<iframe width="310" height="233" src="//www.youtube.com/embed/lsU-Kx2CQmI" frameborder="0" allowfullscreen></iframe>', 'Poomse Teaguk Il Jang', '', '', '2013-09-13', 'Poomse faixa amarela', 'publicar', 'P&uacute;blico', 'poomses', '', '', ''),
(18, '<iframe width="310" height="233" src="//www.youtube.com/embed/HfCsndSsnVA" frameborder="0" allowfullscreen></iframe>', 'Taeguk I Jang', '', '', '2013-09-13', 'Poomse Faixa Amarela Ponta Verde', 'publicar', 'Público', 'poomses', '', '', ''),
(19, '<iframe width="310" height="233" src="//www.youtube.com/embed/v8W-rsBiS5s" frameborder="0" allowfullscreen></iframe>\r\n', 'Poomse Sam Jang', 'poomse-sam-jang', '', '2013-09-13', 'Poomse da Faixa Verde', 'publicar', 'P&uacute;blico', 'POOMSES', 'poomses', 'd01e8dbd2dbc27e1954f8d4136638dc2.jpg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
