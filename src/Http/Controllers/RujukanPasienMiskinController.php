<?php namespace Bantenprov\RujukanPasienMiskin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\RujukanPasienMiskin\Facades\RujukanPasienMiskin;
use Bantenprov\RujukanPasienMiskin\Models\RujukanPasienMiskinModel;

/**
 * The RujukanPasienMiskinController class.
 *
 * @package Bantenprov\RujukanPasienMiskin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RujukanPasienMiskinController extends Controller
{
    public function demo()
    {
        return RujukanPasienMiskin::welcome();
    }
}
