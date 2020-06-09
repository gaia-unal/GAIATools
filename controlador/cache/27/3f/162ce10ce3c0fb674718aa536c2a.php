<?php

/* updateAskNow.twig.html */
class __TwigTemplate_273f162ce10ce3c0fb674718aa536c2a extends Twig_Template
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
\t        <form class=\"sesion\" action=\"UpdateAskNow.php\" method=\"post\">
\t\t\t\t<p class=\"preg\">

\t\t\t\t\tPREGUNTA:<br><br>
\t\t\t\t\t<textarea name = \"preguntan\" >";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        echo "</textarea> <br><br>
\t\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"actualizar\" >
\t\t\t\t\t<input class=\"btn\" type=\"submit\" value=\"actualizar\"><br><br><br>
\t\t\t\t</p>
\t\t\t</form>

\t\t\t<form class=\"sesion\" action=\"UpdateAskNow.php\" method=\"post\">
\t\t\t<p class=\"preg\">
\t\t\t\tNUEVA OPCIÓN:<br>
\t\t\t\t<input type='text' id=\"opcion\" name=\"opcion\" > <br><br>
\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"agregar\" >
\t\t\t\t<input class=\"btn\" type='submit' value='Inserta Opción'> <br><br><br>
\t\t\t</p>
\t\t\t</form>
\t\t\t<form class=\"sesion\" action=\"UpdateAskNow.php\" method=\"post\">
\t\t\t<p class=\"preg\">
\t\t\t\tRESPUESTA: 
\t\t\t\t<select id=\"respuesta\" name=\"respuesta\" >
\t\t\t\t\t
\t\t\t\t\t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'raws'));
        foreach ($context['_seq'] as $context['_key'] => $context['raw']) {
            // line 33
            echo "\t\t\t\t\t\t<option name=\"opcion\" value=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_opcion", array(), "any", false), "html");
            echo " selected>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "opcion", array(), "any", false), "html");
            echo "</option>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['raw'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 35
        echo "\t\t\t\t</select><br><br>
\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"borrar\">
\t\t\t\t<input class=\"btn\" type='submit' value='Borra Optión'> <br><br>
\t\t\t\t</p>
\t\t\t</form>
\t\t\t<a  href=\"listUpdateAskNow.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>
";
    }

    public function getTemplateName()
    {
        return "updateAskNow.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
