<?php

/* projects.html.twig */
class __TwigTemplate_61c4e7c04db1a8d0c7b36515b9922a7eecc6902e6e0101b81b40f5a935c8f298 extends Twig_Template
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
            <h1 class=\"page-header\">Projects</h1>
            <div class=\"row\">
                <table id=\"project-list-table\" class=\"table table-striped\">
                    <thead>
                        <th>project_title</th>
                        <th>Downloads</th>
                        <th>Installs</th>
                        <th>Opened issues</th>
                        <th>Total issues</th>
                        <th>Opened bugs</th>
                        <th>Total bugs</th>
                        <th>Last commit</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "projects"));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 26
            echo "                        <tr id=\"'project-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "name"), "html", null, true);
            echo "\" class=\"active\">
                            <td><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "url"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "title"), "html", null, true);
            echo "</a></td>
                            <td class=\"number\">";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "downloads"), "html", null, true);
            echo "</td>
                            <td class=\"number\">";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "installs"), "html", null, true);
            echo "</td>
                            <td class=\"number\">";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "openedIssues"), "html", null, true);
            echo "</td>
                            <td class=\"number\">";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "totalIssues"), "html", null, true);
            echo "</td>
                            <td class=\"number\">";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "openedBugs"), "html", null, true);
            echo "</td>
                            <td class=\"number\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "totalBugs"), "html", null, true);
            echo "</td>
                            <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project"), "lastCommit"), "html", null, true);
            echo "</td>
                            <td><a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("project", array("project" => $this->getAttribute($this->getContext($context, "project"), "id"))), "html", null, true);
            echo "\" class=\"btn btn-info\">Show more</a></td>
                            <td class=\"number\"></td>
                            <td class=\"number\"></td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </tbody>
                </table>
            </div>

            ";
        // line 44
        $this->env->loadTemplate("pagination.html.twig")->display($context);
        // line 45
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "projects.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 45,  118 => 44,  112 => 40,  101 => 35,  97 => 34,  93 => 33,  89 => 32,  85 => 31,  81 => 30,  77 => 29,  73 => 28,  67 => 27,  62 => 26,  58 => 25,  38 => 7,  36 => 6,  33 => 5,  30 => 4,  25 => 2,);
    }
}
