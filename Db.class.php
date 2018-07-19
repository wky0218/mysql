<?php

class Db
{

    public static $instance = array();

    /**
     * connect
     * @access static
     * @param  array  $config 
     * @return Connection
     */
    public static function connect($config = array())
    {

        $name = md5(serialize($config));

        if (!isset(self::$instance[$name])) {

            if (empty($config)) {
                $config = require_once 'Conf/config.php';
            }

            if (empty($config['type'])) {
                exit('Undefined db type');
            }

            $db_driver = ucfirst($config['type']);
            $dbClass = 'Db/' . $db_driver . '.class.php';

            if (is_file($dbClass)) {
                require_once $dbClass;
            } else {

                exit('db driver' . $dbClass . 'is not exist');
            }

            $object_db_driver = $db_driver::getInstance();
            self::$instance[$name] = $object_db_driver->connect($config);

        }

        return self::$instance[$name];

    }

    /**
     * Magic Methods
     * @access public
     * @param  string $func method
     * @param  array  $args param
     * @return mixed
     */
    public static function __callStatic($func, $args)
    {

        return call_user_func_array(array(self::connect(), $func), $args);

    }

}
