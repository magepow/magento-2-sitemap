<?php

namespace Magepow\Sitemap\Block;

/**
 * Class Sitemap
 * @package Magepow\Sitemap\Block
 */
class Sitemap extends \Magento\Framework\View\Element\Template
{

    /**
     * @var Category
     */
    protected $_categoryHelper;

    /**
     * @var CollectionFactory
     */
    protected $_categoryCollection;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var HelperConfig
     */
    protected $_helper;

    /**
     * @var ProductCollection
     */
    protected $productCollection;

    /**
     * @var Stock
     */
    protected $_stockFilter;

    /**
     * @var ProductVisibility
     */
    protected $productVisibility;

    /**
     * @type StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Sitemap constructor.
     *
     * @param Context $context
     * @param Category $categoryHelper

     * @param CollectionFactory $categoryCollection
     * @param CategoryRepository $categoryRepository
     * @param HelperConfig $helper
     * @param ProductCollection $productCollection

     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magepow\Sitemap\Helper\Data $helper,
        \Magento\CatalogInventory\Helper\Stock $stockFilter,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,
        \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection,
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->_categoryHelper     = $categoryHelper;
        $this->_categoryCollection = $categoryCollection;
        $this->categoryRepository  = $categoryRepository;
        $this->_helper             = $helper;
        $this->productCollection   = $productCollection;
        $this->_stockFilter        = $stockFilter;
        $this->productVisibility   = $productVisibility;
        $this->pageFactory         = $pageFactory;

        parent::__construct($context);
    }


    /**
     * [getConfig description]
     *@throws Magepow\Sitemap\Helper\Data
     */
    public function getConfig($cfg=null)
    {

        return $this->_helper->getConfigModule($cfg);
    }
    /**
     * Get product collection
     * @return mixed
     */
    public function getProductCollection()
    {
        $limit      = $this->getConfig('general/product_limit') ?: 100;
        $limit = (int)$limit;
        if ($limit >= 0 && $limit != null) {
            if ($limit > 50000) {
                $limit = 50000;
            }
        } else {
            $limit = 50000;
        }
        $collection = $this->productCollection->addAttributeToSelect('*')
                ->addFieldToFilter('xml_sitemap_exclude', [
                        ['null' => true],
                        ['eq' => ''],
                        ['eq' => 'NO FIELD'],
                        ['eq' => '0'],
                    ]);

        $collection->setVisibility($this->productVisibility->getVisibleInCatalogIds());
        $collection->addWebsiteFilter()->setPageSize($limit);
        if (!$this->_helper->getConfig('cataloginventory/options/show_out_of_stock')) {
            $this->_stockFilter->addInStockFilterToCollection($collection);
        }
        return $collection;
    }

    /**
     * Get category collection
     * @return \Magento\Framework\Data\Tree\Node\Collection
     */
    public function getCategoryCollection()
    {
        $collection = $this->_categoryCollection->create();
        $collection->addAttributeToSelect('*');
        $collection->addFieldToFilter('xml_sitemap_exclude', [
                ['null' => true],
                ['eq' => ''],
                ['eq' => 'NO FIELD'],
                ['eq' => '0'],
            ]);
        return $collection;
    }

    /**
     * @param $categoryId
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getCategoryUrl($categoryId)
    {
        return $this->_categoryHelper->getCategoryUrl($this->categoryRepository->get($categoryId));
    }

    /**
     * Get page collection
     * @return mixed
     */
    public function getPageCollection()
    {
        $collection = $this->pageFactory->create()->getCollection();
        $collection->addFieldToSelect("*");
        $collection->addFieldToFilter('xml_sitemap_exclude', [
                ['null' => true],
                ['eq' => ''],
                ['eq' => 'NO FIELD'],
                ['eq' => '0'],
            ]);
        return $collection;
    }

    /**
     * Get addition link collection
     * @return mixed
     */
    public function getAdditionLinks()
    {
        $additionLinks = $this->getConfig('general/additional_links');
       
        $allLink       = explode("\n", $additionLinks);

        $result = [];
        foreach ($allLink as $link) {
            if (count($component = explode(',', $link)) > 1) {
                $result[$component[0]] = $component[1];
            }
        }

        return $result;
    }

    /**
     * Render link element
     *
     * @param $link
     * @param $title
     *
     * @return string
     */
    public function renderLinkElement($link, $title)
    {
        return '<li><a href="' . $link . '">' . __($title) . '</a></li>';
    }

    /**
     * @param $section
     * @param $title
     * @param $collection
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function renderSection($section,$title, $collection)
    {
        $html = '<div class="row">';
        $html .= '<h2>' . __($title) . '</h2>';
        if ($collection) {
            $html .= '<ul class="sitemap-listing">';
            foreach ($collection as $key => $item) {
                switch ($section) {
                    case 'category':
                        $html .= $this->renderLinkElement($this->getCategoryUrl($item->getId()), $item->getName());
                        break;
                    case 'page':
                        $html .= $this->renderLinkElement($this->getUrl($item->getIdentifier()), $item->getTitle());
                        break;
                    case 'product':
                        $html .= $this->renderLinkElement($this->getUrl($item->getProductUrl()), $item->getName());
                        break;
                    case 'link':
                        $html .= $this->renderLinkElement($key, $item);
                        break;
                }
            }
            $html .= '</ul>';
        }
        $html .= '</div>';

        return $html;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getHtmlSitemap()
    {
        $htmlSitemap = '';
        if($this->getConfig('general/category')){
            $htmlSitemap .= $this->renderSection(
                'category',
                'Categories list',
                $this->getCategoryCollection()
            );            
        }

        if($this->getConfig('general/page')){
            $htmlSitemap .= $this->renderSection(
                'page',
                'Pages list',
                $this->getPageCollection()
            );            
        }

        if($this->getConfig('general/product')){
            $htmlSitemap .= $this->renderSection(
                'product',
                'Products list',
                $this->getProductCollection()
            );
        }
        if($this->getConfig('general/enable_add_links')){
            $htmlSitemap .= $this->renderSection(
                'link',
                'Additional links',
                $this->getAdditionLinks()
            );
        }

        return $htmlSitemap;
    }

}
