<?php namespace Bantenprov\RujukanPasienMiskin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The RujukanPasienMiskin facade.
 *
 * @package Bantenprov\RujukanPasienMiskin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RujukanPasienMiskin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rujukan-pasien-miskin';
    }
}
