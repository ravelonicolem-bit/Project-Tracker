<?php

namespace Modules\Projects\Enums;

enum ProjectStatus: string
{
    case Pending = 'Pending';
    case InProgress = 'In Progress';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';

    /**
     * @return array<string, string>
     */
    public function badgeClasses(): array
    {
        return match ($this) {
            self::Pending => ['bg' => 'bg-gray-100 dark:bg-gray-700', 'text' => 'text-gray-800 dark:text-gray-200'],
            self::InProgress => ['bg' => 'bg-blue-100 dark:bg-blue-900/50', 'text' => 'text-blue-800 dark:text-blue-200'],
            self::Completed => ['bg' => 'bg-green-100 dark:bg-green-900/50', 'text' => 'text-green-800 dark:text-green-200'],
            self::Cancelled => ['bg' => 'bg-red-100 dark:bg-red-900/50', 'text' => 'text-red-800 dark:text-red-200'],
        };
    }

    /**
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
