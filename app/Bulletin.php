<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bulletin
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bulletin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bulletin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bulletin query()
 * @mixin \Eloquent
 */
class Bulletin extends Model
{
    protected $fillable = [
        'subject',
        'headerMessage',
        'message',
        'footerMessage'
    ];

    public static function getMailsFromInstructors($withouthTrainings, $areScholarshipped)
    {
        if ($withouthTrainings) {
            $emails = Instructor::where('is_scholarshipped', $areScholarshipped)
                ->with('capacitaciones')
                ->has('capacitaciones', '=', 0)
                ->get()
                ->pluck('instructor_email');
        } else {
            $emails = Instructor::where('is_scholarshipped', $areScholarshipped)
                ->with('capacitaciones')
                ->has('capacitaciones', '>=', 1)
                ->get()
                ->pluck('instructor_email');
        }

        return $emails;
    }
}
