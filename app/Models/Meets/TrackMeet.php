<?php

namespace App\Models\Meets;

use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Timing;

class TrackMeet extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'track_meets';

   /**
    * Fillable fields for a Track Meet.
    *
    * @var array
    */
   protected $fillable = [
       'meet_name_id',
       'meet_date',
       'season_id',
       'host_id',
       'venue_id',
       'timing_method_id'
   ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function name()
    {
        return $this->belongsTo(Name::class, 'meet_name_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_method_id');
    }
}
