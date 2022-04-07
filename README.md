"# WlRegistry"
Library for retrieving data from the register of VAT taxpayers
https://wl-api.mf.gov.pl/

This library uses Composer, just type in:

```php
composer require wlregistry/wlregistry
```

```php
$wl = new WLRegistry();

$wl->setDate("2021-01-01");
//Get single subject by nip number
$subject = $wl->searchSingleSubjectByNip("5252344078");
//Get list of subject by nip numbers 
$subject = $wl->searchSubjectsByNips("5252344078,1130054762");
//Get single subject by account number
$subject = $wl->searchSingleSubjectByBankAccount("34103015080000000504162001");
//Get list of subject by account numbers
$subject = $wl->searchSubjectsByBankAccounts("12114010100000361155001002,34103015080000000504162001");
//Get single subject by regon number
$subject = $wl->searchSingleSubjectByRegon("930171612");
//Get single subject by regon number
$subject = $wl->searchSubjectsByRegons("930171612,140182840");
//Check the assignment of the account to the nip number
$subject = $wl->checkSingleSubjectByNipAndBankAccounts("5252344078","34103015080000000504162001");
//Check the assignment of the account to the regon
$subject = $wl->checkSingleSubjectByRegonAndBankAccounts("930171612","12114010100000361155001002");


```