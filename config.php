<?php 

// Database information:
// for SQLite, use sqlite:/tmp/wolf.db (SQLite 3)
// The path can only be absolute path or :memory:
// For more info look at: www.php.net/pdo

$config = new class {
    // Default config (DDEV)
  public $DB_NAME;
  public $DB_HOST;
  public $DB_PORT;
  public $DB_USER;
  public $DB_PASS;
  public $TABLE_PREFIX;
  public $DEBUG;
  public $CHECK_UPDATES;
  public $CHECK_TIMEOUT;
  public $URL_PUBLIC;
  public $USE_HTTPS;
  public $COOKIE_HTTP_ONLY;
  public $ADMIN_DIR;
  public $USE_MOD_REWRITE;
  public $URL_SUFFIX;
  public $DEFAULT_TIMEZONE;
  public $USE_POORMANSCRON;
  public $POORMANSCRON_INTERVAL;
  public $COOKIE_LIFE;
  public $ALLOW_LOGIN_WITH_EMAIL;
  public $DELAY_ON_INVALID_LOGIN;
  public $DELAY_ONCE_EVERY;
  public $DELAY_FIRST_AFTER;
  public $SECURE_TOKEN_EXPIRY;

  public function __construct() {
    // default ddev config
    $this->DB_NAME = 'db';
    $this->DB_HOST = 'ddev-wolfcms-db';
    $this->DB_PORT = '3306';
    $this->DB_USER = 'db';
    $this->DB_PASS = 'db';
    $this->URL_PUBLIC = getenv('DDEV_PRIMARY_URL') . '/';
    $this->USE_HTTPS = true;
    $this->DEBUG = true;
    $this->TABLE_PREFIX = '';
    $this->CHECK_UPDATES = true;
    $this->CHECK_TIMEOUT = 3;
    $this->COOKIE_HTTP_ONLY = false;
    $this->ADMIN_DIR = 'admin';
    $this->USE_MOD_REWRITE = true;
    $this->URL_SUFFIX = '';
    $this->DEFAULT_TIMEZONE = date_default_timezone_get();
    $this->USE_POORMANSCRON = false;
    $this->POORMANSCRON_INTERVAL = 3600;
    $this->COOKIE_LIFE = 1800;  // 30 minutes
    $this->ALLOW_LOGIN_WITH_EMAIL = false;
    $this->DELAY_ON_INVALID_LOGIN = true;
    $this->DELAY_ONCE_EVERY = 30; // 30 seconds
    $this->DELAY_FIRST_AFTER = 3;
    $this->SECURE_TOKEN_EXPIRY = 9;
  }

  public function DB_DSN() {
    return 'mysql:dbname=' . $this->DB_NAME . ';host=' . $this->DB_HOST . ';port=' . $this->DB_PORT;
  }
};

if (!getenv('DDEV_PRIMARY_URL')) {
  require(CFG_LOCAL);
}

// Database settings:
if (!defined('DB_DSN')) {
  define('DB_DSN', $config->DB_DSN());
}

if (!defined('DB_USER')) {
  define('DB_USER', $config->DB_USER);
}

if (!defined('DB_PASS')) {
  define('DB_PASS', $config->DB_PASS);
}

if (!defined('TABLE_PREFIX')) {
  define('TABLE_PREFIX', $config->TABLE_PREFIX);
}

// Should Wolf produce PHP error messages for debugging?
if (!defined('DEBUG')) {
  define('DEBUG', $config->DEBUG);
}

// Should Wolf check for updates on Wolf itself and the installed plugins?
if (!defined('CHECK_UPDATES')) {
  define('CHECK_UPDATES', $config->CHECK_UPDATES);
}

// The number of seconds before the check for a new Wolf version times out in case of problems.
if (!defined('CHECK_TIMEOUT')) {
  define('CHECK_TIMEOUT', $config->CHECK_TIMEOUT);
}

// The full URL of your Wolf CMS install
if (!defined('URL_PUBLIC')) {
  define('URL_PUBLIC', $config->URL_PUBLIC);
}

// Use httpS for the backend?
// Before enabling this, please make sure you have a working HTTP+SSL installation.
if (!defined('USE_HTTPS')) {
  define('USE_HTTPS', $config->USE_HTTPS);
}

// Use HTTP ONLY setting for the Wolf CMS authentication cookie?
// This requests browsers to make the cookie only available through HTTP, so not javascript for example.
// Defaults to false for backwards compatibility.
if (!defined('COOKIE_HTTP_ONLY')) {
  define('COOKIE_HTTP_ONLY', $config->COOKIE_HTTP_ONLY);
}

// The virtual directory name for your Wolf CMS administration section.
if (!defined('ADMIN_DIR')) {
  define('ADMIN_DIR', $config->ADMIN_DIR);
}

// Change this setting to enable mod_rewrite. Set to "true" to remove the "?" in the URL.
// To enable mod_rewrite, you must also change the name of "_.htaccess" in your
// Wolf CMS root directory to ".htaccess"
if (!defined('USE_MOD_REWRITE')) {
  define('USE_MOD_REWRITE', $config->USE_MOD_REWRITE);
}

// Add a suffix to pages (simluating static pages '.html')
if (!defined('URL_SUFFIX')) {
  define('URL_SUFFIX', $config->URL_SUFFIX);
}

// Set the timezone of your choice.
// Go here for more information on the available timezones:
// http://php.net/timezones
if (!defined('DEFAULT_TIMEZONE')) {
  define('DEFAULT_TIMEZONE', $config->DEFAULT_TIMEZONE);
}

// Use poormans cron solution instead of real one.
// Only use if cron is truly not available, this works better in terms of timing
// if you have a lot of traffic.
if (!defined('USE_POORMANSCRON')) {
  define('USE_POORMANSCRON', $config->USE_POORMANSCRON);
}

// Rough interval in seconds at which poormans cron should trigger.
// No traffic == no poormans cron run.
if (!defined('POORMANSCRON_INTERVAL')) {
  define('POORMANSCRON_INTERVAL', $config->POORMANSCRON_INTERVAL);
}

// How long should the browser remember logged in user?
// This relates to Login screen "Remember me for xxx time" checkbox at Backend Login screen
// Default: 1800 (30 minutes)
if (!defined('COOKIE_LIFE')) {
  define ('COOKIE_LIFE', $config->COOKIE_LIFE);  // 30 minutes
}

// Can registered users login to backend using their email address?
if (!defined('ALLOW_LOGIN_WITH_EMAIL')) {
  define ('ALLOW_LOGIN_WITH_EMAIL', $config->ALLOW_LOGIN_WITH_EMAIL);
}

// Should Wolf CMS block login ability on invalid password provided?
if (!defined('DELAY_ON_INVALID_LOGIN')) {
  define ('DELAY_ON_INVALID_LOGIN', $config->DELAY_ON_INVALID_LOGIN);
}

// How long should the login blockade last?
if (!defined('DELAY_ONCE_EVERY')) {
  define ('DELAY_ONCE_EVERY', $config->DELAY_ONCE_EVERY); // 30 seconds
}

// First delay starts after Nth failed login attempt
if (!defined('DELAY_FIRST_AFTER')) {
  define ('DELAY_FIRST_AFTER', $config->DELAY_FIRST_AFTER);
}

// Secure token expiry time (prevents CSRF attacks, etc.)
// If backend user does nothing for this time (eg. click some link) 
// his token will expire with appropriate notification
if (!defined('SECURE_TOKEN_EXPIRY')) {
  define ('SECURE_TOKEN_EXPIRY', $config->SECURE_TOKEN_EXPIRY);  // 15 minutes
}
