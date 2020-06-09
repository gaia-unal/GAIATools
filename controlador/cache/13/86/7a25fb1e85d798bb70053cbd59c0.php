<?php

/* pagina.twig.html */
class __TwigTemplate_13867a25fb1e85d798bb70053cbd59c0 extends Twig_Template
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

    // line 3
    public function block_inner($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "<BR><BR>
<h2>PAGINA</h2>
\t\t\t
\t\t\t</header>
\t\t\t<form class=\"sesion\" id=\"askNow\" action=\"pagina.php\" method=\"post\" enctype=\"multipart/form-data\">
\t\t\t\t<p class=\"preg\">

\t\t\t\t\t
\t\t\t\t\tIngrese el contenido de la pagina :<br><br> 
\t\t\t\t\t<textarea class=\"textarea2\" name=\"contenido\" placeholder=\"¡Escriba aca el contenido!, no mayor a 260 caracteres\" maxlength=\"300\" required></textarea><br><br>
\t\t\t\t\tIngrese una imagen:<br><br>
\t\t\t\t\t<input  type=\"file\" name=\"archivo\"><br><br>
\t\t\t\t\t<input class=\"btn\" type=\"submit\" name=\"guardar\" id=\"guardar\" value=\"GUARDAR Y CONTINUAR\"><br><br>
                    <input class=\"btn\" type=\"button\" onclick=\"location.href='principal.php';\" value=\"SALIR PAGINA PRINCIPAL\">
\t\t\t\t</p>
\t\t\t</form>
";
    }

    public function getTemplateName()
    {
        return "pagina.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
