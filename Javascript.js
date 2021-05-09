$(document).ready(function(){
    $('#FormCadastro').on('submit',function (event){
        event.preventDefault();
        var Dados=$(this).serialize();

        $.ajax({
            url: 'Controllers/ControllerCadastro.php',
            type: 'post',
            dataType:'html',
            data: Dados,
            success:function(Dados){
                $('.Resultado').show().html(Dados);
            },error: function (request, status, error) {
				console.log(request.responseText);
			}
        });
    });
	
	/* Confirmar antes de deletar os dados */
	$('.Deletar').on('click',function(event){
		event.preventDefault();

		var Link=$(this).attr('href');
		
		if(confirm("Deseja mesmo apagar esse dado?")){
			window.location.href=Link;
		}else{
			console.log("Erro!");
			return false;
		}
	});

});
