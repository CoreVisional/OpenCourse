<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_name',
        'course_description',
        'course_image',
        'course_commitment',
        'minimum_grade',
    ];

    /**
     * Get the instructor that is assigned to the Course
     *
     * @return BelongsToMany
     */
    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class, 'course_instructors', 'course_id', 'instructor_id');
    }


    /**
     * Get the sessions of the course.
     *
     * @return HasMany
     */
    public function courseSessions(): HasMany
    {
        return $this->hasMany(CourseSession::class, 'course_id');
    }

    /**
     * Get the institutions that belong to the course.
     */
    public function institutions(): BelongsToMany
    {
        return $this->belongsToMany(Institution::class, 'course_institutions', 'course_id', 'institution_id');
    }
}
