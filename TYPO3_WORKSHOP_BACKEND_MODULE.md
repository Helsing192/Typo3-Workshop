# TYPO3 WORKSHOP

## CREATE / INSTALL SITEPACKAGE

https://www.sitepackagebuilder.com/new/

| FIELD         | VALUE                              |
|---------------|------------------------------------|
| TYPO3 Version | 12.4                               |
| Base Package  | Bootstrap Package                  |
| Title         | Site Package                       |
| Name          | < Your name >                      |
| Email         | < Your email >                     |
| Company       | < Your company >                   |
| Homepage      | https://typo3v12workshop.ddev.site |

Put the newly created `site_package` folder in  `~/Workspace/Workshop/typo3v12workshop/local_packages`

```json
{
    ...
    "repositories": [
        {
            "type": "path",
            "url": "./local_packages/*"
        }
    ],
    ...
}
```

```bash
cd ~/Workspace/Workshop/typo3v12workshop
ddev composer require bikar/site-package:@dev
ddev composer update
```

## CORE FUNCTIONALITY BACKEND MODULE

### Page

Shows elements to be displayed  in Frontend

### View

Preview of current page

### List

Seperate lists for every type of elements  insert into this page

### Maintenance

Mostly used for flushing cache and fixing dataabase structure

## NEWS MODULE

### First steps

- Create extension folder in `root/local_packages` in lower snake_case (like `my_ext`)
- Create `my_ext/Classes/Domain/Model/News.php`
- Create `my_ext/Classes/Domain/Repository/NewsRepository.php`
- Create `my_ext/Configuration/TCA/tx_newsbase_domain_model_news.php`
- Create `my_ext/Configuration/Service.yaml`
- Create `my_ext/composer.json`
- Create `my_ext/ext_tables.sql`

### Adding backend module

- Create `my_ext/Classes/Controller/BackendController.php`
- Create `my_ext/Configuration/TypoScript/constants.typoscript`
- Create `my_ext/Configuration/TypoScript/setup.typoscript`
- Create `my_ext/Configuration/TCA/Overrides/sys_template.php`
- Create `my_ext/Configuration/Icons.php`
- Create `my_ext/Resources/Private/Templates/Backend/List.html`
- Create `my_ext/Resources/Private/Templates/Backend/Show.html`
- Create `my_ext/Resources/Public/Icons/Extensions.svg`
- Create `my_ext/Resources/Public/Icons/icon_tx_newsbackend_domain_model_news.svg`
- Create `my_ext/Configuration/Backend/Modules.php`
- Alter `my_ext/Configuration/TCA/tx_newsbase_domain_model_news.php`

### Adding frontend plugin

- Create `my_ext/Classes/Controller/FrontendController.php`
- Create `my_ext/Configuration/FlexForms/PluginSettings.xml`
- Create `my_ext/Configuration/TCA/Overrides/tt_content.php`
- Create `my_ext/Resources/Private/Layouts/Default.html`
- Create `my_ext/Resources/Private/Templates/Frontend/List.html`
- Create `my_ext/Resources/Private/Templates/Frontend/Show.html`
- Create `my_ext/Resources/Public/Css/NewsExtension.css`
- Alter `my_ext/Configuration/TypoScript/constants.typoscript`
- Alter `my_ext/Configuration/TypoScript/setup.typoscript`
- Alter `my_ext/Configuration/Icons.php`
- Create `my_ext/ext_conf_template.txt`
- Create `my_ext/ext_localconf.php`
### Final structure
<pre>
my_ext
|__ composer.json
|__ ext_conf_template.txt
|__ ext_localconf.php
|__ ext_tables.sql
|
|__ Classes
|   |
|   |__ Controller
|   |   |__ BackendController.php
|   |   |__ FrontendController.php
|   |
|   |__ Domain
|       |__ Model
|       |  |__ News.php
|       |
|       |__ Repository
|           |__ NewsRepository.php
|
|__ Configuration
|   |__ Icons.php
|   |__ Service.yaml
|   |
|   |__ Backend
|   |   |__ Modules.php
|   |
|   |__ FlexForms
|   |   |__ PluginSettings.xml
|   |
|   |__ TCA
|   |   |__ tx_newsextension_domain_model_news.php
|   |   |
|   |   |__ Overrides
|   |       |__ sys_template.php
|   |       |__ tt_content.php
|   |
|   |__ TypoScript
|       |__ constants.typoscript
|       |__ setup.typoscript
|
|__ Resources
    |
    |__ Private
    |   |
    |   |__ Layouts
    |   |   |__ Default.html
    |   |
    |   |__ Templates
    |       |
    |       |__ Backend
    |       |   |__ List.html
    |       |   |__ Show.html
    |       |
    |       |__ Frontend
    |           |__ List.html
    |           |__ Show.html
    |
    |__ Public
        |
        |__ Css
        |   |__ NewsExtension.css
        |
        |__ Icons
            |__ Extension.svg
            |__ icon_tx_newsbackend_domain_model_news.svg
</pre>
