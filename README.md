Light_BMenu
===========
2019-08-08




A (gui) menu service for your [Light](https://github.com/lingtalfi/Light) applications.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_BMenu
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- bmenu


Here is an example of the service configuration (using [babyYaml](https://github.com/lingtalfi/BabyYaml) files):


```yaml
bmenu:
    instance: Ling\Light_BMenu\Service\LightBMenuService

```


And here is an excerpt of a host application defining the host for this service:

```yaml
$bmenu.methods_collection:
    -
        method: setHost
        args:
            host:
                instance: Ling\Light_Kit_Admin\BMenu\LightKitAdminBMenuHost
``` 




History Log
=============

- 1.0.0 -- 2019-08-08

    - initial commit