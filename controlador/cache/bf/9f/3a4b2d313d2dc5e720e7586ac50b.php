<?php

/* seleccionQuestion.twig.html */
class __TwigTemplate_bf9f3a4b2d313d2dc5e720e7586ac50b extends Twig_Template
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
    <h2>QUESTION</h2>
</header>
\t<form class=\"sesion\" action=\"registroaskNow.php?\" method=\"post\">
\t\t\t\t<p>
\t\t\t\t\t<input class=\"btn\" type=\"button\" onclick=\"location.href='registroQuestion.php';\" value=\"NUEVO\"><br><br>
\t\t\t\t\t<input class=\"btn\" type=\"button\" onclick=\"location.href='listUpdateQuestion.php';\" value=\"MODIFICAR\"><br><br>
                    <input class=\"btn\" type=\"button\" onclick=\"location.href='principal.php';\" value=\"SALIR\">
\t\t\t\t</p>
    </form>
";
    }

    public function getTemplateName()
    {
        return "seleccionQuestion.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
