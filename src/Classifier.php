<?php

namespace Jetoo;

class Classifier
{
    const VERSION = '0.0.1';

    /**
     * parse
     *
     * @param string $url
     *
     * @return array
     */
    public static function parse(string $url): array
    {
        return self::fillResult(self::execParse($url));
    }

    /**
     * execParse
     *
     * @param string $url
     *
     * @return array
     */
    private static function execParse(string $url): array
    {
        if (empty($url)) {
            return [];
        }

        $ret = parse_url($url);
        if ($ret === false) {
            return [];
        }

        return $ret;
    }

    /**
     * fillResult
     *
     * @param array $result
     *
     * @return array
     *
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    private static function fillResult(array $result): array
    {
        if (isset($result[DataSet::DATASET_SCHEME]) === false) {
            $result[DataSet::DATASET_SCHEME] = DataSet::VALUE_UNKNOWN_STRING;
        }

        if (isset($result[DataSet::DATASET_HOST]) === false) {
            $result[DataSet::DATASET_HOST] = DataSet::VALUE_UNKNOWN_STRING;
        }

        if (isset($result[DataSet::DATASET_PORT]) === false) {
            $result[DataSet::DATASET_PORT] = DataSet::VALUE_UNKNOWN_INT;
        }

        if (isset($result[DataSet::DATASET_USER]) === false) {
            $result[DataSet::DATASET_USER] = DataSet::VALUE_UNKNOWN_STRING;
        }

        if (isset($result[DataSet::DATASET_PASS]) === false) {
            $result[DataSet::DATASET_PASS] = DataSet::VALUE_UNKNOWN_STRING;
        }

        if (isset($result[DataSet::DATASET_PATH]) === false) {
            $result[DataSet::DATASET_PATH] = DataSet::VALUE_UNKNOWN_STRING;
        }

        if (isset($result[DataSet::DATASET_QUERY]) === false) {
            $result[DataSet::DATASET_QUERY] = DataSet::VALUE_UNKNOWN_STRING;
        }

        if (isset($result[DataSet::DATASET_FRAGMENT]) === false) {
            $result[DataSet::DATASET_FRAGMENT] = DataSet::VALUE_UNKNOWN_STRING;
        }

        return $result;
    }
}
