<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property string $institution_name
 */
class Institution extends Model
{
    use HasFactory;

    protected $primaryKey = 'institution_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'institution_name',
        'institution_abbreviation',
        'institution_website',
        'institution_email',
        'dial_code',
        'institution_phone',
        'institution_address',
    ];
}
