<?php

/* eliminarRecurso.twig.html */
class __TwigTemplate_f5f9f808df7a6a373ed2137f3254985f extends Twig_Template
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
        echo "<div class=\"presentacion\" >
    <div>
        <h3 class=\"bienvenida\" autofocus>
            Ésta es la eliminación de los recurso educativos. Recuerda que puede 
            consultar el menú al lado izquierdo de la página o \"Cerrar Sesión\" 
            siguiendo el enlace en la parte superior. Para continuar con la eliminación, 
            soló debe elegir el recurso educativo y seleccionar el botón \"Eliminar\"<br><br>
        </h3>
    </div>
    <form id=\"form\" action=\"eliminarRecurso.php\" method=\"post\">
        <div id=\"recursos\"></div>
        <br><label class=\"bienvenida\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label><br><br>
        <input class=\"btn\" type=\"submit\" value=\"ELIMINAR\" />
    </form>
</div>
<input value='";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'idUsuario'), "html");
        echo "' type=\"hidden\" id='lista'/>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var onload = function cargarRE (){
        \$id = \$(\"#lista\").val();
        var datos = {id : \$id, ruta : \"";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, 'ruta'), "html");
        echo "\" };
        \$.post(\"../ajax/eliminarRecurso-ajax.php\", datos, function(data) {
            \$(\"#recursos\").html(data);
        });
        if('";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'!=\"\"){
            var texto = '";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "';
        }else{
            var texto = \"Esta es la eliminación de los recurso educativos. Recuerda que puede consultar el menú o cerrar sesión. Para continuar con la eliminación, pronuncia seguir para listar los nombres de los recursos educativos, luego mensiona seleccionar seguido del nombre completo, el sistema confirmara la selección, y luego podras mensionar la palabra eliminar. \";
        }
        sintetizadorVoz(texto);
    }
    function dispararForm(){
        \$(\"#form\").submit();
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
                \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
                if (annyang) {
                    \"use strict\"
                    var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                        'página principal':function(){window.location=\"index.php\";},
                        'iniciar sesión':function(){window.location=\"validar.php\";},
                        'registrar':function(){window.location=\"registro.php\";},
                        'cerrar sesión':function(){window.location=\"cierre.php\";},
                        'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                            gcse.pause();
                            gcse.src = \"\";
                            var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra visualizar, crear o editar según la acción que requieras utilizar.\"; 
                            sintetizadorVoz(texto);
                        },//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        'presentación':function(){window.location=\"principal.php\";},
                        'visualizar':function(){window.location=\"listarRecurso.php\";},
                        'información personal':function(){window.location=\"informacionPersonal.php\";},
                        'crear':function(){window.location=\"crearRecurso.php\";},
                        'editar':function(){window.location=\"editarRecurso.php\";},
                        'seguir' :function(){
                            gcse.pause();
                            gcse.src = \"\";
                            var titulos = \$('#paraSintetizador').val();
                            var texto = \"Usted debe pronunciar la palabra seleccionar seguido del titulo completo del recurso educativo que desea eliminar, para ello le mencionaremos todos los titulos de los recursos educativos existentes, \"+titulos;
                            sintetizadorVoz(texto);
                        },
                        'seleccionar *v':function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        'presentación':function(){window.location=\"principal.php\";},
                            gcse.pause();
                            gcse.src = \"\";
                            var texto = \"Su opción elegida es \"+v+\" al pronunciar eliminar se hará efectiva la eliminación del recurso.\";
                            sintetizadorVoz(texto);
                            v = normalize(v);
                            var opcionE = \".\"+v;
                            jQuery(opcionE).attr('checked', true);
                        },
                        'eliminar':function(){
                            dispararForm();
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

    public function getTemplateName()
    {
        return "eliminarRecurso.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
