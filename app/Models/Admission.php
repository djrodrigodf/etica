<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admission extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const CAR_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const MOTHER_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const FATHER_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const CHILDREN_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const RELATIVE_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const FOREIGNER_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const FIRST_JOB_RADIO = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const SPECIAL_NEED_SELECT = [
        'Sim' => 'Sim',
        'Não' => 'Não',
    ];

    public const GENDER_SELECT = [
        'Masculino' => 'Masculino',
        'Feminino'  => 'Feminino',
    ];

    public const LEVEL_EDUCATION_SELECT = [
        'Concluído'     => 'Concluído',
        'Em Curso'      => 'Em Curso',
        'Não Concluído' => 'Não Concluído',
    ];

    public const EDUCATION_LEVEL_SELECT = [
        'Fundamental'   => 'Fundamental',
        'Médio'         => 'Médio',
        'Superior'      => 'Superior',
        'Pós Graduação' => 'Pós Graduação',
    ];

    public const SKIN_SELECT = [
        'Indígena' => 'Indígena',
        'Branca'   => 'Branca',
        'Negra'    => 'Negra',
        'Amarela'  => 'Amarela',
        'Parda'    => 'Parda',
        'Outros'   => 'Outros',
    ];

    public const MARITAL_STATUS_SELECT = [
        'Solteiro'      => 'Solteiro',
        'Casado'        => 'Casado',
        'União Estável' => 'União Estável',
        'Divorciado'    => 'Divorciado',
        'Viúvo'         => 'Viúvo',
    ];

    public $table = 'admissions';

    protected $dates = [
        'admission_date',
        'birth',
        'spouse_birth',
        'date_declaration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_id',
        'construction_id',
        'partner_id',
        'occupation_id',
        'salary_id',
        'admission_date',
        'rg',
        'ctps',
        'serial',
        'uf',
        'gender',
        'birth',
        'naturalness',
        'phone_contact',
        'phone_message',
        'marital_status',
        'spouse',
        'spouse_birth',
        'spouse_cpf',
        'spouse_rg',
        'children',
        'children_qtd',
        'dependent',
        'mother',
        'father',
        'foreigner',
        'foreigner_metadata',
        'education_level',
        'level_education',
        'other_courses',
        'skin',
        'special_need',
        'deficiency',
        'relative',
        'relative_name',
        'relative_kinship',
        'car',
        'first_job',
        'tshirt',
        'pants',
        'boot',
        'bank',
        'bank_account',
        'bank_type',
        'bank_agency',
        'operation',
        'pix',
        'date_declaration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function construction()
    {
        return $this->belongsTo(Construction::class, 'construction_id');
    }

    public function partner()
    {
        return $this->belongsTo(BusinessPartner::class, 'partner_id');
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    public function getAdmissionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAdmissionDateAttribute($value)
    {
        $this->attributes['admission_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthAttribute($value)
    {
        $this->attributes['birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSpouseBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSpouseBirthAttribute($value)
    {
        $this->attributes['spouse_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateDeclarationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateDeclarationAttribute($value)
    {
        $this->attributes['date_declaration'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
