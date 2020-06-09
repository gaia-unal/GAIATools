<?php

/* registroAskNow.twig.html */
class __TwigTemplate_6af5239d13b174a93f094816c8857546 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'inner' => array($this, 'block_inner'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("layout.twig.html");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_inner($context, array $blocks = array())
    {
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "<BR><BR>
<header>
    <h2>ASK NOW</h2>
</header>
\t<form class=\"sesion\" action=\"registroaskNow.php?\" method=\"post\">
\t\t\t\t<p>
\t\t\t\t\t<form action=\"registroaskNow.php\" method=\"post\">
\t\t\t\t\t\tNombre:<br>
\t\t\t\t\t\t<input type=\"text\" name=\"nombre\" id=\"nombre\" required><br><BR>
\t\t\t\t\t\tDescripcion:<br><input type=\"text\" name=\"descripcion\" id=\"descripcion\" required><br>
\t\t\t\t\t\t<br>
\t\t\t\t\t\tArea:<br>
\t\t\t\t\t\t<input type=\"text\" name=\"area\" id=\"area\" required><br><br>


\t\t\t\t\t\t<input class=\"btn\" type=\"submit\" value=\"REGISTRAR\"><br>
\t\t\t\t\t</form>
\t\t\t\t\t<input class=\"btn\" type=\"button\" onclick=\"location.href='principal.php';\" value=\"SALIR\"><br>
\t\t\t\t</p>
\t\t\t</form>
";
    }

    public function getTemplateName()
    {
        return "registroAskNow.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
