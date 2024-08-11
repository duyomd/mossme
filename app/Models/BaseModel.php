<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use App\Helpers\Utilities;

class BaseModel extends Model
{
    protected function userLanguageCode(string $user_language_code): string
    {
        if (!isset($user_language_code)) $user_language_code = Utilities::DEFAULT_LANGUAGE;
        return $this->db->escapeString($user_language_code);
    }

    public static function getOrderBySql($sort) 
    {
        $orderSql = ' ';
        if (isset($sort) && count($sort->getOrderBys()) > 0) {
            $orderSql = $orderSql . 'ORDER BY';
            for ($i = 0; $i < count($sort->getOrderBys()); $i++) {
                if ($i > 0) {
                    $orderSql = $orderSql . ',';    
                }
                $orderSql = $orderSql . ' ' . $sort->getOrderBys()[$i] . ' ' . $sort->getSortOrders()[$i];
            }    
        }
        return $orderSql;
    }
    
    public static function getLimitSql($sort) 
    {
        if ($sort->getRpp() < 0) { 
            return ' ';
        } else {
            return ' LIMIT ' . $sort->getRpp() . ' OFFSET ' . (($sort->getCurrentPage() - 1) * $sort->getRpp());
        }
    }
}