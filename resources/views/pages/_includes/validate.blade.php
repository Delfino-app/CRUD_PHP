<script>
    jQuery.extend(jQuery.validator.messages, {
        required: "Campo obrigatório.",
        email: "Insira um endereço de e-mail válido",
        date: "Insira uma data válida.",
        number: "Insira um número válido.",
        maxlength: jQuery.validator.format("Deve tera até {0} caracteres."),
        minlength: jQuery.validator.format("Deve ter no mínimo {0} caracteres."),
    });
    $(document).ready(function() {
        $("#formulario").validate();
    });
</script>