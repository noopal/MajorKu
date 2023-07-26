<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as BasePermission;

class Permissions extends BasePermission
{
    protected $guard_name = 'web'; // Ganti 'web' dengan guard yang sesuai
}
