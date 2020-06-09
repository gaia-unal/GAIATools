<?php

/* escribelo.twig.html */
class __TwigTemplate_677b48ee3c40a6b987e64e605f122f21 extends Twig_Template
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
        echo "'+\"'/><input type='hidden' name='id' value='\"+'";
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+\"' />\\n\\
                <input type='hidden' name='existente' value='\"+'";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+\"' /><input type='hidden' name='modificado' value='0' /></form>\");
        document.forms['cambapli'].submit();
    }
</script>
<div class=\"presentacion\">
    <header><h2>ESCRIBE-LO para: \"";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header>
    <div>
        <br>
        <h3 class=\"bienvenida\">
            Debes llenar el siguiente formulario donde se solicita un título para este 
            contenido y la descripción del contenido. Luego continuas con el botón Guardar para 
            almacenar el ítem, si utilizas el botón Finalizar no se guardara la información 
            llenada en el formulario y dará por terminada la contrucción del recurso educativo.<br><br>
        </h3>
    </div>
    <form id=\"form\" class=\"sesion\" action=\"escribelo.php\" method=\"post\">
        <input type=\"hidden\" name=\"id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" />
        <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" />
        <input type=\"hidden\" name=\"existente\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
        <input type=\"hidden\" name=\"origen\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
        <input type='hidden' name='idItem' value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
        <input type='hidden' name='posicion' value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
        ";
        // line 32
        if (($this->getContext($context, 'modificado') == 0)) {
            // line 33
            echo "        <input type=\"hidden\" name=\"modificado\" value=\"1\">
        ";
        } else {
            // line 35
            echo "        <input type=\"hidden\" name=\"modificado\" value=\"0\">
        ";
        }
        // line 37
        echo "        <div id=\"partItem\">
            <label>Título: </label>
            <input autofocus id=\"tituloEscribelo\" type=\"text\" name=\"nombre\" value=\"";
        // line 39
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'pregunta'), "html");
        }
        echo "\" placeholder=\"¡Escriba acá el título del capítulo de esté recurso educativo!\" required/>
        </div>
        <div id=\"partItem\">
            <label>Descripción: </label>
            <textarea id=\"descripcionEscribelo\" class=\"textarea2\" name=\"descripcion\" placeholder=\"¡Escriba acá el contenido del texto!\" required>";
        // line 43
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'respuesta'), "html");
        }
        echo "</textarea></div><br><br>
        ";
        // line 44
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 45
            echo "        <br><br><br><button id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
        ";
        } else {
            // line 46
            echo " <input class=\"btn\" type=\"submit\" name=\"guardarVF\" id=\"guardar\" value=\"GUARDAR\"> ";
        }
        // line 47
        echo "    </form>
    ";
        // line 48
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 49
            echo "        <br><br><button id=\"editarSiguiente\" onclick=\"redireccionar('listarItems.php');\">Regresar</button>
    ";
        }
        // line 51
        echo "    ";
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 52
            echo "    <form action=\"finalizar.php\" method=\"post\" id=\"formFinal\">
        <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
        <input type=\"hidden\" name=\"id\" value=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
        <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
    </form>
    ";
        } else {
            // line 57
            echo "<form action=\"editarRecurso.php\" method=\"post\"><!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"--></form>";
        }
        // line 58
        echo "</div>
<script>
    function dispararForm(){ \$(\"#form\").submit(); }
    function dispararFormFinal(){ \$(\"#formFinal\").submit(); }
</script>
";
        // line 63
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 64
            echo "<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var texto = \"Al pronunciar título o descripción seguido del contenido podras agregar \\n\\
    texto a esta actividad escribelo del recurso educativo '";
            // line 67
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "'. Recuerde que puede \\n\\
    consultar el menú o puede cerrar sesión. \";
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
                Puedes verificar tus datos personales al pronunciar información personal, pero \\n\\
                tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes \\n\\
                mencionar la palabra visualizar, crear, editar o eliminar según la acción que requieras utilizar.\"; 
                        sintetizadorVoz(texto);
                    },
                    'presentación':function(){window.location=\"principal.php\";},
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'título *v' :function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"El título es \"+v+\". Para continuar pronuncie la palabra \\n\\
                descripción y hable un poco sobre el contenido de este recurso educativo.\";
                        sintetizadorVoz(texto);
                        \$('#tituloEscribelo').val(v);
                    },
                    'descripción *v' :function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La descripción es \"+v+\" Para continuar pronuncie siguiente y \\n\\
                podras agregar otro elemento de escribelo al recurso educativo, o pronuncia finalizar \\n\\
                para acabar la contrucción del recurso.\";
                        sintetizadorVoz(texto);
                        \$('#descripcionEscribelo').val(v);
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
        return "escribelo.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
