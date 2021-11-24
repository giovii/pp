<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'transactions';

    public static $search = [
        'opportunity_code',
    ];

    public $orderable = [
        'id',
        'opportunity_code.opportunity_code',
        'user.email',
        'invested',
    ];

    public $filterable = [
        'id',
        'opportunity_code.opportunity_code',
        'user.email',
        'invested',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'opportunity_code_id',
        'user_id',
        'invested',
    ];

    public function opportunityCode()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
