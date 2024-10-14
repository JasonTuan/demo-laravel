<?php

namespace App\Models\FileManager;

class FileItem
{
    public function __construct(
        public string $name,
        public string $path,
        public string $type,
        public ?string $size,
        public ?string $lastModified,
    )
    {
    }
}
