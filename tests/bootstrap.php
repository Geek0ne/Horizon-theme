<?php
/**
 * PHPUnit Bootstrap - Mock Typecho environment
 */

// Define Typecho constants to prevent exit
define('__TYPECHO_ROOT_DIR__', '/tmp');

// Mock Typecho classes needed by functions.php
if (!class_exists('Helper')) {
    class Helper {
        public static function options() {
            return new class {
                public $custom = [];
            };
        }
    }
}

if (!class_exists('Typecho\Widget\Helper\Form\Element\Text')) {
    namespace Typecho\Widget\Helper\Form\Element;
    class Text {
        public function __construct($name, $var, $value, $label, $description) {}
    }
}

if (!class_exists('Typecho\Widget\Helper\Form\Element\Radio')) {
    namespace Typecho\Widget\Helper\Form\Element;
    class Radio {
        public function __construct($name, $options, $value, $label, $description) {}
    }
}

if (!class_exists('Typecho\Widget\Helper\Form\Element\Select')) {
    namespace Typecho\Widget\Helper\Form\Element;
    class Select {
        public function __construct($name, $options, $value, $label, $description) {}
    }
}

if (!class_exists('Typecho\Widget\Helper\Form\Element\Textarea')) {
    namespace Typecho\Widget\Helper\Form\Element;
    class Textarea {
        public function __construct($name, $var, $value, $label, $description) {}
    }
}

// Load the functions file
require_once dirname(__DIR__) . '/functions.php';
