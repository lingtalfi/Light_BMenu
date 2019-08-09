<?php


namespace Ling\Light_BMenu\Service;


use Ling\Light_BMenu\DirectInjection\BMenuDirectInjectorInterface;
use Ling\Light_BMenu\Exception\LightBMenuException;
use Ling\Light_BMenu\Host\LightBMenuHostInterface;
use Ling\Light_BMenu\Menu\LightBMenu;

/**
 * The LightBMenuService class.
 *
 * This class can return a menu created collaboratively with
 * a host and some participant plugins.
 *
 * The host is first prompted to layout the main structure.
 * Then plugins (aka subscribers) are then called to complement this menu.
 *
 *
 * The menu item structure is defined in the @page(conception notes).
 *
 *
 */
class LightBMenuService
{


    /**
     * This property holds the host for this instance.
     * @var LightBMenuHostInterface
     */
    protected $host;

    /**
     * This property holds the directInjectors for this instance.
     * They can be either BMenuDirectInjectorInterface instances,
     * or php callable which take two arguments: the menuStructureId and the LightBMenu instance.
     *
     * @var BMenuDirectInjectorInterface[]|callable[]
     */
    protected $directInjectors;

    /**
     * This property holds the defaultItems for this instance.
     * Those will be handled automatically by the host plugin.
     * See the @page(conception notes) for more details.
     * @var array
     */
    protected $defaultItems;


    /**
     * Builds the LightBMenuService instance.
     */
    public function __construct()
    {
        $this->host = null;
        $this->directInjectors = [];
        $this->defaultItems = [];
    }


    /**
     * Returns the computed menu items.
     *
     * @return array
     * @throws LightBMenuException
     */
    public function getItems(): array
    {
        if (null === $this->host) {
            throw new LightBMenuException("Host not defined.");
        }


        $menu = new LightBMenu();
        $menuStructureId = $this->host->getMenuStructureId();
        $this->host->prepareBaseMenu($menu);


        //--------------------------------------------
        // TECHNIQUE #1: DIRECT INJECTION
        //--------------------------------------------
        foreach ($this->directInjectors as $injector) {
            if ($injector instanceof BMenuDirectInjectorInterface) {
                $injector->inject($menuStructureId, $menu);
            } else {
                $injector($menuStructureId, $menu);
            }
        }


        //--------------------------------------------
        // TECHNIQUE #2: HOST DRIVEN INJECTION
        //--------------------------------------------
        $this->host->injectDefaultItems($this->defaultItems, $menu);



        //--------------------------------------------
        // LAST OPPORTUNITY TO CHANGE THE MENU
        //--------------------------------------------
        $this->host->onMenuCompiled($menu);


        return $menu->getItems();
    }

    /**
     * Sets the host.
     *
     * @param LightBMenuHostInterface $host
     */
    public function setHost(LightBMenuHostInterface $host)
    {
        $this->host = $host;
    }


    /**
     * Adds a direct injector to this instance.
     *
     * @param $injector
     * @throws \Exception
     */
    public function addDirectInjector($injector)
    {
        if ($injector instanceof BMenuDirectInjectorInterface || is_callable($injector)) {
            $this->directInjectors[] = $injector;
        } else {
            $type = gettype($injector);
            throw new LightBMenuException("Wrong injector type: it should be a BMenuDirectInjectorInterface instance or a callable, $type given.");
        }
    }


    /**
     * Adds a default item to the menu.
     *
     * @param array $item
     */
    public function addDefaultItem(array $item)
    {
        $this->defaultItems[] = $item;
    }

}