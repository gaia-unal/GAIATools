<?php

/* pregAbierta.twig.html */
class __TwigTemplate_7e23a589d32a3439f18c51f76ea57a6f extends Twig_Template
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
        echo "<div class=\"presentacion\">
    <div id=\"formulario\"></div>
    <script type=\"text/javascript\">
        if('";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'volver'), "html");
        echo "'==='1'){ redireccionar('listarItems.php'); }
        function guardarTemp(){ if('";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'noGuardo'), "html");
        echo "'===0){document.forms['pregunta'].submit();} }
        function redireccionar(urlAplicacion){
            \$(\"#formulario\").html(\"<form id='cambapli' action='\"+urlAplicacion+\"' method='post'>\\n\\
                                    <input type='hidden' name='titulo' value='\"+'";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+\"' />\\n\\
                                    <input type='hidden' name='id' value='\"+'";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+\"' />\\n\\
                                    <input type='hidden' name='existente' value='\"+'";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+\"' />\\n\\
                                    <input type='hidden' name='modificado' value='0' />\\n\\
                                   </form>\");
            document.forms['cambapli'].submit();
        }
    </script>
    <header autofocus><h2>PREGUNTA-LO (pregunta abierta) para: <br>\"";
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
        <!--button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregCerradaMultiple.php');\">Pregunta cerrada de múltiple respuesta</button-->
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregCerradaUnica.php');\">Pregunta cerrada de única respuesta</button>
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregVerdadero.php');\">Pregunta de verdadero o falso</button>
    </div>
    ";
        }
        // line 36
        echo "    <div id=\"pregAbierta\">
        <header id=\"tipoActividad\"><h2>PREGUNTA ABIERTA</h2></header>
        <form id=\"pregunta\" action=\"pregAbierta.php\" method=\"post\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" />
            <input type=\"hidden\" name=\"id\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" />
            <input type=\"hidden\" name=\"existente\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
            <input type=\"hidden\" name=\"origen\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
            <input type='hidden' name='idItem' value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
            <input type='hidden' name='posicion' value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
            ";
        // line 45
        if (($this->getContext($context, 'modificado') == 0)) {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"1\">";
        } else {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"0\">";
        }
        // line 46
        echo "            <div id=\"partItem\"><label>PREGUNTA:</label><textarea autofocus id=\"pregAb\" class=\"textarea1\"  alt=\"la pregunta es obligatoria\" name=\"pregunta\" placeholder=\"¡Escriba acá su pregunta!\" required>";
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        }
        echo "</textarea></div>
            <div id=\"partItem\"><label>RESPUESTA:</label><textarea id=\"respAb\" class=\"textarea1\" alt=\"la respuesta es obligatoria\"  name=\"respuesta\" placeholder=\"¡Escriba acá su Respuesta!\" required>";
        // line 47
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'respuesta'), "html");
        }
        echo "</textarea></div>
            <div id=\"partItem\"><label>RETROALIMENTACIÓN:</label><textarea id=\"retroAb\" class=\"textarea1\" alt=\"la retroalimentación es obligatoria\" name=\"retroalimentacion\" placeholder=\"¡Escriba acá su Retroalimentación!\" required>";
        // line 48
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'retroalimentacion'), "html");
        }
        echo "</textarea></div>
            ";
        // line 49
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 50
            echo "            <br><br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
            ";
        } else {
            // line 52
            echo "            <input class=\"btn\" type=\"submit\" id=\"guardarAbierta\" value=\"GUARDAR\" autofocus>
            ";
        }
        // line 54
        echo "        </form>
        ";
        // line 55
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 56
            echo "            <br><br><button id=\"editarSiguiente\" onclick=\"redireccionar('listarItems.php');\">Regresar</button>
        ";
        }
        // line 58
        echo "        ";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 59
            echo "        <form action=\"finalizar.php\" method=\"post\" id=\"formFinal\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input class=\"btn\" type=\"submit\" value=\"(no olvide guardar antes) FINALIZAR\">
        </form>
        ";
        } else {
            // line 65
            echo "        <form action=\"editarRecurso.php\" method=\"post\">
            <!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"-->
        </form>
        ";
        }
        // line 69
        echo "    </div>
</div>
<script type=\"text/javascript\">
    function limpiarDato(v){
        v = v.replace(/deletrear/g, \"\");
        v = v.replace(/de letrear/g, \"\");
        v = v.replace(/ /g, \"\");
        return v;
    }
    function dispararForm(){
        \$(\"#pregunta\").submit();
    }
    function dispararFormFinal(){
        \$(\"#formFinal\").submit();
    }
</script>
";
        // line 85
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 86
            echo "<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var texto = \"Esta sesión es para construir preguntas abiertas para el recurso \\n\\
                    educativo ";
            // line 89
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo ". Si desea cambiar el tipo de pregunta, pronuncie \\n\\
                    cerrada o falso y verdadero. Para agregar \\n\\
                    los contenidos, solo debes mensionar las palabras pregunta, \\n\\
                    respuesta o retroalimentación seguido de sus contenidos respectivos. \\n\\
                    Recuerde que puede consultar el menú o cerrar sesión. Para continuar \\n\\
                    con otra pregunta pronuncie siguiente o finalizar para terminar el recurso.\";
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";
            if (annyang) {
                \"use strict\"
                var commands = {
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación.\\n\\
                                    Puedes verificar tus datos personales al pronunciar \\n\\
                                    información personal, pero tambien puedes realizar \\n\\
                                    otras operaciones sobre los recursos educativos, solo debes\\n\\
                                    mencionar la palabra crear, editar o eliminar\\n\\
                                    según la acción que requieras utilizar\"; 
                        sintetizadorVoz(texto);
                    },
                    'presentación':function(){window.location=\"principal.php\";},
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'abierta':function(){guardarTemp('pregAbierta.php');},
                    'cerrar':function(){guardarTemp('pregCerradaUnica.php');},
                    'falso y verdadero':function(){guardarTemp('pregVerdadero.php');},
                    'pregunta *v': function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La pregunta es \"+v+\". Para continuar pronuncie la \\n\\
                                palabra respuesta y hable sobre la respuesta correcta\";
                        sintetizadorVoz(texto);
                        \$('#pregAb').val(v);
                    },
                    'respuesta *v': function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La respuesta es \"+v+\". Para continuar pronuncie la \\n\\
                                palabra retroalimentación seguido de los comentarios de ayuda \\n\\
                                en el aprendizaje del usuario que vea este objeto.\";
                        sintetizadorVoz(texto);
                        \$('#respAb').val(v);
                    },
                    'retroalimentación *v': function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La retroalimentación es \"+v+\". Para continuar pronuncie la \\n\\
                palabra siguiente para guardar esta pregunta. O puedes terminar la contrucción del \\n\\
                cuestionario al pronunciar finalizar pero los datos de esta seccion  se perderian.\";
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
        return "pregAbierta.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
