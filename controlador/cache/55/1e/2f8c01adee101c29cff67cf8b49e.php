<?php

/* ensamblar.twig.html */
class __TwigTemplate_551e2f8c01adee101c29cff67cf8b49e extends Twig_Template
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

    // line 1
    public function block_inner($context, array $blocks = array())
    {
        // line 2
        echo "<div id=\"formulario\"></div>
<script type=\"text/javascript\">
    if ('";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "'!='0' && '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'modificado'), "html");
        echo "'=='1'){
        \$(\"#formulario\").html('<form id=\"siguiente\" action=\"'+'";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'url'), "html");
        echo "'+'\" method=\"post\" ><input type=\"hidden\" name=\"titulo\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"id\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"idItem\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"existente\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"modificado\" value=\"0\" /></form>');
        document.forms['siguiente'].submit();   
    }
    function guardarTemp(urlAplicacion, idItem){
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\" ><input type=\"hidden\" name=\"titulo\" value=\"'+'";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"id\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"origen\" value=\"existe\" /><input type=\"hidden\" name=\"existente\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+'\" /></form>');
        document.forms['cambapli'].submit();  
    }
</script>
<div class=\"presentacion\">
    <header><h2>INTEGRADOR: \"";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header><br><br>
    <div>
        <br>
        <h3 class=\"bienvenida\">
            Agregue uno a uno los objetos de aprendizaje relacionados con la temática y la necesidad de 
            aprendizaje del contenido que acaba de construir. La selección se realiza verificando el 
            objeto y presionando el botón Agregar. La relación de tu contenido con otros recursos educativos
            permite a otros usuarios ampliar su aprendizaje. El botón Finalizar permite terminar la 
            creación de este recurso educativo. <br><br>
        </h3>
    </div>
    <form action=\"ensamblar.php\" method=\"post\">
        <input name=\"id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"titulo\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"existente\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"modificado\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, 'modificado'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"categoriaEle\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'categoriaEle'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"needEle\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'needEle'), "html");
        echo "\" type=\"hidden\" />
        <div id=\"items\">
            ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'recursos'));
        foreach ($context['_seq'] as $context['_key'] => $context['recurso']) {
            // line 34
            echo "                <input type=\"radio\" name=\"idItem\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'recurso'), "id", array(), "any", false), "html");
            echo "\"/>
                <b>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'recurso'), "title", array(), "any", false), "html");
            echo ": </b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'recurso'), "description", array(), "any", false), "html");
            echo "<br>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recurso'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "        </div>
        <label>";
        // line 38
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label><br>
        <input class=\"btn\" type=\"submit\" name=\"agregar\" value=\"AGREGAR\" />
        <!--input class=\"btn\" type=\"submit\" name=\"eliminar\" value=\"ELIMINAR\" /-->
    </form>
    ";
        // line 42
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 43
            echo "        <form action=\"finalizar.php\" method=\"post\" id=\"formFinal\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
        </form>
        ";
        } else {
            // line 49
            echo "        <form action=\"editarRecurso.php\" method=\"post\">
            <!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"-->
        </form>
        ";
        }
        // line 53
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "ensamblar.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
