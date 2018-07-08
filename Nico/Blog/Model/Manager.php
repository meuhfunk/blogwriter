<?php
namespace Nico\Blog\Model;
class Manager
{
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');
        return $db;
    }
}
