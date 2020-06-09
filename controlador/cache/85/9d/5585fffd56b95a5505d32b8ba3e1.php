<?php

/* puenteEnsenaloEmparejar.twig.html */
class __TwigTemplate_859d5585fffd56b95a5505d32b8ba3e1 extends Twig_Template
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
        echo "<div id=\"formulario\"></div>
<script type=\"text/javascript\">
    function guardarTemp(urlAplicacion){
        var titulo ='";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "';
        var id ='";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "';
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\">\\n\\
                                <input type=\"hidden\" name=\"titulo\" value=\"'+titulo+'\"></input>\\n\\
                                <input type=\"hidden\" name=\"id\" value=\"'+id+'\"></input>\\n\\
                                <input type=\"hidden\" name=\"posicion\" value=0></input>\\n\\
                               </form>');
        document.forms['cambapli'].submit();
    }
</script>
<div class=\"presentacion\">
    <header><h2><font color=\"#0489B1\" size=\"5\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
        echo ", usted creará una actividad de emparejar para evaluar ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo " en lengua de señas</font></h2><br><font color=\"#57934E\">¿Desea empezar?, presione continuar, de lo contrario presione atrás.</font></header>
    <div id=\"tipopreg\">

        <!--button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaMultiple.php');\">Pregunta Cerrada de Múltiple Respuesta</button-->
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('traductor.php');\">Atrás<br><br><img id=\"retornar\" src=\"../images/17.png\" width=\"20\" heigth=\"20\" align=\"center\"></button>
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('ensenaloEmparejar.php');\">Continuar<br><br><img id=\"retornar\" src=\"../images/18.png\" width=\"20\" heigth=\"20\" align=\"center\"></button>
        
    </div>
    <br>
</div>
";
    }

    public function getTemplateName()
    {
        return "puenteEnsenaloEmparejar.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
