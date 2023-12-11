## Main Functionalities
Module that add hobby attribute to customer.

## Installation

### Type 1: Zip file

 - Unzip the zip file in `app/code/MT`
 - Enable the module by running `php bin/magento module:enable MT_Hobby`
 - Apply database updates by running `php bin/magento setup:upgrade`
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Add the composer repository to the configuration by running `composer config repositories.repo.mt.module composer https://github.com/andrei-mt/M2Hobby.git`
 - Install the module composer by running `composer require mt/module-hobby`
 - enable the module by running `php bin/magento module:enable MT_Hobby`
 - apply database updates by running `php bin/magento setup:upgrade`
 - Flush the cache by running `php bin/magento cache:flush`

## Specifications

Module add a custom customer attribute “Hobby“.
- Allows to fetch / edit the attribute using GraphQL.
<img width="1151"  src="https://github.com/andrei-mt/M2Hobby/assets/97022420/6a43df70-0426-40d2-9f77-faef1c8676ad">
<img width="1440" src="https://github.com/andrei-mt/M2Hobby/assets/97022420/1145fb33-dca8-4b69-8140-a70ddce8a0c8">
- Hobby options can be assigned in the admin panel.
<img width="1371" src="https://github.com/andrei-mt/M2Hobby/assets/97022420/c82d17de-1c7f-40df-8198-fd3c8318c44e">
- Admin and customers are able to edit the attribute value.
- “Hobby“ appears in the top right corner of the site.


## Attributes
 - Customer - hobby (hobby)

