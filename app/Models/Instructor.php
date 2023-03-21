<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instructor extends Model
{
    use HasFactory;

    protected $primaryKey = 'instructor_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'institution_id',
        'instructor_name',
        'instructor_title',
        'instructor_department',
    ];

    /**
     * Get the institution that owns the Instructor
     *
     * @return BelongsTo
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    /**
     * Get the user that owns the Instructor
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the courses for the Instructor
     *
     * @return BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_instructors', 'instructor_id', 'course_id');
    }
}
