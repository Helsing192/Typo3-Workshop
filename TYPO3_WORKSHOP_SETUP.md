# TYPO3 WORKSHOP

## PREFACE

All bash commands contain a `cd ~/Workspace/Workshop/typo3v12workshop`, so you can execute them out of this markdown
file by the `Run in Terminal` function.

## REQUIREMENTS

### Install DDEV

```bash
sudo dnf install ddev
```

### Create project folder and DDEV config

```bash
mkdir -p ~/Workspace/Workshop/typo3v12workshop
cd ~/Workspace/Workshop/typo3v12workshop
ddev config  --project-type=typo3 --docroot=public --create-docroot --php-version 8.2
ddev start
```

### Finally, create a TYPO3 v12 project

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev composer create "typo3/cms-base-distribution:^12"
```

## DDEV

### install ddev phpmyadmin

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev get ddev/ddev-phpmyadmin
```

### ddev start

Starts your docker environment.

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev start
```

### ddev stop

Stops your docker environment.

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev stop
```

### ddev describe

This will display a table (like in the example below) in your console. It's showing all URL's and information of your
current environment.

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev describe
```

| SERVICE    | STAT                                | URL/PORT                                                                                                                           | INFO                                                          |
|------------|-------------------------------------|------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------|
| web        | <span style="color:green">OK</span> | https://typo3v12workshop.ddev.site</br>InDocker: web:443,80,8025</br>Host: 127.0.0.1:32819,32820                                   | typo3 PHP8.2</br>nginx-fpm</br>docroot:'public'</br>NodeJS:16 |
| db         | <span style="color:green">OK</span> | InDocker: db:3306</br>Host: 127.0.0.1:32818                                                                                        | mariadb:10.4</br>User/Pass: 'db/db'</br>or 'root/root'        |
| PHPMyAdmin | <span style="color:green">OK</span> | https://everynet.ddev.site:8037</br>InDocker: phpmyadmin:80,80                                                                     |                                                               |
| Mailhog    |                                     | MailHog: https://typo3v12workshop.ddev.site:8026</br>`ddev launch -m`                                                              |                                                               |
| All URLs   |                                     | https://typo3v12workshop.ddev.site,</br>https://127.0.0.1:32819,</br>http://typo3v12workshop.ddev.site,</br>http://127.0.0.1:32820 |                                                               |

### ddev launch

This will open the chosen service in your browser. 

| COMMAND           | SERVICE    |
|-------------------|------------|
| `ddev launch`     | web        |
| `ddev phpmyadmin` | PHPMyAdmin |
| `ddev launch -m`  | Mailhog    |

## TYPO3 SETUP

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev exec ./vendor/bin/typo3 setup
```

I choose `pdoMysql` as my DB driver.

```
Database driver?
  [mysqli        ] [MySQLi] Manually configured MySQL TCP/IP connection
  [mysqliSocket  ] [MySQLi] Manually configured MySQL socket connection
  [pdoMysql      ] [PDO] Manually configured MySQL TCP/IP connection
  [pdoMysqlSocket] [PDO] Manually configured MySQL socket connection
  [postgres      ] Manually configured PostgreSQL connection
  [sqlite        ] Manually configured SQLite connection
 > pdoMysql
```

For our database, we use the host:port `db:3306` with the user and password `db`. For simplicity, we also use `db` as
our database.

```
Enter the database "username" [default: db] ? db
Enter the database "password" ? db
Enter the database "port" [default: 3306] ? 3306
Enter the database "host" [default: db] ? db
Select which database to use: 
  [db  ] db (Tables 0 ✓)
  [test] test (Tables 0 ✓)
 > db
```

Finally, we create an admin user, named `admin`. The password and email are chosen by yourself. I took `Test Project`
for the project name and `https://typo3v12workshop.ddev.site` as our basic site.

```
Admin username (user will be "system maintainer") ? admin
Admin user and installer password ? 
Admin user email ? thorsten.mueller@bikar.com
Give your project a name [default: New TYPO3 Project] ? Test Project
Create a basic site? Please enter a URL [default: no] https://typo3v12workshop.ddev.site
✓ Congratulations - TYPO3 Setup is done.
```
