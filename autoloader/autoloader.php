<?php
class Autoloader { // La classe Autoloader permet d'éviter les require dans le controler et le model en exécutant la fonction loader
    static function register() { 
        spl_autoload_register(array('Autoloader', 'loader'));
    }
    static public function loader($className) { // vérifie si le nom du fichier php ainsi que la classe existent
        $filename = str_replace("\\", '/', $className) . ".php";
        if (file_exists($filename)) {
            require_once($filename);
            if (class_exists($className)) {
                return true;
            }
        }
        return false;
    }
}