<?php

namespace Magepow\Sitemap\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magepow\Sitemap\Helper\Data as HelperConfig;

/**
 * Class Index
 * @package Magepow\Sitemap\Controller\Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var HelperConfig
     */
    protected $helperConfig;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param HelperConfig $helperConfig
     */
    public function __construct(Context $context, PageFactory $pageFactory, HelperConfig $helperConfig)
    {
        $this->pageFactory  = $pageFactory;
        $this->helperConfig = $helperConfig;

        return parent::__construct($context);
    }

    /**
     * @return Page
     * @throws NotFoundException
     */
    public function execute()
    {
        if (!$this->helperConfig->getConfigModule('general/enabled')) {
            throw new NotFoundException(__('Parameter is incorrect.'));
        }

        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set(__('HTML Sitemap'));

        return $page;
    }
}
