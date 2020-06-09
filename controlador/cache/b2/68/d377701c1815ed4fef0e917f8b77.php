<?php

/* updateQuestion.twig.html */
class __TwigTemplate_b268d377701c1815ed4fef0e917f8b77 extends Twig_Template
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
    <h2>Question</h2>
\t\t\t</header>
\t\t\t<div id =\"pregCerrada\">
\t\t\t\t<form class=\"sesion\" action=\"UpdateQuestion.php\" method=\"post\">
\t\t\t\t\t<p class=\"preg\">

\t\t\t\t\t\tPREGUNTA:<br><br>
\t\t\t\t\t\t<textarea name = \"preguntan\" >";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        echo "</textarea> <br><br>
\t\t\t\t\t
\t\t\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"actualizar\" >
\t\t\t\t\t\t<input class=\"btn\" type=\"submit\" id=\"actualizar\" name=\"actualizar\" value=\"actualizar\"><br><br><br>
\t\t\t\t</form>
                <form class=\"sesion\" action=\"UpdateQuestion.php\" method=\"post\">
\t\t\t\t\t<p class=\"preg\">
\t\t\t\t\t\tNUEVA OPCIÓN:<br>
\t\t\t\t\t\t<input type='text' id=\"opcion\" name=\"opcion\" > <br><br>
\t\t\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"agregar\" >
\t\t\t\t\t\t<input class=\"btn\" type='submit' id=\"agregar\" name=\"agregar\" value='Inserta Opción'> <br><br>
\t\t\t\t</form>
\t\t\t\t<form class=\"sesion\" action=\"UpdateQuestion.php\" method=\"post\">
\t\t\t\t\t<p class=\"preg\">
\t\t\t\t\t\tRESPUESTA: 
\t\t\t\t\t\t<select id=\"respuesta\" name=\"respuesta\" >
\t\t\t\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'raws'));
        foreach ($context['_seq'] as $context['_key'] => $context['raw']) {
            // line 31
            echo "\t\t\t\t\t\t\t\t<option value=";
            echo twig_escape_filter($this->env, $this->getContext($context, 'a'), "html");
            echo " selected>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "opcion", array(), "any", false), "html");
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['raw'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 33
        echo "\t\t\t\t\t\t</select><br><br>
\t\t\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"borrar\" >
\t\t\t\t\t\t<input class=\"btn\" type='submit' id=\"borrar\" name=\"borrar\" value='borrar'> <br><br>
\t\t\t\t</form>
\t\t\t</div>

\t\t\t<div id=\"pregAbierta\">
\t\t\t\t<form class=\"sesion\" action=\"UpdateQuestion.php\" method=\"post\">
\t\t\t\t\t<p class=\"preg\">

\t\t\t\t\t\tPREGUNTA:<br><br>
\t\t\t\t\t\t<textarea name = \"preguntan\" >";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        echo "</textarea> <br><br>
\t\t\t\t\t\tRESPUESTA:<br><br>
\t\t\t\t\t\t<textarea class=\"textarea2\" name=\"respuesta\" id=\"respuesta\" rows=automatically cols=automatically required>";
        // line 46
        echo twig_escape_filter($this->env, $this->getContext($context, 'a'), "html");
        echo "</textarea><br><br>
\t\t\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"actualizar\" >
\t\t\t\t\t\t<input class=\"btn\" type=\"submit\" value=\"actualizar\"><br><br><br>

\t\t\t\t\t</p>
\t\t\t\t</form>
\t\t\t</div>

\t\t\t<div id=\"pregVF\">
\t\t\t\t<form class=\"sesion\" action=\"UpdateQuestion.php\" method=\"post\">
\t\t\t\t\t<p class=\"preg\">
\t\t\t\t\t\tPREGUNTA:<br><br>
\t\t\t\t\t\t<textarea name = \"preguntan\" >";
        // line 58
        echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        echo "</textarea> <br><br>
\t\t\t\t\t\t<select id=\"respuesta\" name=\"respuesta\" >
\t\t\t\t\t\t\t\t<option value=\"1\">true</option>
\t\t\t\t\t\t\t    <option value=\"0\">false</option>
\t\t\t\t\t\t</select><br><br>
\t\t\t\t\t\t<input type=\"hidden\" name=\"control\" value=\"actualizar\" >
\t\t\t\t\t\t<input class=\"btn\" type=\"submit\" value=\"actualizar\"><br><br><br>
\t\t\t\t\t</p>
\t\t\t\t</form>
\t\t\t</div>
\t\t\t
\t\t\t<a  href=\"listUpdateQuestion.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>
\t\t\t


<script type=\"text/javascript\">
\$(document).ready(function(){
mivarJS=";
        // line 75
        echo twig_escape_filter($this->env, $this->getContext($context, 'question'), "html");
        echo ";
if (mivarJS == 1) {
\t\$(\"#pregAbierta\").show();
\t\$(\"#pregCerrada\").hide();
\t\$(\"#pregVF\").hide();
};if (mivarJS == 2) {
\t\$(\"#pregAbierta\").hide();
\t\$(\"#pregCerrada\").show();
\t\$(\"#pregVF\").hide();
};if (mivarJS == 3) {
\t\$(\"#pregAbierta\").hide();
\t\$(\"#pregCerrada\").hide();
\t\$(\"#pregVF\").show();
};
});
</script> 

";
    }

    public function getTemplateName()
    {
        return "updateQuestion.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
