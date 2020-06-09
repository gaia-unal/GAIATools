<?php

/* finalizar.twig.html */
class __TwigTemplate_7b2f12209243f458f5ec62a4fabdef07 extends Twig_Template
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
<font color=\"#57934E\" size=\"5\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
        echo ", usted ha finalizado.<br><br></font>
<font color=\"#585858\" size=\"3\">
    <label autofocus>El recurso educativo llamado ";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo " fue construido contando con un total de
        ";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'cantidad'), "html");
        echo " preguntas.</label><br><br>
    <label>Actualmente, este recurso solo puede ser observado por usted, el autor, 
        pero a través de la opción \"PUBLICAR\" cualquier otra persona podrá visualizarlo 
        al ingresar a la herramienta GAIA-Tools.
    </label><br><br>
    <!--label>Adicional a esto, también podrá permitir agregar este recurso educativo al repositorio
        <a href=\"\">ROAP</a> a través de la opción \"TRANSFERIR\", de la cual se le solicitará alguna información
        adicional sobre este objeto de aprendizaje para mantener los beneficios de RAIM
    </label><br><br-->
</font>
    <form id=\"formPublicar\" action=\"finalizar.php\" method=\"post\">
        <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
        <input type=\"hidden\" name=\"id\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
        <input type=\"hidden\" name=\"estado\" value=\"1\" >
        <br><br><label id=\"confirmFinal\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label><br>
        <input class=\"btn\" type=\"submit\" id=\"finalizar\" value=\"PUBLICAR\"> 
    </form>
    ";
        // line 24
        if (($this->getContext($context, 'usuario') == 1)) {
            echo " <!-- solo el usuario administrador puede ver esto-->
    <form action=\"transferencia.php\" method=\"post\" id=\"formTrans\">
        <input type=\"hidden\" name=\"id\" value=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
        <input class=\"btn\" type=\"submit\" id=\"finalizar 2\" value=\"COMPARTIR CON ROAp\" /> 
    </form>
    ";
        }
        // line 30
        echo "    <form action=\"principal.php\" method=\"post\" id=\"formFinal\">
        <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
    </form>
</div>
<script>
    function dispararFormPublicar(){
        \$(\"#formPublicar\").submit();
    }
    function dispararFormTrans(){
        \$(\"#formTrans\").submit();
    }
    function dispararFormFinal(){
        \$(\"#formFinal\").submit();
    }
     var onload = function cargarRE (){
         if('";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'===''){
             var texto = /*\$(\"#contenido1\").html()+*/\"Al pronunciar publicar, este recurso educativo \\n\\
    estará disponible para todos los visitantes de GAIATools. Si pronuncias transferir, este recurso \\n\\
    educativo sera visible en el repositorio de objetos de aprendizaje ROAP. Pero si no deseas ninguna \\n\\
    de las anteriores solo pronuncia finalizar. Recuerde que puede consultar el menú o puede cerrar sesión. \";
         }else{
             var texto = '";
        // line 51
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "';
         }
        
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
                    'transferir':function(){
                        dispararFormTrans();
                    },
                    'publicar':function(){
                        dispararFormPublicar();
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

    public function getTemplateName()
    {
        return "finalizar.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
