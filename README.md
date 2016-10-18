## Clima
A [Lumen](https://lumen.laravel.com/) app that interacts with Wunderground's API. Lumen is a a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax.

## Lumen Documentation
Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/).

## Prerequisites
The following system requirements must be satisfied:

* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension

In addition to the requirements above, you will also need to have [Composer](https://getcomposer.org/) installed on your local system.

Finally, even though the prerequisites state PHP version >= 5.6.4, we use PHP 7 features such as scalar types and return types.

### Configuration
You will find a `.env.example` file, rename or make a copy to `.env`. You **must** set the `WUNDERGROUND_API_KEY` environment variable with your own key. You can obtain a key [here](https://www.wunderground.com/weather/api/d/pricing.html) and it must be at least the **cumulus** plan.

#### Fix Permissions		
 Lumen may need permission to be able to write to its storage folder:		
 
```
$ sudo chown -R www-data: app/storage		
$ sudo chmod -R 755 app/storage
```

#### Install PHP		
 Use the latest available version of PHP as a matter of principle:

##### Linux
	
 ```		
 $ sudo add-apt-repository ppa:ondrej/php		
 $ sudo apt-get update		
 $ sudo apt-get install php7.1-cli
```

Note we are installing `php7.1-cli` and **not** `php7.0` as we do not need Apache. As of PHP 5.4.0, the CLI SAPI provides a built-in web server that is suitable for devlopement purposes.

##### macOS
Via [Homebrew](http://brew.sh/)

```
$ brew tap homebrew/dupes  
$ brew tap homebrew/versions  
$ brew tap homebrew/homebrew-php  
$ brew install php7
```

#### Install Composer		
 	
 ```		
 $ curl -sS https://getcomposer.org/installer | php		
 $ sudo mv composer.phar /usr/local/bin/composer		
 ```

#### Build		
 We're now ready to start developing. Assuming you have `git` already installed on your system (you should):		
 		
 ```		
 $ git clone https://github.com/ciscoo/clima.git		
 $ cd clima	
 $ composer install				
 ```

Finally run the application:

```	
 $ php -S localhost:8000 -t ./public		
 ```		
 		
Open your browser to `http://localhost:8000`

