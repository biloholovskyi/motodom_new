<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'moto_fix' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'dev' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '111111' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dIL8T7s4*QpD54ZX[+A%b`Z,FQ(u^VZ[.7j{TUDoZ<>G!%bh%<y{=7 j#(xlKl9#' );
define( 'SECURE_AUTH_KEY',  'JXZzo]Zf|8>B^:gRgm|9hQdB!u11QOC>Wpi+OoY[tm6X)r,xnVXH(P)KyKCw9Mb0' );
define( 'LOGGED_IN_KEY',    'Bq-sdp._Zt.*A5sybY$|nfC@{>BZN/KMY8pG,=Zir6jB-qbFpyBToQT?Z{%M8Ypo' );
define( 'NONCE_KEY',        'Euq$e`#^_O/@:vr$&=?tn4%!C%?q#@{/DE[8yTn`-w[HkVc&NvB<B9A^r~GOHalk' );
define( 'AUTH_SALT',        'GTxf5N#es5Ls[hh]nGKP&8G}>N>rjX k)m&0{[7Zy3ycaOnj#/xdv?(ABX@xY9Xn' );
define( 'SECURE_AUTH_SALT', 'a_X_p^)Qz Gux2or|ueAiq:zb6rWPr<Pc&?ZVEqa=b.O5K,uK5{.,p.lxc!rwKb3' );
define( 'LOGGED_IN_SALT',   '/7}x,xwe`JF2>D9[N9;6_f.osBZVYqB }N4U{g|q]/Pl?[f+0MGhVA`^7jlj[Vo~' );
define( 'NONCE_SALT',       'zAX]^D-8jE2qE,Yy=.kWDEDcN_>3*#}v1.jfqYH6K*D^V~)X2Vl[L:zEkI/ep~cJ' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
