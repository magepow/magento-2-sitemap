# Magento 2 Google Sitemap

Before you continue, ensure you meet the following requirements:

  * You have installed Magento 2.
  * You are using a Linux or Mac OS machine. Windows is not currently supported.


## 1. Download Magento 2 Google Site Map

 ### Install via composer (recommend).
Run the following commands in Magento 2 root folder:
```
composer require magepow/sitemap
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

## 2. User guide
   #### Key features of Magento 2 Google Sitemap Extension:
  * It allows you to exclude specific or certain Category/ Product/ CMS page links from sitemap.xml of your site.
  * It allows you to exclude duplicate and unwanted URLs from the sitemap.xml and HTML site map.
  * There is an attribute "Exclude from Sitemap" added to each of the Category/ Product/ CMS pages which can be set Yes/No to include/exclude a certain category, product, and static page links from Google site map.
  * It a great admin tool.
  * It fully supports multistore.
  * User-friendly interface.
  * Easy to install and manage.
  ### 2.1. General configuration

  `Login to Magento Admin > Stores > Configuration > Magepow > Sitemap > HTML Sitemap > Choose Yes/No to Show or hide HTML Site map.`
  
  ![Image of Magento admin config](https://github.com/magepow/magento2-sitemap/blob/master/media/htmlsitemap.png)
  * Categories Sitemap: choose yes to show the category list in HTML sitemap.
  * Pages Sitemap: choose yes to show the cms page list in HTML sitemap.
  * Products Sitemap: choose yes to show the product list in HTML sitemap.
  * Limit Product Sitemap: show the product number to be displayed according to the settings. 
  * Additional Links: choose yes to show text add the link HTML site you want in the HTML sitemap.
  * Add Sitemap Link to Footer: choose yes to show link html sitemap on footer website.
  ![Image of Magento admin config](https://github.com/magepow/magento2-sitemap/blob/master/media/linkfooter.png)
  `Login to Magento Admin > Stores > Configuration > Magepow > Sitemap > XML Sitemap > Enable Additional Links > Choose Yes/No to add link XML Sitemap.`
  ![Image of Magento admin config](https://github.com/magepow/magento2-sitemap/blob/master/media/addlinksitemap.png)
  ### 2.2. Config Product, Category and Cms page 
   `Login to Magento Admin > Catalog > Products => Click a product in  Exclude from Sitemap, choose yes/no will hide or show link product in HTML Sitemap and XML Sitemap.`
   ![Image of Magento admin config](https://github.com/magepow/magento2-sitemap/blob/master/media/productsitemap.png)
   * The same config part product config category and cms page also.
   `Login to Magento Admin >  Catalog > Categories => Click a product in  Exclude from Sitemap, choose yes/no will hide or show link category in HTML Sitemap and XML Sitemap.` 
   ![Image of Magento admin config](https://github.com/magepow/magento2-sitemap/blob/master/media/categorysitemap.png)
   `Login to Magento Admin > Content > Pages => Click edit a cms page in  Exclude from Sitemap, choose yes/no will hide or show link cms page in HTML Sitemap and XML Sitemap.` 
   ![Image of Magento admin config](https://github.com/magepow/magento2-sitemap/blob/master/media/cmspagesitemap.png)
  ### 2.3. Result 
  * XML Sitemap:
  ![Image of Magento storefront](https://github.com/magepow/magento2-sitemap/blob/master/media/xmlsitemap.png)
  * HTML Sitemap: 
  On the Home page click HTML Sitemap in the footer website.
  ![Image of Magento storefront](https://github.com/magepow/magento2-sitemap/blob/master/media/linkfooter.png)
  Will displays the HTML Site map according to your settings.
  ![Image of Magento storefront](https://github.com/magepow/magento2-sitemap/blob/master/media/htmlsitemap1.png)
 ## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :).

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/alopay)

      
**Free Extensions List**

* [Magento 2 Categories Extension](https://magepow.com/magento-categories-extension.html)

* [Magento 2 Sticky Cart](https://magepow.com/magento-sticky-cart.html)

**Premium Extensions List**

* [Magento 2 Pages Speed Optimizer](https://magepow.com/magento2-speed-optimizer.html)

* [Magento 2 Mutil Translate](https://magepow.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://magepow.com/magento-2-instagram.html)

* [Magento 2 Lookbook Pin Products](https://magepow.com/lookbook-pin-products.html)

**Featured Magento Themes**

* [Expert Multipurpose responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro Food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife Organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)

**Featured Magento Services**

* [PSD to Magento 2 Theme Conversion](https://magepow.com/psd-to-magento-theme-conversion.html)

* [Magento Speed Optimization Service](https://magepow.com/magento-speed-optimization-service.html)

* [Magento Security Patch Installation](https://magepow.com/magento-security-patch-installation.html)

* [Magento Website Maintenance Service](https://magepow.com/website-maintenance-service.html)

* [Magento Professional Installation Service](https://magepow.com/professional-installation-service.html)

* [Magento Upgrade Service](https://magepow.com/magento-upgrade-service.html)

* [Customization Service](https://magepow.com/customization-service.html)

* [Hire Magento Developer](https://magepow.com/hire-magento-developer.html)

[![Latest Stable Version](https://poser.pugx.org/magepow/sitemap/v/stable)](https://packagist.org/packages/magepow/sitemap)
[![Total Downloads](https://poser.pugx.org/magepow/sitemap/downloads)](https://packagist.org/packages/magepow/sitemap)
