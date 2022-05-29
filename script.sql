-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2022 a las 04:09:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `documentos_digitales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_pais` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_comun` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_serie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_certificado_id` bigint(20) UNSIGNED NOT NULL,
  `entidad_emisora` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `pfx` blob DEFAULT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma` tinyint(4) NOT NULL DEFAULT 0,
  `eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id`, `nif`, `codigo_pais`, `nombre_comun`, `cargo`, `numero_serie`, `tipo_certificado_id`, `entidad_emisora`, `fecha_inicio`, `fecha_fin`, `pfx`, `password`, `firma`, `eliminado`, `created_at`, `updated_at`) VALUES
(23, '467942822', 'pe', 'Juan Vega Carrillo', 'Administrador de Personal', '00010130200', 2, 'Llama.pe', '2022-08-07', '2023-08-07', 0x30820b8602010330820b5006092a864886f70d010701a0820b4104820b3d30820b39308205cf06092a864886f70d010706a08205c0308205bc020100308205b506092a864886f70d010701301c060a2a864886f70d010c0106300e04085dcb9eecdacb9b290202080080820588bade28d241b10bdab43e553e3193613f55dc693eda21fc2a418258ee7fa2d9121202f04df230cb722c638529640da93089a802c6412c879f5b0a69ce9f42b5d5019859780d82d1793089ca7277e1a815d3aacbd7537dd9d628e792dd1a498f2d7a6880d6bbb8d04e79e288eda9610785e9502d2a19ba0215b5a912e407c843fd89d5592624d34c1690b6bdbdf27a788d771ca0a14a39273bb9f2a4f6d4ffde430b93415ec457c9356753eccbc133f908906b0d8ff9e65fd841e3300de3999bb497fe1485ac7578c287f6ec4e0c4b7a0d5823470727f5d936192fb4b3dc69f4d25f3c790851d6700166b0d35c0468f11a3918218aeeb0a92381d8a9910b3cd670b87b8c6527146d7bf054580f96795dca0139b6b6237354f3e4abea6c9694c45be908c7feef636e62c478f96db4e169c0bac026aa9ef64a78cd31172ab06f5a603f9efeb31433c44a9c13426902dd77bdc87090bf1a9e5d18f8ac011b4c79447ee95bd3d625019c21f3d7a100a872b12bb0b49406ae59acece305163843d09d68be230fdb9697a853801cf669697048c1861de91bd95ea83f96527cf7cfd07831ce3d1b7f8e620c162578cd3776c52b1e42b79c8861f40eb985ca46fa0c0021dc87f73eab811cc1d264dc7b10e1270ad9f368719f7e62637336842e23c5694576ab770b3238de0380db621ba73f9d79ddc0d37a7ebd8cceb4d6012e88f3b33ab5b2b0d43f0f9b21ed53d3238b89f5fecd96dd425bbb30ec2d399b218cbda3a9b862aa3fa9be7ed32b01853251c3f92f8dc1e3f97beeba5beae139142148231683bc48a26105d5f8a38736d95f8515d9e885e2b70c125b438729ebb96fc5e4ccc1f0e089a65cbfcba9af7a886e37ae02d10bc24393123ad363e8b6f4dcd8b615e78a79b6d3cb2f9c62e85bae2812316e5f21ac74ce23cf401c4d15119cf946ccc086745c861876c02694f4b472a9402a44d0a3454e652e35d7553ab6e6513d926ef1608defb30888387c1cff52f9f851a33bc75a5d64d584bdb2be2e823fb54d3bee2b529bdf0b96d9e3a1ee2bc97ddd286504d532aed32bbae812624feed85b69b216e9ab92eb758645c2b08111a5280c4f756d2918b6b913a59bef29bd7ba9dc717f66e7318fc43aebce1c824da2bc2c6aead5edbf60873ca247327143b982f873195cf06cf7f9d94d3271db5494e4fe567aae24d452b6d06c760d5bc230c1209e859ebc4a54f2294f3878b0f512f77413f6fbb82352849da1cde7c9c792d2bc72a6209cd18545b38b029e1615b5d5b90811bede2362bfba8c6c2d8c0ba1fafce445e5bbb4608ca54cdf583bfb763ef169d67ac518fd215f293499f738d96cf838ac67c5b16824a61661e9d0e453ebda533a9c528224041add9f57f0766d812a6c51f5a21b631bee5f854d111c78c73f4903ff0727ea57fa702f053269ee973f79a14edbef5cbeca3efba7e21da6c1c570c2ec9a89a0b1f465eb768bdf9cd43c1143959d54601852c53b5db356a442e6f3945bfd0baee7c6477ce636691fbeff28059e89572e54de1383cc1c8e61f778249b0ef4ba1e49ac510f659c6fbeb17edfb2ac1af24251a2ad9c283d6f9d0c1bfd50d1f80e753d526da6f1634c4bc96b52fc1978f0e4cf3b7f523059e827657acc59466c529eed51e238761cc7abf22f56b057c785b7b13a8eecd8273e71967958b6a736173a09462d4654c175a54e78521450ddee39418c8a669be3695393b724e2ed94bb81d67b2ee2b6301d095d1c5e3451b96bcd3cf4c00cfb1ac2bcef01d170af25f89227370886ea40b5df4894698d6118f6243c199f955efb950569d7946c18ce930791d03a8c2d5e71da6bc4101f9ddd8637118a6bbbb004bfbf1163691f1fe2ebb7fad903689899aa11ace5f5a0942a3390d634e55d9d3a75dd94d6de0e467f67313d882a8d32cb5b2b07e3d96291cc80690e243cd26caf34402001363180c09af9f68d98355132a15873564801860972ec3c433082056206092a864886f70d010701a08205530482054f3082054b30820547060b2a864886f70d010c0a0102a08204ee308204ea301c060a2a864886f70d010c0103300e0408506a89b0ba04de2002020800048204c8c3e75bd36aee47f704e403df7c0eabd7e2a93ec2e4ab94c618ab83e8e178d6322a47baa30f430aef155eefa08c3af961e88c1eff1f5d7a928d3de29ac716c9830c3d01d3f1953b2bf9fd9bdf9478f489b5c400c5d4e81315d4d498b046e73273c6f12500aae2ddbfc96035477594cb53fcf32a9eb58247f59a067dc22db9e6689961ca021669d6dbfd873584f70735a4a611b1a212b0702596930c971f096134398cd69f6edb90cd7ccc8da1c90a9582048cfea3859fe6015b9d74bd05ec046b3d0d7da9bd2d276f1d18c6d2efddbfe228eb918b471bf59f838948960a23af71ca8ded8e2959d76376dbe4d55af21e8d8456d3b0bb0b4d87b35afc9c6e70ba174eaee60ba64f2309c3638152c76cc525787069bd312009ebf6bf470e897e8de967893a02c4a1a5c42ef243386ac7b569f2ac441d794e24d8bf5b8b3f16cb3460df5b40edc9aa19379f0a948b2911f84a55ac04d6be96d51acb49c1091e202058d21ba86c9a0cfda1f8320d52a753aa6f4fc12a26cc5e99d0101c0f419f29b8a18fbd8b83f63950aa8780e74f37ef29950018b8b50da2d7d3371ce36f419327a910dcd3b35b8b6f916147e7427adc7526a5274314f3e4e807eee2238328d8048b9438d7890e2b92f0c147d4ec38367501685af6fad693e70845c04b1dc030d6ff29f72f4a6df7296987537c024211a860bbebbd2893bb709614641f0cfbb500fbc400de41cc36dcca53b1532bc1d157939b873da58a55d1d116b85736de1f7bac73da449884c57a83927e781ffedb4a6d879eefcd363779660a342f9484b84042999e5bc2075385e833e2d34476ca04b2dbf503509825c6b78508f06278145072a50dfafad1adaefb21bed5f975645dbcc90b70b6c73128e3e7cbc0deb9ab03a0a45ad29c9113b05d0441f9245be5f9fd09444b726c075c88f0d332259e1d05f49d5754ae8d1c83fcddde8f62d1d1c6eda017d01831422e739cdd85dd30f1c4139e6329d25aa9d7a649f980f049041a9953d28d01cce046b8a5cc85c704267ddd3d17cf843b9706564d9a46a2998ce347a2238bf7881e91bfab59dc04aa9eed4cfc00042b7a732b0e030f3d1bf8c0a8e9a177bb0497d7288449c68c8fa847a018551233d27bef2e6dda032ec0bdf6ff3a5e2c63eb7365521ec7662b025d9c42e848a409acb28481d835324e2041c71dc3e65eb5d00eb2c28084cb9c8fb480101cd9e40e918aeead4e2bd68c731db6bfae8ca3b600f731efd899692255a9899b6b3b6018a25cf6be376f729e293bb1754e1181b06f8039a3a0e6811fc5027a3d4e86696e33460a8167abb130ea7c890f40eeb3ff5d3b260718b5900b80bc981366c938489b2d8b0cb5f02ea84f2c74a81241c1f2f03f657a347be9d999a582d316f78af6cbb894f0e78f3e2bd0e6f702b8f75a95224aa3fff6c19857e4b871e65fdb618138345812a47c2f311511ca69aa7ec203c996aa7f5e984849c040d28d448619a904a8fb11c15f53fa31d92e670209ef79460128bf32755d3ca9024a2f03fcbce917ac6c004818339a252d8a2ce7a462ca443fcd89d375e4d7d95c3a007af156012928cc40f8bbb3da9acfd4720b08f9ced4a387a7941b5dbba6d19510a1d114c44edbad892a09aee1e7a7934030ee783d03a5f9f0f8050536084afeb0a4b65fc32182a612717ccfb0d5923780b7a28e5f477a970e49d39998a8352773d77fc295b63c5733a33146301f06092a864886f70d01091431121e100048006f006c00610032003000320030302306092a864886f70d01091531160414722eb33cba17f5b9d87586c327b04a14413b9573302d3021300906052b0e03021a05000414d1774dceb10fa1adce1ceb5e05ae62874ba9fb2d04081182d7791bbc59cb, 'Hola2020', 1, 0, '2022-05-08 01:36:04', '2022-05-22 02:02:28'),
(24, '2121', 'pe', 'JUAN PEREZ', 'administrador', '23232', 1, 'llama.pe', '2022-05-07', '2023-05-07', NULL, NULL, 0, 1, '2022-05-08 01:37:24', '2022-05-15 01:14:48'),
(25, 'd', 'ddd', 'dd', 'dd', 'd', 1, 'ddd', '2022-05-07', '2023-05-07', NULL, NULL, 0, 0, '2022-05-08 01:39:03', '2022-05-15 01:14:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `salary` decimal(15,6) NOT NULL,
  `generado` int(11) NOT NULL DEFAULT 0,
  `url_documento` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `name`, `position`, `office`, `extn`, `start_date`, `salary`, `generado`, `url_documento`, `created_at`, `updated_at`) VALUES
(1, 'Tiger Nixon', 'System Architect', 'Edinburgh', '5421', '2011-04-25', '320800.000000', 1, 'https://perutec.fra1.digitaloceanspaces.com/certificados/97433f39bb4de408fe15e6f28790d1f3.pdf', '2022-05-22 01:10:34', '2022-05-29 02:00:16'),
(2, 'Garrett Winters', 'Accountant', 'Tokyo', '8422', '2011-07-25', '170750.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:50:53'),
(3, 'Ashton Cox', 'Junior Technical Author', 'San Francisco', '1562', '2009-01-12', '86000.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:50:54'),
(4, 'Cedric Kelly', 'Senior Javascript Developer', 'Edinburgh', '6224', '2012-03-29', '433060.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:50:54'),
(5, 'Airi Satou', 'Accountant', 'Tokyo', '5407', '2008-11-28', '162700.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:50:54'),
(6, 'Brielle Williamson', 'Integration Specialist', 'New York', '4804', '2012-12-02', '372000.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:45'),
(7, 'Herrod Chandler', 'Sales Assistant', 'San Francisco', '9608', '2012-08-06', '137500.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:46'),
(8, 'Rhona Davidson', 'Integration Specialist', 'Tokyo', '6200', '2010-10-14', '327900.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:46'),
(9, 'Colleen Hurst', 'Javascript Developer', 'San Francisco', '2360', '2009-09-15', '205500.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:46'),
(10, 'Sonya Frost', 'Software Engineer', 'Edinburgh', '1667', '2008-12-13', '103600.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:46'),
(11, 'Jena Gaines', 'Office Manager', 'London', '3814', '2008-12-19', '90560.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:50'),
(12, 'Quinn Flynn', 'Support Lead', 'Edinburgh', '9497', '2013-03-03', '342000.000000', 0, NULL, '2022-05-22 01:10:34', '2022-05-29 01:51:50'),
(13, 'Charde Marshall', 'Regional Director', 'San Francisco', '6741', '2008-10-16', '470600.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:51:51'),
(14, 'Haley Kennedy', 'Senior Marketing Designer', 'London', '3597', '2012-12-18', '313500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:51:51'),
(15, 'Tatyana Fitzpatrick', 'Regional Director', 'London', '1965', '2010-03-17', '385750.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:51:51'),
(16, 'Michael Silva', 'Marketing Designer', 'London', '1581', '2012-11-27', '198500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:52:05'),
(17, 'Paul Byrd', 'Chief Financial Officer (CFO)', 'New York', '3059', '2010-06-09', '725000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:52:05'),
(18, 'Gloria Little', 'Systems Administrator', 'New York', '1721', '2009-04-10', '237500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:52:05'),
(19, 'Bradley Greer', 'Software Engineer', 'London', '2558', '2012-10-13', '132000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:52:06'),
(20, 'Dai Rios', 'Personnel Lead', 'Edinburgh', '2290', '2012-09-26', '217500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:52:06'),
(21, 'Jenette Caldwell', 'Development Lead', 'New York', '1937', '2011-09-03', '345000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-29 01:59:22'),
(22, 'Yuri Berry', 'Chief Marketing Officer (CMO)', 'New York', '6154', '2009-06-25', '675000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(23, 'Caesar Vance', 'Pre-Sales Support', 'New York', '8330', '2011-12-12', '106450.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(24, 'Doris Wilder', 'Sales Assistant', 'Sidney', '3023', '2010-09-20', '85600.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(25, 'Angelica Ramos', 'Chief Executive Officer (CEO)', 'London', '5797', '2009-10-09', '1200000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(26, 'Gavin Joyce', 'Developer', 'Edinburgh', '8822', '2010-12-22', '92575.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(27, 'Jennifer Chang', 'Regional Director', 'Singapore', '9239', '2010-11-14', '357650.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(28, 'Brenden Wagner', 'Software Engineer', 'San Francisco', '1314', '2011-06-07', '206850.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(29, 'Fiona Green', 'Chief Operating Officer (COO)', 'San Francisco', '2947', '2010-03-11', '850000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(30, 'Shou Itou', 'Regional Marketing', 'Tokyo', '8899', '2011-08-14', '163000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(31, 'Michelle House', 'Integration Specialist', 'Sidney', '2769', '2011-06-02', '95400.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(32, 'Suki Burks', 'Developer', 'London', '6832', '2009-10-22', '114500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(33, 'Prescott Bartlett', 'Technical Author', 'London', '3606', '2011-05-07', '145000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(34, 'Gavin Cortez', 'Team Leader', 'San Francisco', '2860', '2008-10-26', '235500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(35, 'Martena Mccray', 'Post-Sales support', 'Edinburgh', '8240', '2011-03-09', '324050.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(36, 'Unity Butler', 'Marketing Designer', 'San Francisco', '5384', '2009-12-09', '85675.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(37, 'Howard Hatfield', 'Office Manager', 'San Francisco', '7031', '2008-12-16', '164500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(38, 'Hope Fuentes', 'Secretary', 'San Francisco', '6318', '2010-02-12', '109850.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(39, 'Vivian Harrell', 'Financial Controller', 'San Francisco', '9422', '2009-02-14', '452500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(40, 'Timothy Mooney', 'Office Manager', 'London', '7580', '2008-12-11', '136200.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(41, 'Jackson Bradshaw', 'Director', 'New York', '1042', '2008-09-26', '645750.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(42, 'Olivia Liang', 'Support Engineer', 'Singapore', '2120', '2011-02-03', '234500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(43, 'Bruno Nash', 'Software Engineer', 'London', '6222', '2011-05-03', '163500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(44, 'Sakura Yamamoto', 'Support Engineer', 'Tokyo', '9383', '2009-08-19', '139575.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(45, 'Thor Walton', 'Developer', 'New York', '8327', '2013-08-11', '98540.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(46, 'Finn Camacho', 'Support Engineer', 'San Francisco', '2927', '2009-07-07', '87500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(47, 'Serge Baldwin', 'Data Coordinator', 'Singapore', '8352', '2012-04-09', '138575.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(48, 'Zenaida Frank', 'Software Engineer', 'New York', '7439', '2010-01-04', '125250.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(49, 'Zorita Serrano', 'Software Engineer', 'San Francisco', '4389', '2012-06-01', '115000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(50, 'Jennifer Acosta', 'Junior Javascript Developer', 'Edinburgh', '3431', '2013-02-01', '75650.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(51, 'Cara Stevens', 'Sales Assistant', 'New York', '3990', '2011-12-06', '145600.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(52, 'Hermione Butler', 'Regional Director', 'London', '1016', '2011-03-21', '356250.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(53, 'Lael Greer', 'Systems Administrator', 'London', '6733', '2009-02-27', '103500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(54, 'Jonas Alexander', 'Developer', 'San Francisco', '8196', '2010-07-14', '86500.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(55, 'Shad Decker', 'Regional Director', 'Edinburgh', '6373', '2008-11-13', '183000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(56, 'Michael Bruce', 'Javascript Developer', 'Singapore', '5384', '2011-06-27', '183000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47'),
(57, 'Donna Snider', 'Customer Support', 'New York', '4226', '2011-01-25', '112000.000000', 0, NULL, '2022-05-22 01:10:35', '2022-05-22 01:11:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2022_04_23_193534_create_tipo_certificados_table', 2),
(15, '2022_04_23_193535_create_certificados_table', 2),
(16, '2022_05_21_193434_create_empleados_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_certificados`
--

CREATE TABLE `tipo_certificados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_certificados`
--

INSERT INTO `tipo_certificados` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Persona Natural', 'Certificado para persona Natural con DNI', '2022-04-24 01:45:41', '2022-04-24 01:45:41'),
(2, 'Persona Juridica', 'Certificado para Responsable de Persona Juridica', '2022-04-24 01:45:41', '2022-04-24 01:45:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `document_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luis', 'Claudio', '34563333', 'luis.claudio@perutec.com.pe', NULL, '$2y$10$xwpszHuA2aKXSFFU2KLDt.hGFlVnmAQpvQqD4TnykZdj2ILr0gooa', NULL, '2022-04-10 02:17:32', '2022-04-10 02:17:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificados_tipo_certificado_id_index` (`tipo_certificado_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tipo_certificados`
--
ALTER TABLE `tipo_certificados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_certificados`
--
ALTER TABLE `tipo_certificados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD CONSTRAINT `certificados_tipo_certificado_id_foreign` FOREIGN KEY (`tipo_certificado_id`) REFERENCES `tipo_certificados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
