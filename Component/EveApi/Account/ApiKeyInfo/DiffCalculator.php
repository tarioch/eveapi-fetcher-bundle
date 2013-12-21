<?php
namespace Tarioch\EveapiFetcherBundle\Component\EveApi\Account\ApiKeyInfo;

use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service(id = "tarioch.eveapi.account.api_key_info.diff_calculator", public = false)
 */
class DiffCalculator
{
    /**
     * Find elements that are only in the sourceMap
     * @param array $sourceMap map[key][owner][value1]
     * @param array $compareMap map[key][owner][value2]
     * @return array with the differences: map[key][owner][value1]
     */
    public function getOnlyInSource(array $sourceMap, array $compareMap)
    {
        $diff = array_diff_key($sourceMap, $compareMap);

        $intersection = array_intersect_key($sourceMap, $compareMap);
        foreach ($intersection as $key => $sourceOwners) {
            $compareOwners = $compareMap[$key];

            $ownerDiff = array_diff_key($sourceOwners, $compareOwners);
            if (!empty($ownerDiff)) {
                $diff[$key] = $ownerDiff;
            }
        }

        return $diff;
    }
}
