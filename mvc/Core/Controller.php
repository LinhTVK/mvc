<?php
namespace MVC\Core;
    /**
    * Class Controller
    */
    class Controller
    {
        var $vars = [];
        var $layout = "default";

        /**
        * Set data
        *
        * @param MVC\vendor\composer\ClassLoader $data
        * @return array
        */
        function set($data)
        {
            $this->vars = array_merge($this->vars, $data);
        }

        /**
        * Render data
        *
        * @param string $filename
        * @return string
        */
        function render($filename)
        {
            extract($this->vars);
            ob_start();
            require(ROOT . "Views/" .str_replace('Controller', '', str_replace('MVC\\Controllers\\', '', get_class($this))) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();

            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
        }

        /**
        * @param array $data
        * @return array
        */
        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        /**
        * @param array $form
        * @return array
        */
        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

    }
?>
