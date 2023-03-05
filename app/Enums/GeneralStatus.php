<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class GeneralStatus extends Enum
{
    const ACTIVE = 'active';
    const IN_ACTIVE = 'inactive';

    public function isActive(): bool
    {
        return $this->value === self::ACTIVE;
    }

    public function isInactive(): bool
    {
        return $this->value === self::IN_ACTIVE;
    }

    public function getLabelText(): string
    {
        return match ($this->value) {
            self::ACTIVE => 'Active',
            self::IN_ACTIVE => 'Inactive',
        };
    }

    public function getLabelColor(): string
    {
        return match ($this->value) {
            self::ACTIVE => 'badge-success',
            self::IN_ACTIVE => 'badge-danger',
        };
    }

    public function getLabelHtml(): string
    {
        return sprintf('<span class="badge badge-sm %s">%s</span>', $this->getLabelColor(), $this->getLabelText());
    }
}
