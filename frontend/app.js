function comprar_item(url, valor)
{
	if (confirm("Confirma a compra do item por " + valor + " ?")) {
		window.location.href = url;
	}
}
