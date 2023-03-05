<?php

namespace App\Constants;

class Constant
{
    // user statuses
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';

    // roles constants
    const SUPER_ADMIN = 'super-admin';
    const COMPANY = 'company';
    const MANAGER = 'manager';
    const EMPLOYEE = 'employee';

    // shifts constants
    const ACTIVE = 'active';
    const COMPLETED = 'completed';
    const CANCELLED = 'cancelled';
}
