<?php

/* updateEscribelo.twig.html */
class __TwigTemplate_008e906f80a054a0ef7e61c06d20729b extends Twig_Template
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
<header><h2>ESCRIBE-LO</h2></header>
<form class=\"sesion\" action=\"escribelo.php\" method=\"post\">
    <p>
        Nombre:<br> 
        <?php
        
        ?>
        <input type=\"text\" name=\"nombre\" required value=";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombreE'), "html");
        echo "><br><br>
        Area:<br>
        <input type=\"text\" name=\"area\" required value=";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'area'), "html");
        echo "><br><br>
        Texto:<br>
        <textarea class=\"textarea2\" name=\"descripcion\" rows=automatically cols=automatically required>";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'texto'), "html");
        echo "</textarea>
        <br><br>
        <input class=\"btn\" type=\"submit\" value=\"GUARDAR\"><br><br>
    </form>

<a  href=\"listUpdateEscribelo.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>
";
    }

    public function getTemplateName()
    {
        return "updateEscribelo.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
