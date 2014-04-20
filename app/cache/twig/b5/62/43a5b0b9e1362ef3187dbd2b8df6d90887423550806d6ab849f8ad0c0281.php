<?php

/* project.html.twig */
class __TwigTemplate_b56243a5b0b9e1362ef3187dbd2b8df6d90887423550806d6ab849f8ad0c0281 extends Twig_Template
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
        $context["active"] = "project";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"row\">
        ";
        // line 6
        $this->env->loadTemplate("sidebar.html.twig")->display($context);
        // line 7
        echo "        <div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">
            <h1 class=\"page-header\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "title"), "html", null, true);
        echo "</h1>

            ";
        // line 10
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 11
            echo "                <div id=\"flags\">
                    ";
            // line 12
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "flags"));
            foreach ($context['_seq'] as $context["_key"] => $context["flag"]) {
                // line 13
                echo "                        <a class=\"flag ";
                if ($this->getAttribute($this->getContext($context, "flag"), "flagStatus")) {
                    echo " flagged ";
                }
                echo "\" href=\"#\" data-project-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "id"), "html", null, true);
                echo "\" data-flag-type=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "flag"), "flagType"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "flag"), "flagTitle"), "html", null, true);
                echo "</a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "                </div>
            ";
        }
        // line 17
        echo "
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-4\">
                        <h2>Downloads & Installs</h2>
                        <table class=\"table table-striped\">
                            <tr><td>Downloads</td><td> ";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "statistic"), "downloads"), "html", null, true);
        echo " </td></tr>
                            <tr><td>Installs</td><td> ";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "statistic"), "installs"), "html", null, true);
        echo " </td></tr>
                        </table>
                    </div>

                    <div class=\"col-md-8\">

                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"col-md-4\">
                        <h2>Bugs & Issues</h2>
                        <table class=\"table table-striped\">
                            <tr><td>Opened issues</td><td> ";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "statistic"), "openedIssues"), "html", null, true);
        echo " </td></tr>
                            <tr><td>Total issues</td><td> ";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "statistic"), "totalIssues"), "html", null, true);
        echo " </td></tr>
                            <tr><td>Opened bugs</td><td> ";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "statistic"), "openedBugs"), "html", null, true);
        echo " </td></tr>
                            <tr><td>Total bugs</td><td> ";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "statistic"), "totalBugs"), "html", null, true);
        echo " </td></tr>
                        </table>
                    </div>

                    <div class=\"col-md-8\">
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"col-md-4\">
                        <h2>Versions</h2>
                        <table class=\"table\">
                            ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "releases"));
        foreach ($context['_seq'] as $context["_key"] => $context["release"]) {
            // line 53
            echo "                                ";
            if (($this->getAttribute($this->getContext($context, "release"), "versionExtra") == "dev")) {
                // line 54
                echo "                                    <tr class=\"danger\"><td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "release"), "version"), "html", null, true);
                echo "</td></tr>
                                ";
            } elseif (($this->getAttribute($this->getContext($context, "release"), "versionExtra") != "")) {
                // line 56
                echo "                                    <tr class=\"warning\"><td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "release"), "version"), "html", null, true);
                echo "</td></tr>
                                ";
            } else {
                // line 58
                echo "                                    <tr><td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "release"), "version"), "html", null, true);
                echo "</td></tr>
                                ";
            }
            // line 60
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['release'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                        </table>
                    </div>
                    <div class=\"col-md-2\"></div>
                    <div class=\"col-md-4\">
                        <h2>Maintainers</h2>
                    </div>
                </div>


            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "project.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 61,  156 => 60,  150 => 58,  144 => 56,  138 => 54,  135 => 53,  131 => 52,  116 => 40,  112 => 39,  108 => 38,  104 => 37,  88 => 24,  84 => 23,  76 => 17,  72 => 15,  55 => 13,  51 => 12,  48 => 11,  46 => 10,  41 => 8,  38 => 7,  36 => 6,  33 => 5,  30 => 4,  25 => 2,);
    }
}
