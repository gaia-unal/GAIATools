<?php

/* libro.twig.html */
class __TwigTemplate_f517f27640480c60fcc38b996944e4c4 extends Twig_Template
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
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\">\\n\\
                                <input type=\"hidden\" name=\"titulo\" value=\"'+'";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"id\" value=\"'+'";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"existente\" value=\"'+'";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "'+'\" />\\n\\
                                <input type=\"hidden\" name=\"modificado\" value=\"0\" />\\n\\
                               </form>');
        document.forms['cambapli'].submit();
    }
    function reportarImagen(){
        \$(\"#imagCarg\").val('1');
    }
</script>
<div class=\"presentacion\">
    <header><h2>PÁGINA ";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, 'pagina'), "html");
        echo " para <br>el libro ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "</h2></header>
    <div>
        <br>
        <h3 autofocus class=\"bienvenida\">
            Debes llenar el siguiente formulario donde se solicita un título de la página del libro,
            su contenido y puedes agregar una imagen. Luego continuas con el botón Guardar para almacenar el ítem, si utilizas el botón Finalizar no se guardara la información 
            llenada en el formulario y dará por terminada la contrucción del recurso educativo.<br><br>
        </h3>
    </div>
<form class=\"sesion\" id=\"pregunta\" action=\"libro.php\" method=\"post\" enctype=\"multipart/form-data\">
    <input type=\"hidden\" name=\"id\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" />
    <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" />
    <input type=\"hidden\" name=\"existente\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" />
    <input type=\"hidden\" name=\"origen\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, 'origen'), "html");
        echo "\" />
    <input type='hidden' name='idItem' value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" />
    <input type='hidden' name='pagina' value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getContext($context, 'pagina'), "html");
        echo "\" />
    <input type='hidden' name='posicion' value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getContext($context, 'posicion'), "html");
        echo "\" />
    <input type='hidden' name='imagCarg' id='imagCarg' value='0' />
    ";
        // line 39
        if (($this->getContext($context, 'modificado') == 0)) {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"1\">";
        } else {
            echo "<input type=\"hidden\" name=\"modificado\" value=\"0\">";
        }
        // line 40
        echo "    <div id=\"partItem\"><label>Título capítulo:</label>
        <input autofocus id=\"tituloEscribelo\" type=\"text\" name=\"tituloCapitulo\" value=\"";
        // line 41
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'tituloCapitulo'), "html");
        }
        echo "\" placeholder=\"¡Escriba acá el título del capítulo de esté recurso educativo!\" required/></div>
    <div id=\"partItem\"><label>Ingrese el contenido de la página :</label><br><textarea id=\"descripcionEscribelo\" class=\"textarea2\" name=\"contenido\" placeholder=\"¡Escriba acá el contenido!, no mayor a 260 caracteres\" maxlength=\"300\" required>";
        // line 42
        if (($this->getContext($context, 'existente') == "1")) {
            echo twig_escape_filter($this->env, $this->getContext($context, 'idContenido'), "html");
        }
        echo "</textarea></div><br>
    ";
        // line 43
        if ((($this->getContext($context, 'existente') == "1") && ($this->getContext($context, 'imagen') != ""))) {
            // line 44
            echo "        <div id=\"partItem\"><label>Imagen actual:</label><br><img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'imagen'), "html");
            echo "\" id='imagActual'></div><br>
    ";
        }
        // line 46
        echo "    <div id=\"partItem\"><label>Ingrese una imagen:</label><input onclick='reportarImagen();' type=\"file\" name=\"archivo\" id=\"archivo\"/></div>
    ";
        // line 47
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 48
            echo "        <br><br><br><button autofocus id=\"editarSiguiente\" onclick=\"guardarTemp('');\">Guardar</button><br><br>
    ";
        } else {
            // line 50
            echo "        <input autofocus class=\"btn\" type=\"submit\" name=\"guardar\" id=\"guardar\" value=\"GUARDAR\">
    ";
        }
        // line 52
        echo "</form>
<!--br><br><br><button onclick=\"pedirImagen();\">simulacro</button><br><br-->
";
        // line 54
        if ((($this->getContext($context, 'existente') == 1) || ($this->getContext($context, 'origen') != ""))) {
            // line 55
            echo "    <br><br><button id=\"editarSiguiente\" onclick=\"redireccionar('listarItems.php');\">Regresar</button>
";
        }
        // line 57
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 58
            echo "    <form action=\"finalizar.php\" method=\"post\">
        <input type=\"hidden\" name=\"titulo\" value=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
        <input type=\"hidden\" name=\"id\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
        <input class=\"btn\" type=\"submit\" value=\"(no olvide guardar antes) FINALIZAR\">
    </form>
";
        } else {
            // line 64
            echo "    <form action=\"editarRecurso.php\" method=\"post\">
        <!--input class=\"btn\" type=\"submit\" value=\"FINALIZAR\"-->
    </form>
";
        }
        // line 68
        echo "</div>
<script>
    function pedirImagen(){
        \$('#archivo').click();
    }
</script>
";
        // line 74
        if ((($this->getContext($context, 'existente') != "1") && ($this->getContext($context, 'origen') == ""))) {
            // line 75
            echo "
<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    
    var onload = function cargarRE (){
        var texto = \"Al pronunciar título o descripción seguido del contenido podras agregar texto a esta actividad libro del recurso educativo '";
            // line 82
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "'. Recuerde que puede consultar el menú o puede cerrar sesión. Tambien al pronunciar imagen puedes cargar una imagen externa, pero para cargar la imagen deberas utilizar tus propios instrumentos de asistencia tecnológica.\";
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra visualizar, crear, editar o eliminar según la acción que requieras utilizar.\"; 
                        sintetizadorVoz(texto);
                    },//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las paginas
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
                        var texto = \"El título es \"+v+\". Para continuar pronuncie la palabra descripción y hable un poco sobre el contenido de este recurso educativo.\";
                        sintetizadorVoz(texto);
                        \$('#tituloEscribelo').val(v);
                    },
                    'descripción *v' :function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma 
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La descripción es \"+v+\" Para continuar pronuncie siguiente y podras agregar otro elemento de escribelo al recurso educativo, o pronuncia finalizar para acabar la contrucción del recurso.\";
                        sintetizadorVoz(texto);
                        \$('#descripcionEscribelo').val(v);
                    },
                    'siguiente':function(){
                        dispararForm();
                    },
                    'imagen':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Recuerda que debes utilizar otros instrumentos de asistencia para realizar la carga del archivo.\";
                        sintetizadorVoz(texto);
                        reportarImagen();
                        pedirImagen();
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
        return "libro.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
