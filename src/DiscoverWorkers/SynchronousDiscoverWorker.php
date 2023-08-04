<?php

namespace Spatie\StructureDiscoverer\DiscoverWorkers;

use Illuminate\Support\Collection;
use Spatie\StructureDiscoverer\Data\DiscoverProfileConfig;
use Spatie\StructureDiscoverer\StructureParsers\StructureParser;

class SynchronousDiscoverWorker implements DiscoverWorker
{
    public function __construct()
    {
    }

    public function run(Collection $filenames, DiscoverProfileConfig $config): array
    {
        return $config->structureParser->execute($filenames->toArray());
    }
}
