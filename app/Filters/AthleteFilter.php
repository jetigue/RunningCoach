<?php

namespace App\Filters;

class AthleteFilter extends Filters
{
  /**
   * Registered filters to operate upon.
   * 
   * @var array
   */
  protected $filters = ['active', 'inactive'];

    /**
    * Filter the query by active athletes.
    *
    * @return Builder
    */
    protected function active()
    {
        return $this->builder->where('status', 'a' );
    }

    /**
    * Filter the query by inactive athletes.
    *
    * @return Builder
    */
    protected function inactive()
    {
        return $this->builder->where('status', 'i');
    }

}