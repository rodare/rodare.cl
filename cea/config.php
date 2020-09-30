<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'artedial_moodcea';
$CFG->dbuser    = 'artedial_moodcea';
$CFG->dbpass    = 'zP.b7E.6S4';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://rodare.cl/cea';
$CFG->dataroot  = '/home/artedial/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!