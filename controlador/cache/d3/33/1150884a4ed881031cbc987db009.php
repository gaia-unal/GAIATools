<?php

/* ensenaloOC.twig.html */
class __TwigTemplate_d3331150884a4ed881031cbc987db009 extends Twig_Template
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
<script src=\"../js/jquery-1.4.2.min.js\"></script>
<script src=\"../js/autocomplete.jquery.js\"></script>
<link type=\"text/css\" rel=\"stylesheet\" href=\"../css/autocomplete.css\"></link>
<script type=\"text/javascript\">
    var fruits = [];

    function guardarTemp(urlAplicacion){
        if('";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'noGuardo'), "html");
        echo "'===0){document.forms['pregunta'].submit();}
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\">\\n\\
                                <input type=\"hidden\" name=\"titulo\" value=\"'+'";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"id\" value=\"'+'";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"existente\" value=\"'+'";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"modificado\" value=\"0\" />\\n\\
                               </form>');
        document.forms['cambapli'].submit();
    }
</script>
<script>
            \$(document).ready(function(){
                /* Una vez que se cargo la pagina , llamo a todos los autocompletes y
                 * los inicializo */
                \$('.autocomplete').autocomplete();
            });
        </script>
<div class=\"presentacion\">
    <p align=\"right\" class=\"num\"><font color=\"#0489B1\" size=\"5\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "</font></p>

";
        // line 31
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'msgD') != ""))) {
            // line 32
            echo "<font color=\"#A34B4E\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", algo pasó!.</font>
";
        }
        // line 34
        echo "    ";
        if (((((($this->getContext($context, 'posicion') == 0) && ($this->getContext($context, 'msgA') == "")) && ($this->getContext($context, 'msgB') == "")) && ($this->getContext($context, 'msgC') == "")) && ($this->getContext($context, 'msgD') == ""))) {
            // line 35
            echo "<font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo "!, hay 4 celdas (A,B,C,D), son las 4 opciones de respuesta que se le mostrará al estudiante, este elegirá alguna de las opciones luego de ver la seña, escriba en cada celda un valor en singular (si por ejemplo usted está evaluando los animales, gato sería un valor), a medida que se escribe se listarán los valores con seña disponible, debe elegir alguno de estos; al frente de cada celda hay un botón, se debe chequear (seleccionar) el botón del valor que usted desea sea el correcto, luego de cada botón para chequear, hay un botón donde se usted debe cargar la imágen asociada a cada opción de respuesta, una por cada valor, cada imagen debe pesar menos de 2MB (2000 kb) y debe estar en formato JPEG o PNG.
<br>La seña de la respuesta correcta se genera automáticamente. </font><br><font color=\"#57934E\">La retroalimentación servirá para indicarle al estudiante una 'pista' de la respuesta correcta cuando este falle.</font>
";
        }
        // line 38
        echo "

