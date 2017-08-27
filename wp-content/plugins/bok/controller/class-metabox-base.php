<?php
namespace Bok\Controller;
/**
 * Class Metabox_Base
 */
class Metabox_Base extends Base {

    protected $id;

    protected $postTypes = array();

    protected $name = '';

    /**
     * Initializes
     * @params $arg Arguments
     *
     */
    protected function __construct($arg) {
        $this->id = $arg[0] ? $arg[0] : '';
        $this->name = $arg[1] ? $arg[1] : '';
        $this->postTypes = $arg[2] ? $arg[2] : '';
    }

    public function setPostTypes($postTypes) {
        $this->postTypes = $postTypes;
    }

    public function getPostTypes() {
        return $this->postTypes;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}