<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;

    public const STATE_SELECT = [
        'private' => 'private',
        'arrival' => 'arrival',
        'funding' => 'funding',
    ];

    public const RISK_SELECT = [
        'C'   => 'C',
        'CC'  => 'CC',
        'CCC' => 'CCC',
        'B'   => 'B',
        'BB'  => 'BB',
        'BBB' => 'BBB',
        'A'   => 'A',
        'AA'  => 'AA',
        'AAA' => 'AAA',
    ];

    public $table = 'products';

    public static $search = [
        'name',
        'location',
        'opportunity_code',
        'maximum_target',
        'minimum_target',
        'risk',
        'repayment',
        'prepay_invest',
        'email_owner',
        'financial_details',
    ];

    public $filterable = [
        'id',
        'name',
        'description',
        'category.name',
        'location',
        'short_description',
        'opportunity_code',
        'maximum_target',
        'minimum_target',
        'roi',
        'start_founding',
        'end_founding',
        'risk',
        'repayment',
        'email_owner',
        'section',
        'financial_details',
        'state',
        'bonus_multiplier',
    ];

    public $orderable = [
        'id',
        'name',
        'description',
        'location',
        'short_description',
        'opportunity_code',
        'maximum_target',
        'minimum_target',
        'roi',
        'start_founding',
        'end_founding',
        'risk',
        'repayment',
        'manager_prepay_invest',
        'prepay_invest',
        'email_owner',
        'section',
        'financial_details',
        'state',
        'bonus_multiplier',
    ];

    protected $appends = [
        'photo',
        'documents',
    ];

    protected $casts = [
        'manager_prepay_invest' => 'boolean',
        'prepay_invest'         => 'boolean',
    ];

    protected $dates = [
        'start_founding',
        'end_founding',
        'repayment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'location',
        'short_description',
        'opportunity_code',
        'maximum_target',
        'minimum_target',
        'roi',
        'start_founding',
        'end_founding',
        'risk',
        'repayment',
        'manager_prepay_invest',
        'prepay_invest',
        'email_owner',
        'section',
        'financial_details',
        'state',
        'bonus_multiplier',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function category()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function getPhotoAttribute()
    {
        return $this->getMedia('product_photo')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getStartFoundingAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setStartFoundingAttribute($value)
    {
        $this->attributes['start_founding'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndFoundingAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEndFoundingAttribute($value)
    {
        $this->attributes['end_founding'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getRiskLabelAttribute($value)
    {
        return static::RISK_SELECT[$this->risk] ?? null;
    }

    public function getRepaymentAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setRepaymentAttribute($value)
    {
        $this->attributes['repayment'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDocumentsAttribute()
    {
        return $this->getMedia('product_documents')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getStateLabelAttribute($value)
    {
        return static::STATE_SELECT[$this->state] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