";
        // line 40
        if (((((($this->getContext($context, 'posicion') == 1) && ($this->getContext($context, 'msgA') == "")) && ($this->getContext($context, 'msgB') == "")) && ($this->getContext($context, 'msgC') == "")) && ($this->getContext($context, 'msgD') == ""))) {
            // line 41
            echo "<font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", la primera estuvo muy bien hecha!, así mismo se debe construir esta segunda. </font><br><font color=\"#57934E\">La seña se genera automáticamente.</font>
";
        }
        // line 43
        if (((((($this->getContext($context, 'posicion') > 1) && ($this->getContext($context, 'msgA') == "")) && ($this->getContext($context, 'msgB') == "")) && ($this->getContext($context, 'msgC') == "")) && ($this->getContext($context, 'msgD') == ""))) {
            // line 44
            echo "<font color=\"#0489B1\">¡";
            echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
            echo ", se está construyendo excelentemente esta actividad para evaluar ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "!, todos los ítems de evaluación se construyen así mismo. </font><br><font color=\"#57934E\">La seña se genera automáticamente.</font>
";
        }
        // line 46
        echo "    <div id=\"pregCerrada\">
        <header id=\"tipoActividad\"><h2></h2></header>
   
        <form class=\"sesion\" id=\"pregunta\" action=\"ensenaloOptionCorrect.php\" method=\"post\" enctype=\"multipart/form-data\">
            <p class=\"preg\">
                <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
                <input type=\"hidden\" name=\"existente\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
                <input type=\"hidden\" name=\"origen\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
                <input type='hidden' name='idItem' value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
                <input type='hidden' name='posicion' value=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />

                ";
        // line 58
        if (($this->getContext($context, 'modificado') == 0)) {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"1\">";
        } else {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"0\">";
        }
        // line 59
        echo "                <!--<div id=\"partItem\"><label>PREGUNTA:</label><textarea class=\"textarea1\" name=\"pregunta\"  placeholder=\"¡Escriba aca su pregunta!\">";
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        }
        echo "</textarea></div>-->
                <br><br>
                <table>
                    
                <tr>
                    <td>
                        <label>A)</label>
                    </td>
                    <td>
                        <div class=\"autocomplete\">
                            <input type=\"text\" data-source=\"search.php?search=\" name=\"a\" required=\"required\" placeholder=\"Escriba la opción de respuesta a)\" value=\"";
        // line 69
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'msgD') != ""))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'a'), "html");
        }
        echo "\" autocomplete=\"off\"></input>
                        </div>
                    </td>
                    <td>
                        <input type=\"radio\" id=\"correct\" name=\"correct\" value=\"a\" required></input>
                    </td>
                    <td>
                        <input type=\"file\" class=\"file\" name=\"uploadedfileA\" title=\"sube una imagen\" required=\"required\"/><font color=\"#A34B4E\">";
        // line 76
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgA'), "html");
        echo "</font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>B)</label>
                    </td>
                    <td>
                        <div class=\"autocomplete\">
                            <input type=\"text\" data-source=\"search.php?search=\" name=\"b\" required=\"required\" placeholder=\"Escriba la opción de respuesta b)\" value=\"";
        // line 85
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'msgD') != ""))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'b'), "html");
        }
        echo "\" autocomplete=\"off\"></input></td>
                        </div>
                    <td>
                        <input type=\"radio\" id=\"correct\" name=\"correct\" value=\"b\"></input>
                    </td>
                    <td>
                        <input type=\"file\" class=\"file\" name=\"uploadedfileB\" title=\"sube una imagen\" required=\"required\"/><font color=\"#A34B4E\">";
        // line 91
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgB'), "html");
        echo "</font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>C)</label>
                    </td>
                    <td>
                    <div class=\"autocomplete\">
                        <input type=\"text\" data-source=\"search.php?search=\" name=\"c\" required=\"required\" placeholder=\"Escriba la opción de respuesta c)\" value=\"";
        // line 100
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'msgD') != ""))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'c'), "html");
        }
        echo "\" autocomplete=\"off\"></input>
                    </div>
                    </td>
                    <td>
                        <input type=\"radio\" id=\"correct\" name=\"correct\" value=\"c\"></input>
                    </td>
                    <td>
                        <input type=\"file\" class=\"file\" name=\"uploadedfileC\" title=\"sube una imagen\" required=\"required\"/><font color=\"#A34B4E\">";
        // line 107
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgC'), "html");
        echo "</font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>&nbsp;D)</label>
                    </td>
                    <td>
                    <div class=\"autocomplete\">
                        <input type=\"text\" data-source=\"search.php?search=\" name=\"d\" required=\"required\" placeholder=\"Escriba la opción de respuesta d)\" value=\"";
        // line 116
        if ((((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != "")) || ($this->getContext($context, 'msgD') != ""))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'd'), "html");
        }
        echo "\" autocomplete=\"off\"></input> 
                    </div>
                    </td>
                    <td>
                        <input type=\"radio\" id=\"correct\" name=\"correct\" value=\"d\"></input>
                    </td>
                    <td>
                        <input type=\"file\" class=\"file\" name=\"uploadedfileD\" title=\"sube una imagen\" required=\"required\"/><font color=\"#A34B4E\">";
        // line 123
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgD'), "html");
        echo "</font>
                    </td>
                </tr>

                </table>

                <input type=\"hidden\" name=\"msgA\" value=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgA'), "html");
        echo "\" />
                <input type='hidden' name='msgB' value=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgB'), "html");
        echo "\" />
                <input type='hidden' name='msgC' value=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgC'), "html");
        echo "\" />
                <input type='hidden' name='msgD' value=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->getContext($context, 'msgD'), "html");
        echo "\" />
                <style type=\"text/css\">
                .file{
                    text-align: center;
                    background-color: #00a3d6;
                    color: #fff;
                    border-radius: 3px;
                    width: 350px;
                    font-size: 18px;
                    float: left;
                    line-height: 1.6em;
                    margin-left: 30px;
                }
                .num{
                    margin-top: -30px;
                    }

                input[type=radio]#correct {
                    border: 0px;
                    width: 300%;
                    height: 1.5em;
                }
                </style>
                </input>
                <div id=\"partItem\"><label>RETROALIMENTACIÓN:</label><textarea id=\"respAb\" class=\"textarea1\" name=\"retroalimentacion\" placeholder=\"Retroalimentación para el estudiante en caso de que este falle\" required=\"required\">";
        // line 156
        if (((($this->getContext($context, 'msgA') != "") || ($this->getContext($context, 'msgB') != "")) || ($this->getContext($context, 'msgC') != ""))) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'retroalimentacion'), "html");
        }
        echo "</textarea></div>

                <input type=\"hidden\" value=\"";
        // line 158
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'respuesta'), "html");
        }
        echo "\" id=\"respCorr\" />
                <input type=\"hidden\" value=\"";
        // line 159
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'opciones'), "html");
        }
        echo "\" id=\"opcionesExist\" />

                <input type=\"hidden\" id=\"respuestas1\" name=\"respuestas1\" >
                ";
        // line 162
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 163
            echo "                <br><br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
                ";
        } else {
            // line 165
            echo "                    <input class=\"btn\" type=\"submit\" name=\"guardarCerrada\" id=\"guardar\" value=\"Guardar y Continuar\">
                    <input class=\"btn\" type=\"submit\" name=\"finalizarCerrada\" id=\"finalizar\" value =\"Guardar y finalizar\">
                ";
        }
        // line 168
        echo "            </p>
        </form>
        <br>
        ";
        // line 171
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 172
            echo "            <br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('listarItems.php');\">Regresar</button>
        ";
        }
        // line 174
        echo "        ";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 175
            echo "        <form action=\"finalizar.php\" method=\"post\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 176
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 177
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
        </form>

        <br>
        <font color=\"#57934E\">Guardar y Continuar para almacenar y seguir construyendo otro ítem, guardar y finalizar para almacenar y terminar o presione finalizar para terminar sin guardar.</font>
        ";
        } else {
            // line 184
            echo "            <form action=\"editarRecurso.php\" method=\"post\">
                <!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"-->
            </form>
        ";
        }
        // line 188
        echo "        <script>
            \"";
        // line 189
        if (($this->getContext($context, 'existente') == "1")) {
            echo "\";
                var opcionesExistentes = \$(\"#opcionesExist\").val();
                var opcionExistent = opcionesExistentes.split(',-%');
                var i; tam=opcionExistent.length;
                for (i=0; i<tam; i++){
                    insertOption(opcionExistent[i]);
                }
            \"";
        }
        // line 196
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
        function normalize (str) {
        var from = \"ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÇç´'`,;.:-_^¨{}[]*+~¡?¿!#\$%&/()=°!|ºª\";
        var to   = \"AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuucc\";
        var mapping = {};
        for(var i = 0, j = from.length; i < j; i++ ){mapping[ from.charAt( i ) ] = to.charAt( i );}
        var ret = [];
        for( var i = 0, j = str.length; i < j; i++ ) {var c = str.charAt( i );if( mapping.hasOwnProperty( str.charAt( i ) ) ){ret.push( mapping[ c ] );}else{ret.push( c );}}      
        return ret.join( '' );
    }
            function removeOption() {
                var selectRespuesta=document.getElementById(\"respuesta\");
                var respuesta=\$(\"#respuesta\").val();
                selectRespuesta.remove(selectRespuesta.selectedIndex);
                var valu = \$(\"#respuestas1\").val();
                \$(\"#respuestas1\").val(valu.replace(respuesta+\",-%\",\"\"));
            }
        </script>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "ensenaloOC.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
