<!--[Validação Campos]-->
<link type="text/css" rel="stylesheet" href="css/jquery-validation-engine/validationEngine.jquery.css" />
<script type="text/javascript" src="js/jquery-validation-engine/languages/jquery.validationEngine-pt_BR.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery-validation-engine/jquery.validationEngine.js" charset="utf-8"></script>

<script>
    jQuery(document).ready(function(){
        jQuery(".validaForm").validationEngine();
    });
    function checkHELLO(field, rules, i, options){
        if (field.val() != "HELLO") {
            return options.allrules.validate2fields.alertText;
        }
    }
</script>
<!--[Validação Campos END ]-->
