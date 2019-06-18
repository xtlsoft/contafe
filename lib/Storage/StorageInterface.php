<?php
/**
 * Project contafe
 * 
 * @author Tianle Xu <xtl@xtlsoft.top>
 * @license MIT
 */

namespace Contafe\Storage;

interface StorageInterface {
    function getEntry(string $entry);
    function setEntry(string $entry, $data): StorageInterface;
}