<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use App\Models\BaseModel;

class UserModel extends ShieldUserModel
{
  public const DEFAULT_ORDERBYS                 = array('created_at');
  public const DEFAULT_SORTORDERS               = array('DESC');
  
  public const HEADER_USERNAME_ORDERBYS         = array('username');
  public const HEADER_USERNAME_SORTORDERS       = array('ASC');

  public const HEADER_EMAIL_ORDERBYS            = array('email');
  public const HEADER_EMAIL_SORTORDERS          = array('ASC');
  
  public const HEADER_ACTIVE_ORDERBYS           = array('active');
  public const HEADER_ACTIVE_SORTORDERS         = array('ASC');

  public const HEADER_STATUS_ORDERBYS           = array('status');
  public const HEADER_STATUS_SORTORDERS         = array('ASC');

  public const HEADER_STATUSMESSAGE_ORDERBYS    = array('status_message');
  public const HEADER_STATUSMESSAGE_SORTORDERS  = array('ASC');

  public const HEADER_GROUPS_ORDERBYS           = array('groups');
  public const HEADER_GROUPS_SORTORDERS         = array('ASC');

  public const HEADER_LASTLOGIN_ORDERBYS        = array('last_login');
  public const HEADER_LASTLOGIN_SORTORDERS      = array('ASC');

  public const HEADER_CREATEDAT_ORDERBYS        = array('created_at');
  public const HEADER_CREATEDAT_SORTORDERS      = array('ASC');

  public const HEADER_SEQUENCE_ORDERBYS         = self::DEFAULT_ORDERBYS;
  public const HEADER_SEQUENCE_SORTORDERS       = self::DEFAULT_SORTORDERS;

  public function getUsers($sort)
  {
    $this->db->transStart();

    $sql = 
      'SELECT us.*, aid.secret as email,
        (SELECT (CASE WHEN alo.success = 0 THEN NULL ELSE alo.date END) 
          FROM auth_logins alo
          WHERE alo.user_id = us.id
          ORDER BY alo.id DESC LIMIT 1 OFFSET 0) as last_login,
        (SELECT GROUP_CONCAT(DISTINCT agu.group)
          FROM auth_groups_users agu
          WHERE agu.user_id = us.id ORDER BY agu.group DESC) groups
      FROM users us
      JOIN auth_identities aid ON us.id = aid.user_id
      WHERE aid.type = :type:
      GROUP BY us.id, aid.secret' .
      BaseModel::getOrderBySql($sort) .
      BaseModel::getLimitSql($sort);

    $query = $this->db->query($sql, ['type' => Session::ID_TYPE_EMAIL_PASSWORD,]);
    $trans = $query->getResult(User::class);
    $query->freeResult();

    $this->db->transComplete();

    return $trans;
  }

  public function getUserCount(): int
  {
    return $this->countAll();
  }
}
