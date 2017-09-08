cur_stat
=======

A Symfony project created on January 18, 2017, 1:08 pm.   
This is a small application that will query the api <a href="http://fixer.io/">api.fixer.io</a> for
the Forex rates and do some data manipulation with it.  
It will get the exchange rates for the 5 last weekdays and calculate the Min, Max and Average value 
for these 5 days.
The rates are retrieved from the european central bank and the EUR is the base currency, so all the rates are relative to EUR.  
The calculations are done for the currencies: <code>CHF</code>, <code>GBP</code>,
 <code>JPY</code> and <code>USD</code>.</p>
 
<h2>Install instructions</h2>

 To install the application, you need to :
 1. Clone the repository: `git clone https://github.com/berserck/curstat.git`
 2. Download Symphony: ` curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony`
 3. Make symphony executable: `chmod a+x /usr/local/bin/symfony`
 4. Check if you have all the requirements installed: `php bin/symfony_requirements`
 5. You will need composer installed: if composer is not installed check installation in 
 <a href="https://getcomposer.org/download/">Composer page</a>.
 6. Instal dependencies: `php composer.phar install --no-dev --optimize-autoloader`
 7. If you are using apache, see in the page <a href="https://symfony.com/doc/current/setup/web_server_configuration.html#web-server-apache-mod-php">
 Symphony Apache with mod_php</a>
 8. If you added a new virtual server, don't forget to enable ist with: `a2ensite <newsite>`
 
 
# License
Released under MIT License 

