-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2018 г., 12:14
-- Версия сервера: 5.6.37-log
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `opkp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accesses`
--

CREATE TABLE `accesses` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `access` varchar(255) NOT NULL,
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `admin` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accesses`
--

INSERT INTO `accesses` (`id`, `access`, `visiable`, `admin`) VALUES
(1, 'НЕТ', 1, 0),
(2, 'ПОЛНЫЙ', 1, 1),
(7, 'ЧАСТИЧНЫЙ', 1, 0),
(8, 'ОПКП', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `accesses_actions`
--

CREATE TABLE `accesses_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `accesses_id` tinyint(4) NOT NULL,
  `actions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accesses_actions`
--

INSERT INTO `accesses_actions` (`id`, `accesses_id`, `actions_id`) VALUES
(1088, 2, 144),
(1089, 2, 145),
(1090, 2, 146),
(1091, 2, 147),
(1092, 2, 167),
(1093, 2, 171),
(1094, 2, 148),
(1095, 7, 148),
(1096, 2, 149),
(1097, 7, 149),
(1098, 2, 150),
(1099, 7, 150),
(1100, 2, 151),
(1101, 7, 151),
(1102, 2, 152),
(1103, 7, 152),
(1104, 2, 153),
(1105, 7, 153),
(1106, 2, 154),
(1107, 7, 154),
(1108, 2, 155),
(1109, 7, 155),
(1110, 2, 156),
(1111, 7, 156),
(1112, 2, 157),
(1113, 7, 157),
(1114, 2, 158),
(1115, 7, 158),
(1116, 2, 172),
(1117, 2, 173),
(1118, 2, 174),
(1119, 2, 159),
(1120, 2, 160),
(1121, 7, 160),
(1122, 2, 161),
(1123, 7, 161),
(1124, 2, 162),
(1125, 7, 162),
(1126, 2, 163),
(1127, 7, 163),
(1128, 7, 144),
(1129, 7, 145),
(1130, 7, 146),
(1131, 7, 147),
(1132, 7, 167),
(1133, 7, 171),
(1134, 7, 172),
(1135, 7, 173),
(1136, 7, 174),
(1137, 7, 159);

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `controller`, `action`, `description`) VALUES
(144, 'accesses', 'index', 'Вывод страницы с информацией о видах доступа'),
(145, 'accesses', 'add', 'Добавление вида доступа'),
(146, 'accesses', 'delete', 'Удаление вида доступа'),
(147, 'accesses', 'correct', 'Корректировка вида доступа'),
(148, 'countries', 'index', 'Вывод страницы с информацией о странах'),
(149, 'countries', 'add', 'Добавление в справочник страны'),
(150, 'countries', 'delete', 'Удаление из справочника страны'),
(151, 'countries', 'correct', 'Корректировка страны в справочнике'),
(152, 'departments', 'index', 'Вывод страницы с информацией о подразделениях'),
(153, 'departments', 'add', 'Добавление в справочник подразделения'),
(154, 'departments', 'delete', 'Удаление из справочника подразделения'),
(155, 'departments', 'correct', 'Корректировка подразделения в справочнике'),
(156, 'employees', 'index', 'Вывод страницы с информацией о сотрудниках'),
(157, 'employees', 'login', 'Форма входа пользователя'),
(158, 'employees', 'logout', 'Выход из приложения'),
(159, 'main', 'index', 'Главная страница приложения'),
(160, 'positions', 'index', 'Вывод страницы с должностями'),
(161, 'positions', 'add', 'Добавление в справочник должности'),
(162, 'positions', 'delete', 'Удаление должности из справочника'),
(163, 'positions', 'correct', 'Корректировка должности в справочнике'),
(167, 'accesses', 'saveAccesses', 'Сохранение распределения доступа к разделам приложения'),
(171, 'accesses', 'correctAct', 'Корректировка описания допустимых действий в приложении'),
(172, 'employees', 'add', 'добавление сотрудника'),
(173, 'employees', 'correct', 'корректировка записей о сотрудниках'),
(174, 'employees', 'delete', 'удаление сотрудника');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client` varchar(255) NOT NULL COMMENT 'сокращенное наименование клиента',
  `client_full` varchar(255) NOT NULL COMMENT 'полное наименование клиента',
  `contract` varchar(255) NOT NULL COMMENT 'номер договора',
  `contract_date` int(10) UNSIGNED NOT NULL COMMENT 'дата заключения договора',
  `countries_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы countries',
  `employees_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `term_of_payment` varchar(255) NOT NULL COMMENT 'условия оплаты',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` int(11) NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1',
  `temp2` int(11) NOT NULL DEFAULT '0' COMMENT 'темп2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='клиенты';

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `client`, `client_full`, `contract`, `contract_date`, `countries_id`, `employees_id`, `term_of_payment`, `note`, `visiable`, `temp1`, `temp2`) VALUES
(1, 'ИООО Кроноспан', 'ИООО Кроноспан', 'нет', 0, 1, 16, '', '', 1, 0, 0),
(2, 'Чайна Мерчантс', 'Чайна Мерчантс', 'КП14', 534534534, 1, 3, 'предоплата', '', 1, 0, 0),
(3, 'ПАО ТрансКонтейнер', 'ПАО ТрансКонтейнер', 'КП19', 3123123, 4, 6, 'предоплата', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `clients_contacts`
--

CREATE TABLE `clients_contacts` (
  `client_contacts_id` int(10) UNSIGNED NOT NULL,
  `clients_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы clients',
  `name` varchar(255) NOT NULL COMMENT 'ФИО клиента',
  `position` varchar(255) NOT NULL COMMENT 'должность клиента',
  `mobil_phone` varchar(255) NOT NULL COMMENT 'мобильный телефон',
  `work_phone` varchar(255) NOT NULL COMMENT 'рабочий телефон',
  `fax_phone` varchar(255) NOT NULL COMMENT 'факс',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='контакты клиентов';

--
-- Дамп данных таблицы `clients_contacts`
--

INSERT INTO `clients_contacts` (`client_contacts_id`, `clients_id`, `name`, `position`, `mobil_phone`, `work_phone`, `fax_phone`, `email`, `note`, `visiable`, `temp1`) VALUES
(3, 1, 'Хазей Дмитрий', 'начальник жд отдела', '+375 29 786 65 59', '', '', 'khazei@kponoshpan.com', '', 1, 0),
(4, 2, 'Лон', 'менеджер', '+375 29 568 96 96', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `clients_offers`
--

CREATE TABLE `clients_offers` (
  `clients_offers_id` int(10) UNSIGNED NOT NULL,
  `clients_offer` text NOT NULL COMMENT 'предложение клиенту'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='предложения клиентам';

-- --------------------------------------------------------

--
-- Структура таблицы `clients_requests`
--

CREATE TABLE `clients_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `clients_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы clients',
  `clients_request` text NOT NULL COMMENT 'текст запроса',
  `clients_request_date` int(10) UNSIGNED NOT NULL COMMENT 'дата запроса',
  `method_of_obtaining_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы method_of_obtaining',
  `request_statuses_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы request_statuses',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='запросы клиентов';

-- --------------------------------------------------------

--
-- Структура таблицы `client_codes`
--

CREATE TABLE `client_codes` (
  `clien_codes_id` int(10) UNSIGNED NOT NULL,
  `clien_code` int(10) UNSIGNED NOT NULL COMMENT 'код клиента',
  `clients_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы clients',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` int(11) NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='коды клиентов';

--
-- Дамп данных таблицы `client_codes`
--

INSERT INTO `client_codes` (`clien_codes_id`, `clien_code`, `clients_id`, `note`, `visiable`, `temp1`) VALUES
(1, 2005678, 3, '', 1, 0),
(2, 2009857, 2, '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL COMMENT 'страна',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страны';

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country`, `visiable`) VALUES
(1, 'Беларусь', 1),
(2, 'Германия', 1),
(3, 'Литва', 1),
(4, 'Россия', 1),
(6, 'Латвия', 1),
(7, 'Украина', 1),
(8, 'Китай', 1),
(9, 'Польша', 1),
(10, 'Эстония', 1),
(11, 'Казахстан', 1),
(12, 'Молдова', 1),
(23, 'Зимбабве', 1),
(25, 'Мадагаскар', 1),
(26, 'Япония', 1),
(31, 'Вьетнам', 1),
(32, 'Куба', 1),
(33, 'Азербайджан', 1),
(34, 'еуке', 0),
(35, '     ', 0),
(36, 'вапвап', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `currencies`
--

CREATE TABLE `currencies` (
  `currencies_id` tinyint(3) UNSIGNED NOT NULL,
  `currency` varchar(20) NOT NULL COMMENT 'мнемокод валюты'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Валюта';

--
-- Дамп данных таблицы `currencies`
--

INSERT INTO `currencies` (`currencies_id`, `currency`) VALUES
(1, 'BYN'),
(2, 'USD'),
(3, 'RUR'),
(4, 'EUR'),
(5, 'CHF');

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL COMMENT 'краткое наименование подразделения',
  `department_full` varchar(255) NOT NULL COMMENT 'полное наименование подразделения',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Структурные подразделения БТЛЦ';

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `department`, `department_full`, `visiable`) VALUES
(1, 'ОПКП', 'Отдел продаж контейнерных перевозок', 1),
(2, 'ОКП', 'Отдел по организации контейнерных перевозок', 1),
(3, 'ОПСГ', 'Отдел по организации перевозок скоропортящихся грузов', 1),
(4, 'ТЭО', 'Отдел транспортно-экспедиционного обслуживания', 1),
(5, 'ОМЛ', 'Отдел маркетинга и логистики', 1),
(6, 'ООУ', 'Отдел оперативного управления', 1),
(7, 'ООТО', 'Отдел организации таможенного оформления', 1),
(8, 'БТЛЦ Гродно', 'Гродненский филиал БТЛЦ', 1),
(9, 'БТЛЦ Брест', 'Брестский филиал БТЛЦ', 1),
(10, 'БТЛЦ Гомель', 'Гомельский филиал БТЛЦ', 1),
(11, 'БТЛЦ Могилев', 'Могилевский филиал БТЛЦ', 1),
(12, 'БТЛЦ Витебск', 'Витебский филиал БТЛЦ', 1),
(13, 'ЦКП', 'Центр контейнерных перевозок', 1),
(14, 'вфыв', 'вфы', 0),
(15, 'фывфыв', 'вывфывфыв', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(255) NOT NULL COMMENT 'Имя исполнителя',
  `employee_surname` varchar(255) NOT NULL COMMENT 'Фамилия исполнителяя',
  `employee_middlename` varchar(255) NOT NULL COMMENT 'Отчество исполнителя',
  `departments_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы departments',
  `positions_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы positions',
  `email` varchar(255) NOT NULL,
  `mobil_phone` varchar(255) NOT NULL COMMENT 'номер мобильного телефона',
  `work_phone` varchar(255) NOT NULL COMMENT 'номер рабочего телефона',
  `password` varchar(255) NOT NULL COMMENT 'пароль зарегистрированного пользователя',
  `accesses_id` tinyint(3) UNSIGNED NOT NULL,
  `birthday` int(10) UNSIGNED NOT NULL,
  `employment_date` int(10) UNSIGNED NOT NULL,
  `education` text NOT NULL,
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_surname`, `employee_middlename`, `departments_id`, `positions_id`, `email`, `mobil_phone`, `work_phone`, `password`, `accesses_id`, `birthday`, `employment_date`, `education`, `visiable`) VALUES
(1, 'Алексей', 'Ширинга', 'Викторович', 2, 2, 'avs@belint.by', '+375296078838', '+375172251270', '12345', 7, 0, 0, '', 1),
(2, 'Александр', 'Гейлаш', 'Александрович', 1, 1, 'a.heilash@belint.by', '+375 29 525 84 39', '+375 17 225 11 71', '12345', 2, 507762000, 1490821200, 'БелГУТ 2008 очно, АУ при Президентае РБ 2016 заочно', 1),
(3, 'Оксана', 'Павлова', 'Викторовна', 2, 2, 'o.pavlova@belint.by', '+375291111111', '+375172251171', '', 7, 0, 0, '', 1),
(4, 'Наталья', 'Лизун', 'Владимировна', 4, 3, '', '+375291111111', '+375172251171', '12345', 1, 0, 0, '', 1),
(5, 'Наталья', 'Капировская', 'Сергеевна', 2, 3, 'nsk@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(6, 'Елена', 'Кедич', 'Сергеевна', 2, 4, 'esk@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(7, 'Людмила', 'Левитан', 'Владимировна', 2, 4, '', '+375291111111', '+375172251171', '12345', 1, 0, 0, '', 1),
(12, 'Наталья', 'Литвинко', 'Александровна', 5, 2, 'ln@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(13, 'Татьяна', 'Юницкая', 'Юрьевна', 1, 4, 't.yunitskaya@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(14, 'Сергей', 'Шереш', 'Михайлович', 1, 4, 'sheresh.s@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(15, 'Ирина', 'Шмидт', 'Викторовна', 1, 4, 'i.shmidt@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(16, 'Юлия', 'Васильченко', 'Сергеевна', 1, 4, 'y.vasilchenko@belint.by', '+375291111111', '+375172251171', '', 1, 0, 0, '', 1),
(17, 'Виктор', 'Митилович', 'Николайевич', 1, 4, 'v.mitilovich@belint.by', '+375291111111', '+375172251171', '12345', 7, 0, 0, '', 1),
(18, 'Ольга', 'Колодник', 'Сергеевна', 1, 5, 'o.kolodnik@belint.by', '+375291111111', '+375172251171', '12345', 8, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parent_id`) VALUES
(2, 'Главная', 'main', 0),
(3, 'Справочники', 'directories', 0),
(4, 'Страны', 'countries', 3),
(5, 'Структрурные подразделения', 'departments', 3),
(6, 'Должности', 'positions', 3),
(7, 'Сотрудники', 'employees', 3),
(10, 'Клиенты', NULL, 0),
(13, 'договорные', NULL, 10),
(14, 'не договорные', NULL, 10),
(15, 'Провайдеры', NULL, 0),
(16, 'договорные', NULL, 15),
(17, 'не договорные', NULL, 15),
(18, 'Виды доступа', 'accesses', 3),
(20, 'Login', 'employees/login', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `method_of_obtaining`
--

CREATE TABLE `method_of_obtaining` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_of_obtaining` varchar(255) DEFAULT NULL COMMENT 'метод получения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='методы получения запросов';

--
-- Дамп данных таблицы `method_of_obtaining`
--

INSERT INTO `method_of_obtaining` (`id`, `method_of_obtaining`) VALUES
(1, 'по e-mail'),
(2, 'по телефону'),
(3, 'письмо');

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL COMMENT 'должность',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='должности';

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id`, `position`, `visiable`) VALUES
(1, 'начальник отдела', 1),
(2, 'начальник сектора', 1),
(3, 'заместитель начальника отдела', 1),
(4, 'инженер', 1),
(5, 'специалист по работе с клиентами', 1),
(6, 'ведущий инженер', 1),
(75, 'инженер5', 0),
(76, 'инженер7', 0),
(77, 'fsdfsdf', 0),
(78, 'заместитель генерального директора - начальник центра контейнерных перевозок', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `providers`
--

CREATE TABLE `providers` (
  `providers_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(255) NOT NULL COMMENT 'сокращенное наименование контрагента',
  `provider_full` varchar(255) NOT NULL COMMENT 'полное наименование контрагента',
  `contract` varchar(255) NOT NULL COMMENT 'номер договора',
  `contract_date` int(10) UNSIGNED NOT NULL COMMENT 'дата заключения договора',
  `countries_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы countries',
  `employees_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `term_of_payment` text NOT NULL COMMENT 'условия оплаты',
  `specialization` text NOT NULL COMMENT 'перечень возможных услуг',
  `note` varchar(255) NOT NULL COMMENT 'примечания',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `providers`
--

INSERT INTO `providers` (`providers_id`, `provider`, `provider_full`, `contract`, `contract_date`, `countries_id`, `employees_id`, `term_of_payment`, `specialization`, `note`, `visiable`, `temp1`) VALUES
(2, 'BTLC Germany', 'Belintertrans Germany', 'КП15', 1500000000, 2, 1, 'предоплата, протокол', 'Китай, Европа, авто по Европе', '', 1, 0),
(3, 'РЖДЛ', 'АО РЖД Логистика', 'хз', 151000000, 4, 1, 'отсрочка платежа 150 000$', 'коды по России', '', 1, 0),
(4, 'BTLC Baltic', 'UAB Belintertrans Baltic', 'есть', 636456565, 3, 1, 'по факту', 'Литва, морской фрахт и экспедирование в порту Клайпеда', '', 1, 0),
(5, 'Транслогист СИСТЕМ', 'Транслогист СИСТЕМ', 'нет', 0, 12, 1, '', 'ВИКИНГ Молдова', '', 1, 0),
(6, 'SIA Alpa Centrums', 'SIA Alpa Centrums', 'есть', 0, 3, 4, 'по факту', 'РЖД, КЗХ, УТИ, ТРК, ИРА, вся Азия, Крым, паром Кавказ-Крым', '', 1, 0),
(7, 'Лиски', 'ГП УГЦТС \"Лиски\"', 'есть', 535345345, 7, 1, 'предоплата', 'ВИКИНГ, ЗУБР Украина', '', 1, 0),
(8, 'БТЛЦ Москва', 'ООО Белинтертранс Москва', 'есть', 4234234, 4, 1, 'по факту', 'ремонт фитинговых платформ', '', 1, 0),
(9, 'PLASKE', 'CARGO @Plaske@ JSC', 'есть', 4234234234, 7, 3, 'по факту', 'Турция, Грузия (паром), УЗ, Викинг, Болгария жд+море, Молдова Викинг', '', 1, 0),
(10, 'LDZ Loģistika', 'SIA \"LDZ Loģistika\"', 'есть', 3123123123, 6, 1, 'по факту', 'ЛДЗ, Зубр', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `providers_contacts`
--

CREATE TABLE `providers_contacts` (
  `provider_contacts_id` int(10) UNSIGNED NOT NULL,
  `providers_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы providers',
  `name` varchar(255) NOT NULL COMMENT 'ФИО контрагента',
  `position` varchar(255) NOT NULL COMMENT 'должность контрагента',
  `mobil_phone` varchar(255) NOT NULL COMMENT 'мобильный телефон',
  `work_phone` varchar(255) NOT NULL COMMENT 'рабочий телефон',
  `fax_phone` varchar(255) NOT NULL COMMENT 'номер факса',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Контакты контрагентов';

--
-- Дамп данных таблицы `providers_contacts`
--

INSERT INTO `providers_contacts` (`provider_contacts_id`, `providers_id`, `name`, `position`, `mobil_phone`, `work_phone`, `fax_phone`, `email`, `note`, `visiable`, `temp1`) VALUES
(1, 2, 'Катерина Негреева', '', '', '+49(0)2203/95923-57', '', 'kn@rtsb.de; kn@belint.de', '', 1, 0),
(2, 3, 'Давыдов Александр Олегович', 'хз', '', '+7(495)9886868 доб.1112', '', 'DavydovAO@rzdlog.ru', '', 1, 0),
(3, 2, 'Капрос Андрей', '', '', '+49-6172-59-08-45', '', 'ac@belint.de', '', 1, 0),
(4, 2, 'Шершов Наталья', 'заместитель директора', '', '+49-6172-59-08-10', '', 'ns@belint.de', '', 1, 0),
(5, 2, 'Бил Сергей', '', '', '+49(2203)/95923-35', '', 'sb@rtsb.de', '', 1, 0),
(6, 4, 'Шершнев Юрий', '', '', '+370 46 219 651', '', 'jurij@belinter.lt', '', 1, 0),
(7, 4, 'Гайдаускас Артурас', 'директор', '+37061624634', '', '', 'arturas@belinter.lt', '', 1, 0),
(8, 5, 'Ирина', '', '', '+37368203855', '', 'rail@tls.md', '', 1, 0),
(9, 6, 'Ступина Марина', '', '', '+37167780603', '', 'stupina@alpa.lv', '', 1, 0),
(10, 7, 'Панченко Светлана', '', '', '+380445688964', '', 'panchenko@liski.com.ua', '', 1, 0),
(11, 8, 'Милорадова Ольга', '', '', '', '', 'bit-moskow@mail.ru', '', 1, 0),
(13, 9, '', '', '', '+380 48 7288 288', '', 'cargo@plaske.ua', '', 1, 0),
(14, 10, 'Квилис Анатолий', 'главный специалист по логистике отдела продаж', '+371 29532070', '+371 67239072', '', 'Anatolijs.Kvilis@ldz.lv', '', 1, 0),
(15, 10, 'Козлов Николай', 'главный специалист по логистике', '+371 27870136', '+371 67239076', '', 'Nikolajs.Kozlovs@ldz.lv', '', 1, 0),
(16, 10, 'Пахомова Томара', 'начальник отдела продаж', '', '+371 67239075; +371 20297409', '', 'Tamara.Pahomova@ldz.lv', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `quests`
--

CREATE TABLE `quests` (
  `quests_id` int(11) NOT NULL,
  `quest` text NOT NULL COMMENT 'Содержание квеста',
  `quest_statuses_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы quest_statuses',
  `quest_date` int(10) UNSIGNED NOT NULL COMMENT 'время начало квеста',
  `quest_control_date` int(10) UNSIGNED NOT NULL COMMENT 'контролное время окнчания квеста',
  `employees_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `implementation` text NOT NULL COMMENT 'информация о реализации квеста',
  `implementation_date` int(10) UNSIGNED NOT NULL COMMENT 'фактическое время реализации квеста',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Квесты';

--
-- Дамп данных таблицы `quests`
--

INSERT INTO `quests` (`quests_id`, `quest`, `quest_statuses_id`, `quest_date`, `quest_control_date`, `employees_id`, `implementation`, `implementation_date`, `note`, `visiable`, `temp1`) VALUES
(1, 'Проработать вывоз из Беларуси в Монголию грузов в контейнерах с отправлением со стока в Бресте. Из Бреста отправляется 1,5 поезда на Монголию в месяц. Проработать грузовую базу, ставки инв/инв, как возвращается порожний BCDU контейнер из Монголии, даст ли БИТ-Германия китайские контейнеры и сколько это будет стоить', 1, 3231231233, 123123123, 14, '', 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `quest_statuses`
--

CREATE TABLE `quest_statuses` (
  `quest_statuses_id` int(10) UNSIGNED NOT NULL,
  `quest_status` varchar(255) NOT NULL COMMENT 'статус квеста',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статусы выполнения квеста';

--
-- Дамп данных таблицы `quest_statuses`
--

INSERT INTO `quest_statuses` (`quest_statuses_id`, `quest_status`, `note`, `visiable`, `temp1`) VALUES
(1, 'на выполнении', '', 1, 0),
(2, 'выполнено', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `request_statuses`
--

CREATE TABLE `request_statuses` (
  `request_statuses_id` int(10) UNSIGNED NOT NULL,
  `request_status` text NOT NULL COMMENT 'описание статуса выполнения запроса клиента',
  `request_status_date` int(10) UNSIGNED NOT NULL COMMENT 'время изменения статуса запроса клиента',
  `status_codes_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы status_codes',
  `employees_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1',
  `temp2` int(11) NOT NULL DEFAULT '0' COMMENT 'темп2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='описание статусов запросов клиентов';

-- --------------------------------------------------------

--
-- Структура таблицы `status_codes`
--

CREATE TABLE `status_codes` (
  `status_codes_id` int(10) UNSIGNED NOT NULL,
  `status_code` varchar(255) NOT NULL COMMENT 'наименование кода статуса',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='коды статуса обработки запроса';

--
-- Дамп данных таблицы `status_codes`
--

INSERT INTO `status_codes` (`status_codes_id`, `status_code`, `note`, `visiable`) VALUES
(1, 'получен', '', 1),
(2, 'в обработке своими силами', '', 1),
(3, 'в обработке, направлен запрос контрагентам', '', 1),
(4, 'готов, направлен ответ', '', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `accesses_actions`
--
ALTER TABLE `accesses_actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_id` (`countries_id`),
  ADD KEY `performers_id` (`employees_id`);

--
-- Индексы таблицы `clients_contacts`
--
ALTER TABLE `clients_contacts`
  ADD PRIMARY KEY (`client_contacts_id`),
  ADD KEY `clients_id` (`clients_id`);

--
-- Индексы таблицы `clients_offers`
--
ALTER TABLE `clients_offers`
  ADD PRIMARY KEY (`clients_offers_id`);

--
-- Индексы таблицы `clients_requests`
--
ALTER TABLE `clients_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id` (`clients_id`),
  ADD KEY `request_statuses_id` (`request_statuses_id`),
  ADD KEY `method_of_obtaining_id` (`method_of_obtaining_id`);

--
-- Индексы таблицы `client_codes`
--
ALTER TABLE `client_codes`
  ADD PRIMARY KEY (`clien_codes_id`),
  ADD KEY `clients_id` (`clients_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Индексы таблицы `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currencies_id`);

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `positions_id` (`positions_id`),
  ADD KEY `accesses_id` (`accesses_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `method_of_obtaining`
--
ALTER TABLE `method_of_obtaining`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`providers_id`),
  ADD KEY `performers_id` (`employees_id`),
  ADD KEY `countries_id` (`countries_id`);

--
-- Индексы таблицы `providers_contacts`
--
ALTER TABLE `providers_contacts`
  ADD PRIMARY KEY (`provider_contacts_id`),
  ADD KEY `providers_id` (`providers_id`);

--
-- Индексы таблицы `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`quests_id`),
  ADD KEY `quest_statuses_id` (`quest_statuses_id`),
  ADD KEY `quests_ibfk_1` (`employees_id`);

--
-- Индексы таблицы `quest_statuses`
--
ALTER TABLE `quest_statuses`
  ADD PRIMARY KEY (`quest_statuses_id`);

--
-- Индексы таблицы `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD PRIMARY KEY (`request_statuses_id`),
  ADD KEY `status_codes_id` (`status_codes_id`),
  ADD KEY `performers_id` (`employees_id`);

--
-- Индексы таблицы `status_codes`
--
ALTER TABLE `status_codes`
  ADD PRIMARY KEY (`status_codes_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `accesses_actions`
--
ALTER TABLE `accesses_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1138;
--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `clients_contacts`
--
ALTER TABLE `clients_contacts`
  MODIFY `client_contacts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `clients_offers`
--
ALTER TABLE `clients_offers`
  MODIFY `clients_offers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `client_codes`
--
ALTER TABLE `client_codes`
  MODIFY `clien_codes_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currencies_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `method_of_obtaining`
--
ALTER TABLE `method_of_obtaining`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT для таблицы `providers`
--
ALTER TABLE `providers`
  MODIFY `providers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `providers_contacts`
--
ALTER TABLE `providers_contacts`
  MODIFY `provider_contacts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `quests`
--
ALTER TABLE `quests`
  MODIFY `quests_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `quest_statuses`
--
ALTER TABLE `quest_statuses`
  MODIFY `quest_statuses_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `request_statuses`
--
ALTER TABLE `request_statuses`
  MODIFY `request_statuses_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `status_codes`
--
ALTER TABLE `status_codes`
  MODIFY `status_codes_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clients_contacts`
--
ALTER TABLE `clients_contacts`
  ADD CONSTRAINT `clients_contacts_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clients_requests`
--
ALTER TABLE `clients_requests`
  ADD CONSTRAINT `clients_requests_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_requests_ibfk_2` FOREIGN KEY (`request_statuses_id`) REFERENCES `quest_statuses` (`quest_statuses_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_requests_ibfk_3` FOREIGN KEY (`method_of_obtaining_id`) REFERENCES `method_of_obtaining` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `client_codes`
--
ALTER TABLE `client_codes`
  ADD CONSTRAINT `client_codes_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`positions_id`) REFERENCES `positions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`accesses_id`) REFERENCES `accesses` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `providers_contacts`
--
ALTER TABLE `providers_contacts`
  ADD CONSTRAINT `providers_contacts_ibfk_1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`providers_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `quests`
--
ALTER TABLE `quests`
  ADD CONSTRAINT `quests_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quests_ibfk_2` FOREIGN KEY (`quest_statuses_id`) REFERENCES `quest_statuses` (`quest_statuses_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD CONSTRAINT `request_statuses_ibfk_1` FOREIGN KEY (`status_codes_id`) REFERENCES `status_codes` (`status_codes_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `request_statuses_ibfk_2` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`departments_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
