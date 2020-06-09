<?php

/* question.twig.html */
class __TwigTemplate_cdb35fc6d19947f19fe5188ea10f89c1 extends Twig_Template
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
                               </form>');
        document.forms['cambapli'].submit();  
    }
</script>
<div class=\"presentacion\">
    <header><h2>PREGUNTA-LO para: <BR>\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header>
    <div>
        <br>
        <h3 class=\"bienvenida\" >
            No olvides seleccionar un tipo de pregunta.<br><br>
        </h3>
    </div>
    <div id=\"tipopreg\">
        <button autofocus id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregAbierta.php');\">Pregunta Abierta</button>
        <!--button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaMultiple.php');\">Pregunta Cerrada de Múltiple Respuesta</button-->
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaUnica.php');\">Pregunta Cerrada de Única Respuesta</button>
        <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregVerdadero.php');\">Pregunta de Verdadero o Falso</button>
    </div>
    <a  href=\"crearRecurso.php\"><img id=\"retornar\" src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>
</div>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var texto = \"Para el recurso educativo ";
        // line 37
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo " que estas construyendo. Puedes agregar tres tipos de preguntas, con solo pronunciar estas palabras. Pregunta abierta, pregunta cerrada, o pregunta falso y verdadero. Pero recuerde que puede consultar el menú, cerrar sesión o regresar a la creación del recurso con la palabra atrás. \";
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
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra crear, editar o eliminar según la acción que requieras utilizar\"; 
                        sintetizadorVoz(texto);
                    },//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                    'presentación':function(){window.location=\"principal.php\";},
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'atras':function(){window.location=\"crearRecurso.php\";},
                    'pregunta abierta':function(){guardarTemp('pregAbierta.php');},
                    'pregunta cerrada':function(){guardarTemp('pregCerradaUnica.php');},
                    'pregunta falso y verdadero':function(){guardarTemp('pregVerdadero.php');},
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

    public function getTemplateName()
    {
        return "question.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
