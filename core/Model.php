<?php

namespace core;

use \core\Database;
use \ClanCats\Hydrahon\Builder;
use \ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class Model
{

    protected static $_h;

    public function __construct()
    {
        self::_checkH();
    }

    public function genrerateUUID()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    public static function _checkH()
    {
        if (self::$_h == null) {
            $connection = Database::getInstance();
            self::$_h = new Builder('mysql', function ($query, $queryString, $queryParameters) use ($connection) {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);

                if ($query instanceof FetchableInterface) {
                    return $statement->fetchAll(\PDO::FETCH_ASSOC);
                }
            });
        }

        self::$_h = self::$_h->table(self::getTableName());
    }

    public static function getTableName()
    {
        $className = explode('\\', get_called_class());

        $className = self::pluralize(1, end($className));

        return strtolower($className);
    }

    public static function select($fields = [])
    {
        self::_checkH();
        return self::$_h->select($fields);
    }

    public static function insert($fields = [])
    {
        self::_checkH();
        return self::$_h->insert($fields);
    }

    public static function update($fields = [])
    {
        self::_checkH();
        return self::$_h->update($fields);
    }

    public static function delete()
    {
        self::_checkH();
        return self::$_h->delete();
    }

    private static function pluralize($quantity, $singular, $plural = null)
    {

        // if ($quantity == 1 || !strlen($singular)) {
        //     return $singular;
        // }

        if ($plural !== null) {
            return $plural;
        }

        $last_letter = strtolower($singular[strlen($singular) - 1]);
        // echo $last_letter;

        switch ($last_letter) {
            case 'y':
                return substr($singular, 0, -1) . 'ies';
            case 's':
                return $singular . 'es';
            default:
                return $singular . 's';
        }
    }
}
