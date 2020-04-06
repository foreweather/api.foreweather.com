<?php

namespace Foreweather\Phalcon\Mvc\Model;

use Phalcon\Mvc\Model;

class AbstractModel extends Model
{
    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;

    public function initialize()
    {
        $this->keepSnapshots(true);
    }

    public function beforeValidationOnCreate()
    {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function beforeUpdate()
    {
        $this->updated_at = date('Y-m-d H:i:s');
    }

    /**
     * @param array $exclude
     *
     * @return array
     */
    public function toSafeArray($exclude = []): array
    {
        return parent::toArray(array_diff(array_keys(get_object_vars($this)), $exclude));
    }

    /**
     * @param array $exclude
     * @param       $object
     *
     * @return string
     */
    protected static function excludedItSelf(array $exclude, $object): string
    {
        $exclude = array_merge(
            $exclude,
            [
                'container', 'dirtyState', 'dirtyRelated', 'errorMessages', 'modelsManager', 'modelsMetaData',
                'related',
                'operationMade', 'oldSnapshot', 'skipped', 'snapshot', 'transaction', 'uniqueKey', 'uniqueParams',
                'uniqueTypes',
            ]
        );
        return implode(',', array_diff(array_keys(get_object_vars($object)), $exclude));
    }
}
