<?php

namespace App\Model;

use MiniLaravel\Orm\Model;

class User extends Model
{
    protected $fillable = ["id", "age", "name"];
}