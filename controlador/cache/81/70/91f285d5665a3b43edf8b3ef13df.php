<?php

/* ensenaloEmp.twig.html */
class __TwigTemplate_817091f285d5665a3b43edf8b3ef13df extends Twig_Template
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
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\">\\n\\
                                <input type=\"hidden\" name=\"titulo\" value=\"'+'";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"id\" value=\"'+'";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"existente\" value=\"'+'";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"modificado\" value=\"0\" />\\n\\
                               </form>');
        document.forms['cambapli'].submit();
    }
    \$(document).ready(function(){
        /* Una vez que se cargo la pagina , llamo a todos los autocompletes y los inicializo */
        \$('.autocomplete').autocomplete();
    });
    \"";
        // line 19
        if (($this->getContext($context, 'existente') == "1")) {
            echo "\";
        var opcionesExistentes = \$(\"#opcionesExist\").val();
        var opcionExistent = opcionesExistentes.split(',-%');
        var i; tam=opcionExistent.length;
        for (i=0; i<tam; i++){ insertOption(opcionExistent[i]); }
    \"";
        }
        // line 24
        echo "\";
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
        // line 53
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "</font></p>
    ";
        // line 54
        if ((((($this->getContext($context, 'posicion') == 1) && ($this->getContext($context, 'msgA') == "")) && ($this->getContext($context, 'msgB') == "")) && ($this->getContext($context, 'msgC') == ""))) {
            // line 55
            echo "        <font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo "!, hay 3 celdas (A,B,C), son los 3 valores que el estudiante asociará con la seña correspondiente, lo que usted debe escribir en cada celda, es el valor a evaluar, en singular (si por ejemplo está evaluando los animales, gato sería un valor), a medida que se escribe se listarán los valores con seña disponible, debe elegir alguno de estos; al frente de cada celda hay un botón que permite cargar la imágen asociada al valor escrito, se deben cargar las 3 imágenes, una por cada valor, cada una debe pesar menos de 2 MB (2000 KB) y debe estar en formato JPEG o PNG.
        <br>Las señas se generan automáticamente al finalizar. </font><br><font color=\"#57934E\">La retroalimentación servirá para indicarle al estudiante una 'pista' de cómo responder correctamente cuando este falle en la asociación.</font>
    ";
        }
        // line 58
        echo "    ";
        if (((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != ""))) {
            echo " <font color=\"#A34B4E\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", algo pasó!.</font> ";
        }
        // line 59
        echo "    ";
        if ((((($this->getContext($context, 'posicion') == 2) && ($this->getContext($context, 'msgA') == "")) && ($this->getContext($context, 'msgB') == "")) && ($this->getContext($context, 'msgC') == ""))) {
            // line 60
            echo "        <font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", la primera estuvo muy bien hecha!, así mismo se debe construir esta segunda. </font><br><font color=\"#57934E\">La seña se genera automáticamente.</font>
    ";
        }
        // line 62
        echo "    ";
        if ((((($this->getContext($context, 'posicion') > 2) && ($this->getContext($context, 'msgA') == "")) && ($this->getContext($context, 'msgB') == "")) && ($this->getContext($context, 'msgC') == ""))) {
            // line 63
            echo "        <font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", se está construyendo excelentemente esta actividad para evaluar ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "!, todos los ítems de evaluación se construyen así mismo. </font><br><font color=\"#57934E\">La seña se genera automáticamente.</font>
    ";
        }
        // line 65
        echo "    <!--<header><h2><font color=\"#0489B1\" size=\"5\">Actividad de emparejar para la evaluación de ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo " en lengua de señas colombiana</font></h2></header>-->
    <div id=\"pregCerrada\">
        <header id=\"tipoActividad\"><h2></h2></header>
        <form class=\"sesion\" id=\"pregunta\" action=\"ensenaloEmparejar.php\" method=\"post\" enctype=\"multipart/form-data\">
            <p class=\"preg\">
                <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
                <input type=\"hidden\" name=\"existente\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
                <input type=\"hidden\" name=\"origen\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
                <input type='hidden' name='idItem' value=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
                <input type='hidden' name='posicion' value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
                ";
        // line 76
        if (($this->getContext($context, 'modificado') == "0")) {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"1\">";
        } else {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"0\">";
        }
        // line 77
        echo "                <br><br>
                <table>
                    <tr>
                        <td><label>A)</label></td>
                        <td>
                            <div class=\"autocomplete\"><input type=\"text\" data-source=\"search.php?search=\" name=\"a\" required=\"required\" placeholder=\"Escriba la opción de respuesta a)\" value=\"";
        // line 82
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'existente') == "1"))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'a'), "html");
        }
        echo "\" autocomplete=\"off\"/></div>
                            ";
        // line 83
        if (($this->getContext($context, 'existente') == "1")) {
            echo "<input type=\"hidden\" name=\"aid\" value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'aid'), "html");
            echo "\">";
        }
        // line 84
        echo "                        </td>
                        <td><input type=\"file\" class=\"file\" name=\"uploadedfileA\" title=\"sube una imagen\" required=\"required\" /><font color=\"#A34B4E\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgA'), "html");
        echo "</font></td>
                    </tr>
                    <tr>
                        <td><label>B)</label></td>
                        <td>
                            <div class=\"autocomplete\"><input type=\"text\" data-source=\"search.php?search=\" name=\"b\" required=\"required\" placeholder=\"Escriba la opción de respuesta b)\" value=\"";
        // line 90
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'existente') == "1"))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'b'), "html");
        }
        echo "\" autocomplete=\"off\"/></div>
                            ";
        // line 91
        if (($this->getContext($context, 'existente') == "1")) {
            echo "<input type=\"hidden\" name=\"bid\" value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'bid'), "html");
            echo "\">";
        }
        // line 92
        echo "                        </td>
                        <td><input type=\"file\" class=\"file\" name=\"uploadedfileB\" title=\"sube una imagen\" required=\"required\"/><font color=\"#A34B4E\">";
        // line 93
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgB'), "html");
        echo "</font></td>
                    </tr>
                    <tr>
                        <td><label>C)</label></td>
                        <td>
                            <div class=\"autocomplete\"><input type=\"text\" name=\"c\" required=\"required\" placeholder=\"Escriba la opción de respuesta c)\" value=\"";
        // line 98
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'existente') == "1"))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'c'), "html");
        }
        echo "\" data-source=\"search.php?search=\" autocomplete=\"off\"/></div></td>
                            ";
        // line 99
        if (($this->getContext($context, 'existente') == "1")) {
            echo "<input type=\"hidden\" name=\"cid\" value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'cid'), "html");
            echo "\">";
        }
        // line 100
        echo "                        <td><input type=\"file\" class=\"file\" name=\"uploadedfileC\" title=\"sube una imagen\" required=\"required\" /><font color=\"#A34B4E\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgC'), "html");
        echo "</font></td>
                    </tr>
                </table>
                <input type=\"hidden\" name=\"msgA\" value=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgA'), "html");
        echo "\" /><input type='hidden' name='msgB' value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgB'), "html");
        echo "\" /><input type='hidden' name='msgC' value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgC'), "html");
        echo "\" />
                <div id=\"partItem\"><label>RETROALIMENTACIÓN:</label><textarea id=\"respAb\" class=\"textarea1\" name=\"retroalimentacion\" placeholder=\"Retroalimentación para el estudiante en caso de que este falle\" required=\"required\">";
        // line 104
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'existente') == "1"))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'retroalimentacion'), "html");
        }
        echo "</textarea></div>
                <input type=\"hidden\" value=\"";
        // line 105
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'respuesta'), "html");
        }
        echo "\" id=\"respCorr\" />
                <input type=\"hidden\" value=\"";
        // line 106
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'opciones'), "html");
        }
        echo "\" id=\"opcionesExist\" />
                <input type=\"hidden\" id=\"respuestas1\" name=\"respuestas1\" >
                ";
        // line 108
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 109
            echo "                <br><br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
                ";
        } else {
            // line 111
            echo "                    <input class=\"btn\" type=\"submit\" name=\"guardarCerrada\" id=\"guardar\" value=\"Guardar y Continuar\">
                    <input class=\"btn\" type=\"submit\" name=\"finalizarCerrada\" id=\"finalizar\" value =\"Guardar y finalizar\">
                ";
        }
        // line 114
        echo "            </p>
        </form>
        ";
        // line 116
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 117
            echo "            <br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('listarItems.php');\">Regresar</button>
        ";
        }
        // line 119
        echo "        ";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 120
            echo "        <!--form action=\"guardarDatosEmp.php\" method=\"post\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 121
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
        </form-->
        <form action=\"finalizar.php\" method=\"post\" id=\"formFinal\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
        </form>
        
        <br>
        <font color=\"#57934E\">Guardar y Continuar para almacenar y seguir construyendo otro ítem, guardar y finalizar para almacenar y terminar o presione finalizar para terminar sin guardar.</font>
        ";
        } else {
            // line 134
            echo "            <form action=\"editarRecurso.php\" method=\"post\">
                <!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"-->
            </form>
        ";
        }
        // line 138
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "ensenaloEmp.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
