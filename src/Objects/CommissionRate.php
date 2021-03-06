<?php

namespace SoluzioneSoftware\LaravelAffiliate\Objects;

use Illuminate\Contracts\Support\Arrayable;
use SoluzioneSoftware\LaravelAffiliate\Enums\ValueType;

class CommissionRate implements Arrayable
{
    /**
     * @var string
     */
    public $programId;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var ValueType
     */
    public $type;

    /**
     * @var float
     */
    public $value;

    /**
     * @var array
     */
    public $original;

    public function __construct(string $programId, string $id, string $name, ValueType $type, float $value, array $original)
    {
        $this->programId = $programId;
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->original = $original;
    }

    public function toArray()
    {
        return [
            'program_id' => $this->programId,
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type->value(),
            'value' => $this->value,
            'original' => $this->original,
        ];
    }
}
