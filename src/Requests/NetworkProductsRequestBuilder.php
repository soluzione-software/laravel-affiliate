<?php

namespace SoluzioneSoftware\LaravelAffiliate\Requests;

use Illuminate\Support\Collection;
use SoluzioneSoftware\LaravelAffiliate\Contracts\Network;

class NetworkProductsRequestBuilder extends ProductsRequestBuilder
{
    /**
     * @var Network
     */
    private $network;

    /**
     * @param  Network  $network
     */
    public function __construct(Network $network)
    {
        parent::__construct();

        $this->network = $network;
    }

    /**
     * @inheritDoc
     */
    protected function executeGet(int $page, int $perPage): Collection
    {
        return $this->network->executeProductsRequest(
            $this->getPrograms($this->network), $this->keyword, $this->languages, $this->trackingCode, $page, $perPage
        );
    }

    /**
     * @param  Network  $network
     * @return array|null
     */
    protected function getPrograms(Network $network): ?array
    {
        return count($this->programs) ? $this->programs : null;
    }

    protected function executeCount(): int
    {
        return $this->network->executeProductsCountRequest(
            $this->getPrograms($this->network), $this->keyword, $this->languages
        );
    }

    /**
     * @inheritDoc
     */
    protected function getNetworks()
    {
        return [$this->network];
    }
}
