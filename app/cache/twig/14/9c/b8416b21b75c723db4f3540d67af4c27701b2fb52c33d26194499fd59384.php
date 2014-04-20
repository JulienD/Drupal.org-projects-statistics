<?php

/* sidebar.html.twig */
class __TwigTemplate_149cb8416b21b75c723db4f3540d67af4c27701b2fb52c33d26194499fd59384 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"col-sm-3 col-md-2 sidebar\">
    <ul class=\"nav nav-sidebar\">
        <li><a href=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\"> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Overview"), "html", null, true);
        echo "</a></li>
        <li><a href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("projects");
        echo "\"> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Projects"), "html", null, true);
        echo "</a></li>
        <li><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("drupal_commerce");
        echo "\"> ";
        echo "Drupal Commerce";
        echo "</a></li>
        <li><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("commerce_guys");
        echo "\"> ";
        echo "Commerce Guys";
        echo "</a></li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 6,  35 => 5,  29 => 4,  23 => 3,  19 => 1,  149 => 67,  142 => 72,  138 => 71,  133 => 68,  131 => 67,  127 => 65,  114 => 54,  102 => 52,  94 => 50,  91 => 49,  76 => 36,  74 => 35,  63 => 26,  61 => 25,  57 => 23,  55 => 22,  40 => 10,  32 => 8,  28 => 7,  20 => 1,  120 => 45,  118 => 44,  112 => 40,  101 => 35,  97 => 34,  93 => 33,  89 => 32,  85 => 31,  81 => 30,  77 => 29,  73 => 28,  67 => 27,  62 => 26,  58 => 25,  38 => 7,  36 => 9,  33 => 5,  30 => 4,  25 => 2,);
    }
}
