# visitor-country-code
This custom module will helps to return the visitor country code based on the IP location.

# This module using http://api.ipstack.com to get visitor details based on IP location.
For developer/business purpose can get the API_KEY and subscribe plan from http://api.ipstack.com

After clone and move to your project folder run the below commands
1) Enable the module 
php bin/magento module:enable Visitor_Country

2) Set up upgrade
php bin/magento setup:upgrade

3) Di-compile the code
php bin/magento setup:di:compile

4) For the instance response hit the URL in browser
www.yourdomain.com/visitorcountry/country/

# For sample test purpose use the give URL in browser
http://api.ipstack.com/YOUR_IP?access_key=API_KEY
