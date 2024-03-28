<?php

namespace App\Enums;

enum UserRole: string
{
    case admin = "Admin";
    case producer = "Producer";
    case customer = "Customer";
}