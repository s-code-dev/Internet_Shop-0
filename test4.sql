-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2020 г., 13:37
-- Версия сервера: 5.6.43
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `order_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `count` varchar(250) NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`order_id`, `user_id`, `product_id`, `count`, `status`) VALUES
(19, '16', '2', '4', 0),
(20, '16', '2', '5', 0),
(24, '16', '2', '4', 0),
(25, '16', '2', '4', 0),
(35, '17', '1', '5', 0),
(36, '17', '1', '6', 0),
(57, '18', '1', '5', 0),
(59, '3', '1', '4', 2),
(60, '3', '2', '5', 2),
(69, '20', '1', '111', 2),
(70, '20', '1', '1111', 2),
(73, '1', '3', '9', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(250) NOT NULL,
  `img_smal` varchar(20) NOT NULL,
  `img_big` varchar(20) NOT NULL,
  `viewing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `price`, `img_smal`, `img_big`, `viewing`) VALUES
(1, 'Блок питания', 'Блок питания с сертификатом BRONZ', 200, '1_s.jpg', '1.jpg', 0),
(2, 'Джостик для sega', 'Игровой контроллер Sega Fire Joy предназначен для игровых консолей, произведенных по технологии FIRECORE. Классический, признанный игроками по всему миру, дизайн джойстика и полноценный набор клавиш позволит вам играть во все игры, предназначенные дл', 352, '2_s.jpg', '2.jpg', 0),
(3, 'Клавиатура', 'Клавиатура – это устройство для ввода данных в компьютер: букв, цифр и знаков. Также используется для управления системой, то есть является аналогом компьютерной мыши. По типу соединения она бывает проводной и беспроводной.', 521, '3_s.jpg', '3.jpg', 0),
(4, 'Материнская плата', 'Материнская плата — базовый элемент архитектуры современного ПК, представляет собой многоуровневую плату с предустановленным набором микросхем системной логики, служит для объединения комплектующих в единую систему (компьютер)\r\n', 210, '4_s.jpg', '4.jpg', 0),
(5, 'Компьютерная мышь', 'Компью́терная мышь — координатное устройство для управления курсором и отдачи различных команд компьютеру. Управление курсором осуществляется путём перемещения мыши по поверхности стола или коврика для мыши.', 450, '5_s.jpg', '5.jpg', 0),
(6, 'Ноутбук', 'Ноутбук (англ. notebook — блокнот) — переносной компьютер, в корпусе которого объединены типичные компоненты ПК, включая дисплей, клавиатуру и устройство указания (обычно сенсорная панель или тачпад), а также аккумуляторные батареи.', 240, '6_s.jpg', '6.jpg', 0),
(7, 'Оперативная память', 'Оперативная память (ОЗУ, RAM — Random Access Memory — eng.) — относительно быстрая энергозависимая память компьютера с произвольным доступом, в которой осуществляются большинство операций обмена данными между устройствами. Является энергозависимой, т', 420, '7_s.jpg', '7.jpg', 0),
(8, 'Процессор', 'Процессор в памяти, Processor-in-memory (PIM), или Вычисляющее ОЗУ или Computational RAM, C-RAM, также, «Вычисления в памяти» - так называют процессор, тесно интегрированный в память, как правило, на одном кремниевом кристалле, либо оперативную памят', 120, '8_s.jpg', '8.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `id_user_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_user_order`) VALUES
(1, 3),
(15, 3),
(19, 3),
(20, 3),
(21, 1),
(22, 1),
(23, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `telefone` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `telefone`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 0, '', '3cf108a4e0a498347a5a75a792f2321221232f297a57a5a743894a0e4a801fc3', 1),
(3, '111', '111', 111, '', '866107b7d994185ec121a8d91a15d896698d51a19d8a121ce581499d7b701668', 0),
(4, '22', '22', 22, '', '9bc0866885e0b44a12d5de8f2d767d6bb6d767d2f8ed5d21a44b0e5886680cb9', 0),
(5, '3', '3', 2, '', '3fab7a2f9df80382ef2ec5b4e78cbccec81e728d9d4c2f636f067f89cc14862c', 0),
(6, '2', '2', 2, '', 'c26841cc98f760f636f2c4d9d827e18cc81e728d9d4c2f636f067f89cc14862c', 0),
(7, '1', '1', 1, '', 'b94857f6a905ccd028329b0a8324ac4cc4ca4238a0b923820dcc509a6f75849b', 0),
(8, '4444', '4444', 4444, '', '4c8a358bffeb11ab4822efcfb48d4cbddbc4d84bfcfe2284ba11beffb853a8c4', 0),
(9, '444', '444', 444, '', '0053340da0b56abf1436ed21f141a055550a141f12de6341fba65b0ad0433500', 0),
(10, '666', '666', 666, '', '35e4bb1c8e765a768827c154c72b0eaffae0b27c451c728867a567e8c1bb4e53', 0),
(11, '6666', '6666', 6666, '', '70cac1edc86b01f38aff03ca1800159ee9510081ac30ffa83f10b68cde1cac07', 0),
(12, '4441', '4441', 4441, '', '0946e3e608947de45fea12e80c274a1551a472c08e21aef54ed749806e3e6490', 0),
(13, '123234123', '123234123', 123234123, '', '7d73890e969faebd4f865845f460ea9779ae064f548568f4dbeaf969e09837d7', 0),
(14, '3254145', '3254145', 3254145, '', '93356c53b052be1f50c662c33441b7acca7b14433c266c05f1eb250b35c65339', 0),
(15, '132451345', '132451345', 132451345, '', 'd2c28725a6b80806390fcc20b9e05f5555f50e9b02ccf09360808b6a52782c2d', 0),
(16, 'Елена', 'Елена', 11, '', '269124c718c9e6959f6a7963e15d1bb76512bd43d9caa6e02c990b0a82652dca', 0),
(17, '`13221`3', '`13221`3', 132213, '', 'dd46eefb053b66ea067bdc8860a6358338536a0688cdb760ae66b350bfee64dd', 0),
(18, '1231312', '1231312', 1231312, '', '1f677a1ec57d8c775d31c7315794746006474975137c13d577c8d75ce1a776f1', 0),
(19, '   ', '   ', 111, '', 'b1e558c002c671c8d22b12370f136826628631f07321b22d8c176c200c855e1b', 0),
(20, '125341234543125', '125341234543125', 2147483647, '', '7b46cbd7c4526ba8fe632a40a737f114411f737a04a236ef8ab6254c7dbc64b7', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
