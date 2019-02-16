<?php
/**
*
* NOTICE OF LICENSE
*
* ==============================================================
*                 MAGENTO EDITION USAGE NOTICE
* ==============================================================
* This package designed for Magento COMMUNITY edition
* We do not guarantee correct work of this extension
* on any other Magento edition except Magento COMMUNITY edition.
* ==============================================================
*
* @category    Visitor Country
* @package     Visitor_Country
* @version     1.0
*
*/


namespace Visitor\Country\Controller\Planner;

class Country extends \Magento\Framework\App\Action\Action
{
    protected $objectManager;
    protected $_curl;


    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->_curl = $curl;
        $this->objectManager = $objectManager;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $visitorIp = $this->getVisitorIp();
        // YOUR_API_KEY : Get the API key from https://ipstack.com
        $url = "http://api.ipstack.com/".$visitorIp."?access_key=YOUR_API_KEY";
        $this->_curl->get($url);
        $response = json_decode($this->_curl->getBody(), true);
        // return visitor country
        return $response['country_code'];
    }

    /**
     * Function to get the visitor ip
     * @return text
     */
    function getVisitorIp() {
        $remoteAddress = $this->objectManager->create('Magento\Framework\HTTP\PhpEnvironment\RemoteAddress');
        return $remoteAddress->getRemoteAddress();
    }
}
