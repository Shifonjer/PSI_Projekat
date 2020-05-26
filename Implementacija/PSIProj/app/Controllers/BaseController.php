<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
        
        const RADNJA_1 = "https://maps.google.com/maps?q=Beograd%2C%20Milutina%20Milankovica%2021&t=&z=13&ie=UTF8&iwloc=&output=embed";
        const RADNJA_2 = "https://maps.google.com/maps?q=Beograd%2C%20Ustanicka%2015&t=&z=13&ie=UTF8&iwloc=&output=embed";
        const RADNJA_3 = "https://maps.google.com/maps?q=Obrenovac%2C%20Vuka%20Karadzica%2099&t=&z=13&ie=UTF8&iwloc=&output=embed";
        
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
	}
        
        public function getRadnja_1() {
            return self::RADNJA_1;
        }
        
        public function getRadnja_2() {
            return self::RADNJA_2;
        }
        
        public function getRadnja_3() {
            return self::RADNJA_3;
        }

}
