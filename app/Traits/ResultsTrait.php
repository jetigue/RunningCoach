<?php
namespace App\Traits;

trait ResultsTrait
{

    /**
     * @return string
     */
    public function getPlaceWithSuffixAttribute()
    {
        $value = $this->attributes['place'];

        if ($value != null) {
            if (! in_array(($value % 100), [11, 12, 13])) {
                switch ($value % 10) {
                    // Handle 1st, 2nd, 3rd
                    case 1:
                        return $value.'st';
                    case 2:
                        return $value.'nd';
                    case 3:
                        return $value.'rd';
                }
            }
            return $value.'th';
        }
    }

    /**
     * @return false|string
     */
    public function getTimeAttribute()
    {
        $seconds = $this->attributes['total_seconds'];

        return gmdate('i:s', $seconds);
    }

    /**
     * @return string
     */
    public function getMillisecondAttribute()
    {
        return str_pad($this->attributes['milliseconds'], 2, '0', STR_PAD_LEFT);
    }
}


