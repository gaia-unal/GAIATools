<?php

/* seleccionEscribelo.twig.html */
class __TwigTemplate_fb91faad499e874b37d1482d9c52fff8 extends Twig_Template
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
   <h2>ESCRIBELO</h2>
</header>
<form class=\"sesion\" action=\"registroaskNow.php?\" method=\"post\">
    <p>
        <input class=\"btn\" type=\"button\" onclick=\"location.href='escribelo.php';\" value=\"NUEVO\"><br><br>
        <input class=\"btn\" type=\"button\" onclick=\"location.href='listUpdateEscribelo.php';\" value=\"MODIFICAR\"><br><br>
                    <input class=\"btn\" type=\"button\" onclick=\"location.href='principal.php';\" value=\"SALIR\">
    </p>
</form>
";
    }

    public function getTemplateName()
    {
        return "seleccionEscribelo.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
