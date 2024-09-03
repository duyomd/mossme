<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;
use App\Entities\UserSettings;
use App\Helpers\Utilities;

class UserSettingsModel extends BaseModel
{
    protected $table = 'user_settings';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'user_id', 'language_code', 'rows_per_page', 'num_of_cards', 'num_of_feeds',
        'theme_code', 'lite_mode', 
    ];
    protected $returnType = UserSettings::class;

    public function getUserSettings($user_id) {
        if (!isset($user_id)) return null;
        return $this->where('user_id', $user_id)->first();
    }

    public function saveUserSettings($userSettings) {
        if ($this->getUserSettings($userSettings->user_id) == null) {
            return $this->insert($userSettings);
        }
        return $this->save($userSettings);
    }

}