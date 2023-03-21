<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSession extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_session_id';

    protected $fillable = [
        'course_id',
        'specialization_session_id',
        'start_date',
        'end_date',
    ];

    /**
     * Get the course that the session belongs to.
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
