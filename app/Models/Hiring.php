<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hiring extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const CAPACITY_SELECT = [
        '1' => 'Lotação Teste',
    ];

    public const CLT_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public $table = 'hirings';

    protected $dates = [
        'date_birth',
        'beginning',
        'finish',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'construction_id',
        'partner_id',
        'date_birth',
        'occupation_id',
        'salary',
        'company_id',
        'capacity',
        'beginning',
        'finish',
        'clt',
        'registration',
        'health_plan',
        'vehicle_rental',
        'laptop_rental',
        'phone_plan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function construction()
    {
        return $this->belongsTo(Construction::class, 'construction_id');
    }

    public function partner()
    {
        return $this->belongsTo(BusinessPartner::class, 'partner_id');
    }

    public function getDateBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateBirthAttribute($value)
    {
        $this->attributes['date_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getBeginningAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBeginningAttribute($value)
    {
        $this->attributes['beginning'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFinishAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFinishAttribute($value)
    {
        $this->attributes['finish'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
