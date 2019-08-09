[Back to the Ling/Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md)



The LightBMenuService class
================
2019-08-08 --> 2019-08-09






Introduction
============

The LightBMenuService class.

This class can return a menu created collaboratively with
a host and some participant plugins.

The host is first prompted to layout the main structure.
Then plugins (aka subscribers) are then called to complement this menu.


The menu item structure is defined in the [conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md).



Class synopsis
==============


class <span class="pl-k">LightBMenuService</span>  {

- Properties
    - protected [Ling\Light_BMenu\Host\LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) [$host](#property-host) ;
    - protected [Ling\Light_BMenu\DirectInjection\BMenuDirectInjectorInterface[]](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface.md)|callable[] [$directInjectors](#property-directInjectors) ;
    - protected array [$defaultItems](#property-defaultItems) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md)() : void
    - public [getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md)() : array
    - public [setHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/setHost.md)([Ling\Light_BMenu\Host\LightBMenuHostInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Host/LightBMenuHostInterface.md) $host) : void
    - public [addDirectInjector](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectInjector.md)(?$injector) : void
    - public [addDefaultItem](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItem.md)(array $item) : void

}




Properties
=============

- <span id="property-host"><b>host</b></span>

    This property holds the host for this instance.
    
    

- <span id="property-directInjectors"><b>directInjectors</b></span>

    This property holds the directInjectors for this instance.
    They can be either BMenuDirectInjectorInterface instances,
    or php callable which take two arguments: the menuStructureId and the LightBMenu instance.
    
    

- <span id="property-defaultItems"><b>defaultItems</b></span>

    This property holds the defaultItems for this instance.
    Those will be handled automatically by the host plugin.
    See the [conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightBMenuService::__construct](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/__construct.md) &ndash; Builds the LightBMenuService instance.
- [LightBMenuService::getItems](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/getItems.md) &ndash; Returns the computed menu items.
- [LightBMenuService::setHost](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/setHost.md) &ndash; Sets the host.
- [LightBMenuService::addDirectInjector](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDirectInjector.md) &ndash; Adds a direct injector to this instance.
- [LightBMenuService::addDefaultItem](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Service/LightBMenuService/addDefaultItem.md) &ndash; Adds a default item to the menu.





Location
=============
Ling\Light_BMenu\Service\LightBMenuService<br>
See the source code of [Ling\Light_BMenu\Service\LightBMenuService](https://github.com/lingtalfi/Light_BMenu/blob/master/Service/LightBMenuService.php)



SeeAlso
==============
Previous class: [LightBMenu](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/Menu/LightBMenu.md)<br>
