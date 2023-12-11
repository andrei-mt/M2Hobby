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
<img src="https://monosnap.com/file/bVNmIxvwYfg4fhsYSgXAQiItfEWDuk" />
![Screenshot](https://monosnap.com/file/5riDwmllHkNGFKU8VY0nUmY7ldbAli)
- Hobby options can be assigned in the admin panel.
![Screenshot](https://monosnap.com/file/6FT5yaqlTqReBKceClEfdzENg1Kg6j)
- Admin and customers are able to edit the attribute value.
- “Hobby“ appears in the top right corner of the site.


## Attributes
 - Customer - hobby (hobby)

