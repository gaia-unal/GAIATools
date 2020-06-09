<?php

/* listarItems.twig.html */
class __TwigTemplate_95a2896fb568882bb64c118424673bd9 extends Twig_Template
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
        echo " <div id=\"formulario\"></div>
<script type=\"text/javascript\">
    if ('";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "'!='0' && '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'modificado'), "html");
        echo "'=='1'){ \$(\"#formulario\").html('<form id=\"siguiente\" action=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'url'), "html");
        echo "\" method=\"post\" ><input type=\"hidden\" name=\"titulo\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" /><input type=\"hidden\" name=\"id\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" /><input type=\"hidden\" name=\"idItem\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
        echo "\" /><input type=\"hidden\" name=\"existente\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" /><input type=\"hidden\" name=\"modificado\" value=\"0\" /></form>'); document.forms['siguiente'].submit(); }
    function guardarTemp(urlAplicacion, idItem){ \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\" ><input type=\"hidden\" name=\"titulo\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" /><input type=\"hidden\" name=\"id\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" />\\n\\<input type=\"hidden\" name=\"origen\" value=\"existe\" /><input type=\"hidden\" name=\"existente\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" /></form>'); document.forms['cambapli'].submit(); }
</script>
<div class=\"presentacion\">
    <header><h2>EDICIÓN: \"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header><br><br>
    <div>
        <h3 class=\"bienvenida\" autofocus>
            Puedes realizar diferentes acciones como editar el contenido de cada ítem, eliminar uno de los ítems,
            subir de posición o bajar de posición, para alterar el orden en el que es presentados los ítems del 
            recurso educativo al usuario final. Recuerda que primero debes elegir el ítem que deseas alterar con 
            cualquiera de las opciones anteriores. O tambien puedes crear un nuevo ítem.<br><br>
        </h3>
    </div>
    <form action=\"listarItems.php\" method=\"post\">
        <input name=\"id\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"titulo\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"existente\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\" type=\"hidden\" />
        <input name=\"modificado\" value=\"1\" type=\"hidden\" />
        <div id=\"items\"></div>
        <label>";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label>
        <input class=\"btn\" type=\"submit\" name=\"editar\" value=\"EDITAR\" />
        <input class=\"btn\" type=\"submit\" name=\"eliminar\" value=\"ELIMINAR\" />
        <input class=\"btn\" type=\"submit\" name=\"subir\" value=\"SUBIR\" />
        <input class=\"btn\" type=\"submit\" name=\"bajar\" value=\"BAJAR\" />
    </form>
    <div id=\"tipopreg\">
        ";
        // line 29
        if ((((twig_in_filter(1, $this->getContext($context, 'tipos')) || twig_in_filter(2, $this->getContext($context, 'tipos'))) || twig_in_filter(3, $this->getContext($context, 'tipos'))) || twig_in_filter(4, $this->getContext($context, 'tipos')))) {
            // line 30
            echo "            <button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregAbierta.php');\">Nueva pregunta abierta</button>
            <!--button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaMultiple.php');\">Nueva pregunta cerrada de múltiple respuesta</button-->
            <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaUnica.php');\">Nueva pregunta cerrada de única respuesta</button>
            <button id=\"actividad\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregVerdadero.php');\">Nueva pregunta de verdadero o falso</button>
        ";
        }
        // line 35
        echo "        ";
        if (twig_in_filter(5, $this->getContext($context, 'tipos'))) {
            echo "<button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('libro.php');\">Nueva página del libro</button>";
        }
        // line 36
        echo "        ";
        if (twig_in_filter(6, $this->getContext($context, 'tipos'))) {
            echo "<button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('escribelo.php');\">Nueva apartado de escríbe-lo</button>";
        }
        // line 37
        echo "        ";
        if (twig_in_filter(9, $this->getContext($context, 'tipos'))) {
            echo "<button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('ensenaloResponseCorrect.php');\">Nueva apartado de emparejar</button>";
        }
        // line 38
        echo "        ";
        if (twig_in_filter(10, $this->getContext($context, 'tipos'))) {
            echo "<button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('ensenaloOptionCorrect.php');\">Nueva apartado de emparejar</button>";
        }
        // line 39
        echo "        ";
        if (twig_in_filter(11, $this->getContext($context, 'tipos'))) {
            echo "<button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('ensenaloEmparejar.php');\">Nueva apartado de emparejar</button>";
        }
        // line 40
        echo "    </div>
</div>
<script type=\"text/javascript\"> var onload = function cargarRE (){ var datos = {id:'";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "'}; \$.post(\"../ajax/listarItems-ajax.php\", datos, function(data) { \$(\"#items\").html(data); }); } </script>
";
    }

    public function getTemplateName()
    {
        return "listarItems.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
