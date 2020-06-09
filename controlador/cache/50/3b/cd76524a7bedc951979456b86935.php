<?php

/* parejas.twig.html */
class __TwigTemplate_503bcd76524a7bedc951979456b86935 extends Twig_Template
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
        echo "<br><br>
<header><h2>ESCRIBE-LO</h2></header>
\t
\t\t\t<form class=\"sesion\" action=\"parejas.php\" method=\"post\" enctype=\"multipart/form-data\">
\t\t\t\t<p>
\t\t\t\t\tPalabra:<br> 
\t\t\t\t\t<input type=\"text\" name=\"palabra\" required><br><br>
\t\t\t\t\tImagen:<br>
\t\t\t\t\t<input type=\"file\" name=\"imagen\"required><br><br>
\t\t\t\t\tsonido:<br> 
\t\t\t\t\t<input type=\"file\" name=\"sonido\" required><br><br>
\t\t\t\t\tseña:<br> 
\t\t\t\t\t<input type=\"file\" name=\"seña\" required><br><br>
\t\t\t\t\t<br><br>
\t\t\t\t\t<input class=\"btn\" type=\"submit\" value=\"GUARDAR\"><br><br>
\t\t\t\t</form>
\t\t\t\t<a  href=\"emparejado.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"> </a>


";
    }

    public function getTemplateName()
    {
        return "parejas.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
