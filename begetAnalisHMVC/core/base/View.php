<?php
class View
{
    const DEFAULT_TEMPLATE = "default";
    private $view, $template = NULL, $data = [];
    public function __construct($name)
    {        $this->view = VIEWS_PATH . $name . ".php";
    }
    public function viewTemplate($name = self::DEFAULT_TEMPLATE)
    {        $this->template = TEMPLASE_PATH.$name.".php";
    }
    private function renderView()
    {        ob_start();
        extract($this->data);
        include $this->view;
        return ob_get_clean();
    }
    private function renderTemplate()
    {        ob_start();
        extract($this->data);
        $content = $this->renderView();
        include $this->template;
        return ob_get_clean();
    }
    public function render()
    {        return $this->template ? $this->renderTemplate() : $this->renderView();
    }
    public function __toString()
    {        return $this->render();
        // TODO: Implement __toString() method.
    }
    public function __set($name, $value)
    {        $this->data[$name] = $value;
        // TODO: Implement __set() method.
    }
    public function __get($name)
    {
        return $this->data[$name];
        // TODO: Implement __get() method.
    }
}