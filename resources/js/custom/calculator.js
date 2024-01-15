let syncAllCheckBoxes = () => {
	var items = document.getElementsByName('acs');
	var selectedItems = '';
	for (var i = 0; i < items.length; i++) {
		//if (items[i].type == 'checkbox' && items[i].checked == true)
		if (items[i].checked != app.lineitems[i].calc) app.lineitems[i].calc = items[i].checked;
		//selectedItems += items[i].checked + ' ' + app.lineitems[i].calc + '\n';
	}
	//alert(selectedItems);
};
