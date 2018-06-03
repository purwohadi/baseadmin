<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPER_ADMIN_ID = 1;
    const SUPER_ADMIN_NAME = 'super-admin';
    const INSTRUCTOR_ID = 2;
    const INSTRUCTOR_NAME = 'instructor';
    const STUDENT_ID = 3;
    const STUDENT_NAME = 'student';
}