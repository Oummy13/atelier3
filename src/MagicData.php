<?php
declare(strict_types=1);

namespace App;

/**
 * Cette classe agit comme un conteneur de données magique.
 *
 * @property string $name
 * @property int $age
 * @method string getName()
 * @method int getAge()
 */
class MagicData
{
    private array $data = [];

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }

    public function __call(string $method, array $args)
    {
        if (str_starts_with($method, 'get')) {
            $property = lcfirst(substr($method, 3));
            return $this->data[$property] ?? null;
        }

        throw new \BadMethodCallException("Method $method does not exist.");
    }
}
