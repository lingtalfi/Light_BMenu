<?php


namespace Ling\Light_BMenu\Tool;

use Ling\Bat\ArrayTool;

/**
 * The LightBMenuTool class.
 */
class LightBMenuTool
{


    /**
     * Parses the given menu item, and returns an array with the following structure:
     *
     * - 0: bool, isActive. Whether the menu item is active (true only if it's a leaf and the url of the
     *      item matches the given currentUri)
     * - 1: bool, isOpened. True only if the item is a parent which contains an active menu item.
     *
     *
     * @param array $item
     * @param string $currentUri
     * The current uri, as returned by the @page(HttpRequest->getUri method).
     *
     * @return array
     */
    public static function getActiveOpenInfo(array $item, string $currentUri): array
    {
        $url = $item['url'] ?? "";
        $isActive = ($currentUri === $url);
        $isOpened = false;
        $arr = [$item];


        ArrayTool::walkRowsRecursive($arr, function ($child) use (&$isOpened, $currentUri) {
            $url = $child['url'] ?? "";
            if ($currentUri === $url) {
                $isOpened = true;
            }
        }, 'children', false);


        return [
            $isActive,
            $isOpened,
        ];
    }
}