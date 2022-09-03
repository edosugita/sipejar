<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table = 'chat';
    protected $useTimeStamps = true;
    protected $allowedFields = ['user_id', 'post_id', 'content', 'created_at'];
}
