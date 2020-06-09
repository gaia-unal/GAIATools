<?php

/* ensenaloRC.twig.html */
class __TwigTemplate_a328f6b854e70f690b364b8c553ecfad extends Twig_Template
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
    var fruits = [];
    function guardarTemp(urlAplicacion){
        if('";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'noGuardo'), "html");
        echo "'===0){document.forms['pregunta'].submit();}
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\"><input type=\"hidden\" name=\"titulo\" value=\"'+'";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"id\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"existente\" value=\"'+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+'\" /><input type=\"hidden\" name=\"modificado\" value=\"0\" /></form>');
        document.forms['cambapli'].submit();
    }
    \$(document).ready(function(){ \$('.autocomplete').autocomplete();}); /* Una vez que se cargo la pagina , llamo a todos los autocompletes y los inicializo */        
    if ( '";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'===1){
        var opcionesExistentes = \$(\"#opcionesExist\").val();
        var opcionExistent = opcionesExistentes.split(',-%');
        var i; tam=opcionExistent.length;
        for (i=0; i<tam; i++){ insertOption(opcionExistent[i]); }
    }
    function insertOption(elm) {
        fruits.push(elm); 
        var nuevaOpcion=document.createElement('option');
        nuevaOpcion.text=elm;
        var selectRespuesta=document.getElementById(\"respuesta\");
        try {
            selectRespuesta.add(nuevaOpcion,null);
            var respuestas1 = document.getElementById(\"respuesta1\");
        } catch(ex) { selectRespuesta.add(nuevaOpcion); }
        var valu = \$(\"#respuestas1\").val();
        if(valu==\"\"){
            \$(\"#respuestas1\").val(elm),
            \$(\"#opcione\").val('');
        }else{
            \$(\"#respuestas1\").val(valu+',-%'+elm),
            \$(\"#opcione\").val('');
        }
        \$(\"#opcione\").val(\"\");
    }
    function removeOption() {
        var selectRespuesta=document.getElementById(\"respuesta\");
        var respuesta=\$(\"#respuesta\").val();
        selectRespuesta.remove(selectRespuesta.selectedIndex);
        var valu = \$(\"#respuestas1\").val();
        \$(\"#respuestas1\").val(valu.replace(respuesta+\",-%\",\"\"));
    }
</script>
<div class=\"presentacion\">
    <p align=\"right\" class=\"num\"><font color=\"#0489B1\" size=\"5\">";
        // line 45
        echo twig_escape_filter($this->env, ($this->getContext($context, 'posicion') + 1), "html");
        echo "</font></p>
    ";
        // line 46
        if ((($this->getContext($context, 'posicion') == 0) && ($this->getContext($context, 'msgA') == ""))) {
            // line 47
            echo "        <font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo "!, hay una celda donde se debe escribir el valor en sigular que usted evaluará, es decir el valor que el estudiante debe responder correctamente (si por ejemplo se usted está evaluando objetos, ventana sería un valor), a medida que se escribe se listarán los valores con seña disponible, debe elegir alguno de estos.
        <br>La seña se genera automáticamente. </font><br><font color=\"#57934E\">La retroalimentación servirá para indicarle al estudiante una 'pista' de la respuesta correcta cuando este falle en la respuesta.</font>
    ";
        }
        // line 50
        echo "    ";
        if (($this->getContext($context, 'msgA') != "")) {
            echo "<font color=\"#A34B4E\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", algo pasó!.</font>";
        }
        // line 51
        echo "    ";
        if ((($this->getContext($context, 'posicion') == 1) && ($this->getContext($context, 'msgA') == ""))) {
            echo "<font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", la primera estuvo muy bien hecha!, así mismo se debe construir esta segunda.</font><br><font color=\"#57934E\">La seña se genera automáticamente.</font>";
        }
        // line 52
        echo "    ";
        if ((($this->getContext($context, 'posicion') > 1) && ($this->getContext($context, 'msgA') == ""))) {
            echo "<font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", se está construyendo excelentemente esta actividad para evaluar ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "!, todos los ítems de evaluación se construyen así mismo. </font><br><font color=\"#57934E\">La seña se genera automáticamente.</font>";
        }
        // line 53
        echo "    <!--";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 54
            echo "    <div id=\"tipopreg\">
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregAbierta.php');\">Pregunta abierta</button>
        button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaUnica.php');\">Pregunta cerrada de única respuesta</button
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregVerdadero.php');\">Pregunta de verdadero o falso</button>
    </div>
    ";
        }
        // line 59
        echo "-->
    <div id=\"pregCerrada\">
        <header id=\"tipoActividad\"><h2></h2></header>
        <form class=\"sesion\" id=\"pregunta\" action=\"ensenaloResponseCorrect.php\" method=\"post\">
            <p class=\"preg\">
                <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
                <input type=\"hidden\" name=\"existente\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
                <input type=\"hidden\" name=\"origen\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
                <input type='hidden' name='idItem' value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
                <input type='hidden' name='posicion' value=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
                ";
        // line 70
        if (($this->getContext($context, 'modificado') == "0")) {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"1\">";
        } else {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"0\">";
        }
        // line 71
        echo "                <!--<div id=\"partItem\"><label>PREGUNTA:</label><textarea class=\"textarea1\" name=\"pregunta\"  placeholder=\"¡Escriba aca su pregunta!\">";
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        }
        echo "</textarea></div>-->
                ";
        // line 72
        if (($this->getContext($context, 'existente') == "1")) {
            echo "<input type=\"hidden\" name=\"aid\" value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'aid'), "html");
            echo "\">";
        }
        // line 73
        echo "                <div class=\"autocomplete\"><label>VALOR A EVALUAR:</label><input type='text' data-source=\"search.php?search=\" id=\"opcione\" name=\"respuesta\"   placeholder=\"Escribe el ítem a evaluar. Ejm: 'perro'\" required=\"required\" value=\"";
        if ((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'existente') == "1"))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'respuesta'), "html");
        }
        echo "\" autocomplete=\"off\"></div>
                <p align=\"center\"><font color=\"#A34B4E\">";
        // line 74
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgA'), "html");
        echo "</font></p>
                <div id=\"partItem\"><label>RETROALIMENTACIÓN:</label><textarea id=\"respAb\" class=\"textarea1\" name=\"retroalimentacion\" rows=\"3\" placeholder=\"Escribe la retroalimentación para el estudiante que responde el ítem.\" required=\"required\">";
        // line 75
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'existente') == "1"))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'retroalimentacion'), "html");
        }
        echo "</textarea></div>
                ";
        // line 76
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 77
            echo "                    <br><br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
                ";
        } else {
            // line 79
            echo "                    <input class=\"btn\" type=\"submit\" name=\"guardarCerrada\" id=\"guardar\" value=\"Guardar y Continuar\">
                    <input class=\"btn\" type=\"submit\" name=\"finalizarCerrada\" id=\"finalizar\" value =\"Guardar y finalizar\">
                ";
        }
        // line 82
        echo "            </p>
        </form>
        ";
        // line 84
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 85
            echo "            <br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('listarItems.php');\">Regresar</button>
        ";
        }
        // line 87
        echo "        ";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 88
            echo "        <form action=\"finalizar.php\" method=\"post\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input type=\"hidden\" name=\"respuesta\"></input>
            <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
        </form><br>
        <font color=\"#57934E\">Guardar y Continuar para almacenar y seguir construyendo otro ítem, guardar y finalizar para almacenar y terminar o presione finalizar para terminar sin guardar.</font>
        <!-- ";
        } else {
            // line 95
            echo "<form action=\"editarRecurso.php\" method=\"post\"><!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"></form>-->
        ";
        }
        // line 97
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "ensenaloRC.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
