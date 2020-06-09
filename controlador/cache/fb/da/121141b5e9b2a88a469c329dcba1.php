<?php

/* emparejado.twig.html */
class __TwigTemplate_fbda121141b5e9b2a88a469c329dcba1 extends Twig_Template
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

    // line 2
    public function block_inner($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"presentacion\">
    <header><h2>EMPAREJADO</h2></header>
    <form class=\"sesion\" action=\"emparejado.php\" method=\"POST\">
        <label>Nombre:</label>
        <input type=\"text\" name=\"titulo\" required>
        <label>Resumen:</label>
        <textarea class=\"textarea2\" name=\"resumen\" rows=automatically cols=automatically placeholder=\"¡Escriba aca el contenido del texto!\" required></textarea>
        <input class=\"btn\" type=\"submit\" value=\"CONTINUAR\">
    </form>
    <a  href=\"crearRecurso.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"> </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "emparejado.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
