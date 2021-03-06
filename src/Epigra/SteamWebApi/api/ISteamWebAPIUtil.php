<?php 
namespace Epigra\SteamWebApi\Api;

use Epigra\SteamWebApi\Api\AbstractSteamAPI;
use Epigra\SteamWebApi\Util\SteamApiUtil;
use Epigra\SteamWebApi\Constants\ApiModules;
use Epigra\SteamWebApi\Constants\ApiMethods;
use Epigra\SteamWebApi\Config\ApiConfiguration;
use Epigra\SteamWebApi\Http\HTTPMethod;

/**
 * ISteamWebAPIUtil class handles operations relating to itself.
 * 
 * @link [https://wiki.teamfortress.com/wiki/WebAPI] [Wiki For Web API]
 * @author Gokhan Akkurt
 *
 */
class ISteamWebAPIUtil extends AbstractSteamAPI{

   /**
     *  Returns WebAPI server time & checks server status.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetServerInfo] [GetServerInfo]
     *  @return $response 
     *
     */
	public static function getServerInfo()
    {
    	$params = SteamApiUtil::formGETParameters(array('format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::ISteamWebAPIUtil;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetServerInfo');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }

   /**
     *  Lists all available WebAPI interfaces.
     *  @link [https://wiki.teamfortress.com/wiki/WebAPI/GetSupportedAPIList] [GetSupportedAPIList]
     *  @param $key [API Key value]
     *  @return $response 
     *
     */
    public static function getSupportedAPIList($key)
    {
    	$params = SteamApiUtil::formGETParameters(array('key' =>$key, 'format'=> parent::getConfiguration()->getResponseFormat()));
        $module = ApiModules::ISteamWebAPIUtil;
        $endpoint = ApiMethods::getEndpointUrl($module, 'GetSupportedAPIList');
        $url = SteamApiUtil::formUrl($module,$endpoint);
        return parent::sendRequest(HTTPMethod::GET, $url, $params);
    }
}