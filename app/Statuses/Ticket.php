<?php

namespace App\Statuses;

use App\Statuses\Traits\Status;

/**
 * Class Ticket
 * @package App\Statuses
 *
 * @method array status() status(int $id = null) show the status
 * @method array priority() priority(int $id = null) show the priority
 */
class Ticket
{
    use Status;

    public $status_closed   = 10;
    public $status_open     = 20;
    public $status_answered = 30;
    public $status_replied  = 40;
    public $status_hold     = 50;

    public $priority_low     = 10;
    public $priority_medium  = 20;
    public $priority_high    = 30;
    public $priority_urgent  = 40;

    private $status, $priority;

    /**
     * Ticket constructor.
     */
    public function __construct()
    {
        $this->status = [
            $this->status_closed    => 'بسته شده',
            $this->status_open      => 'باز',
            $this->status_answered  => 'پاسخ داده شده',
            $this->status_replied   => 'بررسی شده',
            $this->status_hold      => 'نگداشته شده',
        ];

        $this->priority = [
            $this->priority_low     => 'کم',
            $this->priority_medium  => 'متوسط',
            $this->priority_high    => 'زیاد',
            $this->priority_urgent  => 'فوری',
        ];
    }
}
