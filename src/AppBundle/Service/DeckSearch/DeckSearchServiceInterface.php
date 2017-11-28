<?php

namespace AppBundle\Service\DeckSearch;

use AppBundle\Search\DeckSearch;

/**
 * Description of DeckSearchInterface
 *
 * @author Alsciende <alsciende@icloud.com>
 */
interface DeckSearchServiceInterface
{
    /**
     * @return string
     */
    static public function supports (): string;

    /**
     * @param array $arguments
     */
    public function search (DeckSearch $search);
}