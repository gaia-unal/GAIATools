<?php

/* finalizarEnSenaLo.twig.html */
class __TwigTemplate_645de34c0cb3be55566242b903bdb455 extends Twig_Template
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
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombreCorto'), "html");
        echo ", usted ha finalizado.<br><br></font>
<font color=\"#585858\" size=\"3\">
    <label>El recurso educativo llamado ";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo " fue construido contando con un total de
        ";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'cantidad'), "html");
        echo " preguntas.</label><br><br>
    <label>Actualmente, este recurso solo puede ser observado por usted, el autor, 
        pero a través de la opción \"PUBLICAR\" cualquier otra persona podrá visualizarlo 
        al ingresar a la herramienta GAIA-Tools.
    </label><br><br>
    <label>Adicional a esto, también podrá permitir agregar este recurso educativo al repositorio
        <a href=\"\">ROAP</a> a través de la opción \"TRANSFERIR\", de la cual se le solicitará alguna información
        adicional sobre este objeto de aprendizaje para mantener los beneficios de RAIM
    </label><br><br>
</font>
    <form id=\"pregunta\" action=\"finalizarEnSenaLo.php\" method=\"post\">
        <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
        <input type=\"hidden\" name=\"id\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
        <input type=\"hidden\" name=\"estado\" value=\"1\" >
        <br><br><label id=\"confirmFinal\">";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label><br>
        <input class=\"btn\" type=\"submit\" id=\"finalizar\" value=\"PUBLICAR\"> 
    </form>
    <form id=\"pregunta\" action=\"#\" method=\"post\">
        <input type=\"hidden\" name=\"id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
        <input class=\"btn\" type=\"submit\" id=\"finalizar 2\" value=\"TRANSFERIR\"> 
    </form>
    <form action=\"principal.php\" method=\"post\">
        <input class=\"btn\" type=\"submit\" value=\"FINALIZAR\">
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "finalizarEnSenaLo.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
