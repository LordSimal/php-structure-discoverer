<?php

namespace Spatie\StructureDiscoverer\TokenParsers;

use Spatie\StructureDiscoverer\StructureParsers\StructureParser;

class MultiFileTokenParser implements StructureParser
{
    public function __construct(
        protected FileTokenParser $fileTokenParser = new FileTokenParser()
    ) {
    }

    public function execute(array $filenames): array
    {
        $found = [];

        foreach ($filenames as $filename) {
            $contents = file_get_contents($filename) ?: '';

            foreach ($this->fileTokenParser->execute($filename, $contents) as $fqcn => $structure) {
                $found[$fqcn] = $structure;
            }
        }

        return $found;
    }
}
