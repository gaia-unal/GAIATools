<?php

/* pregCerradaUnica.twig.html */
class __TwigTemplate_3efaf50d2ece39d58951cfa9574477d2 extends Twig_Template
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
    if('";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'volver'), "html");
        echo "'==='1'){ redireccionar('listarItems.php');  }
    function guardarTemp(){  if('";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'noGuardo'), "html");
        echo "'===0){ document.forms['pregunta'].submit(); } }
    function redireccionar(urlAplicacion){
        \$(\"#formulario\").html(\"<form id='cambapli' action='\"+urlAplicacion+\"' method='post'>\\n\\
            <input type='hidden' name='titulo' value='\"+'";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+\"' />\\n\\
            <input type='hidden' name='id' value='\"+'";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+\"' />\\n\\
            <input type='hidden' name='existente' value='\"+'";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+\"' />\\n\\
            <input type='hidden' name='modificado' value='0' /></form>\");
        document.forms['cambapli'].submit();
    }
</script>

<div class=\"presentacion\">
    <header autofocus><h2>PREGUNTA-LO (pregunta cerrada elección múltiple) para: <br>\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header>
    <div>
        <br>
        <h3 class=\"bienvenida\">
            Puedes cambiar de tipo de pregunta con los botones presentados a continuación. 
            Si no, recuerda que debes llenar este formulario donde se solicita la pregunta, 
            la respuesta y una retroalimentación. Luego continuas con el botón Guardar para 
            almacenar el ítem, si utilizas el botón Finalizar no se guardara la información 
            llenada en el formulario y dará por terminada la contrucción del recurso educativo.<br><br>
        </h3>
    </div>
    ";
        // line 29
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 30
            echo "    <div id=\"tipopreg\">
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregAbierta.php');\">Pregunta abierta</button>
        <!--button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregCerradaUnica.php');\">Pregunta cerrada de única respuesta</button-->
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregVerdadero.php');\">Pregunta de verdadero o falso</button>
    </div>
    ";
        }
        // line 36
        echo "    <div id=\"pregCerrada\">
        <header id=\"tipoActividad\"> <h2>PREGUNTA CERRADA ÚNICA RESPUESTA</h2> </header>
        <form class=\"sesion\" id=\"pregunta\" action=\"pregCerradaUnica.php\" method=\"post\">
            <p class=\"preg\">
                <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
                <input type=\"hidden\" name=\"existente\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
                <input type=\"hidden\" name=\"origen\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
                <input type='hidden' name='idItem' value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
                <input type='hidden' name='posicion' value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
                ";
        // line 46
        if (($this->getContext($context, 'modificado') == 0)) {
            // line 47
            echo "                    <input type=\"hidden\" name=\"modificado\" value=\"1\">
                ";
        } else {
            // line 49
            echo "                    <input type=\"hidden\" name=\"modificado\" value=\"0\">
                ";
        }
        // line 51
        echo "                <div id=\"partItem\">
                    <label>PREGUNTA:</label>
                    <textarea autofocus id=\"pregAb\" class=\"textarea1\"  alt=\"la pregunta es obligatoria\" placeholder=\"¡Escriba acá la Pregunta\" name=\"pregunta\" required>
                        ";
        // line 54
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        }
        // line 55
        echo "                    </textarea>
                </div>
                <div id=\"partItem\">
                    <label>OPCIÓN:</label><input type='text' id=\"opcione\" value='' placeholder=\"¡Escriba acá las Opciones!\" ><br>
                    <input class=\"btn\" type='button' id=\"agregaropcion\" onclick='javascript:insertOption(\$(\"#opcione\").val());' value='Insertar Opción'>
                    <input class=\"btn\" type='button' onclick='removeOption();' value='Borrar Optión'>
                </div>
                <input type=\"hidden\" value=\"";
        // line 62
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'respuesta'), "html");
        }
        echo "\" id=\"respCorr\" />
                <input type=\"hidden\" value=\"";
        // line 63
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'opciones'), "html");
        }
        echo "\" id=\"opcionesExist\" />
                <div id=\"partItem\">
                    <label>RESPUESTA CORRECTA:</label>
                    <select id=\"respuesta\" name=\"respuesta\"  alt=\"la respuesta es obligatoria\" required></select>
                </div>
                <div id=\"partItem\">
                    <label>RETROALIMENTACIÓN:</label>
                    <textarea id=\"retroAb\" class=\"textarea1\"  alt=\"la retroalimentación es obligatoria\" name=\"retroalimentacion\" placeholder=\"¡Escriba acá la Retroalimentación\" required>
                        ";
        // line 71
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'retroalimentacion'), "html");
        }
        // line 72
        echo "                    </textarea>
                </div>
                <input type=\"hidden\" id=\"respuestas1\" name=\"respuestas1\" ><input type=\"hidden\" id=\"opcionesSinteti\">
                ";
        // line 75
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 76
            echo "                    <br><br><br>
                    <button id=\"editarSiguiente\" autofocus onclick=\"guardarTemp();\">Guardar</button><br>
                    <br><br>
                    <button id=\"editarSiguiente\" onclick=\"redireccionar('listarItems.php');\">Regresar</button>
                ";
        } else {
            // line 81
            echo "                    <input class=\"btn\" type=\"submit\" name=\"guardarCerrada\" id=\"guardar\" value=\"GUARDAR\"><br>
                    <form action=\"finalizar.php\" method=\"post\"  id=\"formFinal\">
                        <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
                        <input type=\"hidden\" name=\"id\" value=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
                        <input class=\"btn\" type=\"submit\" value=\"(no olvide guardar antes) FINALIZAR\">
                    </form>
                ";
        }
        // line 88
        echo "            </p>
        </form>
        
        <script>
            \"";
        // line 92
        if (($this->getContext($context, 'existente') == "1")) {
            echo "\";
                var opcionesExistentes = \$(\"#opcionesExist\").val();
                var opcionExistent = opcionesExistentes.split(',-%');
                var i; tam=opcionExistent.length;
                for (i=0; i<tam; i++){insertOption(opcionExistent[i]);}
            \"";
        }
        // line 97
        echo "\";
            function insertOption(elm) { 
                var nuevaOpcion=document.createElement('option'); 
                //nuevaOpcion.attr('class','');
                nuevaOpcion.text=elm; 
                var selectRespuesta=document.getElementById(\"respuesta\"); 
                try { 
                    selectRespuesta.add(nuevaOpcion,null);  
                    var respuestas1 = document.getElementById(\"respuesta1\");
                } catch(ex) { selectRespuesta.add(nuevaOpcion); } 
                var valu = \$(\"#respuestas1\").val();
                if(valu===\"\"){
                    \$(\"#respuestas1\").val(elm+\",-%\"), \$(\"#opcionesSinteti\").val(elm), \$(\"#opcione\").val('');
                }else{
                    valu=valu+elm+\",-%\";
                    \$(\"#respuestas1\").val(valu),
                    \$(\"#opcionesSinteti\").val(\$(\"#opcionesSinteti\").val()+', '+elm);
                    \$(\"#opcione\").val('');
                }
                \$(\"#opcione\").val(\"\");
            } 
            function removeOption() { 
                var selectRespuesta=document.getElementById(\"respuesta\"); 
                var respuesta=\$(\"#respuesta\").val();
                selectRespuesta.remove(selectRespuesta.selectedIndex);
                var valu = \$(\"#respuestas1\").val();
                respuesta=\",-%\"+respuesta+\",-%\";
                valu = valu.replace(respuesta,\",-%\");
                \$(\"#respuestas1\").val(valu);
            } 
        </script>
    </div>
</div>

    <script type=\"text/javascript\">
        function limpiarDato(v){
            v = v.replace(/deletrear/g, \"\"); 
            v = v.replace(/de letrear/g, \"\"); 
            v = v.replace(/ /g, \"\"); return v;
        }
        
        function dispararForm(){
            \$(\"#pregunta\").submit();
        }
        
        function dispararFormFinal(){
            \$(\"#formFinal\").submit();
        }
    </script>
    ";
        // line 146
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 147
            echo "
    <script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
    <script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

    <script type=\"text/javascript\">
        var onload = function cargarRE (){
            var texto = \"Esta sesión es para construir preguntas cerradas de elección multiple con única respuesta para el recurso educativo ";
            // line 153
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo ". Si desea cambiar el tipo de pregunta, pronuncie abierta o falso y verdadero. Para agregar los contenidos, solo debes mensionar las palabras pregunta, opcion, respuesta o retroalimentación seguido de sus contenidos respectivos. Recuerde que puede consultar el menú o cerrar sesión. Para continuar con otra pregunta pronuncie siguiente o finalizar para terminar el recurso.\";
            sintetizadorVoz(texto); 
        }
        //var valor = localStorage.getItem(\"controlador\");
        //    if(valor===\"true\"){
                \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
                if (annyang) {
                    \"use strict\"
                    var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                        'cerrar sesión':function(){window.location=\"cierre.php\";},
                        'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                            gcse.pause(); gcse.src = \"\";
                            var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra crear, editar o eliminar según la acción que requieras utilizar\"; 
                            sintetizadorVoz(texto);
                        },
                        'presentación':function(){window.location=\"principal.php\";},
                        'información personal':function(){window.location=\"informacionPersonal.php\";},
                        'visualizar':function(){window.location=\"listarRecurso.php\";},
                        'editar':function(){window.location=\"editarRecurso.php\";},
                        'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                        'abierta':function(){guardarTemp('pregAbierta.php');},
                        'falso y verdadero':function(){guardarTemp('pregVerdadero.php');},
                        'pregunta *v': function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                            gcse.pause();
                            gcse.src = \"\";
                            if(/deletrear/.test(v) || /de letrear/.test(v) ){
                                v = limpiarDato(v);
                            }
                            var texto = \"La pregunta es \"+v+\". Para continuar pronuncie la palabra opción y pronuncie una de las opciones.\";
                            sintetizadorVoz(texto);
                            \$('#pregAb').val(v);
                        },
                        'opción *v': function(v){
                            gcse.pause();
                            gcse.src = \"\";
                            if(/deletrear/.test(v) || /de letrear/.test(v) ){
                                v = limpiarDato(v);
                            }
                            var texto = \"La opción es \"+v+\". Para agregar una nueva opción, nuevamente pronuncie la palabra opción, pero para continuar. Pronuncie la palabra respuesta y le serán leidas las opciones para que usted luese seleccione las respuesta correcta\";
                            sintetizadorVoz(texto);
                            \$('#opcione').val(v);
                            javascript:insertOption(\$(\"#opcione\").val());
                        },
                        'respuesta': function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                            gcse.pause();
                            gcse.src = \"\";
                            var texto = \"Las opciones para la respuesta son: \"+\$('#opcionesSinteti').val()+\" Al pronunciar seleccionar respuesta debe pronunciar tambien la opción correcta, o a traves de la palabra opción puede agregar opciones.\";
                            sintetizadorVoz(texto);
                        },
                        'seleccionar respuesta *v': function(v){
                            gcse.pause();
                            gcse.src = \"\";
                            if(/deletrear/.test(v) || /de letrear/.test(v) ){
                                v = limpiarDato(v);
                            }
                            var texto = \"La respuesta es \"+v+\". Para continuar pronuncie la palabra retroalimentación seguido de los comentarios de ayuda en el aprendizaje del usuario que vea este objeto.\";
                            sintetizadorVoz(texto);
                            \$('#respAb').val(v);
                            var vi = \".\"+normalize(v);
                            jQuery(vi).attr('selected', 'selected');
                        },
                        'retroalimentación *v': function(v){
                            gcse.pause();
                            gcse.src = \"\";
                            if(/deletrear/.test(v) || /de letrear/.test(v) ){
                                v = limpiarDato(v);
                            }
                            var texto = \"La retroalimentación es \"+v+\". Para continuar pronuncie la palabra siguiente para guardar esta pregunta.\";
                            sintetizadorVoz(texto);
                            \$('#retroAb').val(v);
                        },
                        'siguiente':function(){
                            dispararForm();
                        },
                        'finalizar':function(){
                            dispararFormFinal();
                        }
                    };
                    // OPTIONAL: activate debug mode for detailed logging in the console
                    annyang.debug();
                    // Add voice commands to respond to
                    annyang.addCommands(commands);
                    // OPTIONAL: Set a language for speech recognition (defaults to English)
                    annyang.setLanguage('es');
                    // Start listening. You can call this here, or attach this call to an event, button, etc.
                    annyang.start();
                } else {
                    \$(document).ready(function() {
                        \$('#unsupported').fadeIn('fast');
                    });
                }
            //}
    </script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "pregCerradaUnica.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
