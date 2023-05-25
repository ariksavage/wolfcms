
# WOLF CMS

## Local development
- Install Docker: [documentation](https://ddev.readthedocs.io/en/stable/users/install/docker-installation/)
- Install DDEV: [documentation](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/)

- configure the .ddev/config.yml
  Minimum configuration:
    - name: <projectname> 
      Name of the project, automatically provides http://projectname.ddev.site and https://projectname.ddev.site

    - host_db_port: "59002"
      The host port binding for the ddev-dbserver can be explicitly specified. It is dynamic unless explicitly specified. If you want to be able to connect to the local database from a desktop application (ie Navicat), this port should be specified, and be unique across all local projects.

    - See the config.yaml for descriptions of all other available settings
- Check out a new branch for the client
  $ `git checkout -b client-name`
- DDEV start:
   $ `ddev start`

## Migrate an existing site:
  - Launch PHP MyAdmin $`ddev launch -p`
     - or your mysql software of choice
       - host: 127.0.0.1:59002 (or the port specified in the .ddev/config.yaml)
       - db name: 'db'
       - user: 'db'
       - password: 'db'

  - Import copy of your site's database into the local *db* database
    - Copy files from the existing site for these directories:
    - CSS
    - JS
    - Images
    - public

- Launch the site and begin debugging the database (layouts, snippets).

## Brand new Wolf Install
For a new site, visit the DDEV url to go through Wolf's install process. When prompted for DB credentials, etc, enter those that will be used in production. Local development will ignore these settings in favor of the default DDEV configuration.

## Config and local development

To facilitate local development, the default `config.php` file is configured to work with DDEV (see above). Overrides for production environments will be placed in the `config/config.php` file. Running through the normal Wolf install process will create this file.

## About Wolf CMS (9.0.0)
With version 9.0.0, the basic Wolf framework has been updated for compatibility with PHP 8.3 and local development as described above.

## About Wolf CMS (as of 8.3.1)

[![Current Version](http://img.shields.io/badge/wolfcms-v0.8.3.1-blue.svg)](http://www.wolfcms.org/download.html)
[![Build Status](http://img.shields.io/travis/wolfcms/wolfcms/master.svg)](http://travis-ci.org/wolfcms/wolfcms)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/18e85640d6044044b2004989ae1cedb0)](https://www.codacy.com/app/martijn-niji/wolfcms)
[![Stories in Ready](https://badge.waffle.io/wolfcms/wolfcms.svg?label=ready&title=Ready)](http://waffle.io/wolfcms/wolfcms)

Wolf CMS simplifies content management by offering an elegant user interface,
flexible templating per page, simple user management and permissions, as well
as the tools necessary for file management.

This product has been made available under the terms of the GNU GPL version 3.
Please read the docs/license.txt and docs/exception.txt files for the exact
license details that apply to Wolf CMS.

The official Wolf CMS website can be found at www.wolfcms.org - visit it for
more information and resources.

## Installation & Documentation

You can find all documentation including installation and upgrade instructions
in the docs/ subdirectory. Please read the documentation before asking for help.

IMPORTANT - always check if there is any security advise by viewing security.php
            after installing or updating Wolf CMS!

## Required

- An HTTP server
- PHP 5.3+
    - PHP: magic_quotes_gpc should be turned OFF.
    - PHP: Wolf CMS does *not* run on PHP 4.
- PDO support.
- A database supported by PDO.
    - MySQL 5+
    - SQLite 3
    - PostgreSQL (tested against 8.4.5)

## Recommended

- The system is tested on Apache HTTP server.
- Wolf CMS is known to run on these HTTP servers as well:
    - Cherokee
    - Lighttpd
    - Nginx
    - Hiawatha

## More information

PHP        : http://www.php.net/  
MySQL      : http://www.mysql.com/  
SQLite     : http://www.sqlite.org/  
PostgreSQL : http://www.postgresql.org/  
Apache     : http://www.apache.org/  
Cherokee   : http://www.cherokee-project.com/  
Hiawatha   : http://www.hiawatha-webserver.org/  
Lighttpd   : http://www.lighttpd.net/  
Nginx      : http://nginx.org/en/  

If you're running Wolf CMS on a different HTTP server successfully,
please let us know at http://forum.wolfcms.org/

## Notes

Password is in sha512 + salt so you know how to change it manually in the database!

Enjoy,

The Wolf CMS team.
