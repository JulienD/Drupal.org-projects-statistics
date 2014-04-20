<?php

/* search.html.twig */
class __TwigTemplate_e9aefa8833db62750c8cb949aeede1cc5ff81bbc488d7e9887ba1d7cc9eaa1dd extends Twig_Template
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
        $context["active"] = "projects";
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
            <h1 class=\"page-header\">Search for: \"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "q"), "html", null, true);
        echo "\"</h1>
            <div class=\"row\">
                <table id=\"project-list-table\" class=\"table table-striped\">
                    <thead>
                        <th>Title</th>
                        <th></th>
                    </thead>
                    <tbody>
                    ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "results"));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 17
            echo "                        <tr id=\"'project-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "result"), "name"), "html", null, true);
            echo "\" class=\"active\">
                            <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "result"), "title"), "html", null, true);
            echo "</td>
                            <td><a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("project", array("project" => $this->getAttribute($this->getContext($context, "result"), "id"))), "html", null, true);
            echo "\" class=\"btn btn-info\">Show more</a></td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 22,  65 => 19,  61 => 18,  56 => 17,  52 => 16,  41 => 8,  38 => 7,  36 => 6,  33 => 5,  30 => 4,  25 => 2,);
    }
}
