-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 21 2018 г., 15:33
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
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `clients_id` int(10) UNSIGNED NOT NULL,
  `client` varchar(255) NOT NULL COMMENT 'сокращенное наименование клиента',
  `client_full` varchar(255) NOT NULL COMMENT 'полное наименование клиента',
  `contract` varchar(255) NOT NULL COMMENT 'номер договора',
  `contract_date` int(10) UNSIGNED NOT NULL COMMENT 'дата заключения договора',
  `countries_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы countries',
  `performers_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `term_of_payment` varchar(255) NOT NULL COMMENT 'условия оплаты',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` int(11) NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1',
  `temp2` int(11) NOT NULL DEFAULT '0' COMMENT 'темп2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='клиенты';

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`clients_id`, `client`, `client_full`, `contract`, `contract_date`, `countries_id`, `performers_id`, `term_of_payment`, `note`, `visiable`, `temp1`, `temp2`) VALUES
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
  `clients_requests_id` int(10) UNSIGNED NOT NULL,
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
  `countries_id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL COMMENT 'страна',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страны';

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`countries_id`, `country`, `note`, `visiable`, `temp1`) VALUES
(1, 'Беларусь', '', 1, 0),
(2, 'Германия', '', 1, 0),
(3, 'Литва', '', 1, 0),
(4, 'Россия', '', 1, 0),
(6, 'Латвия', '', 1, 0),
(7, 'Украина', '', 1, 0),
(8, 'Китай', '', 1, 0),
(9, 'Польша', '', 1, 0),
(10, 'Эстония', '', 1, 0),
(11, 'Казахстан', '', 1, 0),
(12, 'Молдова', '', 1, 0);

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
  `departments_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL COMMENT 'краткое наименование подразделения',
  `department_full` varchar(255) NOT NULL COMMENT 'полное наименование подразделения',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Структурные подразделения БТЛЦ';

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`departments_id`, `department`, `department_full`, `note`, `visiable`, `temp1`) VALUES
(1, 'ОПКП', 'Отдел продаж контейнерных перевозок', '', 1, 0),
(2, 'ОКП', 'Отдел по организации контейнерных перевозок', '', 1, 0),
(3, 'ОПСГ', 'Отдел по организации перевозок скоропортящихся грузов', '', 1, 0),
(4, 'ТЭО', 'Отдел транспортно-экспедиционного обслуживания', '', 1, 0),
(5, 'ОМЛ', 'Отдел маркетинга и логистики', '', 1, 0),
(6, 'ООУ', 'Отдел оперативного управления', '', 1, 0),
(7, 'ООТО', 'Отдел организации таможенного оформления', '', 1, 0),
(8, 'БТЛЦ Гродно', 'Гродненский филиал БТЛЦ', '', 1, 0),
(9, 'БТЛЦ Брест', 'Брестский филиал БТЛЦ', '', 1, 0),
(10, 'БТЛЦ Гомель', 'Гомельский филиал БТЛЦ', '', 1, 0),
(11, 'БТЛЦ Могилев', 'Могилевский филиал БТЛЦ', '', 1, 0),
(12, 'БТЛЦ Витебск', 'Витебский филиал БТЛЦ', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `method_of_obtaining`
--

CREATE TABLE `method_of_obtaining` (
  `method_of_obtaining_id` int(10) UNSIGNED NOT NULL,
  `method_of_obtaining` varchar(255) NOT NULL COMMENT 'метод получения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='методы получения запросов';

--
-- Дамп данных таблицы `method_of_obtaining`
--

INSERT INTO `method_of_obtaining` (`method_of_obtaining_id`, `method_of_obtaining`) VALUES
(1, 'по e-mail'),
(2, 'по телефону'),
(3, 'письмо');

-- --------------------------------------------------------

--
-- Структура таблицы `performers`
--

CREATE TABLE `performers` (
  `performers_id` int(10) UNSIGNED NOT NULL,
  `performer` varchar(255) NOT NULL COMMENT 'ФИО исполнителя',
  `departments_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы departments',
  `positions_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы positions',
  `email` varchar(255) NOT NULL,
  `mobil_phone` varchar(255) NOT NULL COMMENT 'номер мобильного телефона',
  `work_phone` varchar(255) NOT NULL COMMENT 'номер рабочего телефона',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `performers`
--

INSERT INTO `performers` (`performers_id`, `performer`, `departments_id`, `positions_id`, `email`, `mobil_phone`, `work_phone`, `note`, `visiable`, `temp1`) VALUES
(1, 'Ширинга Алексей Викторович', 2, 2, 'avs@belint.by', '+375296078838', '+375172251270', '', 1, 0),
(2, 'Гейлаш Александр Александрович', 1, 1, 'a.heilash@belint.by', '+375295258439', '+375172251171', '', 1, 0),
(3, 'Павлова Оксана Викторовна', 2, 2, 'o.pavlova@belint.by', '', '+375 17 225 12 70', '', 1, 0),
(4, 'Лизун Наталья Владимировна', 4, 3, 'lizun@belint.by', '', '+375 17 225 14 93', '', 1, 0),
(5, 'Капировская Наталья Сергеевна', 2, 3, 'nsk@belint.by', '', '+375 17 225 40 21', '', 1, 0),
(6, 'Кедич Елена Сергеевна', 2, 4, 'esk@belint.by', '', '', '', 1, 0),
(7, 'Левитан Людмила Владимировна', 2, 4, 'l.levitan@belint.by', '', '+375 17 225 28 88', '', 1, 0),
(8, 'Боярчук Марина Александровна', 2, 4, 'bma@belint.by', '', '+375 17 225 30 93', '', 1, 0),
(9, 'Дулуб Диана Сергеевна', 2, 4, 'dulub@belint.by', '', '+375 17 225 28 87', '', 1, 0),
(10, 'Мацкевич Лариса', 5, 4, 'larisa@belint.by', '', '+375 17 225 39 17', '', 1, 0),
(11, 'Архипова Светлана Сергеевна', 5, 4, 'ss@belint.by', '', '+375 17 225 28 27', '', 1, 0),
(12, 'Литвинко Наталья Александровна', 5, 2, 'ln@belint.by', '', '+375 17 225 24 33', '', 1, 0),
(13, 'Юницкая Татьяна Юрьевна', 1, 4, 't.yunitskaya@belint.by', '', '+375 17 225 25 19', '', 1, 0),
(14, 'Шереш Сергей Михайлович', 1, 4, 'sheresh.s@belint.by', '', '+375 17 225 30 56', '', 1, 0),
(15, 'Шмидт Ирина Викторовна', 1, 4, 'i.shmidt@belint.by', '', '+375 17 225 30 56', '', 1, 0),
(16, 'Васильченко Юлия Сергеевна', 1, 4, '', '', '', '', 1, 0),
(17, 'Митилович Виктор Николаевич', 1, 4, '', '', '', '', 1, 0),
(18, 'Колодник Ольга Сергеевна', 1, 5, '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `positions_id` int(10) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL COMMENT 'должность'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='должности';

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`positions_id`, `position`) VALUES
(1, 'начальник отдела'),
(2, 'начальник сектора'),
(3, 'заместитель начальника отдела'),
(4, 'инженер'),
(5, 'специалист по работе с клиентами'),
(6, 'ведущий инженер');

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
  `performers_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `term_of_payment` text NOT NULL COMMENT 'условия оплаты',
  `specialization` text NOT NULL COMMENT 'перечень возможных услуг',
  `note` varchar(255) NOT NULL COMMENT 'примечания',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `providers`
