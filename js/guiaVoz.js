    
    
    var gcse = document.createElement('audio');
    
    function sintetizadorVoz(texto)
    {
      var valor = localStorage.getItem("sintetizador");
        if(valor==="true"){
          gcse.id = 'audio';
          //e.preventDefault();
          //var text = $("input[name=text]").val();
          //responsiveVoice.speak(text,"Spanish Female");
          gcse.src=responsiveVoice.speak(texto,"Spanish Latin American Female");// existen 4 tipos de voces para el español
          //text=encodeURIComponent(text);
          gcse.autoplay=true;
          //var url="http://";
      } 
    }

    /*function sintetizadorVoz(texto){
        var valor = localStorage.getItem("sintetizador");
        if(valor==="true"){
            gcse.id = 'audio'; 
            //gcse.src = 'http://text-to-speech-demo.mybluemix.net/api/synthesize?voice=es-ES_EnriqueVoice&text='+texto;
            //gcse.src = 'https://audio1.spanishdict.com/audio?lang=es&text='+texto;
            //gcse.src = 'https://audio1.spanishdict.com/audio?lang=es&text='+texto;
            gcse.autoplay = true;
        }
    }*/
    
    
    function normalize (str) {
        var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÇç´'`,;.:-_^¨{}[]*+~¡?¿!#$%&/()=°!|ºª ";
        var to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuucc";
        var mapping = {};
        for(var i = 0, j = from.length; i < j; i++ ){mapping[ from.charAt( i ) ] = to.charAt( i );}
        var ret = [];
        for( var i = 0, j = str.length; i < j; i++ ) {var c = str.charAt( i );if( mapping.hasOwnProperty( str.charAt( i ) ) ){ret.push( mapping[ c ] );}else{ret.push( c );}}      
        return ret.join( '' );
    }
