<?php

/* listUpdateEscribelo.twig.html */
class __TwigTemplate_02d1b2b3dbcb69cd4aa747ff39710de5 extends Twig_Template
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
<form class=\"sesion\" action=\"ListUpdateEscribelo.php\" method=\"POST\">
    <table border=\"1\">
        <tr>
            <th></th>
            <th><h1>ID ESCRIBELO</h1></th>
            <th>NOMBRE</th>
            <th>DESCRIPCIÓN</th>
            <th>ÁREA</th>
        </tr>
        <tbody>
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'raws'));
        foreach ($context['_seq'] as $context['_key'] => $context['raw']) {
            // line 18
            echo "                <tr>
                    <td><input type=\"radio\" name=\"g1\" value=";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_editor_texto", array(), "any", false), "html");
            echo "></td>
                    <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "id_editor_texto", array(), "any", false), "html");
            echo "</td>
                    <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "nombre", array(), "any", false), "html");
            echo "</td>
                    <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "descripcion", array(), "any", false), "html");
            echo "</td>
                    <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'raw'), "area", array(), "any", false), "html");
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['raw'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "        </tbody>
    </table>

    <input class=\"btn\" type=\"submit\" name=\"actualizar\" value=\"actualizar\">
    <input class=\"btn\" type=\"submit\" name=\"eliminar\" value=\"eliminar\"><br><br>
    <input class=\"btn\" type=\"button\" onclick=\"location.href='principal.php';\" value=\"SALIR\">

</form>
";
    }

    public function getTemplateName()
    {
        return "listUpdateEscribelo.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
