<?php

namespace App;

use PDO;

class DB extends PDO
{

    private $host = 'localhost:3306';
    private $name = 'test';
    private $username = 'root';
    private $password = 'Qwasz#112233';

    private $options = [DB::ATTR_ERRMODE => DB::ERRMODE_EXCEPTION,
                        DB::ATTR_DEFAULT_FETCH_MODE => DB::FETCH_ASSOC,
                        DB::ATTR_EMULATE_PREPARES => false,];

    public function __construct(string $dsn = null, ?string $username = null, ?string $password = null, ?array $options = null)
    {
        if(!isset($dsn, $username, $password, $options)){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->name;
        $username = $this->username;
        $password = $this->password;
        $options = $this->options;
        }
        return parent::__construct($dsn, $username, $password, $options);
    }

    public function makeQuery(string $query): array
    {

        $stmt = $this->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

//    /**
//     * @return string
//     */
//    public function getHost(): string
//    {
//        return $this->host;
//    }
//
//    /**
//     * @return string
//     */
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    /**
//     * @return string
//     */
//    public function getUsername(): string
//    {
//        return $this->username;
//    }
//
//    /**
//     * @return string
//     */
//    public function getPassword(): string
//    {
//        return $this->password;
//    }
//
//    /**
//     * @return array
//     */
//    public function getOptions(): array
//    {
//        return $this->options;
//    }
}