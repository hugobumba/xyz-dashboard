$(window).ready(function(){
	$("#funcionalidades").show();
	$("#listagens").hide();
	$("#departamentos").hide();
	$("#funcionarios").hide();
	$("#categorias").hide();
	$("#equipamentos").hide();
});

$(document).ready(function(){
	$("#btn-funcdd, #btn-funcdd1").click(function(){
		$("#funcionalidades").show();
		$("#listagens").hide();
		$("#departamentos").hide();
		$("#funcionarios").hide();
		$("#categorias").hide();
		$("#equipamentos").hide();
	});
	$("#btn-list, #btn-list1").click(function(){
		$("#funcionalidades").hide();
		$("#listagens").show();
		$("#departamentos").hide();
		$("#funcionarios").hide();
		$("#categorias").hide();
		$("#equipamentos").hide();
	});
	$("#btn-dep, #btn-dep1, #btn-dep2").click(function(){
		$("#funcionalidades").hide();
		$("#listagens").hide();
		$("#departamentos").show();
		$("#funcionarios").hide();
		$("#categorias").hide();
		$("#equipamentos").hide();
	});
	$("#btn-funcn, #btn-funcn1, #btn-funcn2").click(function(){
		$("#funcionalidades").hide();
		$("#listagens").hide();
		$("#departamentos").hide();
		$("#funcionarios").show();
		$("#categorias").hide();
		$("#equipamentos").hide();
	});
	$("#btn-cat, #btn-cat1, #btn-cat2").click(function(){
		$("#funcionalidades").hide();
		$("#listagens").hide();
		$("#departamentos").hide();
		$("#funcionarios").hide();
		$("#categorias").show();
		$("#equipamentos").hide();
	});
	$("#btn-equip, #btn-equip1, #btn-equip2").click(function(){
		$("#funcionalidades").hide();
		$("#listagens").hide();
		$("#departamentos").hide();
		$("#funcionarios").hide();
		$("#categorias").hide();
		$("#equipamentos").show();
	});
});


$(document).ready(function(){
	$("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myList li").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
});

$(document).ready(function(){
    $("#insercao").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});

function confirmar(a) {
	var a;
	if (confirm("Deseja eliminar a observação?") == true){
		window.location.href = "process.php?rem="+a;
	}
}