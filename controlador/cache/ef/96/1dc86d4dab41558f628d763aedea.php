<?php

/* pregVerdadero.twig.html */
class __TwigTemplate_ef961dc86d4dab41558f628d763aedea extends Twig_Template
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
        echo "'==='1'){ redireccionar('listarItems.php'); }
    function guardarTemp(){ if('";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'noGuardo'), "html");
        echo "'===0){document.forms['pregunta'].submit();} }
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
                                <input type='hidden' name='modificado' value='0' />\\n\\
                               </form>\");
        document.forms['cambapli'].submit();
    }
</script>
<div class=\"presentacion\">
    <header><h2>PREGUNTA-LO (pregunta de verdadero o falso) para: <br>\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header>
    ";
        // line 19
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 20
            echo "    <div id=\"tipopreg\">
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregAbierta.php');\">Pregunta Abierta</button>
        <!--button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregCerradaMultiple.php');\">Pregunta Cerrada de Múltiple Respuesta</button-->
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"redireccionar('pregCerradaUnica.php');\">Pregunta Cerrada de Única Respuesta</button>
    </div>
    ";
        }
        // line 26
        echo "    <div id=\"pregvf\">
        <header id=\"tipoActividad\"><h2>PREGUNTA VERDADERO O FALSO</h2></header>
        <form class=\"sesion\" id=\"pregunta\" action=\"pregVerdadero.php\" method=\"post\">
            <p class=\"pre\">
                <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
                <input type=\"hidden\" name=\"id\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
                <input type=\"hidden\" name=\"existente\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
                <input type=\"hidden\" name=\"origen\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
                <input type='hidden' name='idItem' value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
                <input type='hidden' name='posicion' value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
                ";
        // line 36
        if (($this->getContext($context, 'modificado') == 0)) {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"1\">";
        } else {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"0\">";
        }
        // line 37
        echo "                <div id=\"partItem\"><label>PREGUNTA:</label>
                    <textarea id=\"pregAb\" class=\"textarea1\" name=\"pregunta\" rows=automatically cols=automatically placeholder=\"¡Escriba acá su pregunta!\" required>";
        // line 38
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        }
        echo "</textarea></div>
                <div id=\"partItem\"><label>RESPUESTA:</label><select id=\"respuesta\" name=\"respuesta\" required>
                    ";
        // line 40
        if ((($this->getContext($context, 'respuesta') == "Verdadero") || ($this->getContext($context, 'existente') != "1"))) {
            // line 41
            echo "                        <option class=\"verdadero\" value=\"Verdadero\" selected>Verdadero</option>
                        <option class=\"falso\" value=\"Falso\">Falso</option>
                    ";
        } else {
            // line 44
            echo "                        <option class=\"verdadero\" value=\"Verdadero\" >Verdadero</option>
                        <option class=\"falso\" value=\"Falso\" selected>Falso</option>
                    ";
        }
        // line 47
        echo "                    </select></div>
                <div id=\"partItem\"><label>RETROALIMENTACIÓN:</label><textarea id=\"retroAb\" class=\"textarea1\" name=\"retroalimentacion\" placeholder=\"¡Escriba acá la Retroalimentación\" required>";
        // line 48
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'retroalimentacion'), "html");
        }
        echo "</textarea></div>
                <input type=\"hidden\" id=\"respuestas1\" name=\"respuestas1\" value=\"Verdadero,-%Falso\">
                ";
        // line 50
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 51
            echo "                <br><br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
                ";
        } else {
            // line 53
            echo "                    <input class=\"btn\" type=\"submit\" name=\"guardarVF\" id=\"guardar\" value=\"GUARDAR\">
                ";
        }
        // line 55
        echo "            </p>
        </form>
        ";
        // line 57
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 58
            echo "            <br><br><button id=\"editarSiguiente\" onclick=\"redireccionar('listarItems.php');\">Regresar</button>
        ";
        }
        // line 60
        echo "        ";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 61
            echo "        <form action=\"finalizar.php\" method=\"post\"  id=\"formFinal\">
            <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
            <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
        </form>
        ";
        } else {
            // line 67
            echo "            <form action=\"editarRecurso.php\" method=\"post\">
                <!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"-->
            </form>
        ";
        }
        // line 71
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
        // line 87
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 88
            echo "<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var texto = \"Esta sesión es para construir preguntas de falso y verdadero para el recurso educativo \\n\\
    ";
            // line 91
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo ". Si desea cambiar el tipo de pregunta, pronuncie abierta o cerrada. Para agregar los \\n\\
    contenidos, solo debes mensionar las palabras pregunta, respuesta indicando falso o verdadero o \\n\\
    retroalimentación seguido de sus contenidos respectivos. Recuerde que puede consultar el menú o \\n\\
    cerrar sesión. Para continuar con otra pregunta pronuncie siguiente o finalizar para terminar el recurso.\";
        sintetizadorVoz(texto);
    }
    var valor = localStorage.getItem(\"controlador\");
        if(valor===\"true\"){
            \"use strict\";
            if (annyang) {
                \"use strict\"
                var commands = {
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus \\n\\
                datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre \\n\\
                los recursos educativos, solo debes mencionar la palabra crear, editar o eliminar según la acción que requieras utilizar\"; 
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
                        var texto = \"La pregunta es \"+v+\". Para continuar pronuncie la palabra respuesta seguido de las palabras falso o verdadero.\";
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
                        var vi = \".\"+normalize(v);
                        jQuery(vi).attr('selected', 'selected');
                    },
                    'retroalimentación *v': function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La retroalimentación es \"+v+\". Para continuar pronuncie la \\n\\
                                palabra siguiente para guardar esta pregunta.\";
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
        }
        
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "pregVerdadero.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
