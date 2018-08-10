<?php

/*
 * This is supposed to be a magic function call that will construct and SQL string
 * For some reason the SQL statment doesn't execute
 */


class SQLStringify {

    // Constructor
    function __construct() {
        $this->__call();
    }

    public function __call($name, $args) {

        switch ($name) {
            case 'query':
                switch (count($args)) {
                    case 5:
                        return call_user_func_array(array($this, 'queryThreeArgs'), $args);
                    case 7:
                        return call_user_func_array(array($this, 'queryFourArgs'), $args);
                    case 9:
                        return call_user_func_array(array($this, 'queryFiveArgs'), $args);
                 }
        }
    }

    // These should return the correctly formatted SQL query string
    public function queryFiveArgs($databse, $column1, $column2, $value1, $value2) {
    	return "INSERT INTO $databse($column1, $column2) VALUES('$value1','$value2')";
    }
    public function querySevenArgs($databse, $column1, $column2, $column3, $value1, $value2, $value3) {
    	return "INSERT INTO $databse($column1, $column2, $column3) VALUES('$value1','$value2', '$value3')";
    }
    public function queryNineArgs($databse, $column1, $column2, $column3, $column4, $value1, $value2, $value3, $value4) {
    	return "INSERT INTO $databse($column1, $column2, $column3, $column4) VALUES('$value1','$value2', '$value3', '$value4')";
    }
}
?>