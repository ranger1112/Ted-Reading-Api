<?php
/**
 * @param $array
 * @param $key
 * @param bool $filterZero
 * @return bool
 */
function issetNotEmpty($array, $key, bool $filterZero = true): bool
{
    if ($filterZero) {
        return !empty($array[$key]);
    } else {
        return isset($array[$key]) && (!empty($array[$key]) || $array[$key] === 0 || $array[$key] === '0');
    }
}

/**
 * @param bool $res
 * @param string $msg
 * @param array $data
 * @return array
 */
function returnResponse(bool $res = true, string $msg = '', array $data = []): array
{
    return [
        'res'  => $res,
        'msg'  => $msg,
        'data' => $data
    ];
}

/**
 * @param $array
 * @param $field
 * @param string $default
 * @return mixed|string
 */
function getUnsetFieldValue($array, $field, string $default = ''): mixed
{
    return $array[$field] ?? $default;
}

/**
 * @param $mapping
 * @param $key
 * @param string $field
 * @param string $default
 * @return mixed|string
 */
function getMappingValue($mapping, $key, string $field = 'name', string $default = ''): mixed
{
    if (!isset($mapping[$key])) {
        return $default;
    } else {
        return $mapping[$key][$field] ?? $default;
    }
}