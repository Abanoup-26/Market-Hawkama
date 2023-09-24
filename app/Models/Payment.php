<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'cash'   => 'Cash',
        'credit' => 'Credit',
    ];

    public const PAYMENT_STATUS_RADIO = [
        'unpaid' => 'UnPaid',
        'paid'   => 'Paid',
    ];

    protected $fillable = [
        'user_id',
        'project_id',
        'payment_orderid',
        'donation_num',
        'donation',
        'payment_status',
        'payment_type',
        'completed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
