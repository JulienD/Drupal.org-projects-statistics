<?php

/* login.html.twig */
class __TwigTemplate_3a848576741e1127684f465d299c98d8063a2281e346739b745273b0a3067724 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["active"] = "signin";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "        ";
        if ($this->getContext($context, "error")) {
            // line 6
            echo "            <div class=\"alert alert-danger\">
                ";
            // line 7
            echo twig_escape_filter($this->env, $this->getContext($context, "error"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 10
        echo "
    <div class=\"container\">

       ";
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start', array("attr" => array("class" => "form-signin", "novalidate" => "novalidate")));
        echo "
            <h2 class=\"form-signin-heading\">Please log in</h2>

            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "

            ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "username"), 'errors');
        echo "
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "username"), 'widget', array("attr" => array("class" => "form-control username", "placeholder" => "Username")));
        echo "

            ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "password"), 'errors');
        echo "
            ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "password"), 'widget', array("attr" => array("class" => "form-control password", "placeholder" => "Password")));
        echo "

            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Sign in</button>

        ";
        // line 26
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "

    </div> <!-- /container -->

";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 26,  74 => 22,  70 => 21,  65 => 19,  61 => 18,  56 => 16,  50 => 13,  45 => 10,  39 => 7,  36 => 6,  33 => 5,  30 => 4,  25 => 2,);
    }
}
