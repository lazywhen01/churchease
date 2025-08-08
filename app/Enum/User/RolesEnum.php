<?php

namespace App\Enum\User;

enum RolesEnum: string
{
    case SuperAdmin = 'Super Admin';
    case ChurchAdmin = 'Church Admin';
    case Volunteer = 'Volunteer'; 
    case Guest = 'Guest';  
    case User = 'User';
}
