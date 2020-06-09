<?php

/* listUpdateAskNow.twig.html */
class __TwigTemplate_aa96279c85405fa56be5decb56d299b9 extends Twig_Template
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
\t<form class=\"sesion\" action=\"ListUpdateAskNow.php\" method=\"POST\">
\t\t\t\t\t<table border=\"1\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t<th><h1>ID ASKNOW</h1></th>
\t\t\t\t\t\t\t<th>NOMBRE</th>
\t\t\t\t\t\t\t<th>DESCRIPCIÓN</th>
\t\t\t\t\t\t\t<th>ÁREA</th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t
\t\t\t\t\t\t\t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'raws'));
        foreach ($context['_seq'] as $context['_key'] => $context['raw']) {
            // line 21
            echo "                                <tr>
\t\t\t\t\t\t\t\t\t<td><input type=\"radio\" name=\"g1\" value=";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_preguntados", array(), "any", false), "html");
            echo "></td>
\t\t\t\t\t\t\t\t\t<td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_preguntados", array(), "any", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t\t<td><a target=\"_blank\" href=";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "enlace", array(), "any", false), "html");
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "nombre", array(), "any", false), "html");
            echo "</a></td>
\t\t\t\t\t\t\t\t\t<td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "descripcion", array(), "any", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "area", array(), "any", false), "html");
            echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['raw'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 29
        echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>

\t\t\t\t\t<input class=\"btn\" type=\"submit\" name=\"actualizar\" value=\"actualizar\">
\t\t\t\t\t<input class=\"btn\" type=\"submit\" name=\"eliminar\" value=\"eliminar\"><br><br>
\t\t\t\t\t<input class=\"btn\" type=\"button\" onclick=\"location.href='principal.php';\" value=\"SALIR\">

    </form>
";
    }

    public function getTemplateName()
    {
        return "listUpdateAskNow.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
