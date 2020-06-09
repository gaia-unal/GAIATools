<?php

/* pregUpdateAskNow.twig.html */
class __TwigTemplate_312eb3562f3a23d8ea1a071b62bc3d9d extends Twig_Template
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
\t<form class=\"sesion\" action=\"pregUpdateAskNow.php\" method=\"POST\">
        <table border=\"1\">
            <tr>
                <th></th>
                <th><h1>ID PREGUNTA</h1></th>
                <th>PREGUNTA</th>
                <th>RESPUESTA</th>
            </tr>
            <tbody>
                ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'raws'));
        foreach ($context['_seq'] as $context['_key'] => $context['raw']) {
            // line 19
            echo "                    <tr>
                        <td><input type=\"radio\" name=\"g1\" value=";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_pregunta", array(), "any", false), "html");
            echo "></td>
                        <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_pregunta", array(), "any", false), "html");
            echo "</td>
                        <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "pregunta", array(), "any", false), "html");
            echo "</td>
                        <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "respuesta", array(), "any", false), "html");
            echo "</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['raw'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "            </tbody>
        </table>

        <input class=\"btn\" type=\"submit\" name=\"actualizar\" value=\"actualizar\">
        <input  class=\"btn\" type=\"submit\" name=\"eliminar\" value=\"eliminar\"><br><br>
        <input class=\"btn\" type=\"button\" onclick=\"location.href='listUpdateAskNow.php';\" value=\"SALIR\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "pregUpdateAskNow.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
