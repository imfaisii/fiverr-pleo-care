<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ShiftsEnum extends Enum
{
    const CANCELLED = 'cancelled';
    const ACTIVE = 'active';
    const COMPLETED = 'completed';

    public function isCancelled(): bool
    {
        return $this->value === self::CANCELLED;
    }

    public function isActive(): bool
    {
        return $this->value === self::ACTIVE;
    }

    public function isCompleted(): bool
    {
        return $this->value === self::COMPLETED;
    }

    public function getLabelText(): string
    {
        return match ($this->value) {
            self::CANCELLED => 'Cancelled',
            self::ACTIVE => 'Active',
            self::COMPLETED => 'Completed',
        };
    }

    public function getLabelColor(): string
    {
        return match ($this->value) {
            self::CANCELLED => 'badge-danger',
            self::ACTIVE => 'badge-primary',
            self::COMPLETED => 'badge-success',
        };
    }

    public function getLabelHtml(): string
    {
        return sprintf('<span class="badge badge-sm %s">%s</span>', $this->getLabelColor(), $this->getLabelText());
    }
}
