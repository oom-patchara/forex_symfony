forex_symfony
========================

This is my first Symfony application which does the simple Forex currency converter

Requirements
------------

  * PHP 7.0.8 or higher;
  * Forex API key;
  * and the [usual Symfony application requirements][1].

Installation
------------

Execute this command to install the project:

```bash
$ composer create-project oom-patchara/forex_symfony forex_symfony
```

Usage
-----

There's no need to configure anything to run the application. Just execute this command to run the built-in web server and access the application in your
browser at <http://localhost:8000>:

```bash
$ cd forex_symfony/
$ php bin/console server:run
```

Alternatively, you can [configure a fully-featured web server][2] like Nginx or Apache to run the application.

Notes
-----

 * Type quantity in 1st texbox, converted rate will return in 2nd textbox
 * You can even change vaule in the 2nd textbox to do the reverse conversion
 * Switch currency dropdown to change to different currency
