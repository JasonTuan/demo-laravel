<?php

namespace App\Helpers;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final class FileHelper
{
    public static function recursiveDirectory(string $basePath): array
    {
        $foldersRec = new RecursiveIteratorIterator(
            iterator: new RecursiveDirectoryIterator($basePath),
            mode: RecursiveIteratorIterator::CHILD_FIRST
        );
        $r = [];
        foreach ($foldersRec as $splFileInfo) {
            if (
                !$splFileInfo->isDir() || $splFileInfo->getFilename()[0] === '.'
            ) {
                continue;
            }
            $path = [$splFileInfo->getFilename() => []];
            for ($depth = $foldersRec->getDepth() - 1; $depth >= 0; $depth--) {
                $path = [$foldersRec->getSubIterator($depth)->current()->getFilename() => $path];
            }
            $r = array_merge_recursive($r, $path);
        }

        return $r;
    }

    public static function getFilePermNum(string $filename): false|int
    {
        return fileperms($filename) & 0777;
    }

    public static function getFilePermStr(string $filename): string
    {
        $perms = fileperms($filename);
        switch ($perms & 0xF000) {
            case 0xC000: // socket
                $info = 's';
                break;
            case 0xA000: // symbolic link
                $info = 'l';
                break;
            case 0x8000: // regular
                $info = 'r';
                break;
            case 0x6000: // block special
                $info = 'b';
                break;
            case 0x4000: // directory
                $info = 'd';
                break;
            case 0x2000: // character special
                $info = 'c';
                break;
            case 0x1000: // FIFO pipe
                $info = 'p';
                break;
            default: // unknown
                $info = 'u';
        }
        // Owner
        $info .= (($perms & 0x0100) ? 'r' : '-');
        $info .= (($perms & 0x0080) ? 'w' : '-');
        $info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));
        // Group
        $info .= (($perms & 0x0020) ? 'r' : '-');
        $info .= (($perms & 0x0010) ? 'w' : '-');
        $info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));
        // World
        $info .= (($perms & 0x0004) ? 'r' : '-');
        $info .= (($perms & 0x0002) ? 'w' : '-');
        $info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));

        return $info;
    }

    public static function humanFilesize(float $size, int $precision = 2): string
    {
        $i = 0;
        while (($size / 1024) > 0.9)
        {
            $size /= 1024;
            $i++;
        }

        return round($size, $precision) . ['B','kB','MB','GB','TB','PB','EB','ZB','YB'][$i];
    }
}
