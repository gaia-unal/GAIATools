<?php

/* traductor.twig.html */
class __TwigTemplate_7aeecc566f7acbd7f5ce986083f0652f extends Twig_Template
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
        echo "<div id=\"formulario\">
    <form id=\"cambapli\" action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'ruta'), "html");
        echo "\" method=\"post\">
        <!--input type=\"hidden\" name=\"datos\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'tmp'), "html");
        echo "\"></input-->
        <input type=\"hidden\" name=\"id\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\"></input>
        <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"></input>
        <input type=\"hidden\" name=\"existente\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\"></input>
        <!--input type=\"hidden\" name=\"idItem\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\"></input-->
        <input type=\"hidden\" name=\"modificado\" value=\"0\">
    </form>
</div>
<script type=\"text/javascript\">
    var redireccionar = '";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
        echo "';
    if(redireccionar!=='0'){
        document.forms['cambapli'].submit();
    }
    function guardarTemp(urlAplicacion){
        \$(\"#ruta\").html(\"<input type='hidden' name='ruta' value='\"+urlAplicacion+\"' />\");
        document.forms['meta'].submit();
    }
</script>
<div class=\"presentacion\">
    <div id=\"aplicaciones\" >
    ";
        // line 25
        if (($this->getContext($context, 'estado') != "")) {
            // line 26
            echo "        <button id=\"editarSiguiente\" onclick=\"guardarTemp('";
            echo twig_escape_filter($this->env, $this->getContext($context, 'actividad'), "html");
            echo "');\" >SIGUIENTE</button>
    ";
        } else {
            // line 28
            echo "        <font color=\"#57934E\" size=\"6\">Bienvenido ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto2'), "html");
            echo "</font><br><br>
        <header><h1><font color=\"#0489B1\" size=\"5\">Elija cuál de las siguientes actividades desea crear.</font></h1></header><br>
        <p><!--a  href=\"seleccionAskNow.php\" id=\"logo-aplicativo\"><img src=\"../images/8.png\" id=\"logo-aplicativo\" alt=\"logo aplicativo preguntas\"></a-->
            <a href=\"puenteEnsenaloEmparejar.php\"><img id=\"logo-aplicativo2\" src=\"../images/emparejar.png\" alt=\"logo actividad emparejalo\"></a>
            <a href=\"puenteEnsenaloOptionCorrect.php\"><img id=\"logo-aplicativo2\" src=\"../images/opcionmultiple.png\" alt=\"logo actividad escribelo\"></a>
            <a href=\"puenteEnsenaloResponseCorrect.php\"><img id=\"logo-aplicativo2\" src=\"../images/respuestacorrecta.png\" alt=\"logo actividad preguntas\"></a><br>
        </p>
        <p align=\"left\">
           <font color=\"#0489B1\" size=\"4\"><strong> Emparejar:</strong> </font><font size=\"3\">El estudiante debe asociar la seña con la respuesta correcta.</font><br>
           <font color=\"#0489B1\" size=\"4\"><strong> Opción correcta:</strong> </font><font size=\"3\">Se muestra la seña y el estudiante debe elegir la respuesta entre A),B),C),D).</font><br>
           <font color=\"#0489B1\" size=\"4\"><strong> Respuesta correcta:</strong> </font><font size=\"3\">Se muestra la seña,el estudiante debe escribir correctamente la respuesta.</font>
        </p>
    ";
        }
        // line 41
        echo "    </div>
</div>
<input value='";
        // line 43
        echo twig_escape_filter($this->env, $this->getContext($context, 'know'), "html");
        echo "' type=\"hidden\" id='listCono'/>
<input value='";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'need'), "html");
        echo "' type=\"hidden\" id='listNeed'/>
<input value='";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, 'estado'), "html");
        echo "' type=\"hidden\" id='listEstado'/>
<script type=\"text/javascript\">
    var lista = \$(\"#listCono\").val();
    if (lista.length > 0){\$(\"#areasConocimiento\").html(lista);}
    var lista = \$(\"#listNeed\").val();
    if (lista.length > 0){\$(\"#need\").html(lista);}
    var lista = \$(\"#listEstado\").val();
    if (lista.length > 0){\$(\"#opcionEstado\").html(lista);}
</script>
";
    }

    public function getTemplateName()
    {
        return "traductor.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
