<?php

/* layout.html.twig */
class __TwigTemplate_d77d2e94f9716171502e53e385154542d506d77f44db51d43bd07f2dddcd8ffe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<head>
    <meta charset=\"utf-8\">
    <title>Drupal Projects Statistics</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/css/bootstrap.css\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/css/bootstrap-theme.min.css\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/css/main.css\" rel=\"stylesheet\" type='text/css'>
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/css/style.css\" rel=\"stylesheet\" type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> -->
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>

    <link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css\" rel=\"stylesheet\">

</head>
<body>
    ";
        // line 22
        $context["active"] = ((array_key_exists("active", $context)) ? (_twig_default_filter($this->getContext($context, "active"), null)) : (null));
        // line 23
        echo "    <div id=\"main\" role=\"main\">
        <!-- Static navbar -->
        ";
        // line 25
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 26
            echo "            <div role=\"navigation\" class=\"navbar navbar-inverse navbar-fixed-top\">
                <div class=\"container-fluid\">
                    <div class=\"navbar-collapse collapse\">

                    <div class=\"navbar-header\">
                        <a href=\"#\" class=\"navbar-brand\">Project name</a>
                    </div>
                    <div class=\"navbar-collapse collapse\">
                        <ul class=\"nav navbar-nav navbar-right\">
                            ";
            // line 35
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 36
                echo "                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-cog\"></i> Admin <b class=\"caret\"></b></a>
                                    <ul class=\"dropdown-menu\">
                                        <li><a href=\"#\">Action</a></li>
                                        <li><a href=\"#\">Another action</a></li>
                                        <li><a href=\"#\">Something else here</a></li>
                                        <li class=\"divider\"></li>
                                        <li class=\"dropdown-header\">Nav header</li>
                                        <li><a href=\"#\">Separated link</a></li>
                                        <li><a href=\"#\">One more separated link</a></li>
                                    </ul>
                                </li>
                            ";
            }
            // line 49
            echo "                            ";
            if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
                // line 50
                echo "                                <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("logout");
                echo "\"><i class=\"fa fa-user\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logout"), "html", null, true);
                echo "</a></li>
                            ";
            } else {
                // line 52
                echo "                                <li ";
                if (("login" == $this->getContext($context, "active"))) {
                    echo "class=\"active\"";
                }
                echo "><a href=\"";
                echo $this->env->getExtension('routing')->getPath("login");
                echo "\"><i class=\"fa fa-user\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login"), "html", null, true);
                echo "</a></li>
                            ";
            }
            // line 54
            echo "                        </ul>
                        <form class=\"navbar-form navbar-right\" role=\"search\" action=\"/search\" method=\"get\">
                            <div class=\"form-group\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Search...\" name=\"q\">
                            </div>
                        </form>
                    </div>
                        </div>
                </div>
            </div>
        ";
        }
        // line 65
        echo "
        <div class=\"content container-fluid\">
            ";
        // line 67
        $this->displayBlock('content', $context, $blocks);
        // line 68
        echo "        </div>
    </div>

    <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/js/jquery.js\"></script>
    <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
    <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "basepath"), "html", null, true);
        echo "/js/main.js\"></script>

</body>
</html>";
    }

    // line 67
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 67,  146 => 73,  142 => 72,  138 => 71,  133 => 68,  131 => 67,  127 => 65,  114 => 54,  102 => 52,  94 => 50,  91 => 49,  76 => 36,  74 => 35,  63 => 26,  61 => 25,  57 => 23,  55 => 22,  40 => 10,  36 => 9,  32 => 8,  28 => 7,  20 => 1,);
    }
}