--

INSERT INTO `providers` (`providers_id`, `provider`, `provider_full`, `contract`, `contract_date`, `countries_id`, `performers_id`, `term_of_payment`, `specialization`, `note`, `visiable`, `temp1`) VALUES
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
  `performers_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
  `implementation` text NOT NULL COMMENT 'информация о реализации квеста',
  `implementation_date` int(10) UNSIGNED NOT NULL COMMENT 'фактическое время реализации квеста',
  `note` varchar(255) NOT NULL COMMENT 'примечание',
  `visiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'признак видимости',
  `temp1` int(11) NOT NULL DEFAULT '0' COMMENT 'темп1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Квесты';

--
-- Дамп данных таблицы `quests`
--

INSERT INTO `quests` (`quests_id`, `quest`, `quest_statuses_id`, `quest_date`, `quest_control_date`, `performers_id`, `implementation`, `implementation_date`, `note`, `visiable`, `temp1`) VALUES
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
  `performers_id` int(10) UNSIGNED NOT NULL COMMENT 'foring key для таблицы performers',
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
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clients_id`),
  ADD KEY `countries_id` (`countries_id`),
  ADD KEY `performers_id` (`performers_id`);

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
  ADD PRIMARY KEY (`clients_requests_id`),
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
  ADD PRIMARY KEY (`countries_id`),
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
  ADD PRIMARY KEY (`departments_id`);

--
-- Индексы таблицы `method_of_obtaining`
--
ALTER TABLE `method_of_obtaining`
  ADD PRIMARY KEY (`method_of_obtaining_id`);

--
-- Индексы таблицы `performers`
--
ALTER TABLE `performers`
  ADD PRIMARY KEY (`performers_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `positions_id` (`positions_id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`positions_id`);

--
-- Индексы таблицы `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`providers_id`),
  ADD KEY `performers_id` (`performers_id`),
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
  ADD KEY `quests_ibfk_1` (`performers_id`);

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
  ADD KEY `performers_id` (`performers_id`);

