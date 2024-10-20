<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Helpers\Utilities;
use App\Models\LanguageModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Common data for child controllers to use
     */
    protected $data = [];

    /**
     * Supported languages (used for navi menu)
     */
    private $languages;

    /**
     * Throws Page Not Found exception
     */
    protected function notFound()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
    }

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $this->initData($request);        
    }

    private function initData(RequestInterface $request) 
    {
        // Implementing user-specified language
        $request->setLocale(Utilities::getSessionLocale());

        // Supported languages data
        $cache = \Config\Services::cache();
        $this->languages = $cache->get('languages');
        if ($this->languages === null) {
            $this->languages = model(LanguageModel::class)->getLanguages();
            // Store in cache for 24 hours (1440 minutes)
            $cache->save('languages', $this->languages, 24 * 60 * 60);
        }
        $this->data['languages'] = $this->languages;
    }
}
