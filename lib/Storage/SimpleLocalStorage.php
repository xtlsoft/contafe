<?php
/**
 * Project contafe
 * 
 * @author Tianle Xu <xtl@xtlsoft.top>
 * @license MIT
 */

namespace Contafe\Storage;

class SimpleLocalStorage implements StorageInterface {

    protected $database = "";
    protected $decoded  = null;

    function __construct(string $database) {
        $this->database = $database;
        $this->decoded = json_decode(file_get_contents($database), true);
    }

    function getEntry(string $entry) {
        $array = explode(".", $entry);
        $rslt = $this->decoded;
        foreach ($array as $v) {
            if ($v === "@") continue;
            if (!isset($rslt[$v])) throw new \Exception("Entry not found: $entry");
            $rslt = $rslt[$v];
        }
        return $rslt;
    }

    function setEntry(string $entry, $data): StorageInterface {
        $array = explode(".", $entry);
        $pointer = &$this->decoded;
        foreach ($array as $v) {
            if ($v === "@") continue;
            if (!isset($pointer[$v])) throw new \Exception("Entry not found: $entry");
            $pointer = &$pointer[$v];
        }
        $pointer = $data;
        file_put_contents($this->database, json_encode($this->decoded));
        return $this;
    }

}