--
-- Индексы таблицы `status_codes`
--
ALTER TABLE `status_codes`
  ADD PRIMARY KEY (`status_codes_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `clients_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `countries_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currencies_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `departments_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `method_of_obtaining`
--
ALTER TABLE `method_of_obtaining`
  MODIFY `method_of_obtaining_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `performers`
--
ALTER TABLE `performers`
  MODIFY `performers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `positions_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`countries_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`performers_id`) REFERENCES `performers` (`performers_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clients_contacts`
--
ALTER TABLE `clients_contacts`
  ADD CONSTRAINT `clients_contacts_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`clients_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clients_requests`
--
ALTER TABLE `clients_requests`
  ADD CONSTRAINT `clients_requests_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`clients_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_requests_ibfk_2` FOREIGN KEY (`request_statuses_id`) REFERENCES `quest_statuses` (`quest_statuses_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_requests_ibfk_3` FOREIGN KEY (`method_of_obtaining_id`) REFERENCES `method_of_obtaining` (`method_of_obtaining_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `client_codes`
--
ALTER TABLE `client_codes`
  ADD CONSTRAINT `client_codes_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`clients_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `performers`
--
ALTER TABLE `performers`
  ADD CONSTRAINT `performers_ibfk_1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`departments_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `performers_ibfk_2` FOREIGN KEY (`positions_id`) REFERENCES `positions` (`positions_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_ibfk_1` FOREIGN KEY (`performers_id`) REFERENCES `performers` (`performers_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `providers_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`countries_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `providers_contacts`
--
ALTER TABLE `providers_contacts`
  ADD CONSTRAINT `providers_contacts_ibfk_1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`providers_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `quests`
--
ALTER TABLE `quests`
  ADD CONSTRAINT `quests_ibfk_1` FOREIGN KEY (`performers_id`) REFERENCES `performers` (`performers_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quests_ibfk_2` FOREIGN KEY (`quest_statuses_id`) REFERENCES `quest_statuses` (`quest_statuses_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD CONSTRAINT `request_statuses_ibfk_1` FOREIGN KEY (`status_codes_id`) REFERENCES `status_codes` (`status_codes_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `request_statuses_ibfk_2` FOREIGN KEY (`performers_id`) REFERENCES `performers` (`departments_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
