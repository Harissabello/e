-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 01 juin 2023 à 02:23
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `learning`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenants`
--

CREATE TABLE `apprenants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenants`
--

INSERT INTO `apprenants` (`id`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(1, 'jolie', 'jolie', 'jolie@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `titreClasse` varchar(255) NOT NULL,
  `descriptionCours` text NOT NULL,
  `nombreEleves` varchar(11) NOT NULL,
  `Montant` varchar(255) NOT NULL,
  `dateDebut` varchar(255) NOT NULL,
  `dateFin` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `id_formateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `titreClasse`, `descriptionCours`, `nombreEleves`, `Montant`, `dateDebut`, `dateFin`, `images`, `id_formateur`) VALUES
(2, 'Formation en 3D', 'Ceci est une formation en 3D', '30', '50000', '2023-05-12', '2023-06-15', 'images/1684768138.jpeg', 1),
(3, 'Formation complète Photoshop', 'C\'est une très bonne formation en photoshop', '15', '10.000', '2023-06-11', '2023-06-20', 'images/1684773114.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE `correction` (
  `id` int(11) NOT NULL,
  `iddevoir` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `answer` text NOT NULL,
  `attach` text NOT NULL,
  `lien` text NOT NULL,
  `datepost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) UNSIGNED NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `latitude`, `longitude`) VALUES
(1, 'AD', 'Andorra', '42.54624500', '1.60155400'),
(2, 'AE', 'United Arab Emirates', '23.42407600', '53.84781800'),
(3, 'AF', 'Afghanistan', '33.93911000', '67.70995300'),
(4, 'AG', 'Antigua and Barbuda', '17.06081600', '-61.79642800'),
(5, 'AI', 'Anguilla', '18.22055400', '-63.06861500'),
(6, 'AL', 'Albania', '41.15333200', '20.16833100'),
(7, 'AM', 'Armenia', '40.06909900', '45.03818900'),
(8, 'AN', 'Netherlands Antilles', '12.22607900', '-69.06008700'),
(9, 'AO', 'Angola', '-11.20269200', '17.87388700'),
(10, 'AQ', 'Antarctica', '-75.25097300', '-0.07138900'),
(11, 'AR', 'Argentina', '-38.41609700', '-63.61667200'),
(12, 'AS', 'American Samoa', '-14.27097200', '-170.13221700'),
(13, 'AT', 'Austria', '47.51623100', '14.55007200'),
(14, 'AU', 'Australia', '-25.27439800', '133.77513600'),
(15, 'AW', 'Aruba', '12.52111000', '-69.96833800'),
(16, 'AZ', 'Azerbaijan', '40.14310500', '47.57692700'),
(17, 'BA', 'Bosnia and Herzegovina', '43.91588600', '17.67907600'),
(18, 'BB', 'Barbados', '13.19388700', '-59.54319800'),
(19, 'BD', 'Bangladesh', '23.68499400', '90.35633100'),
(20, 'BE', 'Belgium', '50.50388700', '4.46993600'),
(21, 'BF', 'Burkina Faso', '12.23833300', '-1.56159300'),
(22, 'BG', 'Bulgaria', '42.73388300', '25.48583000'),
(23, 'BH', 'Bahrain', '25.93041400', '50.63777200'),
(24, 'BI', 'Burundi', '-3.37305600', '29.91888600'),
(25, 'BJ', 'Benin', '9.30769000', '2.31583400'),
(26, 'BM', 'Bermuda', '32.32138400', '-64.75737000'),
(27, 'BN', 'Brunei', '4.53527700', '114.72766900'),
(28, 'BO', 'Bolivia', '-16.29015400', '-63.58865300'),
(29, 'BR', 'Brazil', '-14.23500400', '-51.92528000'),
(30, 'BS', 'Bahamas', '25.03428000', '-77.39628000'),
(31, 'BT', 'Bhutan', '27.51416200', '90.43360100'),
(32, 'BV', 'Bouvet Island', '-54.42319900', '3.41319400'),
(33, 'BW', 'Botswana', '-22.32847400', '24.68486600'),
(34, 'BY', 'Belarus', '53.70980700', '27.95338900'),
(35, 'BZ', 'Belize', '17.18987700', '-88.49765000'),
(36, 'CA', 'Canada', '56.13036600', '-106.34677100'),
(37, 'CC', 'Cocos [Keeling] Islands', '-12.16416500', '96.87095600'),
(38, 'CD', 'Congo [DRC]', '-4.03833300', '21.75866400'),
(39, 'CF', 'Central African Republic', '6.61111100', '20.93944400'),
(40, 'CG', 'Congo [Republic]', '-0.22802100', '15.82765900'),
(41, 'CH', 'Switzerland', '46.81818800', '8.22751200'),
(42, 'CI', 'Cote d\'Ivoire', '7.53998900', '-5.54708000'),
(43, 'CK', 'Cook Islands', '-21.23673600', '-159.77767100'),
(44, 'CL', 'Chile', '-35.67514700', '-71.54296900'),
(45, 'CM', 'Cameroon', '7.36972200', '12.35472200'),
(46, 'CN', 'China', '35.86166000', '104.19539700'),
(47, 'CO', 'Colombia', '4.57086800', '-74.29733300'),
(48, 'CR', 'Costa Rica', '9.74891700', '-83.75342800'),
(49, 'CU', 'Cuba', '21.52175700', '-77.78116700'),
(50, 'CV', 'Cape Verde', '16.00208200', '-24.01319700'),
(51, 'CX', 'Christmas Island', '-10.44752500', '105.69044900'),
(52, 'CY', 'Cyprus', '35.12641300', '33.42985900'),
(53, 'CZ', 'Czech Republic', '49.81749200', '15.47296200'),
(54, 'DE', 'Germany', '51.16569100', '10.45152600'),
(55, 'DJ', 'Djibouti', '11.82513800', '42.59027500'),
(56, 'DK', 'Denmark', '56.26392000', '9.50178500'),
(57, 'DM', 'Dominica', '15.41499900', '-61.37097600'),
(58, 'DO', 'Dominican Republic', '18.73569300', '-70.16265100'),
(59, 'DZ', 'Algeria', '28.03388600', '1.65962600'),
(60, 'EC', 'Ecuador', '-1.83123900', '-78.18340600'),
(61, 'EE', 'Estonia', '58.59527200', '25.01360700'),
(62, 'EG', 'Egypt', '26.82055300', '30.80249800'),
(63, 'EH', 'Western Sahara', '24.21552700', '-12.88583400'),
(64, 'ER', 'Eritrea', '15.17938400', '39.78233400'),
(65, 'ES', 'Spain', '40.46366700', '-3.74922000'),
(66, 'ET', 'Ethiopia', '9.14500000', '40.48967300'),
(67, 'FI', 'Finland', '61.92411000', '25.74815100'),
(68, 'FJ', 'Fiji', '-16.57819300', '179.41441300'),
(69, 'FK', 'Falkland Islands [Islas Malvinas]', '-51.79625300', '-59.52361300'),
(70, 'FM', 'Micronesia', '7.42555400', '150.55081200'),
(71, 'FO', 'Faroe Islands', '61.89263500', '-6.91180600'),
(72, 'FR', 'France', '46.22763800', '2.21374900'),
(73, 'GA', 'Gabon', '-0.80368900', '11.60944400'),
(74, 'GB', 'United Kingdom', '55.37805100', '-3.43597300'),
(75, 'GD', 'Grenada', '12.26277600', '-61.60417100'),
(76, 'GE', 'Georgia', '42.31540700', '43.35689200'),
(77, 'GF', 'French Guiana', '3.93388900', '-53.12578200'),
(78, 'GG', 'Guernsey', '49.46569100', '-2.58527800'),
(79, 'GH', 'Ghana', '7.94652700', '-1.02319400'),
(80, 'GI', 'Gibraltar', '36.13774100', '-5.34537400'),
(81, 'GL', 'Greenland', '71.70693600', '-42.60430300'),
(82, 'GM', 'Gambia', '13.44318200', '-15.31013900'),
(83, 'GN', 'Guinea', '9.94558700', '-9.69664500'),
(84, 'GP', 'Guadeloupe', '16.99597100', '-62.06764100'),
(85, 'GQ', 'Equatorial Guinea', '1.65080100', '10.26789500'),
(86, 'GR', 'Greece', '39.07420800', '21.82431200'),
(87, 'GS', 'South Georgia and the South Sandwich Islands', '-54.42957900', '-36.58790900'),
(88, 'GT', 'Guatemala', '15.78347100', '-90.23075900'),
(89, 'GU', 'Guam', '13.44430400', '144.79373100'),
(90, 'GW', 'Guinea-Bissau', '11.80374900', '-15.18041300'),
(91, 'GY', 'Guyana', '4.86041600', '-58.93018000'),
(92, 'GZ', 'Gaza Strip', '31.35467600', '34.30882500'),
(93, 'HK', 'Hong Kong', '22.39642800', '114.10949700'),
(94, 'HM', 'Heard Island and McDonald Islands', '-53.08181000', '73.50415800'),
(95, 'HN', 'Honduras', '15.19999900', '-86.24190500'),
(96, 'HR', 'Croatia', '45.10000000', '15.20000000'),
(97, 'HT', 'Haiti', '18.97118700', '-72.28521500'),
(98, 'HU', 'Hungary', '47.16249400', '19.50330400'),
(99, 'ID', 'Indonesia', '-0.78927500', '113.92132700'),
(100, 'IE', 'Ireland', '53.41291000', '-8.24389000'),
(101, 'IL', 'Israel', '31.04605100', '34.85161200'),
(102, 'IM', 'Isle of Man', '54.23610700', '-4.54805600'),
(103, 'IN', 'India', '20.59368400', '78.96288000'),
(104, 'IO', 'British Indian Ocean Territory', '-6.34319400', '71.87651900'),
(105, 'IQ', 'Iraq', '33.22319100', '43.67929100'),
(106, 'IR', 'Iran', '32.42790800', '53.68804600'),
(107, 'IS', 'Iceland', '64.96305100', '-19.02083500'),
(108, 'IT', 'Italy', '41.87194000', '12.56738000'),
(109, 'JE', 'Jersey', '49.21443900', '-2.13125000'),
(110, 'JM', 'Jamaica', '18.10958100', '-77.29750800'),
(111, 'JO', 'Jordan', '30.58516400', '36.23841400'),
(112, 'JP', 'Japan', '36.20482400', '138.25292400'),
(113, 'KE', 'Kenya', '-0.02355900', '37.90619300'),
(114, 'KG', 'Kyrgyzstan', '41.20438000', '74.76609800'),
(115, 'KH', 'Cambodia', '12.56567900', '104.99096300'),
(116, 'KI', 'Kiribati', '-3.37041700', '-168.73403900'),
(117, 'KM', 'Comoros', '-11.87500100', '43.87221900'),
(118, 'KN', 'Saint Kitts and Nevis', '17.35782200', '-62.78299800'),
(119, 'KP', 'North Korea', '40.33985200', '127.51009300'),
(120, 'KR', 'South Korea', '35.90775700', '127.76692200'),
(121, 'KW', 'Kuwait', '29.31166000', '47.48176600'),
(122, 'KY', 'Cayman Islands', '19.51346900', '-80.56695600'),
(123, 'KZ', 'Kazakhstan', '48.01957300', '66.92368400'),
(124, 'LA', 'Laos', '19.85627000', '102.49549600'),
(125, 'LB', 'Lebanon', '33.85472100', '35.86228500'),
(126, 'LC', 'Saint Lucia', '13.90944400', '-60.97889300'),
(127, 'LI', 'Liechtenstein', '47.16600000', '9.55537300'),
(128, 'LK', 'Sri Lanka', '7.87305400', '80.77179700'),
(129, 'LR', 'Liberia', '6.42805500', '-9.42949900'),
(130, 'LS', 'Lesotho', '-29.60998800', '28.23360800'),
(131, 'LT', 'Lithuania', '55.16943800', '23.88127500'),
(132, 'LU', 'Luxembourg', '49.81527300', '6.12958300'),
(133, 'LV', 'Latvia', '56.87963500', '24.60318900'),
(134, 'LY', 'Libya', '26.33510000', '17.22833100'),
(135, 'MA', 'Morocco', '31.79170200', '-7.09262000'),
(136, 'MC', 'Monaco', '43.75029800', '7.41284100'),
(137, 'MD', 'Moldova', '47.41163100', '28.36988500'),
(138, 'ME', 'Montenegro', '42.70867800', '19.37439000'),
(139, 'MG', 'Madagascar', '-18.76694700', '46.86910700'),
(140, 'MH', 'Marshall Islands', '7.13147400', '171.18447800'),
(141, 'MK', 'Macedonia [FYROM]', '41.60863500', '21.74527500'),
(142, 'ML', 'Mali', '17.57069200', '-3.99616600'),
(143, 'MM', 'Myanmar [Burma]', '21.91396500', '95.95622300'),
(144, 'MN', 'Mongolia', '46.86249600', '103.84665600'),
(145, 'MO', 'Macau', '22.19874500', '113.54387300'),
(146, 'MP', 'Northern Mariana Islands', '17.33083000', '145.38469000'),
(147, 'MQ', 'Martinique', '14.64152800', '-61.02417400'),
(148, 'MR', 'Mauritania', '21.00789000', '-10.94083500'),
(149, 'MS', 'Montserrat', '16.74249800', '-62.18736600'),
(150, 'MT', 'Malta', '35.93749600', '14.37541600'),
(151, 'MU', 'Mauritius', '-20.34840400', '57.55215200'),
(152, 'MV', 'Maldives', '3.20277800', '73.22068000'),
(153, 'MW', 'Malawi', '-13.25430800', '34.30152500'),
(154, 'MX', 'Mexico', '23.63450100', '-102.55278400'),
(155, 'MY', 'Malaysia', '4.21048400', '101.97576600'),
(156, 'MZ', 'Mozambique', '-18.66569500', '35.52956200'),
(157, 'NA', 'Namibia', '-22.95764000', '18.49041000'),
(158, 'NC', 'New Caledonia', '-20.90430500', '165.61804200'),
(159, 'NE', 'Niger', '17.60778900', '8.08166600'),
(160, 'NF', 'Norfolk Island', '-29.04083500', '167.95471200'),
(161, 'NG', 'Nigeria', '9.08199900', '8.67527700'),
(162, 'NI', 'Nicaragua', '12.86541600', '-85.20722900'),
(163, 'NL', 'Netherlands', '52.13263300', '5.29126600'),
(164, 'NO', 'Norway', '60.47202400', '8.46894600'),
(165, 'NP', 'Nepal', '28.39485700', '84.12400800'),
(166, 'NR', 'Nauru', '-0.52277800', '166.93150300'),
(167, 'NU', 'Niue', '-19.05444500', '-169.86723300'),
(168, 'NZ', 'New Zealand', '-40.90055700', '174.88597100'),
(169, 'OM', 'Oman', '21.51258300', '55.92325500'),
(170, 'PA', 'Panama', '8.53798100', '-80.78212700'),
(171, 'PE', 'Peru', '-9.18996700', '-75.01515200'),
(172, 'PF', 'French Polynesia', '-17.67974200', '-149.40684300'),
(173, 'PG', 'Papua New Guinea', '-6.31499300', '143.95555000'),
(174, 'PH', 'Philippines', '12.87972100', '121.77401700'),
(175, 'PK', 'Pakistan', '30.37532100', '69.34511600'),
(176, 'PL', 'Poland', '51.91943800', '19.14513600'),
(177, 'PM', 'Saint Pierre and Miquelon', '46.94193600', '-56.27111000'),
(178, 'PN', 'Pitcairn Islands', '-24.70361500', '-127.43930800'),
(179, 'PR', 'Puerto Rico', '18.22083300', '-66.59014900'),
(180, 'PS', 'Palestinian Territories', '31.95216200', '35.23315400'),
(181, 'PT', 'Portugal', '39.39987200', '-8.22445400'),
(182, 'PW', 'Palau', '7.51498000', '134.58252000'),
(183, 'PY', 'Paraguay', '-23.44250300', '-58.44383200'),
(184, 'QA', 'Qatar', '25.35482600', '51.18388400'),
(185, 'RE', 'Réunion', '-21.11514100', '55.53638400'),
(186, 'RO', 'Romania', '45.94316100', '24.96676000'),
(187, 'RS', 'Serbia', '44.01652100', '21.00585900'),
(188, 'RU', 'Russia', '61.52401000', '105.31875600'),
(189, 'RW', 'Rwanda', '-1.94027800', '29.87388800'),
(190, 'SA', 'Saudi Arabia', '23.88594200', '45.07916200'),
(191, 'SB', 'Solomon Islands', '-9.64571000', '160.15619400'),
(192, 'SC', 'Seychelles', '-4.67957400', '55.49197700'),
(193, 'SD', 'Sudan', '12.86280700', '30.21763600'),
(194, 'SE', 'Sweden', '60.12816100', '18.64350100'),
(195, 'SG', 'Singapore', '1.35208300', '103.81983600'),
(196, 'SH', 'Saint Helena', '-24.14347400', '-10.03069600'),
(197, 'SI', 'Slovenia', '46.15124100', '14.99546300'),
(198, 'SJ', 'Svalbard and Jan Mayen', '77.55360400', '23.67027200'),
(199, 'SK', 'Slovakia', '48.66902600', '19.69902400'),
(200, 'SL', 'Sierra Leone', '8.46055500', '-11.77988900'),
(201, 'SM', 'San Marino', '43.94236000', '12.45777700'),
(202, 'SN', 'Senegal', '14.49740100', '-14.45236200'),
(203, 'SO', 'Somalia', '5.15214900', '46.19961600'),
(204, 'SR', 'Suricountry_name', '3.91930500', '-56.02778300'),
(205, 'ST', 'Sao Tome and Principe', '0.18636000', '6.61308100'),
(206, 'SV', 'El Salvador', '13.79418500', '-88.89653000'),
(207, 'SY', 'Syria', '34.80207500', '38.99681500'),
(208, 'SZ', 'Swaziland', '-26.52250300', '31.46586600'),
(209, 'TC', 'Turks and Caicos Islands', '21.69402500', '-71.79792800'),
(210, 'TD', 'Chad', '15.45416600', '18.73220700'),
(211, 'TF', 'French Southern Territories', '-49.28036600', '69.34855700'),
(212, 'TG', 'Togo', '8.61954300', '0.82478200'),
(213, 'TH', 'Thailand', '15.87003200', '100.99254100'),
(214, 'TJ', 'Tajikistan', '38.86103400', '71.27609300'),
(215, 'TK', 'Tokelau', '-8.96736300', '-171.85588100'),
(216, 'TL', 'Timor-Leste', '-8.87421700', '125.72753900'),
(217, 'TM', 'Turkmenistan', '38.96971900', '59.55627800'),
(218, 'TN', 'Tunisia', '33.88691700', '9.53749900'),
(219, 'TO', 'Tonga', '-21.17898600', '-175.19824200'),
(220, 'TR', 'Turkey', '38.96374500', '35.24332200'),
(221, 'TT', 'Trinidad and Tobago', '10.69180300', '-61.22250300'),
(222, 'TV', 'Tuvalu', '-7.10953500', '177.64933000'),
(223, 'TW', 'Taiwan', '23.69781000', '120.96051500'),
(224, 'TZ', 'Tanzania', '-6.36902800', '34.88882200'),
(225, 'UA', 'Ukraine', '48.37943300', '31.16558000'),
(226, 'UG', 'Uganda', '1.37333300', '32.29027500'),
(227, 'UM', 'U.S. Minor Outlying Islands', '13.84064330', '174.27456130'),
(228, 'US', 'United States', '37.09024000', '-95.71289100'),
(229, 'UY', 'Uruguay', '-32.52277900', '-55.76583500'),
(230, 'UZ', 'Uzbekistan', '41.37749100', '64.58526200'),
(231, 'VA', 'Vatican City', '41.90291600', '12.45338900'),
(232, 'VC', 'Saint Vincent and the Grenadines', '12.98430500', '-61.28722800'),
(233, 'VE', 'Venezuela', '6.42375000', '-66.58973000'),
(234, 'VG', 'British Virgin Islands', '18.42069500', '-64.63996800'),
(235, 'VI', 'U.S. Virgin Islands', '18.33576500', '-64.89633500'),
(236, 'VN', 'Vietnam', '14.05832400', '108.27719900'),
(237, 'VU', 'Vanuatu', '-15.37670600', '166.95915800'),
(238, 'WF', 'Wallis and Futuna', '-13.76875200', '-177.15609700'),
(239, 'WS', 'Samoa', '-13.75902900', '-172.10462900'),
(240, 'XK', 'Kosovo', '42.60263600', '20.90297700'),
(241, 'YE', 'Yemen', '15.55272700', '48.51638800'),
(242, 'YT', 'Mayotte', '-12.82750000', '45.16624400'),
(243, 'ZA', 'South Africa', '-30.55948200', '22.93750600'),
(244, 'ZM', 'Zambia', '-13.13389700', '27.84933200'),
(245, 'ZW', 'Zimbabwe', '-19.01543800', '29.15485700');

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE `devoir` (
  `id` int(11) NOT NULL,
  `idformation` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `doc` text NOT NULL,
  `lien` text NOT NULL,
  `datepost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devoirs`
--

CREATE TABLE `devoirs` (
  `id_devoirs` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `lien` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `id_formateur_devoir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `devoirs`
--

INSERT INTO `devoirs` (`id_devoirs`, `titre`, `contenu`, `lien`, `fichier`, `id_formateur_devoir`) VALUES
(1, 'devoir', 'hjfhf', 'hfhf', 'fichiers/1684784950.pdf', 2),
(2, 'ddd', 'dd', 'https://www.youtube.com/watch?v=xiNmj1iCzg8', 'fichiers/1684785084.pdf', 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id_inscription` int(11) NOT NULL,
  `id_inscription_classe` int(11) NOT NULL,
  `id_inscription_utilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE `liens` (
  `id_lien` int(11) NOT NULL,
  `nom_lien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liens`
--

INSERT INTO `liens` (`id_lien`, `nom_lien`) VALUES
(2, 'https://www.w3schools.com/php/php_mysql_insert.asp'),
(3, 'https://apps.google.com/meet/'),
(4, 'https://apps.google.com/meet/'),
(5, 'https://www.youtube.com/watch?v=r8T0SnwHRNI');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id_module` int(11) NOT NULL,
  `nom_module` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id_module`, `nom_module`) VALUES
(1, 'Intégrer une base de données avec MongoDB'),
(2, 'Relier un formulaire à une bd MongoDB');

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `idformation` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `datepost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `place` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `image` text NOT NULL,
  `organisateur` varchar(200) NOT NULL,
  `diplome` varchar(100) NOT NULL,
  `des_organisateur` text NOT NULL,
  `lien_youtube` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `datepost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `motDePasse`, `role`) VALUES
(1, 'Adams', 'Adams', 'adams@gmail.com', '12345', 'professeur'),
(3, 'admin', 'admin', 'admin@gmail.com', '12345', 'apprenant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `cc` (`country_code`) USING BTREE;

--
-- Index pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devoirs`
--
ALTER TABLE `devoirs`
  ADD PRIMARY KEY (`id_devoirs`),
  ADD KEY `id_formateur_devoir` (`id_formateur_devoir`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_inscription_classe` (`id_inscription_classe`),
  ADD KEY `id_inscription_utilisateurs` (`id_inscription_utilisateurs`);

--
-- Index pour la table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`id_lien`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `correction`
--
ALTER TABLE `correction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT pour la table `devoir`
--
ALTER TABLE `devoir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devoirs`
--
ALTER TABLE `devoirs`
  MODIFY `id_devoirs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liens`
--
ALTER TABLE `liens`
  MODIFY `id_lien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`id_formateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `devoirs`
--
ALTER TABLE `devoirs`
  ADD CONSTRAINT `devoirs_ibfk_1` FOREIGN KEY (`id_formateur_devoir`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_inscription_classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`id_inscription_utilisateurs`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
