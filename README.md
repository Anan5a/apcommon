# AP-Common
A class to make your custom PHP development faster.
## Example
```php
require_once "path/to/APCommon.php";
$apcmn=new APCommon;
echo $apcmn->time_ago("2016-11-28T18:12:29+01:00");
``` 
## See ```howto.php``` for more info and examples.
### Note
The time_ago() method is dependent on your server time.
Use this format '2016-11-28T18:12:29+01:00' to get accurate output. '2016-11-28' may give 0 if the supplied date and today is similar.
